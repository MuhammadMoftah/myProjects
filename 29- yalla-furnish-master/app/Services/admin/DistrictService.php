<?php

namespace App\Services\admin;

use App\Districtes;
use Illuminate\Http\Request;

class DistrictService
{
    private $district_model;
    private $request;

    public function __construct(Districtes $district_model, Request $request)
    {
        $this->district_model = $district_model;
        $this->request = $request;
    }

    public function getDistricts()
    {
        return $this->district_model->orderBy('name_en','asc')->latest()->paginate(10);
    }

    public function getSingleDistrict($id)
    {
        return $this->district_model->findOrFail($id);
    }

    public function storeDistrict()
    {
        $this->district_model->create([
            'name_en' => $this->request->name_en,
            'name_ar' => $this->request->name_ar,
            'city_id' => $this->request->city_id
        ]);
    }
    public function updateDistrict($district)
    {
        $district->name_ar=request('name_ar');
        $district->name_en=request('name_en');
        $district->city_id=request('city_id');
        $district->save();

    }

    public function deleteDistrict($id)
    {
        $district = $this->getSingleDistrict($id);
        $district->delete();
    }
}
