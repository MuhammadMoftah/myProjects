<?php

namespace App\Http\Controllers\Admin;

use Form,DB;
use App\Models\Ads;
use App\Models\City;
use App\Models\User;
use App\Models\Country;
use App\Models\AdsImage;
use App\Models\UnitView;
use App\Models\Amenities;
use App\Models\OfferType;
use App\Models\PropertyType;
use App\Models\AdsImageEditHistory;
use Illuminate\Http\Request;
use App\Models\AdsEditHistory;
use App\Models\LevelOfFinished;
use App\Http\Controllers\Controller;
use App\Notifications\User\GeneralNotification;

class AdsController extends CoreController
{
    function __construct(Ads $model)
    {
        $this->model = $model;
        $this->show_columns_html = ['id'];
        $this->show_columns_select = ['id'];

        $unit_view_list = $this->model->getUnitViewList();
        $owner = User::User()->pluck('name', 'id');
        $agent = User::pluck('name', 'id');
        $proprty_type_list = PropertyType::pluck('name_en', 'id');
        $offer_type_list = OfferType::pluck('title_en', 'id');
        $countries = Country::pluck('name_en', 'id');
        $cities = City::pluck('name_en', 'id');
        $unit_view_list = UnitView::pluck('name_en', 'id');
        $sale_rent = [ 1 => __('lang.sale'), 2 => __('lang.rent')];
        $status_list = [ 1 => __('lang.active'), 0 => __('lang.inactive')];
        $level_of_finished = LevelOfFinished::where('activation', 1)->pluck('name_en', 'id');
        $amenities = Amenities::where('activation', 1)->pluck('name_en', 'id');
        view()->share(compact('proprty_type_list', 'sale_rent', 'unit_view_list', 'owner', 'agent', 'countries', 'cities', 'offer_type_list','status_list','level_of_finished','amenities'));
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
        if ($this->request->offer_type_id) {
            $rows = $rows->where('offer_type_id', $this->request->offer_type_id);
        }
        if ($this->request->city_id) {
            $rows = $rows->where('city_id', $this->request->city_id);
        }

        $rows = $rows->get();

        return $this->view('index',array(
            'rows'=>$rows,
            'columns'=>$this->show_columns_html,
            'breadcrumb'=>$this->breadcrumb,
            'select_columns'=>$this->show_columns_select
         ));
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

    public function destroyImage($id)
    {
        AdsImage::destroy($id);
        return "true";
    }

    public function updateStatus($id)
    {
        $row = $this->model->find($id);
        $update = $row->update(['status' => request('status')]);
        if(request('status') == 1)
            return $this->returnMessage($update, 4);
        return $this->returnMessage($update, 5);
    }

    public function updateSelected($id)
    {
        $row = $this->model->find($id);
        $update = $row->update(['is_selected' => request('is_selected')]);

        return $this->returnMessage($update, 3);
    }

    /**
     * Before go inside @store method
     * @return avoid
     */
    public function onStore()
    {
        return $this->v([
            'title' => 'required|max:255|min:3',
            'country_id' => 'required',
            'city_id' => 'required',
            // 'latitude' => 'required',
            // 'longitude' => 'required',
        ],[
           'latitude.required' => 'Please select location on map',
            'longitude.required' => 'Please select location on map',
        ]);
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
        // dd($this->request->all());
        $update = $row->update($this->request->all());
        $this->ifMethodExistCallIt('isUpdated',$row);
        return $this->returnMessage($update,2);
    }


    /**
    * Before go inside @update method
    * @return avoid
    */
   public function onUpdate()
    {
        // dd(request()->all());
       return $this->v([
            'title' => 'required|max:255|min:3',
            'country_id' => 'required',
            'city_id' => 'required',
            // 'latitude' => 'required',
            // 'longitude' => 'required',
        ],[
           'latitude.required' => 'Please select location on map',
            'longitude.required' => 'Please select location on map',
        ]);
    }


    public function getUsersWithType()
    {
        $users = User::active()->where('type', request('user_type'))->pluck('name', 'id');
        return Form::select('owner_id', $users, request('user_id'),['class'=>'form-control']);
    }


    public function getCities()
    {
        $country_id = request('country_id');
        $selected = request('selected');
        $cities = City::active()->where('country_id', $country_id)->pluck('name_en', 'id');
        return Form::select('city_id', $cities, $selected,['class'=>'form-control','placeholder'=>'Select city']);
    }

    public function updateHistory($id) {
       $selected_ad = $this->model->find($id);
       $rows = AdsEditHistory::where('ad_id', $id)->get();

        return $this->view('edit-history',array(
            'rows' => $rows,
            'selected_ad' => $selected_ad,
            'columns' => $this->show_columns_html,
            'breadcrumb' => $this->breadcrumb,
            'select_columns' => $this->show_columns_select
        ));

    }

    public function acceptHistory($ad_id, $history_id)
    {
        $history = AdsEditHistory::select(['title', 'offer_type_id', 'latitude', 'longitude', 'size', 'property_type_id', 'price',
                            'price_negotiable', 'bedrooms_num', 'bathrooms_num', 'finishing_level',
                            'unit_view_id', 'building_year', 'description',
                            'country_id', 'city_id', 'expire_date','is_premium',
                            'able_call','able_email','able_chat','level_of_finished_id','amenitie_id'])->find($history_id);
        $ad = $this->model->find($ad_id);
        $subject = "Your edit request on '{$ad->title}' has been approved by administration ";
        $content = "Your edit request on '{$ad->title}' has been approved by administration ";
        if ($receiver = $ad->owner) {
            $receiver->notify(new GeneralNotification($subject, $content));
        }
        if ($receiver = $ad->agent) {
            $receiver->notify(new GeneralNotification($subject, $content));
        }


        $ad->update($history->toArray());
        // images
        $adImages = AdsImageEditHistory::where('ads_id',$history_id)->select(['image','ads_id'])->get();

        // AdsImage::where('ads_id',$ad_id)->delete();
           foreach ($adImages as $key => $image) {
                DB::table('ads_images')->insert([
                    'image' => $image->image,
                    'ads_id' => $ad_id
                ]);
            }
        // $ad->crea($history->toArray());
        AdsImageEditHistory::where('ads_id',$history_id)->delete();
        AdsEditHistory::find($history_id)->delete();
        return back()->with('success', trans('History approved successfully'));
    }

    public function viewHistory($ad_id, $history_id)
    {

        $row = AdsEditHistory::find($history_id);
        return $this->view('view-history',array(
            'row'=>$row,
            'columns'=>$this->show_columns_html,
            'breadcrumb'=>$this->breadcrumb,
            'select_columns'=>$this->show_columns_select
         ));
    }
    public function rejectHistory($ad_id, $history_id)
    {
        $history = AdsEditHistory::find($history_id);
        $history->delete();
        $ad = $this->model->find($ad_id);
        $subject = "Your edit request on '{$ad->title}' has been rejected by administration ";
        $content = "Your edit request on '{$ad->title}' has been rejected by administration ";
        if ($receiver = $ad->owner) {
            $receiver->notify(new GeneralNotification($subject, $content));
        }
        if ($receiver = $ad->agent) {
            $receiver->notify(new GeneralNotification($subject, $content));
        }

        return back()->with('success', trans('History rejected successfully'));
    }




}
