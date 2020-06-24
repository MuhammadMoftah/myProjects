<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Education;
use Carbon\Carbon;
use App\Country;
use App\User;

class EducationController extends Controller
{
    protected $education_model;
    protected $request;

    public function __construct(Education $education_model, Request $request)
    {
        $this->request = $request;
        $this->education_model = $education_model;
    }


    public function getCreate($user_id, Country $country_model, User $user_model)
    {
        $user = $user_model->findOrFail($user_id);
        $countries = $country_model->get();
        return view('admin.pages.users.educations.create', compact('countries', 'user'));
    }

    public function postCreate($user_id, User $user_model)
    {
        $user = $user_model->findOrFail($user_id);

        $this->validate($this->request, $this->education_model->getCreateAndUpdateRules());

        $this->education_model->create([
            'degree' => $this->request->degree,
            'place_name' => $this->request->place_name,
            'major' => $this->request->major,
            'from_year' => $this->request->from_year,
            'country_id' => $this->request->country_id,
            'city_id' => $this->request->city_id,
            'to_year' => $this->request->to_year,
            'notes' => $this->request->notes,
            'user_id' => $user->id
        ]);

        return redirect()->route('admin.users.view', $user->id)->withMessage('education created successfully!');
    }

    public function delete($id)
    {
        $education = $this->education_model->findOrFail($id);
        return $education->delete() ? back()->withMessage('education has been deleted') : abort(500);
    }

    public function getView($id)
    {
        $education = $this->education_model->findOrFail($id);
        return view('admin.pages.users.educations.view', compact('education'));
    }

    public function getEdit($id, Country $country_model)
    {
        $education = $this->education_model->findOrFail($id);
        $countries = $country_model->get();
        $cities = $education->country->cities;
        return view('admin.pages.users.educations.edit', compact('education', 'countries', 'cities'));
    }

    public function postEdit($id)
    {
        $education = $this->education_model->findOrFail($id);
        $this->validate($this->request, $this->education_model->getCreateAndUpdateRules());

        $education->update([
            'degree' => $this->request->degree,
            'place_name' => $this->request->place_name,
            'major' => $this->request->major,
            'from_year' => $this->request->from_year,
            'country_id' => $this->request->country_id,
            'city_id' => $this->request->city_id,
            'to_year' => $this->request->to_year,
            'notes' => $this->request->notes
        ]);

        return redirect()->route('admin.users.view', $education->user_id)->withMessage('education updated successfully!');
    }
}
