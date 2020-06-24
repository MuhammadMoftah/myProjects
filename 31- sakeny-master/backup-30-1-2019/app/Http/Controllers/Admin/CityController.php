<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\City;

class CityController extends CoreController
{
    function __construct(City $model)
    {
        $this->model = $model;
        $this->show_columns_html = ['id', 'name_ar', 'name_en'];
        $this->show_columns_select = ['id', 'name_ar', 'name_en'];

        $countries = Country::pluck('name_en', 'id');
        $activation = ['1' => __('lang.active'), '0' => __('lang.in-active')];
        view()->share(compact('countries', 'activation'));
        parent::__construct();
    }

    /**
     * Before go inside @store method
     * @return avoid
     */
    public function onStore()
    {
        return $this->v([
            'name_ar' => 'required|max:255|min:3',
            'name_en'  => 'required|max:255|min:3',
            'country_id'=>'required',
            // 'price_per_meter'=>'required|integer|min:1',
            'activation'  => 'required',
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
            'name_ar' => 'required|max:255|min:3',
            'name_en'  => 'required|max:255|min:3',
            'country_id'=>'required',
            // 'price_per_meter'=>'required|integer|min:1',
            'activation'  => 'required',
            'image'  => 'image',
        ]);
    }

}
