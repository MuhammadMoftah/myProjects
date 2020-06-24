<?php

namespace App\Services\site;

use Illuminate\Http\Request;
use App\Country;

class CountryService
{
    private $country_model;
    private $request;

    public function __construct(Country $country_model, Request $request)
    {
        $this->country_model = $country_model;
        $this->request = $request;
    }

    public function getCities($country_id)
    {
        $country = $this->country_model->findOrFail($country_id);
        return $country->cities;
    }

    public function getAll()
    {
        $cacheKey = "countries.oldest";
        return cache()->remember($cacheKey, env('LONG_TIME_CACHE'), function () {
            return $this->country_model->oldest()->get();
        });
    }
}
