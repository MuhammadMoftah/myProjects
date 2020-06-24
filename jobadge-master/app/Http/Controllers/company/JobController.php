<?php

namespace App\Http\Controllers\company;

use App\Job;
use App\User;
use App\Country;
use App\JobType;
use App\UserJob;
use App\Category;
use App\JobLevel;
use App\User_views;
use App\Nationality;
use App\JobDescription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class JobController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getCreateJob(Category $category_model, Nationality $nationality_model, JobLevel $joblevel_model, JobType $jobtype_model, Country $country_model)
    {
        $categories = $category_model->get();
        $jobtypes = $jobtype_model->get();
        $joblevels = $joblevel_model->get();
        $nationalities = $nationality_model->get();
        $countries = $country_model->get();

        return view('company.pages.postJob', compact('categories', 'jobtypes', 'joblevels', 'nationalities','countries'));
    }
    public function postJob(Job $job_model)
    {
        $this->validate($this->request, $job_model->getSiteJobRule($this->request->salary_to));
        if (isset($this->request->apply_on_site)) {
            $this->validate($this->request, [
                'company_url' => 'required|url',
            ]);
        }
        if ($this->request->KPI) {
            $this->validate($this->request, $job_model->validate_kpi());
        }
        $job = $job_model->create([
            'title' => $this->request->title,
            'jobtype_id' => $this->request->jobtype_id,
            'joblevel_id' => $this->request->joblevel_id,
            'gender' => $this->request->gender,
            'category_id' => $this->request->category_id,
            'experience_years' => $this->request->experience_years,
            'education_level' => $this->request->education_level,
            'vacancies' => $this->request->vacancies,
            'nationality_id' => $this->request->nationality_id,
            'description' => $this->request->description,
            'job_requirement' => $this->request->job_requirement,
            'KPI' => $this->request->KPI,
            'benefits' => $this->request->benefits,
            'skills' => $this->request->skills,
            'company_id' => auth()->guard('company')->user()->id,
            'apply_on_site' => isset($this->request->apply_on_site) ? 1 : 0,
            'company_url' => isset($this->request->apply_on_site) ? $this->request->company_url : null,
            'draft' => isset($this->request->draft) ? 1 : 0,
            'confidential' => isset($this->request->confidential) ? 1 : 0,
            'salary_hidden' => isset($this->request->salary_hidden) ? 1 : 0,
            'travel_frequency' => $this->request->travel_frequency,
            'salary_from' => $this->request->salary_from,
            'salary_to' => $this->request->salary_to,
            "time_created"=> Carbon::now(),
            'salary_period' => $this->request->salary_period,
            "job_location"=>$this->request->job_location,
            'country_id' => $this->request->country_id ? $this->request->country_id : null,
            'city_id' => $this->request->city_id ? $this->request->city_id : null,
        ]);
        $job->load(['company','country', 'city'])    ;
        $id = $job->id;
        $title = preg_replace("![^a-z0-9]+!i", '-',  $job->title);
        if ($job->confidential == 0) {
            $companyName = false;
        } else {
            $companyName =  preg_replace('/\s+/', '-', $job->company->name);
        }

        if( $job->country && $job->city )
        {
             $city =  preg_replace("![^a-z0-9]+!i", '-', $job->city->name_en);
             $country = preg_replace("![^a-z0-9]+!i", '-', $job->country->name_en);
        }else{
            $city =  preg_replace("![^a-z0-9]+!i", '-', $job->company->city->name_en);
            $country = preg_replace("![^a-z0-9]+!i", '-', $job->company->country->name_en);
        }
        
        if ($companyName) {
            $job->update([
                'slug' => $id . '-' .  $title . '-'  . $city . '-' . $country
            ]);
        } else {
            $job->update([
                'slug' => $id . '-' .  $title . '-' . $companyName . '-' . $city . '-' . $country
            ]);
        }
        return back()->withMessage('Job Created successfully');
    }
    public function getJobs(Job $job_model)
    {
        $company = auth()->guard('company')->user();
        $jobs = $job_model->activejob()->activecompany()->where([
            'company_id' => $company->id,
        ])->paginate(10);
        return $jobs;
    }
    public function getSingleJob($slug, Job $job_model, User_views $user_views)
    {
        $arr = explode('-', trim($slug));
        $id =  $arr[0];
        $company = auth()->guard('company')->user();
        $job = $job_model->activejob()->activecompany()->where([
            'company_id' => $company->id,
            'id' => $id,
        ])->firstOrFail();

        return $job;
    }
    public function getDraft($id, Job $job_model, Category $category_model, Nationality $nationality_model, JobLevel $joblevel_model, JobType $jobtype_model, Country $country_model)
    {
        $company = auth()->guard('company')->user();
        $draft = $job_model->where([
            'company_id' => $company->id,
            'id' => $id,
            'draft' => 1
        ])->with(['company', 'country', 'city'])->firstOrFail();

        $categories = $category_model->get();
        $jobtypes = $jobtype_model->get();
        $joblevels = $joblevel_model->get();
        $nationalities = $nationality_model->get();
        $countries = $country_model->get();

        return view('company.pages.draft', compact('draft', 'categories', 'jobtypes', 'joblevels', 'nationalities', "countries"));
    }
    public function postDraft($id, Job $job_model)
    {
        $this->validate($this->request, $job_model->getSiteJobRule($this->request->salary_to));

        if (isset($this->request->apply_on_site)) {
            $this->validate($this->request, [
                'company_url' => 'required|url',
            ]);
        }
        if ($this->request->KPI) {
            $this->validate($this->request, $job_model->validate_kpi());
        }

        $company = auth()->guard('company')->user();

        $draft = $job_model->where([
            'company_id' => $company->id,
            'id' => $id,
            'draft' => 1
        ])->with(['company', 'country', 'city'])->firstOrFail();
        $draft->update([
            'title' => $this->request->title,
            'jobtype_id' => $this->request->jobtype_id,
            'joblevel_id' => $this->request->joblevel_id,
            'gender' => $this->request->gender,
            'category_id' => $this->request->category_id,
            'experience_years' => $this->request->experience_years,
            'education_level' => $this->request->education_level,
            'vacancies' => $this->request->vacancies,
            'nationality_id' => $this->request->nationality_id,
            'description' => $this->request->description,
            'job_requirement' => $this->request->job_requirement,
            'KPI' => $this->request->KPI,
            'benefits' => $this->request->benefits,
            'skills' => $this->request->skills,
            'apply_on_site' => isset($this->request->apply_on_site) ? 1 : 0,
            'company_url' => isset($this->request->apply_on_site) ? $this->request->company_url : null,
            'draft' => 0,
            'confidential' => isset($this->request->confidential) ? 1 : 0,
            'salary_hidden' => isset($this->request->salary_hidden) ? 1 : 0,
            'travel_frequency' => $this->request->travel_frequency,
            'salary_from' => $this->request->salary_from,
            'salary_to' => $this->request->salary_to,
            'salary_period' => $this->request->salary_period,
            "job_location"=>$this->request->job_location,
            'country_id' => $this->request->country_id ? $this->request->country_id : null,
            'city_id' => $this->request->city_id ? $this->request->city_id : null,
        ]);

        $id = $draft->id;
        $title = preg_replace("![^a-z0-9]+!i", '-',  $draft->title);
        if ($draft->confidential == 0) {
            $companyName = false;
        } else {
            $companyName =  preg_replace('/\s+/', '-', $draft->company->name);
        }
        if( $draft->country && $draft->city )
        {
             $city =  preg_replace("![^a-z0-9]+!i", '-', $draft->city->name_en);
             $country = preg_replace("![^a-z0-9]+!i", '-', $draft->country->name_en);
        }else{
            $city =  preg_replace("![^a-z0-9]+!i", '-', $draft->company->city->name_en);
            $country = preg_replace("![^a-z0-9]+!i", '-', $draft->company->country->name_en);
        }
        if ($companyName) {
            $draft->update([
                'slug' => $id . '-' .  $title . '-'  . $city . '-' . $country
            ]);
        } else {
            $draft->update([
                'slug' => $id . '-' .  $title . '-' . $companyName . '-' . $city . '-' . $country
            ]);
        }
        return redirect()->route('company.profile')->withMessage('Job Posted successfully');
    }

    public function getDescription(JobDescription $description_model)
    {
        $title = $this->request->title;
        $category_id = $this->request->category_id;

        $description = $description_model->where('category_id', $category_id)->where('title', 'LIKE', '%' . $title . '%')->first();

        if ($description) {
            return response()->json($description);
        }
    }
    public function getMyJobs(Job $job_model)
    {
        $company = auth()->guard('company')->user();

        $jobs = $job_model->newQuery();

        if (isset($this->request->keyword)) {
            $jobs->where('title', 'LIKE', '%' . $this->request->keyword . '%');
        }

        $jobs = $jobs->activecompany()->where([
            'company_id' => $company->id,
            'draft' => 0
        ])->latest()->paginate(10);

        return view('company.pages.myJobs', compact('jobs'));
    }
    public function changeJobStatus($id, Job $job_model)
    {
        $company = auth()->guard('company')->user();

        $job = $job_model->where([
            'company_id' => $company->id,
            'id' => $id
        ])->first();

        if (!$job) {
            return redirect()->back()->withMessage('invalid job post');
        }

        $job->close == 1 ? $job->update(['close' => 0]) : $job->update(['close' => 1]);

        return redirect()->back()->withMessage('Job status changed successfully');
    }
    public function all_apllicaions($job_id, UserJob $user_model)
    {

        $users = $user_model->where('job_id', $job_id)->with('user')->paginate(10);
        return view('company.pages.jobseeker_applicaions', compact('users'));
    }
}
