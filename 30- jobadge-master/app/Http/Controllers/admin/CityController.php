<?php
namespace App\Http\Controllers\admin;

use App\City;
use App\Country;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

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

    public function getAll($country_id)
    {
        $cities = $this->city_model->where('country_id', $country_id)->latest()->paginate(10);
        return view('admin.pages.cities.all', compact('cities'));
    }

    public function getCreate()
    {
        $countries = $this->country_model->get();
        return view('admin.pages.cities.create', compact('countries'));
    }

    public function postCreate()
    {
        $this->validate($this->request, $this->city_model->getCreateAndUpdateRules());

        $this->city_model->create([
            'name_en' => $this->request->name_en,
            'name_ar' => $this->request->name_ar,
            'country_id' => $this->request->country_id
        ]);

        return redirect()->route('admin.cities', $this->request->country_id)->withMessage('City created successfully!');
    }

    public function delete($id)
    {
        $city = $this->city_model->findOrFail($id);
        return $city->delete() ? back()->withMessage('City has been deleted') : abort(500);
    }

    public function getView($id)
    {
        $city = $this->city_model->findOrFail($id);
        return view('admin.pages.cities.view', compact('city'));
    }

    public function getEdit($id)
    {
        $city = $this->city_model->findOrFail($id);
        $countries = $this->country_model->get();
        return view('admin.pages.cities.edit', compact('city', 'countries'));
    }

    public function postEdit($id)
    {
        $city = $this->city_model->findOrFail($id);
        $this->validate($this->request, $this->city_model->getCreateAndUpdateRules());
        $city->update([
            'name_en' => $this->request->name_en,
            'name_ar' => $this->request->name_ar,
            'country_id' => $this->request->country_id
        ]);
        return redirect()->route('admin.cities', $this->request->country_id)->withMessage('City updated successfully!');
    }

    public function search()
    {
        $keyword = $this->request->search;
        $cities = $this->city_model->where('name_en', 'LIKE', "%" . $keyword . "%")
            ->orWhere('name_ar', 'LIKE', '%' . $keyword . '%')->latest()->paginate(10);
        return view('admin.pages.cities.search', compact('cities'));
    }

    public function getCitiesForCountry($country_id)
    {
        $cities = $this->city_model->where('country_id', $country_id)->get();
        return response()->json(compact('cities'));
    }
}
