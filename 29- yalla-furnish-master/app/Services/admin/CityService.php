<?php

namespace App\Services\admin;

use App\City;
use Illuminate\Http\Request;

class CityService
{
    private $city_model;
    private $request;

    public function __construct(City $city_model, Request $request)
    {
        $this->city_model = $city_model;
        $this->request = $request;
    }

    public function getCities()
    {
        $cities = $this->city_model->newQuery();

        if (isset($this->request->search)) {
            $keyword = $this->request->search;
            $cities->where(function ($query) use ($keyword) {
                $query->where('name_ar', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('name_en', 'LIKE', '%' . $keyword . '%');
            });
        }

        $cities = $cities->orderBy('name_en','asc')->latest()->paginate(10);

        return $cities;
    }

    public function getSingleCity($id)
    {
        return $this->city_model->findOrFail($id);
    }

    public function storeCity()
    {
        $this->city_model->create([
            'name_en' => $this->request->name_en,
            'name_ar' => $this->request->name_ar,
        ]);
    }

    public function updateCity($id)
    {
        $city = $this->getSingleCity($id);

        $city->update([
            'name_en' => $this->request->name_en,
            'name_ar' => $this->request->name_ar,
        ]);
    }

    public function deleteCity($id)
    {
        $city = $this->getSingleCity($id);
        $city->delete();
        $city->districtes()->delete();
    }
}
