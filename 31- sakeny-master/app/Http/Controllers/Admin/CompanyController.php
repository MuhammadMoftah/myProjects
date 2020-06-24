<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Company;
use App\Models\Country;
use App\Models\PackagePayment;
use App\Models\Package;
use App\Rules\PhoneValidity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Mail;
use DateTime;
use DateTimeZone;

class CompanyController extends CoreController {

    function __construct(Company $model) {
        $this->model = $model;
        $this->show_columns_html = ['id'];
        $this->show_columns_select = ['id'];
        $countries_list = Country::where('activation', 1)->pluck('name_en', 'id');
        view()->share(compact('countries_list'));
        parent::__construct();
    }

    public function index() {
        $this->pushBreadcrumb(array('Index'));

        $this->ifMethodExistCallIt('onIndex');
        $this->request->flash();
        $status = request('activation');

        $rows = $this->model->latest();

        if ($this->request->search) {
            $keyword = $this->request->search;
            $rows = $rows->where(function ($query) use ($keyword) {
                $query->where('registered_name', 'LIKE', '%' . $keyword . '%')->orWhere('description', 'LIKE', '%' . $keyword . '%')
                        ->orWhereHas('user', function ($query) use ($keyword) {
                            $query->where('name', 'LIKE', '%' . $keyword . '%')
                            ->orWhere(function ($query) use ($keyword) {
                                $query->where('email', 'LIKE', '%' . $keyword . '%')
                                ->orWhere('phone', 'LIKE', '%' . $keyword . '%');
                            });
                        });
            });
        }

        if (request('status') != null) {
            $rows = $rows->where("status", request('status'));
        }

        $rows = $rows->paginate(10);

        return $this->view('index', array(
                    'rows' => $rows,
                    'columns' => $this->show_columns_html,
                    'breadcrumb' => $this->breadcrumb,
                    'select_columns' => $this->show_columns_select
        ));
    }

    public function approve($id) {
        $row = $this->model->find($id);
        $update = $row->user->update(['activation' => request('status')]);
        if (request('status') == 1) {
            # send mail to the company
            $url = "http://sakeny.com/en/company/activate/{$row->user->api_token}";
            $content = "Your account activated. <br> please set your password with link below <br>
            <a href='{$url}'>{$url}</a>";
            $this->sendMail($row->user->email, "Account Approval", $content);
            return $this->returnMessage($update, 4);
        }
        return $this->returnMessage($update, 5);
    }

    /**
     * Store a newly created resource.
     *
     * @return Response
     */
    public function store() {
        $this->ifMethodExistCallIt('onStore');
        $user = User::create(
                        request(['name', 'email', 'password', 'phone', 'activation', 'image']) +
                        [
                            'type' => 2,
                            'api_token' => uniqid()
                        ]
        );
        $company = $this->model->create(
                request([
                    'registered_name', 'description', 'cr_number', 'cr_number_file',
                    'phone', 'city', 'zip_code', 'num_agents', 'in_registration', 'country_id'
                ]) +
                [
                    'user_id' => $user->id,
                ]
        );

        return $this->returnMessage($company, 1);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $this->ifMethodExistCallIt('onUpdate');
        $row = $this->model->find($id);

        if ($row->activation == 2 && $this->request->activation == 1) {
            // send email
        }
        $row->user->update(request(['name', 'email', 'phone', 'activation', 'image']));

        $update = $row->update(request([
            'registered_name', 'description', 'cr_number', 'cr_number_file',
            'phone', 'city', 'zip_code', 'number_of_premium_ads', 'number_of_regular_ads', 'number_of_agents', 'in_registration', 'country_id'
        ]));

        return $this->returnMessage($update, 2);
    }

    /**
     * Before go inside @store method
     * @return avoid
     */
    public function onStore() {
        return $this->v([
                    'name' => 'required|max:255|min:3',
                    'registered_name' => 'required|max:255',
                    'description' => 'required',
                    'country_id' => 'required',
                    'cr_number' => 'required',
                    'cr_number_file' => 'required',
                    'phone' => ['required', 'unique:users', 'numeric'],
                    'city' => 'required',
                    // 'num_agents' => 'required',
                    'zip_code' => 'required|numeric',
                    'logo' => 'required|image',
                    'email' => 'required|email|max:255|unique:users,email',
        ]);
    }

