<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\City;
use App\Models\Template;
use App\Models\OfferType;
use App\Models\PropertyType;

class TemplateController extends CoreController
{
    function __construct(Template $model)
    {
        $this->model = $model;
        $this->show_columns_html = ['id', 'title_ar', 'title_en'];
        $this->show_columns_select = ['id', 'title_ar', 'title_en'];

        $countries = Country::pluck('name_en', 'id');
        $cities = City::pluck('name_en', 'id');
        $offer_types = OfferType::pluck('title_en', 'id');
        $property_types = PropertyType::pluck('name_en', 'id');
        view()->share(compact('countries', 'cities','offer_types','property_types'));
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

        $rows = $this->model->orderBy($this->orderBy[0],$this->orderBy[1]);
        if (request('country_id'))
            $rows = $rows->where('country_id' , request('country_id'));

        if (request('city_id'))
            $rows = $rows->where('city_id' , request('city_id'));

        if (request('offer_type_id'))
            $rows = $rows->where('offer_type_id' , request('offer_type_id'));

        if (request('property_type_id'))
            $rows = $rows->where('property_type_id' , request('property_type_id'));

        $rows = $rows->get();

        if($this->request->ajax())
            return response()->json($this->view('loop',[
                'rows'=>$rows,
                'columns'=>$this->show_columns_html,
                'select_columns'=>$this->show_columns_select
            ])->render());

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
            'title_ar' => 'required|max:255|min:3',
            'title_en'  => 'required|max:255|min:3',
            'country_id'=>'required',
            'city_id'=>'required',
            'offer_type_id'=>'required',
            'property_type_id'=>'required',
        ]);
    }

    /**
    * Before go inside @update method
    * @return avoid
    */
   public function onUpdate()
    {
        return $this->v([
            'title_ar' => 'required|max:255|min:3',
            'title_en'  => 'required|max:255|min:3',
            'country_id'=>'required',
            'city_id'=>'required',
            'offer_type_id'=>'required',
            'property_type_id'=>'required',
        ]);
    }
}
