<?php

namespace App\Services\site;

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

    public function getCities($country_id = null)
    {
        $cacheKey = $country_id ? "cities.$country_id" : "cities";
        return cache()->remember($cacheKey, env('LONG_TIME_CACHE'), function () use ($country_id) {
            $cities = $this->city_model->newQuery();
            if ($country_id) {
                $cities->where('country_id', $country_id);
            }
            $cities = $cities->orderBy('name_en', 'asc')->with('districtes')->latest()->get();
            return $cities;
        });
    }

    public function getAll()
    {
        return $this->city_model->oldest()->get();
    }
}
