<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminsDeactivationHistory;
use App\Models\Permission\Role;

class AdminController extends CoreController
{
    function __construct(Admin $model)
    {
        $this->model = $model;
        $this->show_columns_html = array('id','name','email','created_at');
        $this->show_columns_select = array('id','name','email','created_at');
        parent::__construct();
    }

    /**
     * Form Builder
     * @return Array
     */
    public function formBuilder()
    {
        $roles_lists = Role::pluck('title','id');

         $this->formInput =
        [
            [
                'name'=>'name',
                'label'=>trans('lang.name'),
                'type'=>'text',
                'value'=>null,
                'options'=>
                [
                    'id'=>'name',
                    'class'=>'form-control'
                ],
                'wrap_class'=>'col-md-6'
            ],

            [
                'name'=>'email',
                'label'=>trans('lang.email'),
                'type'=>'text',
                'value'=>null,
                'options'=>
                [
                    'id'=>'email',
                    'class'=>'form-control'
                ],
                'wrap_class'=>'col-md-6'
            ],


            [
                'name'=>'image',
                'label'=>trans('lang.image'),
                'type'=>'file',
                'value'=>null,
                'options'=>
                [
                    'id'=>'image',
                    'class'=>'form-control'
                ],
                'wrap_class'=>'col-md-12'
            ],



            [
                'name'=>'password',
                'label'=>trans('lang.password'),
                'type'=>'password',
                'value'=>null,
                'options'=>
                [
                    'id'=>'password',
                    'class'=>'form-control'
                ],
                'wrap_class'=>'col-md-12'
            ],



            [
                'name'=>'activation',
                'label'=>trans('lang.activation'),
                'type'=>'select',
                'select_options'=>[1=>trans('lang.active'),0=>trans('lang.deactivate')],
                'value'=>null,
                'options'=>
                [
                    'id'=>'activation',
                    'class'=>'form-control'
                ],
                'wrap_class'=>'col-md-12'
            ],

             [
                'name'=>'role_id',
                'label'=>trans('lang.role_id'),
                'type'=>'select',
                'select_options'=>$roles_lists,
                'value'=>null,
                'options'=>
                [
                    'id'=>'role_id',
                    'class'=>'form-control',
                    'placeholder'=>'Set Role for this user'
                ],
                'wrap_class'=>'col-md-12'
            ],



        ];
    }

    /**
     * Before go inside @store method
     * @return avoid
     */
    public function onStore()
    {
        return $this->v([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'image' => 'image',
            'password' => 'min:6',
            'activation'=>'required|boolean',
            'role_id'=>'required'
        ]);
    }

    /**
    * Before go inside @update method
    * @return avoid
    */
   public function onUpdate()
    {
       return $this->v([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins,email,'.request()->route('admin'),
            'image' => 'image',
            'password' => 'min:6',
            'activation'=>'required|boolean',
            'role_id'=>'required'
            ]);
    }
    
    public function update($id)
    {
            $this->ifMethodExistCallIt('onUpdate');
            $row = $this->model->find($id);
            $update = $row->update($this->request->all());
            $this->ifMethodExistCallIt('isUpdated',$row);
            if($this->request->activation == 0) {
                AdminsDeactivationHistory::create([
                    'admin_id' => auth()->guard('admin')->user()->id,
                    'deactivated_admin_id' => $id,
                    'deactivation_date' => date("Y-m-d H:i:s"),
                ]);
            }
            return $this->returnMessage($update,2);
    }

}
