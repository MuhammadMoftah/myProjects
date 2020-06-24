<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\TargetJob;
use App\Country;
use App\User;
use App\Category;
use App\Industry;
use App\JobType;

class TargetJobController extends Controller
{
    protected $targetjob_model;
    protected $request;

    public function __construct(TargetJob $targetjob_model, Request $request)
    {
        $this->request = $request;
        $this->targetjob_model = $targetjob_model;
    }


    public function getCreate($user_id, Country $country_model, User $user_model, Category $category_model, Industry $industry_model, JobType $jobtype_model)
    {
        $user = $user_model->findOrFail($user_id);
        $countries = $country_model->get();
        $categories = $category_model->get();
        $industries = $industry_model->get();
        $jobtypes = $jobtype_model->get();
        return view('admin.pages.users.targetjobs.create', compact('countries', 'user', 'categories', 'industries', 'jobtypes'));
    }

    public function postCreate($user_id, User $user_model)
    {
        $user = $user_model->findOrFail($user_id);

        $this->validate($this->request, $this->targetjob_model->getCreateAndUpdateRules());

        if (!$this->targetjob_model->validate_salary($this->request->salary_from, $this->request->salary_to)) {
            return back()->withErrors('salary from must be smaller than salary to');
        }

        $this->targetjob_model->create([
            'title' => $this->request->title,
            'category_id' => $this->request->category_id,
            'industry_id' => $this->request->industry_id,
            'jobtype_id' => $this->request->jobtype_id,
            'salary_from' => $this->request->salary_from,
            'country_id' => $this->request->country_id,
            'city_id' => $this->request->city_id,
            'salary_to' => $this->request->salary_to,
            'user_id' => $user->id
        ]);

        return redirect()->route('admin.users.view', $user->id)->withMessage('target job created successfully!');
    }

    public function delete($id)
    {
        $targetjob = $this->targetjob_model->findOrFail($id);
        return $targetjob->delete() ? back()->withMessage('target job has been deleted') : abort(500);
    }

    public function getView($id)
    {
        $targetjob = $this->targetjob_model->findOrFail($id);
        return view('admin.pages.users.targetjobs.view', compact('targetjob'));
    }

    public function getEdit($id, Country $country_model, User $user_model, Category $category_model, Industry $industry_model, JobType $jobtype_model)
    {
        $targetjob = $this->targetjob_model->findOrFail($id);
        $countries = $country_model->get();
        $cities = $targetjob->country->cities;
        $categories = $category_model->get();
        $industries = $industry_model->get();
        $jobtypes = $jobtype_model->get();
        return view('admin.pages.users.targetjobs.edit', compact('targetjob', 'countries', 'cities', 'categories', 'industries', 'jobtypes'));
    }

    public function postEdit($id)
    {
        $targetjob = $this->targetjob_model->findOrFail($id);
        $this->validate($this->request, $this->targetjob_model->getCreateAndUpdateRules());

        if (!$this->targetjob_model->validate_salary($this->request->salary_from, $this->request->salary_to)) {
            return back()->withErrors('salary from must be smaller than salary to');
        }

        $targetjob->update([
            'title' => $this->request->title,
            'category_id' => $this->request->category_id,
            'industry_id' => $this->request->industry_id,
            'jobtype_id' => $this->request->jobtype_id,
            'salary_from' => $this->request->salary_from,
            'country_id' => $this->request->country_id,
            'city_id' => $this->request->city_id,
            'country_id' => $this->request->country_id,
            'salary_to' => $this->request->salary_to,
        ]);

        return redirect()->route('admin.users.view', $targetjob->user_id)->withMessage('targetjob updated successfully!');
    }
}
