<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\admin\CityService;
use App\Http\Requests\CityRequest;

class CityController extends Controller
{
    protected $city_service;

    public function __construct(CityService $city_service)
    {
        $this->middleware('permission:city-list', ['only' => ['getAllCities', 'getSingleCity']]);
        $this->middleware('permission:city-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:city-edit', ['only' => ['getEdit', 'postEdit']]);
        $this->middleware('permission:city-delete', ['only' => ['delete']]);

        $this->city_service = $city_service;
    }

    public function getAllCities()
    {
        $cities = $this->city_service->getCities();

        if (request()->ajax()) {
            return view('admin.pages.cities.cities_data', compact('cities'))->render();
        }

        return view('admin.pages.cities.all', compact('cities'));
    }

    public function getSingleCity($id)
    {
        $city = $this->city_service->getSingleCity($id);

        return view('admin.pages.cities.view', compact('city'));
    }

    public function create()
    {
        return view('admin.pages.cities.create');
    }

    public function store(CityRequest $request)
    {
        $this->city_service->storeCity();
        return back()->withMessage('City created successfully');
    }

    public function getEdit($id)
    {
        $city = $this->city_service->getSingleCity($id);

        return view('admin.pages.cities.edit', compact('city'));
    }

    public function postEdit($id, CityRequest $request)
    {
        $this->city_service->updateCity($id);
        return redirect()->route('admin.cities.get')->withMessage('City Updated successfully');
    }

    public function delete($id)
    {
        $this->city_service->deleteCity($id);
        return back()->withMessage('City deleted successfully');
    }
}
