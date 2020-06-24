<?php
namespace App\Http\Controllers\admin;

use App\Country;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CountryController extends Controller
{
    protected $country_model;
    protected $request;

    public function __construct(Country $country_model, Request $request)
    {
        $this->request = $request;
        $this->country_model = $country_model;
    }

    public function getAll()
    {
        $countries = $this->country_model->latest()->paginate(10);
        return view('admin.pages.countries.all', compact('countries'));
    }

    public function getCreate()
    {
        return view('admin.pages.countries.create');
    }

    public function postCreate()
    {
        $this->validate($this->request, $this->country_model->getCreateAndUpdateRules());

        $this->country_model->create([
            'name_en' => $this->request->name_en,
            'name_ar' => $this->request->name_ar
        ]);

        return redirect()->route('admin.countries')->withMessage('country created successfully!');
    }

    public function delete($id)
    {
        $country = $this->country_model->findOrFail($id);
        return $country->delete() ? back()->withMessage('country has been deleted') : abort(500);
    }

    public function getView($id)
    {
        $country = $this->country_model->findOrFail($id);
        return view('admin.pages.countries.view', compact('country'));
    }

    public function getEdit($id)
    {
        $country = $this->country_model->findOrFail($id);
        return view('admin.pages.countries.edit', compact('country'));
    }

    public function postEdit($id)
    {
        $country = $this->country_model->findOrFail($id);
        $this->validate($this->request, $this->country_model->getCreateAndUpdateRules());
        $country->update([
            'name_en' => $this->request->name_en,
            'name_ar' => $this->request->name_ar
        ]);
        return redirect()->route('admin.countries')->withMessage('country updated successfully!');
    }

    public function search()
    {
        $keyword = $this->request->search;
        $countries = $this->country_model->where('name_en', 'LIKE', "%" . $keyword . "%")
            ->orWhere('name_ar', 'LIKE', '%' . $keyword . '%')->latest()->paginate(10);
        return view('admin.pages.countries.search', compact('countries'));
    }
}
