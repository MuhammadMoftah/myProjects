<?php

namespace App\Http\Controllers\Admin;

use App\Models\Developer;
use App\Rules\PhoneValidity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeveloperController extends CoreController
{
    function __construct(Developer $model)
    {
        $this->model = $model;
        $this->show_columns_html = ['id', 'name'];
        $this->show_columns_select = ['id', 'name'];

        $gender = ['1' => __('lang.male'), '0' => __('lang.female')];
        view()->share(compact('gender'));
        parent::__construct();
    }

    public function index()
    {
        $this->pushBreadcrumb(array('Index'));

        $this->ifMethodExistCallIt('onIndex');
        $this->request->flash();

        $rows = $this->model->orderBy($this->orderBy[0],$this->orderBy[1])->whereType(4)->get();

        return $this->view('index',array(
            'rows'=>$rows,
            'columns'=>$this->show_columns_html,
            'breadcrumb'=>$this->breadcrumb,
            'select_columns'=>$this->show_columns_select
         ));
    }

    /**
     * Before go inside @store method
     * @return avoid
     */
    public function onStore()
    {
        return $this->v([
            'name' => 'required|max:255',
            // 'email' => 'required|email|max:255|unique:users',
            'image' => 'image',
            'phone' => ['required','unique:users','numeric'],
            // 'password' => 'required|min:6',
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
            // 'email' => 'required|email|max:255|unique:users,email,'.request()->route('developer'),
            'image' => 'image',
            'phone' => ['required','unique:users,phone,'.request()->route('developer') ,'numeric'],
            // 'password' => 'min:6',
        ]);
    }

}
