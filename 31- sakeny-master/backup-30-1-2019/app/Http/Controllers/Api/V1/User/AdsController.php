<?php

namespace App\Http\Controllers\Api\V1\User;
use Log;
use App\Models\Ads;
use App\Models\Country;
use App\Models\AdsImage;
use App\Models\UnitView;
use App\Models\Amenities;
use App\Models\OfferType;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Models\AdsEditHistory;
use App\Models\LevelOfFinished;
use App\Models\AdsPaymentsApprovals;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\CoreController;

class AdsController extends CoreController
{
    protected function scoper()
    {
        return $this->auth->ads();
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $active_ads  = $this->scoper()->valid()->get();
        $expired_ads = $this->scoper()->expired()->get();

        return $this->response(compact('active_ads','expired_ads'));
    }

    public function patchDeactive($id)
    {
        $row = $this->scoper()->find($id);
        if (!$row) {
            return $this->buildValidationMessage('id','Resource not found',422);
        }
        $row->update(['status'=>0]);
        return $this->response([
            'data'=>$row,
            'message'=>'updated successfully'
        ]);
    }


    public function create()
    {
        $model = new Ads;
        $proprty_type_list = PropertyType::get(['name_en','name_ar', 'id']);
        if (request('locale') == 'en') {
            $offer_type_list = OfferType::pluck('title_en', 'id');
        }else {
            $offer_type_list = OfferType::pluck('title_ar', 'id');
        }
        $countries = Country::with('cities')->get(['name_en','name_ar', 'id']);
        $amenities = Amenities::where('activation', 1)->get(['name_en','name_ar', 'id']);
        $level_of_finished = LevelOfFinished::where('activation', 1)->get(['name_en','name_ar', 'id']);
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
        $this->setCreatableAttibutes($this->request->only('title','offer_type_id','latitude','longitude','size','property_type_id','price','price_negotiable','bedrooms_num','bathrooms_num','finishing_level','unit_view_id','building_year','description','country_id','city_id','contact_method','able_call','able_email','able_chat','level_of_finished_id','amenitie_id'));

        return $this->validator([
            'title' => 'required|max:255',
            'country_id' => 'required',
            'city_id' => 'required',
            'price'=>'required'
        ]);
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
        $this->setUpdatableAttributes($this->request->only('title','offer_type_id','latitude','longitude','size','property_type_id','price','price_negotiable','bedrooms_num','bathrooms_num','finishing_level','unit_view_id','building_year','description','country_id','city_id','contact_method','able_call','able_email','able_chat','level_of_finished_id','amenitie_id'));

       return $this->validator([
            'title' => 'required|max:255',
            'country_id' => 'required',
            'city_id' => 'required',
        ]);
    }

    public function update($id)
    {
        $this->ifMethodExistCallIt('onUpdate');
        $row = $this->scoper()->find($id);
        // dd($this->request->images);
        $update = AdsEditHistory::create($this->request->all() + ["ad_id" => $id , "expire_date" => $row->expire_date]);
        // $update = $row->update($this->request->all());
        $this->ifMethodExistCallIt('isUpdated',$update);
        return $this->response([
            'data'=>$row,
            'message'=>'updated successfully'
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

    public function patchRenewAd($id)
    {
        return $this->adsUpdatePremuimOrRenew(0,$id);
    }

    public function patchUpdateAdToPremuim($id)
    {
        return $this->adsUpdatePremuimOrRenew(1,$id);
    }

    public function adsUpdatePremuimOrRenew($type ,$id)
    {
        $days = $this->request->days != null ? $this->request->days : 15 ;
        $row = AdsPaymentsApprovals::create(['days' => $days ,'ad_id' => $id , 'type' => $type]);
        $row->with('ad');
        return $this->response([
            'data'=>$row,
            'message'=>'updated successfully'
        ]);
    }

    public function patchRenewAdCompany($id)
    {
        $row = $this->scoper()->find($id);
        if (!$row) {
            return $this->buildValidationMessage('id','Resource not found',422);
        }
        $days = $this->request->days != null ? $this->request->days : 15 ;
        $row->renewAd($days);
        return $this->response([
            'data' => $row ,
            'message' => 'updated successfully'
        ]);
    }

    public function patchUpdateAdToPremuimCompany($id)
    {
        $row = $this->scoper()->find($id);
        if (!$row) {
            return $this->buildValidationMessage('id','Resource not found',422);
        }
        $days = $this->request->days != null ? $this->request->days : 15 ;
        $row->renewAd($days);
        $row->updateAdToPremuim();
        return $this->response([
            'data'=>$row,
            'message'=>'updated successfully'
        ]);
    }

//
}
