<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Country;
use App\City;

class CityController extends Controller
{

    protected $city_model;
    protected $country_model;
    protected $request;

    public function __construct(City $city_model, Country $country_model, Request $request)
    {
        $this->request = $request;
        $this->city_model = $city_model;
        $this->country_model = $country_model;
    }

    public function getCitiesForCountry($country_id)
    {
        $cities = $this->city_model->where('country_id', $country_id)->get();
        return response()->json(compact('cities'));
    }
}
