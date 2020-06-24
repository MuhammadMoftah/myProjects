<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Company;
use App\Models\Country;
use App\Models\PackagePayment;
use App\Rules\PhoneValidity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyController extends CoreController
{
    function __construct(Company $model)
    {
        $this->model = $model;
        $this->show_columns_html = ['id'];
        $this->show_columns_select = ['id'];
        $countries_list = Country::where('activation', 1)->pluck('name_en', 'id');
        view()->share(compact('countries_list'));
        parent::__construct();
    }

    public function index()
    {
        $this->pushBreadcrumb(array('Index'));

        $this->ifMethodExistCallIt('onIndex');
        $this->request->flash();
        $status = request('activation');

        $rows = $this->model->latest()->whereHas('user', function($query){
            // $status = request('activation') != null ? request('activation') : 2;
            // $query->where('activation',$status);
        });
        if (request('status') != null) {
          $rows = $rows->where("status",request('status'));
        }
         $rows = $rows->get();

        return $this->view('index',array(
            'rows'=>$rows,
            'columns'=>$this->show_columns_html,
            'breadcrumb'=>$this->breadcrumb,
            'select_columns'=>$this->show_columns_select
        ));
    }

    public function approve($id)
    {
        $row = $this->model->find($id);
        $update = $row->update(['status' => request('status')]);
        if(request('status') == 1) {
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
    public function store()
    {
        $this->ifMethodExistCallIt('onStore');
        $user = User::create(
            request(['name', 'email', 'password', 'phone','activation']) +
            [
                'type' => 2,
                'api_token'=>uniqid()
            ]
        );
        $company = $this->model->create(
            request(['registered_name', 'description', 'cr_number', 'cr_number_file',
                'phone', 'city', 'zip_code', 'num_agents', 'logo', 'in_registration','country_id']) +
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
    public function update($id)
    {
        $this->ifMethodExistCallIt('onUpdate');
        $row = $this->model->find($id);

        if ($row->activation == 2 && $this->request->activation == 1 ) {
            // send email
        }
        $row->user->update(request(['name', 'email', 'phone','activation']));

        $update = $row->update(request(['registered_name', 'description', 'cr_number', 'cr_number_file',
                'phone', 'city', 'zip_code', 'number_of_premium_ads','number_of_regular_ads','number_of_agents', 'logo', 'in_registration','country_id']));

        return $this->returnMessage($update,2);
    }

    /**
     * Before go inside @store method
     * @return avoid
     */
    public function onStore()
    {
        return $this->v([
            'name' => 'required|max:255|min:3',
            'registered_name' => 'required|max:255',
            'description' => 'required',
            'country_id' => 'required',
            'cr_number' => 'required',
            'cr_number_file' => 'required',
            'phone' => ['required','unique:users','numeric'],
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
   public function onUpdate()
    {
       return $this->v([
            'name' => 'required|max:255|min:3',
            'email' => 'required|email|max:255|unique:users,email,'.request('user_id'),
            // 'email' => 'required|email',
            'registered_name' => 'required|max:255',
            'description' => 'required',
            'country_id' => 'required',
            'cr_number' => 'required',
            'phone' => ['required','unique:users,id,'.request('user_id'), 'numeric'],
            'city' => 'required',
            // 'num_agents' => 'required',
            'zip_code' => 'required|numeric',
            'logo' => 'image',
        ]);
    }

    public function updateViewInFront($id)
    {
        $row = $this->model->find($id);
        $update = $row->update(['view_in_front' => request('view_in_front')]);
        if(request('view_in_front') == 1)
            return $this->returnMessage($update, 4 );
        return $this->returnMessage($update, 5);
    }

    public function indexApprovalPackages()
    {
        $this->pushBreadcrumb(array('Index'));
        $this->request->flash();
        $rows = PackagePayment::where('status',0)->latest()->get();
        return $this->view('index-approval-package',array(
            'rows'=>$rows,
            'columns'=>$this->show_columns_html,
            'breadcrumb'=>$this->breadcrumb,
            'select_columns'=>$this->show_columns_select
         ));
    }

    public function approvalPackagesApprove($id)
    {
       $row = PackagePayment::find($id);
       $row->update(['status' => 1]);
        $row->company->increment('number_of_premium_ads', $row->package->number_of_premium_ads);
        $row->company->increment('number_of_regular_ads', $row->package->number_of_regular_ads);
        // $row->company->increment('number_of_agents', $row->package->number_of_agents);
        return $this->returnMessage($row, 0, [] , "company/view/approval-packages");
    }

    public function approvalPackagesDelete($id)
    {
        $delete = PackagePayment::find($id)->delete();
        return $this->returnMessage($delete, 3, [] , "company/view/approval-packages");
    }



    // loop-approval-package
}
