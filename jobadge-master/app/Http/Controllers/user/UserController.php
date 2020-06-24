<?php

namespace App\Http\Controllers\user;

use App\Job;
use App\City;
use App\User;
use App\Company;
use App\Content;
use App\Country;
use App\JobType;
use App\UserJob;
use App\Category;
use App\Feedback;
use App\Industry;
use App\JobLevel;
use Carbon\Carbon;
use App\User_views;
use App\Nationality;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }


   

    public function getIndex(Job $job_model, JobType $job_type_model, Category $category_model, Company $company_model, Feedback $feedback_model)
    {
        $latest_jobs_count = $job_model->activejob()->activecompany()
            ->where('created_at', '>', Carbon::now()->subDays(7))->count();

        $latest_jobs = $job_model->activejob()->activecompany()->latest()->take(9)->get();

        $categories = $category_model->get();

        $job_types = $job_type_model->get();

        $latest_companies = $company_model->active()->latest()->take(6)->get();

        $latest_feedbacks = $feedback_model->where('approved', 1)->latest()->take(10)->get();


        return view('user.pages.index', compact('latest_jobs', 'latest_jobs_count', 'job_types', 'categories', 'latest_companies', 'latest_feedbacks'));
    }
    public function changeLang($lang)
    {
        session()->put('locale', $lang);
        return redirect()->back();
    }
    public function getLatestJobs(Job $job_model)
    {
        $latest_jobs = $job_model->newQuery();

        if (isset($this->request->category_id)) {
            $latest_jobs->where('category_id', $this->request->category_id);
        }

        if (isset($this->request->jobtype_id)) {
            $latest_jobs->where('jobtype_id', $this->request->jobtype_id);
        }

        $latest_jobs = $latest_jobs->activejob()->activecompany()->latest()->take(9)->get();

        foreach ($latest_jobs as $job) {
            $job['date'] = $job->created_at->diffForHumans();
            $job['image'] = $job->confidential == 0 ? $job->company->getCompanyLogo() : $job->company->getCompanyDefaultLogo();
            $job['city_name'] = $job->country && $job->city ? $job->city->name_en : $job->company->city->name_en;
            $job['country_name'] = $job->country && $job->city ? $job->country->name_en : $job->company->country->name_en;
            $job['jobtype_name'] = $job->jobtype->name_en;
            $job['company_name'] = $job->confidential == 1 ? 'Confidential' : $job->company->name;
        }

        return response()->json($latest_jobs);
    }
    public function search(Job $job_model, JobLevel $jobLevel_model, Category $category_model, JobType $jobtype_model, Country $country_model, City $city_model)
    {
        $categories = $category_model->get();
        $joblevels = $jobLevel_model->get();
        $jobtypes = $jobtype_model->get();
        $countries = $country_model->get();
        $cities = $city_model->where('country_id', $this->request->country_id)->get();

        $jobs = $job_model->newQuery();

        if (isset($this->request->category)) {
            $category = $this->request->category;
            $jobs->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        }

        if (isset($this->request->joblevel)) {
            $joblevel = $this->request->joblevel;
            $jobs->whereHas('joblevel', function ($query) use ($joblevel) {
                $query->where('slug', $joblevel);
            });
        }

        if (isset($this->request->jobtype)) {
            $jobtype = $this->request->jobtype;
            $jobs->whereHas('jobtype', function ($query) use ($jobtype) {
                $query->where('slug', $jobtype);
            });
        }

        if (isset($this->request->post_date)) {
            if ($this->request->post_date === 'within_24_hours') {
                $jobs->where('created_at', '>', Carbon::now()->subDay());
            } elseif ($this->request->post_date === 'within_1_week') {
                $jobs->where('created_at', '>', Carbon::now()->subDays(7));
            } elseif ($this->request->post_date === 'within_1_month') {
                $jobs->where('created_at', '>', Carbon::now()->subDays(30));
            }
        }

        if (isset($this->request->country)) {
            $country_id = $this->request->country;

            $jobs->where(function ($query) use ($country_id) {
                $query->whereHas('company', function ($query) use ($country_id) {
                    $query->where('country_id', $country_id);
                })->orWhere('country_id', $country_id);
            });
        }

        if (isset($this->request->city)) {
            $city_id = $this->request->city;

            $jobs->where(function ($query) use ($city_id) {
                $query->whereHas('company', function ($query) use ($city_id) {
                    $query->where('city_id', $city_id);
                })->orWhere('city_id', $city_id);
            });
        }

        if ($this->request->keyword) {
            $keyword = $this->request->keyword;

            $jobs->where(function ($query) use ($keyword) {
                $query->where('title', 'Like', '%' . $keyword . '%')
                    ->orWhere('description', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('job_requirement', 'LIKE', '%' . $keyword . '%');
            });
        }

        $jobs = $jobs->latest()->activejob()->activecompany()->paginate(9);

        return view('user.pages.search', compact('jobs', 'joblevels', 'categories', 'jobtypes', 'countries', 'cities'));
    }
    public function BrowseJobs(Job $job_model)
    {
        $jobs = $job_model->newQuery();

        $categories = Category::get();
        $joblevels = JobLevel::get();
        $jobtypes = JobType::get();
        $countries = Country::get();

        if (request('country_id')) {
            $cities = City::where('country_id', request('country_id'))->get();
        } else {
            $cities = City::get();
        }

        if (request('search')) {
            $jobs = $jobs->where('title', 'LIKE', '%' . request('search') . '%')
                        ->orWhere("description", 'LIKE', '%' . request('search') . '%') 
                        ->orWhere('job_requirement', 'LIKE', '%' . request('search') . '%');;
        }

        if (request('category_id')) {
            $jobs->where('category_id', request('category_id'));
        }
       
        if (request('joblevel_id')) {
            $jobs->where('joblevel_id', request('joblevel_id'));
        }

        if (request('jobtype_id')) {
            $jobs->where('jobtype_id', request('jobtype_id'));
        }

        if (request('post_date')) {
            $post_date = request('post_date');
            if ($post_date === 'within_24_hours') {
                $jobs->where('created_at', '>', Carbon::now()->subDay());
            } elseif ($post_date === 'within_1_week') {
                $jobs->where('created_at', '>', Carbon::now()->subDays(7));
            } elseif ($post_date === 'within_1_month') {
                $jobs->where('created_at', '>', Carbon::now()->subDays(30));
            }
        }

        if (request('country_id')) {
            $country_id = request('country_id');
            $jobs->where(function ($query) use ($country_id) {
                $query->whereHas('company', function ($query) use ($country_id) {
                    $query->where('country_id', $country_id);
                })->orWhere('country_id', $country_id);
            });
        }

        if (request('city_id')) {
            $city_id = request('city_id');
            $jobs->where(function ($query) use ($city_id) {
                $query->whereHas('company', function ($query) use ($city_id) {
                    $query->where('city_id', $city_id);
                })->orWhere('city_id', $city_id);
            });
        }

        $jobs = $jobs->latest()->activejob()->activecompany()->with('user_views')->paginate(9);

        return view('user.pages.browseJobs', compact('jobs', 'joblevels', 'categories', 'jobtypes', 'countries', 'cities'));
    }
    public function deactivate()
    {
        $user = auth()->guard('user')->user();
        $user->update([
            'deactivate' => 1,
        ]);

        auth()->guard('user')->logout();

        return redirect()->route('user.index');
    }
    public function getJobsApplication()
    {
        $user = auth()->guard('user')->user();
        $applications = $user->getUserApplications();

        return view('user.pages.applicationStatus', compact('applications'));
    }
    public function getSingleApplication($id, UserJob $user_job)
    {
        $application = $user_job->where([
            'user_id' => auth()->guard('user')->user()->id,
            'id' => $id
        ])->firstOrFail();

        return $application;
    }
    public function downloadCv()
    {
        $user = auth()->guard('user')->user();
        clearstatcache();
        $cv_path = env('AWS_URL') . 'cvs/' . $user->cv;
        if (!file_exists($cv_path)) {
            return 'cant find user cv';
        }
        return response()->download($cv_path, 'cv.pdf');
    }
    public function getUser($id, User $user_model)
    {
        $user = $user_model->active()->where(['id' => $id])->firstOrFail();
        $user->increment('no_of_views');
        return view('user.pages.showUser', compact('user'));
    }





    public function shareProfile($provider)
    {
        $user = auth()->guard('user')->user();
        $sharelink = $user->generateShareLink($provider);
        return redirect($sharelink);
    }
    public function getContactus()
    {
        return view('user.pages.contact');
    }
    public function sendMail(User $user_model)
    {
        $this->validate($this->request, $user_model->getSendMailRules());

        $user_model->sendMail($this->request);

        return back()->withMessage('your message sent successfully');
    }
    public function socialInvite()
    {
        return view('user.pages.invite');
    }
    public function getNotifications()
    {
        return view('company.pages.notifications');
    }

    // Start New User Profile Routes
    public function editProfileInfo()
    {
        return  view('user.pages.new-edit-profile');
    }
    // Start New User Profile Routes
    public function editProfileInfo2(Country $country_model, Nationality $nationality_model, Industry $industry_model, Category $category_model, JobType $jobtype_model)
    {
        $user    = auth("user")->user();
        $user->load(
            [
                "work_experiences.country","work_experiences.city","work_experiences.industry",
                "languages","skills",
                "target_job",
                "certificates",
                "educations.country",
            ]
        );
        $countries = $country_model->get();
        $nationalities = $nationality_model->get();
        $cities = array();
        $industries = $industry_model->get();
        $categories = $category_model->get();
        $jobtypes = $jobtype_model->get();

        if ($user->city_id) {
            $cities = $user->country->cities;
        }
        return  view('user.pages.manageProfile.new-edit-profile',compact("user", 'countries', 'cities','categories' ,'industries','jobtypes','nationalities'));
    }
    public function editProfileExp()
    {
        return  view('user.pages.new-edit-profile-exp');
    }
    public function editProfileJob()
    {
        return  view('user.pages.new-edit-profile-job');
    }
    public function editProfileEdu()
    {
        return  view('user.pages.new-edit-profile-edu');
    }
    public function editProfileSkills()
    {
        return  view('user.pages.new-edit-profile-skills');
    }
    public function editProfileCerti()
    {
        return  view('user.pages.new-edit-profile-certi');
    }
    public function editProfileRef()
    {
        return  view('user.pages.new-edit-profile-ref');
    }

    // End New User Profile Routes

    public function getCategoryJobs($slug, Category $category_model, Job $job_model)
    {
        $category = $category_model->where('slug', $slug)->firstOrFail();
        $category_jobs = $job_model->activecompany()->activejob()->whereHas('category', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->paginate(10);
        return view('user.pages.categoryJobs', compact('category_jobs', 'category'));
    }
    public function getAboutus(Content $content_model)
    {
        $aboutus = $content_model->where('type', 'aboutus')->firstOrFail();
        return view('user.pages.about', compact('aboutus'));
    }
    public function getPrivacy(Content $content_model)
    {
        $privacy = $content_model->where('type', 'privacy')->firstOrFail();
        return view('user.pages.privacy', compact('privacy'));
    }
    public function getUserCv($id, User $user_model)
    {
        $user = $user_model->active()->where('id', $id)->firstOrFail();
        $cv_link = $user->getUserCv();
        return view('user.pages.viewCv', compact('cv_link'));
    }
    public function getVideo($roomName)
    {
        $room_name = $roomName;
        return view('user.pages.video', compact('room_name'));
    }
    public function getExpirePage()
    {
        return view('user.pages.sessionExpire');
    }
    public function getNotStartedSession()
    {
        return view('user.pages.sessionNotStarted');
    }
}
