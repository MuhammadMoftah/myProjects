<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Job;
use App\UserJob;
use App\JobType;
use Carbon\Carbon;
use App\Category;
use App\JobLevel;
use App\Country;
use App\City;
use App\User_views;

class JobController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function apply($job_id, Job $job_model, UserJob $userjob_model)
    {
        $job = $job_model->activecompany()->activejob()->where([
            'id' => $job_id,
        ])->firstOrFail();

        $user = auth()->guard('user')->user();

        if ($user->getUserRate() < 60) {
            $link = route('user.profile.manage');
            return back()->withErrors("You Must <a href='$link'>Complete Your Profile</a>");
        }

        $job_user = $userjob_model->where([
            'user_id' => $user->id,
            'job_id' => $job->id
        ])->first();

        if ($job_user) {
            return back()->withErrors('you already applied for this job');
        }

        $job_user = $userjob_model->create([
            'user_id' => auth()->guard('user')->user()->id,
            'job_id' => $job->id
        ]);
        $job_user->load(['user','job.company']);    
        $job_user->user->sendUserApplicationApply($job_user);
        $job->company->sendApplicationMail($user, $job);

        return redirect()->route('user.recommendations')->withMessage('you are applied successfully for this job');
    }
    public function getRecommendations(Job $job_model, JobLevel $jobLevel_model, Category $category_model, JobType $jobtype_model, Country $country_model, City $city_model)
    {

        $user = auth()->guard('user')->user();
        $skills = $user->skills;

        $categories = $category_model->get();
        $joblevels = $jobLevel_model->get();
        $jobtypes = $jobtype_model->get();
        $countries = $country_model->get();
        $cities = $city_model->where('country_id', $this->request->country_id)->get();

        if (count($skills) == 0) {
            $jobs = array();
            return view('user.pages.recommended', compact('jobs', 'joblevels', 'categories', 'jobtypes', 'countries', 'cities'));
        }

        $jobs = $job_model->newQuery();

        if (isset($this->request->category_id)) {
            $jobs->where('category_id', $this->request->category_id);
        }

        if (isset($this->request->joblevel_id)) {
            $jobs->where('joblevel_id', $this->request->joblevel_id);
        }

        if (isset($this->request->jobtype_id)) {
            $jobs->where('jobtype_id', $this->request->jobtype_id);
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

        if (isset($this->request->country_id)) {
            $country_id = $this->request->country_id;

            $jobs->where(function ($query) use ($country_id) {
                $query->whereHas('company', function ($query) use ($country_id) {
                    $query->where('country_id', $country_id);
                })->orWhere('country_id', $country_id);
            });
        }

        if (isset($this->request->city_id)) {
            $city_id = $this->request->city_id;

            $jobs->where(function ($query) use ($city_id) {
                $query->whereHas('company', function ($query) use ($city_id) {
                    $query->where('city_id', $city_id);
                })->orWhere('city_id', $city_id);
            });
        }

        $jobs->where(function ($query) use ($skills) {
            foreach ($skills as $single_skill) {
                $query->orWhere('skills', 'LIKE', '%' . $single_skill->skill . '%');
            }
        });

        $jobs = $jobs->activecompany()->activejob()->distinct()->latest()->paginate(10);

        return view('user.pages.recommended', compact('jobs', 'joblevels', 'categories', 'jobtypes', 'countries', 'cities'));
    }
    public function getJob($slug, Job $job_model, User_views $user_views)
    {
        $arr = explode('-', trim($slug));
        $id =  $arr[0]; // will print Test 

        
        $user_ip = request()->getClientIp();
        $views = $user_views
            ->where('job_id', $id)
            ->where('user_ip', $user_ip)
            ->count();
        if ($views == 0) {
            $user_views->user_ip = $user_ip;
            $user_views->job_id = $id;
            $user_views->save();
        }
        $user_views->user_ip = request()->getClientIp();
        $user_views->job_id = $id;
        if(auth("company")->check()){
            $job         = $job_model->findOrFail($id);
            if($job->company_id != auth("company")->id() ){

                $job = $job_model->activecompany()->activejob()->where([
                    'id' => $id,
                ])->firstOrFail();
            }
        }else{
            $job = $job_model->activecompany()->activejob()->where([
                'id' => $id,
            ])->firstOrFail();
        }
       

        $related_jobs = $job->getRelatedJobs();
        session()->put('job_link', $this->request->getRequestUri());
        return view('user.pages.JobDetails', compact('job', 'related_jobs'));
    }
    public function shareJob($id, $provider, Job $job_model)
    {
        $job = $job_model->where(['id' => $id])->activejob()->activecompany()->firstOrFail();
        $sharelink = $job->generateShareLink($provider);
        return redirect($sharelink);
    }
}
