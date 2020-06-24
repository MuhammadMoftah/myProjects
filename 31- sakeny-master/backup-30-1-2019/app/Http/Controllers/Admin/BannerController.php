<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


/**
 * Todoi :
 * implemet city id
 * implemnent start date and end date in web service
 * implement postman
 */
class BannerController extends CoreController
{
    function __construct(Banner $model)
    {
        $this->model = $model;
        $this->show_columns_html = ['id', 'name','start_date','end_date'];
        $this->show_columns_select = ['id', 'name','start_date','end_date'];

        $countries_list = Country::pluck('name_en', 'id');
        $activation = ['1' => __('lang.active'), '0' => __('lang.in-active')];
        $place_lists = [1 => 'Top of website', 2 =>'Banner ad horizontal in the middle of the site', 3=>'Banner at the right of the site',4=>'Banner at the left of the site'];
        $type_lists = [1=>'Code', 2=>'Image'];
        $page_lists = [1=>'Projects', 2=>'Blog',3=>'Life style',4=>'Search results',5=>'Home page'];

        view()->share(compact('countries_list', 'activation','place_lists','type_lists','page_lists'));
        parent::__construct();
    }

    /**
     * Before go inside @store method
     * @return avoid
     */
    public function onStore()
    {
        return $this->v([
            'name' => 'required|max:255|min:3',
            'country_id'=>'required',
            'activation'  => 'required',
            'image'  => 'image',
            'start_date'=>'required|after:yesterday',
            'end_date'=>'required|after:start_date',
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
            'country_id'=>'required',
            'activation'  => 'required',
            'image'  => 'image',
            'start_date'=>'required',
            'end_date'=>'required|after:start_date'
        ]);
    }

}
