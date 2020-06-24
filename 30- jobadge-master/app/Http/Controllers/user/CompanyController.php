<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;
use App\Follower;
use App\Job;
use App\Http\Requests\CompanySearch;

class CompanyController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getCompany($slug, Company $company_model, Job $job_model)
    {
        $arr = explode('-',trim($slug));
        $id =  $arr[0]; // will print Test
        
        $company = $company_model->active()->where(['id' => $id])->firstOrFail();
        $latest_jobs = $job_model->activecompany()->activejob()->where('company_id', $company->id)->latest()->take(4)->get();

        return view('user.pages.showCompany', compact('company', 'latest_jobs'));
    }

    public function shareCompany($id, $provider, Company $company_model)
    {
        $company = $company_model->active()->where(['id' => $id])->firstOrFail();
        $sharelink = $company->generateShareLink($provider);
        return redirect($sharelink);
    }

    public function followCompany($company_id, Company $company_model, Follower $follower_model)
    {
        $user = auth()->guard('user')->user();
        $company = $company_model->active()->where(['id' => $company_id])->firstOrFail();

        $follower = $follower_model->where([
            'user_id' => $user->id,
            'company_id' => $company->id,
            'type' => 'user'
        ])->first();

        $follower ? $follower->delete() : $follower_model->create([
                'user_id' => $user->id,
                'company_id' => $company->id,
                'type' => 'user'
            ]);

        return back();
    }

    public function getCompanyJobs($slug, Job $job_model, Company $company_model)
    {
        $arr = explode('-',trim($slug));
        $id =  $arr[0]; // will print Test

        $company = $company_model->active()->where([
            'id' => $id,
        ])->firstOrFail();

        $company_jobs = $job_model->activecompany()->activejob()->where([
            'company_id' => $id
        ])->latest()->paginate(9);

        return view('user.pages.companyJobs', compact('company_jobs', 'company'));
    }

    public function getAllCompanies(CompanySearch $request  , Company $company_model )
    {
        if (isset($request->search ) &&  $request->search !== null ){
            $companies = $company_model->active()->where('name' ,'LIKE', '%' . $request->search . '%' )->paginate(5);
        } else {
            $companies = $company_model->active()->latest()->paginate(10);
        }
        

        return view('user.pages.companies', compact('companies'));
    }
}
