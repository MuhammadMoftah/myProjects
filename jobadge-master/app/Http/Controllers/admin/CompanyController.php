<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Company;
use App\Country;
use App\Size;
use App\Industry;
use App\Package;
use App\Exports\CompanyExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CompanyImport;

class CompanyController extends Controller
{
    protected $company_model;
    protected $request;

    public function __construct(Company $company_model, Request $request)
    {
        $this->request = $request;
        $this->company_model = $company_model;
    }

    public function getAll()
    {
        $companies = $this->company_model->latest()->paginate(10);
        return view('admin.pages.companies.all', compact('companies'));
    }

    public function getCreate(Country $country_model, Industry $industry_model, Size $size_model, Package $package_model)
    {
        $countries = $country_model->get();
        $sizes = $size_model->get();
        $industries = $industry_model->get();
        $packages = $package_model->get();
        return view('admin.pages.companies.create', compact('countries', 'sizes', 'industries', 'packages'));
    }

    public function postCreate()
    {
        $this->validate($this->request, $this->company_model->getCreateRules());

        // validate location
        // if (!$this->company_model->validateLatitude($this->request->lat) || !$this->company_model->validateLongitude($this->request->lng)) {
        //     return back()->withErrors('error in latitude or longitude');
        // }

        if ($this->request->facebook) {
            $this->validate($this->request, $this->company_model->validate_facebook());
        }

        if ($this->request->twitter) {
            $this->validate($this->request, $this->company_model->validate_twitter());
        }

        if ($this->request->linkedin) {
            $this->validate($this->request, $this->company_model->validate_linkedin());
        }

        // upload company image
        if ($this->request->hasFile('logo')) {
            $logoName = $this->company_model->uploadCompanyLogo($this->request->logo);
        }

        // upload company cr file
        if ($this->request->hasFile('cr_logo')) {
            $crName = $this->company_model->uploadCompanyCr($this->request->cr_logo);
        }

        // upload video
        if ($this->request->hasFile('video')) {
            $this->validate($this->request, $this->company_model->validate_video());
            $video_name = $this->company_model->uploadCompanyVideo($this->request->video);
        }

        // if ($this->request->package_id) {
        //     $this->validate($this->request, $this->company_model->validate_package());
        // }

        $this->company_model->create([
            'first_name' => $this->request->first_name,
            'last_name' => $this->request->last_name,
            'name' => $this->request->name,
            'description' => $this->request->description,
            'email' => $this->request->email,
            'facebook' => $this->request->facebook,
            'twitter' => $this->request->twitter,
            'linked_in' => $this->request->linked_in,
            'URL' => $this->request->url,
            'password' => bcrypt($this->request->password),
            // 'package_id' => $this->request->package_id,
            'size_id' => $this->request->size_id,
            'industry_id' => $this->request->industry_id,
            'country_id' => $this->request->country_id,
            'city_id' => $this->request->city_id,
            'phone' => $this->request->phone,
            'video' => isset($video_name) ? $video_name : null,
            'verified' => isset($this->request->verified) ? 1 : 0,
            'subscription' => isset($this->request->subscription) ? 1 : 0,
            'logo' => $logoName,
            'cr_logo' => $crName,
            'lat' => isset($this->request->lat) ? $this->request->lat : null,
            'lng' => isset($this->request->lng) ? $this->request->lng : null,
            'address' => isset($this->request->address) ? $this->request->address : null,
        ]);

        return redirect()->route('admin.companies')->withMessage('company created successfully!');
    }

    public function suspend($id)
    {
        $company = $this->company_model->findOrFail($id);
        $company->suspend == 0 ? $company->update(['suspend' => 1]) : $company->update(['suspend' => 0]);
        return $company->suspend == 0 ? back()->withMessage('company has been activated') : back()->withMessage('company has been suspended');
    }

    public function approve($id)
    {
        $company = $this->company_model->findOrFail($id);
        $company->Approved = 1;
        $company->save();
        return back()->withMessage('company has been Approved');
    }

    public function getView($id)
    {
        $company = $this->company_model->findOrFail($id);
        return view('admin.pages.companies.view', compact('company'));
    }

