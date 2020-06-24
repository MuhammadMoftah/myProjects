<?php

namespace App\Http\Controllers\admin;

use App\Job;

use App\Company;
use App\Country;
use App\JobType;
use App\Category;
use App\JobLevel;
use App\Nationality;
use App\Exports\JobsExport;
use App\Imports\JobsImport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class JobController extends Controller
{
    protected $job_model;
    protected $request;

    public function __construct(Job $job_model, Request $request)
    {
        $this->request = $request;
        $this->job_model = $job_model;
    }

    public function getAll()
    {
        $jobs = $this->job_model->where("draft","0")->latest()->paginate(10);
        return view('admin.pages.jobs.all', compact('jobs'));
    }

    public function getCreate(JobType $jobtype_model, Company $company_model, Category $category_model, JobLevel $joblevel_model, Nationality $nationality_model,  Country $country_model)
    {
        $joblevels = $joblevel_model->get();
        $jobtypes = $jobtype_model->get();
        $categories = $category_model->get();
        $nationalities = $nationality_model->get();
        $companies = $company_model->get();
        $countries = $country_model->get();
        return view('admin.pages.jobs.create', compact('categories','countries', 'jobtypes', 'joblevels', 'companies', 'nationalities'));
    }

    public function postCreate()
    {
        $this->validate($this->request, $this->job_model->getCreateAndUpdatesRules());

        if (isset($this->request->apply_on_site)) {
            $this->validate($this->request, [
                'company_url' => 'required|url',
            ]);
        }

        if (!$this->job_model->validate_salary($this->request->salary_from, $this->request->salary_to)) {
            return back()->withErrors('salary from must be smaller than salary to');
        }

        if ($this->request->KPI) {
            $this->validate($this->request, $this->job_model->validate_kpi());
        }
        $job =  $this->job_model->create([
            'title' => $this->request->title,
            'jobtype_id' => $this->request->jobtype_id,
            'joblevel_id' => $this->request->joblevel_id,
            'gender' => $this->request->gender,
            'category_id' => $this->request->category_id,
            'experience_years' => $this->request->experience_years,
            'education_level' => $this->request->education_level,
            'vacancies' => $this->request->vacancies,
            'travel_frequency' => $this->request->travel_frequency,
            'nationality_id' => $this->request->nationality_id,
            'description' => $this->request->description,
            'job_requirement' => $this->request->job_requirement,
            'KPI' => $this->request->KPI,
            'benefits' => $this->request->benefits,
            'skills' => $this->request->skills,
            'company_id' => $this->request->company_id,
            'apply_on_site' => isset($this->request->apply_on_site) ? 1 : 0,
            'confidential' => isset($this->request->confidential) ? 1 : 0,
            'salary_hidden' => isset($this->request->salary_hidden) ? 1 : 0,
            'company_url' => isset($this->request->apply_on_site) ? $this->request->company_url : null,
            'salary_from' => $this->request->salary_from,
            'salary_to' => $this->request->salary_to,
            "time_created"=> Carbon::now(),
            'salary_period' => $this->request->salary_period,
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
        if ($job->city && $job->country) {
            $city =  preg_replace("![^a-z0-9]+!i", '-', $job->city->name_en);
            $country = preg_replace("![^a-z0-9]+!i", '-', $job->country->name_en);
        } else {
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

        return redirect()->route('admin.jobs')->withMessage('job created successfully!');
    }

    public function delete($id)
    {
        $job = $this->job_model->findOrFail($id);
        $job->suspend == 0 ? $job->update(['suspend' => 1]) : $job->update(['suspend' => 0]);
        return $job->suspend == 1 ? back()->withMessage('job has been activated') : back()->withMessage('job has been suspended');
    }

    public function getView($id)
    {
        $job = $this->job_model->with(["country",'city'])->findOrFail($id);
        return view('admin.pages.jobs.view', compact('job'));
    }

    public function getEdit($id, JobType $jobtype_model, Company $company_model,Country $country_model, Category $category_model, JobLevel $joblevel_model, Nationality $nationality_model)
    {
        $job = $this->job_model->with(["country",'city'])->findOrFail($id);
        $joblevels = $joblevel_model->get();
        $jobtypes = $jobtype_model->get();
        $categories = $category_model->get();
        $nationalities = $nationality_model->get();
        $companies = $company_model->get();
        $countries = $country_model->get();
        
        return view('admin.pages.jobs.edit', compact('job', 'categories', 'countries','jobtypes', 'joblevels', 'companies', 'nationalities'));
    }

    public function postEdit($id)
    {
        $job = $this->job_model->with(["country",'city'])->findOrFail($id);
        $this->validate($this->request, $this->job_model->getCreateAndUpdatesRules());

        if (isset($this->request->apply_on_site)) {
            $this->validate($this->request, [
                'company_url' => 'required|url',
            ]);
        }

        if (!$this->job_model->validate_salary($this->request->salary_from, $this->request->salary_to)) {
            return back()->withErrors('salary from must be smaller than salary to');
        }

        if ($this->request->KPI) {
            $this->validate($this->request, $this->job_model->validate_kpi());
        }

        $job->update([
            'title' => $this->request->title,
            'jobtype_id' => $this->request->jobtype_id,
            'joblevel_id' => $this->request->joblevel_id,
            'gender' => $this->request->gender,
            'category_id' => $this->request->category_id,
            'experience_years' => $this->request->experience_years,
            'travel_frequency' => $this->request->travel_frequency,
            'education_level' => $this->request->education_level,
            'vacancies' => $this->request->vacancies,
            'nationality_id' => $this->request->nationality_id,
            'description' => $this->request->description,
            'job_requirement' => $this->request->job_requirement,
            'KPI' => $this->request->KPI,
            'benefits' => $this->request->benefits,
            'skills' => $this->request->skills,
            'company_id' => $this->request->company_id,
            'apply_on_site' => isset($this->request->apply_on_site) ? 1 : 0,
            'company_url' => isset($this->request->apply_on_site) ? $this->request->company_url : null,
            'close' => isset($this->request->close) ? 1 : 0,
            'confidential' => isset($this->request->confidential) ? 1 : 0,
            'salary_hidden' => isset($this->request->salary_hidden) ? 1 : 0,
            'salary_from' => $this->request->salary_from,
            'salary_to' => $this->request->salary_to,
            'salary_period' => $this->request->salary_period,
            'country_id' => $this->request->country_id ? $this->request->country_id : null,
            'city_id' => $this->request->city_id ? $this->request->city_id : null,
        ]);

        $id = $job->id;
        $title = preg_replace("![^a-z0-9]+!i", '-',  $job->title);
        if ($job->confidential == 0) {
            $companyName = false;
        } else {
            $companyName =  preg_replace('/\s+/', '-', $job->company->name);
        }

        if ($job->city && $job->country) {
            $city =  preg_replace("![^a-z0-9]+!i", '-', $job->city->name_en);
            $country = preg_replace("![^a-z0-9]+!i", '-', $job->country->name_en);
        } else {
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

        return redirect()->route('admin.jobs')->withMessage('job updated successfully!');
    }

    public function search()
    {
        $keyword = $this->request->search;
        $jobs = $this->job_model->where('title', 'LIKE', '%' . $keyword . '%')
            ->orWhere('gender', 'LIKE', '%' . $keyword . '%')
            ->orWhere('education_level', '%' . $keyword . '%')
            ->latest()->paginate(10);
        return view('admin.pages.jobs.search', compact('jobs'));
    }

    public function export()
    {
        return Excel::download(new JobsExport, 'jobs.xlsx');
    }

    public function import()
    {
        $this->validate($this->request, $this->job_model->validate_excel());
        try {
            Excel::import(new JobsImport, $this->request->file);
        } catch (\Exception $e) {
            return back()->withErrorS($e->getMessage());
        }
        return back()->withMessage('data imported successfully');
    }

    public function changeJobStatus($id)
    {
        $job = $this->job_model->findOrFail($id);


        $job->approve === 0 ? $job->update(['approve' => 1, "created_at"=> Carbon::now()]) : $job->update(['approve' => 0]);

        return back()->withMessage('job status changed successfully');
    }
}
