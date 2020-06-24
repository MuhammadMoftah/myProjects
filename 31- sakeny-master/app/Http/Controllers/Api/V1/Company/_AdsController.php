<?php

namespace App\Http\Controllers\Api\V1\Company;

use App\Models\Ads;
use App\Models\Country;
use App\Models\AdsImage;
use App\Models\UnitView;
use App\Models\OfferType;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\CoreController;

class AdsController extends CoreController
{
    protected function scoper()
    {
        return $this->auth->ads();
    }


    public function create()
    {
        $model = new Ads;
        $proprty_type_list = PropertyType::get(['name_en','name_ar', 'id']);
        $offer_type_list = OfferType::get(['title_en', 'id']);
        $countries = Country::with('cities')->get(['name_en','name_ar', 'id']);

        $unit_view_list = UnitView::get(['name_en','name_ar', 'id']);
        $sale_rent = [
            [
                'id' => 1,
                'name' => __('lang.sale')
            ],
            [
                'id' => 2,
                'name'=> __('lang.rent')
            ],
        ];
        return $this->response(compact('proprty_type_list', 'sale_rent', 'unit_view_list', 'owner', 'agent', 'countries', 'cities', 'offer_type_list'));
    }


      /**
     * Before go inside @store method
     * @return avoid
     */
    public function onStore()
    {
        $this->setCreatableAttibutes($this->request->only('title','offer_type_id','latitude','longitude','size','property_type_id','price','price_negotiable','bedrooms_num','bathrooms_num','finishing_level','unit_view_id','building_year','description','country_id','city_id'));


        $this->validator([
            'title' => 'required|max:255',
            'country_id' => 'required',
            'city_id' => 'required',
            'price'=>'required'
        ]);

        //'number_of_premium_ads','number_of_regular_ads',
        if (request('is_premium') == 1) {
            if ($this->auth->hasMorePoints('number_of_premium_ads')) {
                $this->auth->decrementPoints('number_of_premium_ads');
            }else {
                return $this->response(['message'=>'Your package has been expired'],422);
            }
        }
        elseif($this->auth->hasMorePoints('number_of_regular_ads')) {
            $this->auth->decrementPoints('number_of_regular_ads');
        }else {
            return $this->response(['message'=>'Your package has been expired'],422);
        }

    }

    public function isStored($row)
    {
        // Store product images
        if(request('images')) {
            foreach (request('images') as $key => $image) {
                $row->images()->create([
                    'image' => $image
                ]);
            }
        }


    }



        /**
    * Before go inside @update method
    * @return avoid
    */
   public function onUpdate()
    {
        $this->setUpdatableAttributes($this->request->only('title','offer_type_id','latitude','longitude','size','property_type_id','price','price_negotiable','bedrooms_num','bathrooms_num','finishing_level','unit_view_id','building_year','description','country_id','city_id'));
       return $this->validator([
            'title' => 'required|max:255',
            'country_id' => 'required',
            'city_id' => 'required',
        ]);
    }

    public function isUpdated($row)
    {
        // Store product images
        if(request('images')) {
            foreach (request('images') as $key => $image) {
                $row->images()->create([
                    'image' => $image
                ]);
            }
        }
    }


    public function destroyImage($ads_id,$image_id)
    {
        $row = $this->scoper()->find($ads_id);
        if (!$row) {
            return $this->buildValidationMessage('id','Resource not found',422);
        }
        $row->images()->find($image_id)->delete();
        return $this->response(['message'=>'deleted successfully']);
    }


}
