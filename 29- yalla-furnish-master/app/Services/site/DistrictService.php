<?php

namespace App\Services\site;

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

    public function getDistricts($city_id = null)
    {
        $cacheKey = $city_id ? "districts.$city_id" : "districts";
        return cache()->remember($cacheKey, env('LONG_TIME_CACHE'), function () use ($city_id) {
            $districts = $this->district_model->newQuery();
            if ($city_id) {
                $districts->where('city_id', $city_id);
            }
            $districts = $districts->latest()->get();
            return $districts;
        });
    }
}
