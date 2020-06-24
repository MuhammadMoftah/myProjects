<?php

namespace App\Http\Controllers\admin;

use App\City;
use App\Districtes;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddDistrictRequest;
use App\Http\Requests\UpdateDistrictRequest;
use App\Services\admin\DistrictService;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    protected $district_service;
    protected $district_model;
    public function __construct(DistrictService $district_service, Districtes $district_model)
    {
        $this->middleware('permission:district-list', ['only' => ['getAllDistricts', 'getSingleDistrict']]);
        $this->middleware('permission:district-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:district-edit', ['only' => ['edit', 'update']]);

        $this->district_service = $district_service;
        $this->district_model = $district_model;
    }

    public function getAllDistricts(Request $request)
    {
        $keyword = $request->keyword;
        $districts = $this->district_model->newQuery();
        if ($request->ajax()) {
            $districts->where(function ($query) use ($keyword) {
                $query->where('name_ar', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('name_en', 'LIKE', '%' . $keyword . '%');
            });
            $districts = $districts->orderBy('name_en', 'asc')->latest()->paginate(10);
            return view('admin.pages.districts.districts_data', compact('districts'))->render();
        }
        $districts = $districts->orderBy('name_en', 'asc')->latest()->paginate(10);
        return view('admin.pages.districts.all', compact('districts'));
    }

    public function getSingleDistrict($id)
    {
        $district = $this->district_service->getSingleDistrict($id);

        return view('admin.pages.districts.view', compact('district'));
    }

    public function create(City $city_model)
    {
        $cities = $city_model->get();
        return view('admin.pages.districts.create', compact('cities'));
    }

    public function store(AddDistrictRequest $request)
    {
        $this->district_service->storeDistrict();
        return back()->withMessage('district created successfully');
    }
    public function edit($id, City $city_model)
    {
        $cities = $city_model->all();
        $district = $this->district_model->find($id);
        return view('admin.pages.districts.edit', compact(['cities', 'district']));
    }
    public function update(UpdateDistrictRequest $request)
    {
        $district = $this->district_model->find($request->id);
        $this->district_service->updateDistrict($district);
        return redirect()->route('admin.districts.get')->withMessage('district updated successfully');
    }
    public function getDistrictCity(Request $request)
    {
        $districts = $this->district_model->where('city_id', $request->city_id)->get();
        return response()->json(compact('districts'));
    }

    public function delete($id)
    {
        $this->district_service->deleteDistrict($id);
        return back()->withMessage('district deleted successfully');
    }
}
