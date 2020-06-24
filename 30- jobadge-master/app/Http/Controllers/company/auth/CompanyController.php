<?php

namespace App\Http\Controllers\company\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;
use Auth;
use App\Country;
use App\Size;
use App\Job;
use App\Industry;
use Illuminate\Support\Facades\Hash;
use App\CompanyPartner;

class CompanyController extends Controller
{
    protected $company_model;
    protected $request;

    public function __construct(Company $company_model, Request $request)
    {
        $this->company_model = $company_model;
        $this->request = $request;
    } 
    public function postLogin()
    {
        $this->validate($this->request, $this->company_model->loginRules()); 
        if (Auth::guard('company')->attempt([
            'email' => $this->request->email,
            'password' => $this->request->password,
            'suspend' => 0,
            'verified' => 1
        ])) {
            $company = auth()->guard('company')->user();
            $company->activate();
            return redirect()->route('company.profile');
        } 
        return back()->withErrors('wrong email or password');
    } 
    public function logout()
    {
        Auth::guard('company')->logout();
        return redirect()->route('user.index');
    } 
    public function postRegister()
    {
        $this->validate($this->request, $this->company_model->getCreateRules());

        $this->validate($this->request, [
            'terms_conditions' => 'required'
        ]);  
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
        $code = bin2hex(random_bytes(20)); 
        $company = $this->company_model->create([
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
            'size_id' => $this->request->size_id,
            'industry_id' => $this->request->industry_id,
            'country_id' => $this->request->country_id,
            'city_id' => $this->request->city_id,
            'phone' => $this->request->phone,
            'logo' => $logoName,
            'lat' => isset($this->request->lat) ? $this->request->lat : null,
            'lng' => isset($this->request->lng) ? $this->request->lng : null,
            'address' => isset($this->request->address) ? $this->request->address : null,
            'verify_code' => $code,
            // escape verification step
            'verified' => 1
        ]);    
        if ($company) { 
            $id =$company->id;
            $companyName =  preg_replace('/\s+/', '-' , $company->name); 
            $country = preg_replace('/\s+/', '-' ,$company->country()->first()->name_en);  
            $company->update([
                'slug' => $id  . '-' . $companyName  . '-' . $country . '-jobs'
            ]); 
        } 
        return redirect()->route('user.login.get')->withMessage('Login With Your Account');
    } 
    public function getProfile(Country $country_model, Size $size_model, Industry $industry_model, Job $job_model)
    {
        $company = auth()->guard('company')->user();

        $countries = $country_model->get();
        $industries = $industry_model->get();
        $sizes = $size_model->get();
        $cities = $company->country->cities;

        $drafts = $job_model->where([
            'company_id' => $company->id,
            'draft' => 1,
        ])->get();

        return view('company.pages.profile', compact('company', 'countries', 'industries', 'sizes', 'cities', 'drafts'));
    } 
    public function postProfile(Company $company_model, CompanyPartner $company_partner_model)
    {
        $company = auth()->guard('company')->user();

        $this->validate($this->request, $company_model->getUpdateRules($company->id)); 
        if ($this->request->facebook) {
            $this->validate($this->request, $this->company_model->validate_facebook());
        } 
        if ($this->request->twitter) {
            $this->validate($this->request, $this->company_model->validate_twitter());
        } 
        if ($this->request->linkedin) {
            $this->validate($this->request, $this->company_model->validate_linkedin());
        }

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
            'size_id' => $this->request->size_id,
            'industry_id' => $this->request->industry_id,
            'country_id' => $this->request->country_id,
            'city_id' => $this->request->city_id,
            'phone' => $this->request->phone,
            'subscription' => isset($this->request->subscription) ? 1 : 0,
            'lat' => isset($this->request->lat) ? $this->request->lat : null,
            'lng' => isset($this->request->lng) ? $this->request->lng : null,
            'address' => isset($this->request->address) ? $this->request->address : null,
        ]);

        if ($company) { 
            $id =$company->id;
            $companyName =  preg_replace('/\s+/', '-' , $company->name); 
            $country = preg_replace('/\s+/', '-' ,$company->country()->first()->name_en);  
            $company->update([
                'slug' => $id  . '-' . $companyName  . '-' . $country . '-jobs'
            ]); 
        }

        if (isset($this->request->password)) {
            $this->validate($this->request, $company_model->password_validate());
            $company->update(['password' => bcrypt($this->request->password)]);
        }

        // upload company image
        if ($this->request->hasFile('logo')) {
            $this->validate($this->request, $company_model->validate_logo());
            $logoName = $company_model->uploadCompanyLogo($this->request->logo);
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
            $this->validate($this->request, $company_model->validate_video());
            $video_name = $company_model->uploadCompanyVideo($this->request->video);
            $company->deleteCompanyVideo();
            $company->update([
                'video' => $video_name
            ]);
        }

        if ($this->request->logos) {
            if (count($this->request->logos) > 0) {
                $this->validate($this->request, $company_partner_model->getCreateRules($this->request));

                foreach ($this->request->logos as $logo) {
                    $company_partner_model->addPartnerToCompany($logo, $company->id);
                }
            }
        }

        return back()->withMessage('profile Updated Successfully');
    } 
    public function changePassword()
    {
        $this->validate($this->request, $this->company_model->validateNewPassword());
        $company = auth()->guard('company')->user();

        if (!Hash::check($this->request->old_password, $company->password)) {
            return back()->withErrors('wrong old password');
        }

        $company->update([
            'password' => bcrypt($this->request->password),
        ]);

        return back()->withMessage('password changed successfully');
    }
}
