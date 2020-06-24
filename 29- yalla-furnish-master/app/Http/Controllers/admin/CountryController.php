<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\admin\CountryService;
use App\Http\Requests\CountryRequest;

class CountryController extends Controller
{
    protected $country_service;

    public function __construct(CountryService $country_service)
    {
        $this->middleware('permission:country-list', ['only' => ['getAllCountries', 'getSingleCountry']]);
        $this->middleware('permission:country-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:country-edit', ['only' => ['getEdit', 'postEdit']]);
        $this->middleware('permission:country-delete', ['only' => ['delete']]);

        $this->country_service = $country_service;
    }

    public function getAllCountries()
    {
        $countries = $this->country_service->getCountries();

        if (request()->ajax()) {
            return view('admin.pages.countries.countries_data', compact('countries'))->render();
        }

        return view('admin.pages.countries.all', compact('countries'));
    }

    public function getSingleCountry($id)
    {
        $country = $this->country_service->getSingleCountry($id);

        return view('admin.pages.countries.view', compact('country'));
    }

    public function create()
    {
        return view('admin.pages.countries.create');
    }

    public function store(CountryRequest $request)
    {
        $this->country_service->storeCountry();
        return back()->withMessage('country created successfully');
    }

    public function getEdit($id)
    {
        $country = $this->country_service->getSingleCountry($id);
        return view('admin.pages.countries.edit', compact('country'));
    }

    public function postEdit($id, CountryRequest $request)
    {
        $this->country_service->updateCountry($id);
        return redirect()->route('admin.countries.get')->withMessage('Country Updated Successfully');
    }

    public function delete($id)
    {
        $this->country_service->deleteCountry($id);
        return back()->withMessage('country deleted successfully');
    }
}
