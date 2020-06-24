<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\WorkExperience;
use Carbon\Carbon;
use App\Country;
use App\User;
use App\Industry;

class WorkExperienceController extends Controller
{

    protected $workexperience_model;
    protected $request;

    public function __construct(WorkExperience $workexperience_model, Request $request)
    {
        $this->request = $request;
        $this->workexperience_model = $workexperience_model;
    }


    public function getCreate($user_id, Country $country_model, Industry $industry_model, User $user_model)
    {
        $user = $user_model->findOrFail($user_id);
        $countries = $country_model->get();
        $industries = $industry_model->get();
        return view('admin.pages.users.workexperiences.create', compact('countries', 'user', 'industries'));
    }

    public function postCreate($user_id, User $user_model)
    {
        $user = $user_model->findOrFail($user_id);

        $this->validate($this->request, $this->workexperience_model->getCreateAndUpdateRules());

        if ($this->request->achievements) {
            $this->validate($this->request, $this->workexperience_model->validate_acheivments());
        }

        if ($this->request->reporting_to) {
            $this->validate($this->request, $this->workexperience_model->validate_reporting_to());
        }

        if (isset($this->request->till_present)) {
            $till_now = $this->workexperience_model->checkIfUserHasTillNow($user->id);
            
            if ($till_now) {
                return back()->withErrors('you working now at somewhere else')->withInput();
            }
        } else {
            $this->validate($this->request, $this->workexperience_model->validateEndDate());
            $to_date = $this->request->to_date;
        }

        $this->workexperience_model->create([
            'title' => $this->request->title,
            'company_name' => $this->request->company_name,
            'reporting_to' => $this->request->reporting_to,
            'industry_id' => $this->request->industry_id,
            'from' => $this->request->from_date,
            'country_id' => $this->request->country_id,
            'city_id' => $this->request->city_id,
            'job_description' => $this->request->description,
            'achievements' => $this->request->achievements,
            'user_id' => $user->id,
            'to' => isset($this->request->till_present) ? null : $to_date,
            'till_present' => isset($this->request->till_present) ? 1 : 0,
        ]);

        return redirect()->route('admin.users.view', $user->id)->withMessage('workexperience created successfully!');
    }

    public function delete($id)
    {
        $workexperience = $this->workexperience_model->findOrFail($id);
        return $workexperience->delete() ? back()->withMessage('workexperience has been deleted') : abort(500);
    }

    public function getView($id)
    {
        $workexperience = $this->workexperience_model->findOrFail($id);
        return view('admin.pages.users.workexperiences.view', compact('workexperience'));
    }

    public function getEdit($id, Country $country_model, Industry $industry_model)
    {
        $workexperience = $this->workexperience_model->findOrFail($id);
        $countries = $country_model->get();
        $industries = $industry_model->get();
        $cities = $workexperience->country->cities;
        return view('admin.pages.users.workexperiences.edit', compact('workexperience', 'countries', 'cities', 'industries'));
    }

    public function postEdit($id)
    {
        $workexperience = $this->workexperience_model->findOrFail($id);
        $this->validate($this->request, $this->workexperience_model->getCreateAndUpdateRules());

        if ($this->request->achievements) {
            $this->validate($this->request, $this->workexperience_model->validate_acheivments());
        }

        if ($this->request->reporting_to) {
            $this->validate($this->request, $this->workexperience_model->validate_reporting_to());
        }

        if (isset($this->request->till_present)) {
            $till_now = $workexperience->TillNowExcept($workexperience->user['id']);
            
            if ($till_now) {
                return back()->withErrors('you working now at somewhere else');
            }
        } else {
            $this->validate($this->request, $this->workexperience_model->validateEndDate());
            $to_date = $this->request->to_date;
        }

        $workexperience->update([
            'title' => $this->request->title,
            'company_name' => $this->request->company_name,
            'reporting_to' => $this->request->reporting_to,
            'industry_id' => $this->request->industry_id,
            'from' => $this->request->from_date,
            'country_id' => $this->request->country_id,
            'city_id' => $this->request->city_id,
            'job_description' => $this->request->description,
            'achievements' => $this->request->achievements,
            'till_present' => isset($this->request->till_present) ? 1 : 0,
            'to' => isset($this->request->till_present) ? null : $to_date,
        ]);

        return redirect()->route('admin.users.view', $workexperience->user_id)->withMessage('workexperience updated successfully!');
    }
}
