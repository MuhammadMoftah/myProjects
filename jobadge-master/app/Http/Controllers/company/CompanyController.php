<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;
use App\Http\Requests\InviteEmailsCompany;

class CompanyController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function deactivate()
    {
        $company = auth()->guard('company')->user();
        $company->update([
            'deactivate' => 1
        ]);
        auth()->guard('company')->logout();

        return redirect()->route('user.index');
    }

    public function getInvite()
    {
        return view('company.pages.invite');
    }

    public function postInvite(InviteEmailsCompany $request, Company $company_model)
    {
        $company_model->sendInvite($request->emails);
        return back()->withMessage('invitations sent successfully');
    }
}