    /**
     * Before go inside @update method
     * @return avoid
     */
    public function onUpdate() {
        return $this->v([
                    'name' => 'required|max:255|min:3',
                    'email' => 'required|email|max:255|unique:users,email,' . request('user_id'),
                    // 'email' => 'required|email',
                    'registered_name' => 'required|max:255',
                    'description' => 'required',
                    'country_id' => 'required',
                    'cr_number' => 'required',
                    'phone' => ['required', 'unique:users,id,' . request('user_id'), 'numeric'],
                    'city' => 'required',
                    // 'num_agents' => 'required',
                    'zip_code' => 'required|numeric',
                    'logo' => 'image',
        ]);
    }

    public function updateViewInFront($id) {
        $row = $this->model->find($id);
        $update = $row->update(['view_in_front' => request('view_in_front')]);
        if (request('view_in_front') == 1)
            return $this->returnMessage($update, 4);
        return $this->returnMessage($update, 5);
    }

    public function indexApprovalPackages() {
        $this->pushBreadcrumb(array('Index'));
        $this->request->flash();
        $rows = PackagePayment::where('status', 0)->latest()->get();
        return $this->view('index-approval-package', array(
                    'rows' => $rows,
                    'columns' => $this->show_columns_html,
                    'breadcrumb' => $this->breadcrumb,
                    'select_columns' => $this->show_columns_select
        ));
    }

    public function approvalPackagesApprove($id) {
        $row = PackagePayment::find($id);
        $row->update(['status' => 1]);
        $row->company->increment('number_of_premium_ads', $row->package->number_of_premium_ads);
        $row->company->increment('number_of_regular_ads', $row->package->number_of_regular_ads);
        // $row->company->increment('number_of_agents', $row->package->number_of_agents);
        return $this->returnMessage($row, 0, [], "company/view/approval-packages");
    }

    public function approvalPackagesDelete($id) {
        $delete = PackagePayment::find($id)->delete();
        return $this->returnMessage($delete, 3, [], "company/view/approval-packages");
    }

    public function getAgents($company_id) {
        $company = Company::findOrFail($company_id);

        $company = $company->user;

        $agents = $company->company_agents;

        return view('admin.company.agents', compact('agents', 'company'));
    }

    public function changeAgentStatus($id) {
        $agent = User::where([
                    'type' => 3,
                    'id' => $id,
                ])->firstOrFail();

        if ($agent->activation != 1) {
            $agent->update([
                'activation' => 1,
            ]);
        } else {
            $agent->update([
                'activation' => 0
            ]);
        }

        return back()->withMessage('agent updated successfully');
    }

    public function export() {
        $users = User::select('name', 'email', 'phone')->where('type', 2)->get();

        $exported_users = array();
        foreach ($users as $user) {
            $user_value = [$user->name, $user->email, $user->phone];
            array_push($exported_users, $user_value);
        }

        Excel::create('companies', function ($excel) use ($exported_users) {
            $excel->sheet('companies', function ($sheet) use ($exported_users) {
                $sheet->rows($exported_users);
            });
        })->export('xls');
    }

    public function exportAgents($company_id) {
        $users = User::select('name', 'email', 'phone')->where([
                    'type' => 3,
                    'company_id' => $company_id
                ])->get();

        $exported_users = array();
        foreach ($users as $user) {
            $user_value = [$user->name, $user->email, $user->phone];
            array_push($exported_users, $user_value);
        }

        Excel::create('agents', function ($excel) use ($exported_users) {
            $excel->sheet('agents', function ($sheet) use ($exported_users) {
                $sheet->rows($exported_users);
            });
        })->export('xls');
    }

    public function getCompanyPackages() {
//        dd('sssss');
        $this->pushBreadcrumb(array('Index'));

        $this->ifMethodExistCallIt('onIndex');
        $this->request->flash();

        $rows = $this->model->latest();

        if ($this->request->search) {
            $keyword = $this->request->search;
            $rows = $rows->where(function ($query) use ($keyword) {
                $query->where('registered_name', 'LIKE', '%' . $keyword . '%')->orWhere('description', 'LIKE', '%' . $keyword . '%')
                        ->orWhereHas('user', function ($query) use ($keyword) {
                            $query->where('name', 'LIKE', '%' . $keyword . '%')
                            ->orWhere(function ($query) use ($keyword) {
                                $query->where('email', 'LIKE', '%' . $keyword . '%')
                                ->orWhere('phone', 'LIKE', '%' . $keyword . '%');
                            });
                        });
            });
        }

        $rows = $rows->paginate(10);

        return $this->view('index_package', array(
                    'rows' => $rows,
                    'columns' => $this->show_columns_html,
                    'breadcrumb' => $this->breadcrumb,
                    'select_columns' => $this->show_columns_select
        ));
    }

