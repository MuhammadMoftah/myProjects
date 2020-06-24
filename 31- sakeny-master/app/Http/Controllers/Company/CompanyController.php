<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectContact;
use Mail;
use App\Models\Ads;
use App\Models\Company;
use App\Models\City;
use App\Models\User;
use App\Models\Banner;
use App\Models\Country;
use Hash;
use App\Models\Package;
use App\Models\Project;
use App\Models\Reports;
use DB;
use App\Models\AdsImageEditHistory;
use App\Models\Settings;
use Auth;
use App\Models\UnitView;
use App\Models\Amenities;
use App\Models\ContactUs;
use App\Models\Developer;
use App\Models\OfferType;
use App\Models\CompareAds;
use App\Models\PropertyType;
use App\Models\SearchHistory;
use App\Models\LevelOfFinished;
use App\Models\LifeStyleCategory;
use App\Models\LifeStyle;
use App\Models\Template;
use Session;
use App\Models\District;
use Socialite;
use App\Models\AdsImage;
use App\Models\HeaderImage;
use App\Models\AdFavourite;
use App\Models\PackagePayment;
use App\Models\Chat\ChatRooms;
use App\Models\Chat\RoomMessages;
use App\Models\History;
use App\Models\Agent;
use App\Models\AdsEditHistory;
use App\Services\PackageService;
use Carbon\Carbon;

class CompanyController extends Controller
{

    public function getDashboard($lang, PackageService $packageService)
    {

        $company = auth()->guard('user')->user();

        if (Session::get('country_id')) {
            $country_id = Session::get('country_id');
        } else {
            session(['country_id' => 1]);
            $country_id = 1;
        }

        $active_agents = Agent::Agent()->Active()->where('company_id', $company->id)->count();
        $available_agents = Agent::Agent()->where('company_id', $company->id)->count();

        $all_ads = Ads::where('owner_id', $company->id)->count();
        $valid_active = Ads::Valid()->active()->where('owner_id', $company->id)->count();
        $deactive_active = Ads::Deactive()->where('owner_id', $company->id)->count();
        $expired_active = Ads::Expired()->active()->where('owner_id', $company->id)->count();
        $premium_active = Ads::active()->where('owner_id', $company->id)
            ->where('is_premium', '!=', null)->count();
        $premium = Ads::where('owner_id', $company->id)
            ->where('is_premium', '!=', null)->count();
        $premium_ads = Ads::where('owner_id', $company->id)
            ->where('is_premium', '!=', null)->get();

        $active_ads_data = Ads::Valid()->where('owner_id', $company->id)->get();

        $expired_ads_data = Ads::Expired()->where('owner_id', $company->id)->get();

        // $repeated_ads_data = Ads::Repeated()->where('owner_id', $company->id)->get();

        $favourites = AdFavourite::whereHas('ad', function ($query) {
            $query->active()->Valid()->whereHas('owner', function ($query) {
                $query->where('activation', 1);
            });
        })->where('user_id', $company->id)->get();

        $agents = $company->company_agents;

        $history = History::where('user_id', $company->id)->first();

        $history_ads = array();

        if ($history) {

            $history_ads = array();

            $ads_ids = json_decode($history->ads_ids);

            $ads_ids = array_reverse($ads_ids);

            foreach ($ads_ids as $id) {
                $ad = Ads::where('id', $id)->first();
                $ad ? array_push($history_ads, $ad) : '';
            }
        }

        $compare_ads = $company->getCompareList();

        $title = trans('lang.dashboard') . ' | ' . trans('lang.sakeny');

        // $company_package = array();
        // //        $company_package = PackagePayment::where('company_id', $company->id)->where('status', 1)->where('confirmed', 2)->get();
        // $company_package = PackagePayment::where(function ($query) use ($company) {
        //     // commented till fix packages
        //     $query->where('confirmed', 0);
        //     $query->orWhere('confirmed', 1);
        // })->where('company_id', $company->id)->where('status', 1)->first();
        // $packages = Package::active()->latest()->where('country_id', $country_id)->where('id', '!=', 21)->get();

        // $monthly_packages = Package::active()->latest()->where(['country_id' => $country_id, 'type' => 0])->where('id', '!=', 21)->get();
        // $quartely_packages = Package::active()->latest()->where(['country_id' => $country_id, 'type' => 1])->where('id', '!=', 21)->get();
        // $semi_annual_packages = Package::active()->latest()->where(['country_id' => $country_id, 'type' => 2])->where('id', '!=', 21)->get();
        // $annual_packages = Package::active()->latest()->where(['country_id' => $country_id, 'type' => 3])->where('id', '!=', 21)->get();
        $packages = $packageService->getActivePackages();

        return view('site.pages.dashboard', compact(
            'active_agents',
            'available_agents',
            'all_ads',
            'valid_active',
            'deactive_active',
            'expired_active',
            'premium_active',
            'premium',
            'premium_ads',
            'active_ads_data',
            'expired_ads_data',
            // 'repeated_ads_data',
            'favourites',
            'agents',
            'history_ads',
            'compare_ads',
            'title',
            'packages'
        ));
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = auth()->guard('user')->user();

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(trans('lang.wrong_old_password'))->withInput();
        }

