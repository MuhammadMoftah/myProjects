<?php

namespace App\Services\admin;

use App\Country;
use Illuminate\Http\Request;

class CountryService
{
    private $country_model;
    private $request;

    public function __construct(Country $country_model, Request $request)
    {
        $this->country_model = $country_model;
        $this->request = $request;
    }

    public function getCountries()
    {
        $countries = $this->country_model->newQuery();

        if (isset($this->request->search)) {
            $keyword = $this->request->search;
            $countries->where(function ($query) use ($keyword) {
                $query->where('name_ar', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('name_en', 'LIKE', '%' . $keyword . '%');
            });
        }

        $countries = $countries->orderBy('name_en','asc')->latest()->paginate(10);

        return $countries;
    }

    public function getSingleCountry($id)
    {
        return $this->country_model->findOrFail($id);
    }

    public function storeCountry()
    {
        $this->country_model->create([
            'name_en' => $this->request->name_en,
            'name_ar' => $this->request->name_ar
        ]);
    }

    public function updateCountry($id)
    {
        $country = $this->getSingleCountry($id);

        $country->update([
            'name_en' => $this->request->name_en,
            'name_ar' => $this->request->name_ar
        ]);
    }

    public function deleteCountry($id)
    {
        $country = $this->getSingleCountry($id);
        $country->delete();
    }
}
