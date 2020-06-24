<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Country;

class PackageController extends CoreController
{
    function __construct(Package $model)
    {
        $this->model = $model;
        $this->show_columns_html = ['id', 'name_ar', 'name_en','price'];
        $this->show_columns_select = ['id', 'name_ar', 'name_en','price'];
        $countries = Country::pluck('name_en', 'id');
        $packagesType = [ 0 => 'Monthly' , 1 => 'Quarterly' , 2 => 'Semi - annual' , 3 => 'Annual' ];
        $activation = ['1' => __('lang.active'), '0' => __('lang.in-active')];
        view()->share(compact('activation' , 'countries' , 'packagesType'));

        parent::__construct();
    }

        /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->pushBreadcrumb(array('Index'));

        $this->ifMethodExistCallIt('onIndex');
        $this->request->flash();

        $rows = $this->model->latest();

        if ($this->request->country_id) {
            $rows = $rows->where('country_id', $this->request->country_id);
        }

        $rows = $rows->get();

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
            'name_ar' => 'required|max:255',
            'name_en'  => 'required|max:255',
            'country_id'  => 'required',
            'image'  => 'image',
        ]);
    }

    /**
    * Before go inside @update method
    * @return avoid
    */
   public function onUpdate()
    {
       return $this->v([
            'name_ar' => 'required|max:255',
            'name_en'  => 'required|max:255',
            'country_id'  => 'required',
            'image'  => 'image',
        ]);
    }

}