        $user->update([
            'password' => bcrypt($request->password),
        ]);

        return back()->withMessage(trans('lang.password_changed'));
    }

    public function postAgent(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required|numeric|min:1|digits_between:1,11|unique:users',
            'image' => 'image|max:2048',
            'password' => 'required|min:8|confirmed'
        ]);

        $company_user = auth()->guard('user')->user();

        $company = $company_user->company;

        if ($company->number_of_agents == 0) {
            return back()->withErrors(trans('lang.company_cant_add_more_agents'))->withInput();
        }

        $company->decrement('number_of_agents');

        Agent::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $request->image,
            'type' => 3,
            'company_id' => $company_user->id,
            'password' => $request->password
        ]);

        return back()->withMessage(trans('lang.agent_added_successfully'));
    }

    public function editAgent($id, Request $request)
    {
        $company = auth()->guard('user')->user();

        $agent = Agent::where([
            'company_id' => $company->id,
            'id' => $id,
            'type' => 3
        ])->firstOrFail();

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'phone' => 'required|numeric|min:1|digits_between:1,11|unique:users,phone,' . $id,
        ]);

        if (isset($request->password)) {
            $this->validate($request, [
                'password' => 'required|min:8|confirmed'
            ]);

            $agent->update([
                'password' => $request->password
            ]);
        }

        $agent->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $request->image,
        ]);

        return back()->withMessage(trans('lang.agent_edited_successfully'));
    }

    public function deleteAgent($id)
    {
        $company = auth()->guard('user')->user();

        $agent = Agent::where([
            'company_id' => $company->id,
            'id' => $id,
            'type' => 3
        ])->firstOrFail();

        $ads = Ads::where([
            'owner_id' => $company->id,
            'agent_id' => $agent->id
        ])->get();

        foreach ($ads as $ad) {
            $ad->update([
                'agent_id' => null
            ]);
        }

        $agent->delete();

        return back()->withMessage(trans('lang.agent_deleted'));
    }

    public function getCreateAd($lang)
    {

        $company = auth()->guard('user')->user();

        $proprty_type_list = PropertyType::get(['name_en', 'name_ar', 'id']);
        $offer_type_list = OfferType::get();

        if (Session::get('country_id')) {
            $country_id = Session::get('country_id');
        } else {
            session(['country_id' => 1]);
            $country_id = 1;
        }

        $cities = City::active()->where('country_id', $country_id)->get();

        $amenities = Amenities::where('activation', 1)->get(['name_en', 'name_ar', 'id']);
        $level_of_finished = LevelOfFinished::where('activation', 1)->get(['name_en', 'name_ar', 'id']);
        $unit_view_list = UnitView::get(['name_en', 'name_ar', 'id']);

        $agents = $company->company_agents;

        $title = trans('lang.Add_ad') . ' | ' . trans('lang.sakeny');

        return view('site.pages.companyCreateAd', compact(
            'proprty_type_list',
            'level_of_finished',
            'amenities',
            'unit_view_list',
            'cities',
            'offer_type_list',
            'agents',
            'title'
        ));
    }

    public function postAd(Request $request, Ads $ad_model, AdsImage $adImage_model)
    {
        $this->validate($request, [
            'title' => 'required|max:250',
            'offer_type_id' => 'required|exists:offer_types,id',
            'property_type_id' => 'required|exists:property_types,id',
            'city_id' => 'required|exists:cities,id',
            'district_id' => 'required|exists:districts,id',
            'level_of_finished_id' => 'required|exists:level_of_finisheds,id',
            'price' => 'required|numeric|digits_between:1,10|min:1',
            'description' => 'required',
            'building_year' => 'required|date_format:Y',
            'size' => 'required|numeric|digits_between:1,10',
            'bedrooms_num' => 'required|numeric|min:0|max:8',
            'bathrooms_num' => 'required|numeric|min:0|max:8',
            'unit_view_id' => 'required|exists:unit_views,id',
            'amenities' => 'required|array|min:1',
            'images' => 'required|array|min:1',
            'price_negotiable' => 'required',
            'able_call' => 'required_without_all:able_chat,able_email',
            'able_chat' => 'required_without_all:able_email,able_call',
            'able_email' => 'required_without_all:able_chat,able_call',
            'type' => 'required|in:1,2,3,4'
        ]);

        if (isset($agent)) {
            $this->validate($request, [
                'agent' => 'required|exists:users,id'
            ]);
        }

        if (count($request->images) > 0) {
            $this->validate($request, $adImage_model->getCreateRules($request));
        }

        if (auth('user')->user()->type == 3) {
            $agent_user = auth()->guard('user')->user();
            $company_user = User::where('id', $agent_user->company_id)->firstOrFail();
            $company = $company_user->company;
            $agent_id = $agent_user->id;
            $owner_id = $company_user->id;
        } else {
            $company_user = auth()->guard('user')->user();
            $company = $company_user->company;
            $agent_id = isset($request->agent) && $request->agent != 'Agent' ? $request->agent : null;
            $owner_id = $company_user->id;
        }

        $subscription = $company->activesubscription;

        if (!$subscription) {
            return response()->json(['code' => 403, 'message' => trans('lang.you_need_to_subscribe')]);
        }

        if (!CanAddAd($subscription, $request->type)) {
            return response()->json(['code' => 403, 'message' => trans('lang.you_reach_max_ads_type')]);
        }

        $ad = new $ad_model;
        $ad->owner_id = $owner_id;
        $ad->agent_id = $agent_id;
        $ad->title = $request->title;
        $ad->offer_type_id = $request->offer_type_id;
        $ad->latitude = $request->latitude;
        $ad->longitude = $request->longitude;
        $ad->description = $request->description;
        $ad->size = $request->size;
        $ad->property_type_id = $request->property_type_id;
        $ad->bedrooms_num = $request->bedrooms_num;
        $ad->bathrooms_num = $request->bathrooms_num;
        $ad->city_id = $request->city_id;
        $ad->price = $request->price;
        $ad->amenitie_id = $request->amenities;
        $ad->country_id = Session::get('country_id');
        $ad->unit_view_id = $request->unit_view_id;
        $ad->price_negotiable = isset($request->price_negotiable) && $request->price_negotiable == 'negotiable' ? 1 : 0;
        $ad->district_id = $request->district_id;
        $ad->level_of_finished_id = $request->level_of_finished_id;
        $ad->building_year = $request->building_year;
        $ad->able_call = isset($request->able_call) ? 'true' : '';
        $ad->able_chat = isset($request->able_chat) ? 'true' : '';
        $ad->able_email = isset($request->able_email) ? 'true' : '';

        $ad->save();

        if (count($request->images) > 0) {
            foreach ($request->images as $image) {
                $adImage_model->addImageToAd($image, $ad->id);
            }
        }

        DecreaseAdsCounter($subscription, $request->type);

        return response()->json(['code' => 200, 'message' => trans('lang.ad_added_successfully')]);
    }

    public function getAgentAds($lang, $id)
    {
        $company = auth()->guard('user')->user();

        $agent = Agent::where([
            'company_id' => $company->id,
            'id' => $id,
            'type' => 3
        ])->firstOrFail();

        $ads = Ads::where([
            'owner_id' => $company->id,
            'agent_id' => $agent->id,
        ])->paginate(10);

        $title = trans('lang.ads') . ' | ' . trans('lang.sakeny');

        return view('site.pages.agentAds', compact('ads', 'agent', 'title'));
    }

    public function changeStatus($id)
    {
        $user = auth()->guard('user')->user();

        $ad = Ads::where([
            'owner_id' => $user->id,
            'id' => $id,
        ])->whereHas('owner', function ($query) {
            $query->where('activation', 1);
        })->firstOrFail();

        if ($ad->user_active == 0) {
            $ad->update([
                'user_active' => 1
            ]);
        } else {
            $ad->update([
                'user_active' => 0
            ]);
        }

        return back();
    }

    public function deassignAd($id)
    {
        $company = auth()->guard('user')->user();

        $ad = Ads::where([
            'owner_id' => $company->id,
            'id' => $id,
        ])->firstOrFail();

        $ad->update([
            'agent_id' => null,
        ]);

        return back()->withMessage(trans('lang.ad_deassign'));
    }

    public function getProfile($lang)
    {
        $user = auth()->guard('user')->user();

        $title = trans('lang.profile') . ' | ' . trans('lang.sakeny');

        return view('site.pages.companyProfile', compact('user', 'title'));
    }

    public function postProfile(Request $request)
    {
        $user = auth()->guard('user')->user();

        $this->validate($request, [
            'name' => 'required|max:200',
            'phone' => 'required|regex:/^\+?\d[0-9-]{9,12}/|numeric|unique:users,phone,' . $user->id,
        ]);

        if (isset($request->password)) {
            $this->validate($request, [
                'password' => 'required|min:8|confirmed',
            ]);
        }

        if (isset($request->image)) {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpg,png,jpeg',
            ]);
        }

        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);

        if (isset($request->password)) {
            $user->update([
                'password' => $request->password,
            ]);
        }

        if (isset($request->image)) {
            $user->update([
                'image' => $request->image,
            ]);
        }

        return back()->withMessaeg(trans('lang.profile_saved'));
    }

    public function getInbox($lang)
    {
        $user = auth()->guard('user')->user();

        $rooms = ChatRooms::WhereHas('ad', function ($query) use ($user) {
            $query->where('owner_id', $user->id)->where('agent_id', null);
        })->latest()->paginate(10);

        foreach ($rooms as $room) {
            $room['title_name'] = $room->user_id == $user->id ? $user->name : $room->getLastMessageAttribute()->sender->name;
        }

        $title = trans('lang.messaging') . ' | ' . trans('lang.sakeny');

        return view('site.pages.companyInbox', compact('rooms', 'title'));
    }

    public function getChatRoom($lang, $id)
    {
        $user = auth()->guard('user')->user();

        $room = ChatRooms::where([
            'id' => $id
        ])->where(function ($query) use ($user) {
            $query->WhereHas('ad', function ($query) use ($user) {
                $query->where('owner_id', $user->id)->where('agent_id', null);
            });
        })->firstOrFail();

        $messages = RoomMessages::where('chat_room_id', $room->id)->where('sender_id', '!=', $user->id)->get();


        foreach ($messages as $message) {
            $message->update([
                'seen' => 1
            ]);
        }

        $title = trans('lang.messaging') . ' | ' . trans('lang.sakeny');

        return view('site.pages.companyRoom', compact('room', 'title'));
    }

    public function postMessageToRoom($room_id, Request $request)
    {
        $this->validate($request, [
            'message' => 'required|max:4000',
        ]);

        $user = auth()->guard('user')->user();

        $room = ChatRooms::where([
            'id' => $room_id
        ])->where(function ($query) use ($user) {
            $query->WhereHas('ad', function ($query) use ($user) {
                $query->where('owner_id', $user->id)->where('agent_id', null);
            });
        })->firstOrFail();

        RoomMessages::create([
            'sender_id' => $user->id,
            'message' => $request->message,
            'chat_room_id' => $room->id,
        ]);

        return back();
    }

    public function getEditAd($lang, $id)
    {
        $user = auth()->guard('user')->user();

        if ($user->type == 3) {
            $user = User::where('id', $user->company_id)->firstOrFail();
        }

        $ad = Ads::whereHas('owner', function ($query) {
            $query->where('activation', 1);
        })->where('owner_id', $user->id)->where('id', $id)->firstOrFail();

        $proprty_type_list = PropertyType::get(['name_en', 'name_ar', 'id']);
        $offer_type_list = OfferType::get();

        if (Session::get('country_id')) {
            $country_id = Session::get('country_id');
        } else {
            session(['country_id' => 1]);
            $country_id = 1;
        }

        $cities = City::active()->where('country_id', $country_id)->get();
        $districts = District::Active()->where('city_id', $ad->city_id)->get();

        $amenities = Amenities::where('activation', 1)->get(['name_en', 'name_ar', 'id']);
        $level_of_finished = LevelOfFinished::where('activation', 1)->get(['name_en', 'name_ar', 'id']);
        $unit_view_list = UnitView::get(['name_en', 'name_ar', 'id']);

        $title = trans('lang.edit_advertise') . ' | ' . trans('lang.sakeny');

        $agents = $user->company_agents;

        return view('site.pages.companyEditAd', compact(
            'ad',
            'proprty_type_list',
            'level_of_finished',
            'amenities',
            'unit_view_list',
            'owner',
            'agent',
            'cities',
            'offer_type_list',
            'districts',
            'title',
            'agents'
        ));
    }

    public function postEditAd($id, Request $request, Ads $ad_model, AdsImageEditHistory $adImageHistory_model)
    {
        $authUser = auth()->guard('user')->user();

        if ($authUser->type == 3) {
            $company = User::where('id', $authUser->company_id)->firstOrFail();
        } else {
            $company = $authUser;
        }

        $ad = $ad_model->newQuery();
        $ad->whereHas('owner', function ($query) {
            $query->where('activation', 1);
        })->where('owner_id', $company->id)->where('id', $id);

        if ($authUser->type == 3) {
            $ad->where('agent_id', $authUser->id);
        }

        $ad = $ad->firstOrFail();

        $this->validate($request, [
            'title' => 'required|max:250',
            'offer_type_id' => 'required|exists:offer_types,id',
            'property_type_id' => 'required|exists:property_types,id',
            'city_id' => 'required|exists:cities,id',
            'district_id' => 'required|exists:districts,id',
            'level_of_finished_id' => 'required|exists:level_of_finisheds,id',
            'price' => 'required|numeric|digits_between:1,10|min:1',
            'description' => 'required',
            'building_year' => 'required|date_format:Y',
            'size' => 'required|numeric|digits_between:1,10',
            'bedrooms_num' => 'required|numeric|min:1|max:8',
            'bathrooms_num' => 'required|numeric|min:1|max:8',
            'unit_view_id' => 'required|exists:unit_views,id',
            'amenities' => 'required|array|min:1',
            'price_negotiable' => 'required',
            'able_call' => 'required_without_all:able_chat,able_email',
            'able_chat' => 'required_without_all:able_email,able_call',
            'able_email' => 'required_without_all:able_chat,able_call',
        ]);

        if (isset($request->images)) {
            if (count($request->images) > 0) {
                $this->validate($request, $adImageHistory_model->getCreateRules($request));
            }
        }

        // $ad->agent_id = isset($request->agent) && $request->agent != 'Agent' ? $request->agent : null;
        // $ad->save();

        $history = new AdsEditHistory;

        $history->title = $request->title;
        $history->ad_id = $ad->id;
        $history->offer_type_id = $request->offer_type_id;
        $history->latitude = $request->latitude;
        $history->longitude = $request->longitude;
        $history->description = $request->description;
        $history->size = $request->size;
        $history->expire_date = $ad->expire_date;
        $history->property_type_id = $request->property_type_id;
        $history->bedrooms_num = $request->bedrooms_num;
        $history->bathrooms_num = $request->bathrooms_num;
        $history->city_id = $request->city_id;
        $history->price = $request->price;
        $history->amenitie_id = $request->amenities;
        $history->country_id = Session::get('country_id');
        $history->unit_view_id = $request->unit_view_id;
        $ad->price_negotiable = isset($request->price_negotiable) && $request->price_negotiable == 'negotiable' ? 1 : 0;
        $history->district_id = $request->district_id;
        $history->level_of_finished_id = $request->level_of_finished_id;
        $history->building_year = $request->building_year;
        $history->able_call = isset($request->able_call) ? 'true' : '';
        $history->able_chat = isset($request->able_chat) ? 'true' : '';
        $history->able_email = isset($request->able_email) ? 'true' : '';
        $history->save();

        if (isset($request->images)) {
            if (count($request->images) > 0) {
                foreach ($request->images as $image) {
                    $adImageHistory_model->addImageToAd($image, $history->id);
                }
            }
        }

        if ($authUser->type == 3) {
            return redirect()->route('agent.my.ads', app()->getLocale())->withMessage(trans('lang.ad_edited_successfully'));
        }

        return redirect()->route('company.dashboard', app()->getLocale())->withMessage(trans('lang.ad_edited_successfully'));
    }

    public function Assign_add($id, Request $request, Ads $ad_model)
    {
        $ad = $ad_model->findOrFail($id);
        $ad->agent_id = $request->agent_id;
        $ad->save();
        return redirect()->back()->with('assign', 'assign');
    }

    public function package_subscribe($lang, $id, Request $request, Package $package_model)
    {
        $package = $package_model->findOrFail($id);
        $user = auth()->guard('user')->user();
        $company = Company::where('user_id', $user->id)->first();
        $company_packages = PackagePayment::where(function ($query) {
            $query->where('confirmed', 0);
            $query->orWhere('confirmed', 1);
        })->where('package_id', '!=',  21)->where('company_id', $user->id)->where('status', 1)->get();
        if ($company_packages->count() > 0) {
            return redirect()->back()->with('assign_package_error', 'assign_package_error');
        } else {
            PackagePayment::create([
                'package_id' => $id,
                'company_id' => $user->id,
                'status' => '1',
                'confirmed' => '0',
            ]);
            $email = "admin@admin.com";
            $subject = "Sakeny Company Package Subscription";
            Mail::send('emails.subscribe-admin', compact('package', 'company'), function ($mail) use ($email, $subject) {
                $mail->to($email);
                $mail->subject($subject);
            });
            return redirect()->back()->with('assign_package', 'assign_package');
        }
    }

    public function Repeat_add($id, Request $request, Ads $ad_model)
    {
        //        dd($id);
        $ad = $ad_model->findOrFail($id);
        $ad->repeated = 1;
        $ad->save();
        return redirect()->back()->with('ad_repeat', 'ad_repeat');
    }

    public function Repeat_add_all(Request $request, Ads $ad_model)
    {
        //        dd($request->all());
        //        dd($request->repeat_ids);
        $ads = $ad_model->whereIn('id', explode(",", $request->repeat_ids))->get();
        foreach ($ads as $ad) {
            $ad->repeated = 1;
            $ad->save();
        }
        return redirect()->back()->with('ad_repeat', 'ad_repeat');
    }

    public function Repeat_remove($id, Request $request, Ads $ad_model)
    {
        //        dd($id);
        $ad = $ad_model->findOrFail($id);
        $ad->repeated = 0;
        $ad->save();
        return redirect()->back()->with('ad_remove_repeat', 'ad_remove_repeat');
    }

    public function Special_add($id, Request $request, Ads $ad_model)
    {
        //        dd($id);
        $ad = $ad_model->findOrFail($id);
        $ad->is_premium = Carbon::now();
        $ad->save();
        return redirect()->back()->with('ad_special', 'ad_special');
    }

    public function Special_add_all(Request $request, Ads $ad_model)
    {
        //        dd($request->all());
        //        dd($request->repeat_ids);
        $ads = $ad_model->whereIn('id', explode(",", $request->special_ids))->get();
        foreach ($ads as $ad) {
            $ad->is_premium = Carbon::now();
            $ad->save();
        }
        return redirect()->back()->with('ad_special', 'ad_special');
    }

    public function Special_remove($id, Request $request, Ads $ad_model)
    {
        //        dd($id);
        $ad = $ad_model->findOrFail($id);
        $ad->is_premium = NULL;
        $ad->save();
        return redirect()->back()->with('ad_remove_special', 'ad_remove_special');
    }
}