    public function getEdit($id, Country $country_model, Size $size_model, Industry $industry_model, Package $package_model)
    {
        $company = $this->company_model->findOrFail($id);
        $countries = $country_model->get();
        $cities = $company->country->cities;
        $sizes = $size_model->get();
        $industries = $industry_model->get();
        $packages = $package_model->get();
        return view('admin.pages.companies.edit', compact('company', 'countries', 'cities', 'sizes', 'industries', 'packages'));
    }

    public function postEdit($id)
    {
        $company = $this->company_model->findOrFail($id);
        $this->validate($this->request, $this->company_model->getUpdateRules($company->id));

        // validate location
        // if (!$this->company_model->validateLatitude($this->request->lat) || !$this->company_model->validateLongitude($this->request->lng)) {
        //     return back()->withErrors('error in latitude or longitude');
        // }

        if ($this->request->facebook) {
            $this->validate($this->request, $this->company_model->validate_facebook());
        }

        if ($this->request->twitter) {
            $this->validate($this->request, $this->company_model->validate_twitter());
        }

        if ($this->request->linkedin) {
            $this->validate($this->request, $this->company_model->validate_linkedin());
        }

        // if ($this->request->package_id) {
        //     $this->validate($this->request, $this->company_model->validate_package());
        // }

        $company->update([
            'first_name' => $this->request->first_name,
            'last_name' => $this->request->last_name,
            'name' => $this->request->name,
            'description' => $this->request->description,
            'email' => $this->request->email,
            'facebook' => $this->request->facebook,
            'twitter' => $this->request->twitter,
            'linked_in' => $this->request->linked_in,
            'URL' => $this->request->url,
            // 'package_id' => $this->request->package_id,
            'size_id' => $this->request->size_id,
            'industry_id' => $this->request->industry_id,
            'country_id' => $this->request->country_id,
            'city_id' => $this->request->city_id,
            'phone' => $this->request->phone,
            'verified' => isset($this->request->verified) ? 1 : 0,
            'subscription' => isset($this->request->subscription) ? 1 : 0,
            'lat' => isset($this->request->lat) ? $this->request->lat : null,
            'lng' => isset($this->request->lng) ? $this->request->lng : null,
            'address' => isset($this->request->address) ? $this->request->address : null,
        ]);

        if (isset($this->request->password)) {
            $this->validate($this->request, $this->company_model->password_validate());
            $company->update(['password' => bcrypt($this->request->password)]);
        }

        // upload company image
        if ($this->request->hasFile('logo')) {
            $this->validate($this->request, $this->company_model->validate_logo());
            $logoName = $this->company_model->uploadCompanyLogo($this->request->logo);
            $company->deleteCompanyLogo();
            $company->update([
                'logo' => $logoName
            ]);
        }

        // upload company Cr
        if ($this->request->hasFile('cr_logo')) {
            $this->validate($this->request, $this->company_model->validate_cr());
            $crName = $this->company_model->uploadCompanyCr($this->request->cr_logo);
            $company->cr_logo ? $company->deleteCompanyCr() : '';
            $company->update([
                'cr_logo' => $crName
            ]);
        }

        // upload company video
        if ($this->request->hasFile('video')) {
            $this->validate($this->request, $this->company_model->validate_video());
            $video_name = $this->company_model->uploadCompanyVideo($this->request->video);
            $company->deleteCompanyVideo();
            $company->update([
                'video' => $video_name
            ]);
        }

        return redirect()->route('admin.companies')->withMessage('company updated successfully!');
    }

    public function search()
    {
        $keyword = $this->request->search;

        $find1 = strpos($keyword, '@');


        if ($find1) {
            $companies = $this->company_model->where('email', 'LIKE', '%' . $keyword . '%')->latest()->paginate(10);
            return view('admin.pages.companies.search', compact('companies'));
        }

        $companies = $this->company_model->where('first_name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('last_name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('name', 'LIKE', '%' . $keyword . '%')
            ->latest()->paginate(10);
        return view('admin.pages.companies.search', compact('companies'));
    }

    public function export()
    {
        return Excel::download(new CompanyExport, 'companies.xlsx');
    }

    public function import()
    {
        $this->validate($this->request, $this->company_model->validate_excel());
        try {
            Excel::import(new CompanyImport, $this->request->file);
        } catch (\Exception $e) {
            return back()->withErrorS($e->getMessage());
        }
        return back()->withMessage('data imported successfully');
    }
}
