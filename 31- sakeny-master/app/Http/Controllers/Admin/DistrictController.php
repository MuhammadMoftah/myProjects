<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Company;
use App\Models\Ads;
use App\Models\City;
use App\Models\Country;
use App\Models\District;

class DistrictController extends Controller
{
    public function getAll()
    {
        $districts = District::all();

        return view('admin.district.all', compact('districts'));
    }


    public function getCreate()
    {
        $cities = City::all();
        return view('admin.district.create', compact('cities'));
    }


    public function postCreate(Request $request)
    {
        $this->validate($request, [
            'name_en' => 'required|max:200',
            'name_ar' => 'required|max:200',
            'city_id' => 'required|exists:cities,id'
        ]);

        $city = City::findOrFail($request->city_id);

        $district_model = new District;

        $district_model->create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'activation' => isset($request->active) ? 1 : 0,
            'city_id' => $city->id,
            'country_id' => $city->country->id
        ]);

        return redirect()->route('admin.districts.all')->withMessage('district added successfully');
    }

    public function changeStatus($id)
    {
        $district = District::findOrFail($id);

        if ($district->activation == 0) {
            $district->update([
                'activation' => 1,
            ]);
        } else {
            $district->update([
                'activation' => 0,
            ]);
        }

        return back()->withMessage('district status changed successfully');
    }

    public function getEdit($id)
    {
        $district = District::findOrFail($id);
        $cities = City::all();
        return view('admin.district.edit', compact('district', 'cities'));
    }


    public function postEdit($id, Request $request)
    {
        $this->validate($request, [
            'name_en' => 'required|max:200',
            'name_ar' => 'required|max:200',
            'city_id' => 'required|exists:cities,id'
        ]);

        $district = District::findOrFail($id);

        $city = City::findOrFail($request->city_id);

        $district->update([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'activation' => isset($request->active) ? 1 : 0,
            'city_id' => $city->id,
            'country_id' => $city->country->id
        ]);

        return redirect()->route('admin.districts.all')->withMessage('district edited successfully');
    }
}