    public function company_list($id) {
        $company = Company::find($id);
        $company_packages = PackagePayment::where([
                    'company_id' => $company->user_id,
                ])->get();
        return view('admin.company.package_list', compact('company', 'company_packages'));
    }

    public function disable($company_package_id) {
        $company_package = PackagePayment::where([
                    'id' => $company_package_id,
                ])->first();
        $package = Package::findOrFail($company_package->package_id);
        $company_package->update([
            'status' => 0,
            'confirmed' => 2,
        ]);
        $company = Company::where('user_id', $company_package->company_id)->first();
        $company_packages = PackagePayment::where([
                    'company_id' => $company->user_id,
                ])->get();
        $email = $company->user->email;
        $subject = "Sakeny Company Package Subscription Update";
        $flag = 2;
        Mail::send('emails.subscribe-company', compact('package', 'company', 'message', 'flag'), function ($mail) use ($email, $subject) {
            $mail->to($email);
            $mail->subject($subject);
        });
        return redirect()->back()->with('company', 'company_packages');
        
//        $company_package = PackagePayment::where([
//                    'id' => $company_package_id,
//                ])->first();
//        $company_package->update([
//            'status' => 0,
//            'confirmed' => 2,
//        ]);
//        $company = Company::find($company_package->company_id);
//        $company_packages = PackagePayment::where([
//                    'company_id' => $company->user_id,
//                ])->get();
//        return redirect()->back()->with('company', 'company_packages');
    }

    public function pending($company_package_id) {
        $company_package = PackagePayment::where([
                    'id' => $company_package_id,
                ])->first();
        $company_package->update([
            'status' => 1,
            'confirmed' => 0,
        ]);
        $company = Company::find($company_package->company_id);
        $company_packages = PackagePayment::where([
                    'company_id' => $company->user_id,
                ])->get();
        return redirect()->back()->with('company', 'company_packages');
    }

    public function accept($company_package_id) {
        $company_package = PackagePayment::where([
                    'id' => $company_package_id,
                ])->first();
        $package = Package::findOrFail($company_package->package_id);
        $now = new DateTime("now", new DateTimeZone('Africa/Cairo'));
        $company_package->update([
            'status' => 1,
            'confirmed' => 1,
            'activation_date' => $now->format('Y-m-d H:i:s'),
        ]);
        $company = Company::where('user_id', $company_package->company_id)->first();
        $company_packages = PackagePayment::where([
                    'company_id' => $company->user_id,
                ])->get();
        $email = $company->user->email;
//        dd($email);
        $subject = "Sakeny Company Package Subscription Update";
        $flag = 1;
        Mail::send('emails.subscribe-company', compact('package', 'company', 'flag'), function ($mail) use ($email, $subject) {
            $mail->to($email);
            $mail->subject($subject);
        });
        return redirect()->back()->with('company', 'company_packages');
        
//        $company_package = PackagePayment::where([
//                    'id' => $company_package_id,
//                ])->first();
//        $company_package->update([
//            'status' => 1,
//            'confirmed' => 1,
//        ]);
//        $company = Company::find($company_package->company_id);
//        $company_packages = PackagePayment::where([
//                    'company_id' => $company->user_id,
//                ])->get();
//        return redirect()->back()->with('company', 'company_packages');
    }

    public function reject($company_package_id) {
        $company_package = PackagePayment::where([
                    'id' => $company_package_id,
                ])->first();
        $package = Package::findOrFail($company_package->package_id);
        $company_package->update([
            'status' => 0,
            'confirmed' => 2,
        ]);
        $company = Company::where('user_id', $company_package->company_id)->first();
        $company_packages = PackagePayment::where([
                    'company_id' => $company->user_id,
                ])->get();
        $email = $company->user->email;
        $subject = "Sakeny Company Package Subscription Update";
        $flag = 0;
        Mail::send('emails.subscribe-company', compact('package', 'company', 'flag'), function ($mail) use ($email, $subject) {
            $mail->to($email);
            $mail->subject($subject);
        });
        return redirect()->back()->with('company', 'company_packages');
    }

}
