<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\ProjectContact;
use Mail;
use App\Models\Ads;
use App\Models\Blog;
use App\Models\City;
use App\Models\User;
use App\Models\Banner;
use App\Models\Company;
use App\Models\Country;
use App\Models\Package;
use App\Models\Project;
use App\Models\Reports;
use App\Models\Settings;
use App\Models\UnitView;
use App\Models\Amenities;
use App\Models\ContactUs;
use App\Models\Developer;
use App\Models\OfferType;
use App\Models\CompareAds;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Models\SearchHistory;
use App\Models\LevelOfFinished;
use App\Models\LifeStyleCategory;
use App\Models\AdsPaymentsApprovals;
use App\Http\Controllers\Api\BaseController;

class ApplicationController extends BaseController
{
    function __construct()
    {
        parent::__construct();
    }


    public function getMetaData()
    {
        $setting = Settings::first();
        return $this->response(compact('setting'));
    }

    public function getCountries()
    {
        $countries = Country::where('activation',1)->with('cities')->get();
        return $this->response(compact('countries'));

    }

    public function getHome()
    {
        $cities_insights = City::active()
                            ->where('is_home',1)
                            ->where(request(['country_id']))
                            ->withCount('ads')->get();

        $companies_query = Company::whereHas('user', function($query){
            return $query->active();
        });
        if (request('country_id')) {
            $companies_query = $companies_query->where(request(['country_id']));
        }
        if (request('locale') == 'en') {
            $offer_type_list = OfferType::pluck('title_en', 'id');
        }else {
            $offer_type_list = OfferType::pluck('title_ar', 'id');
        }
        $property_type_list = PropertyType::where('activation', 1)->latest()->get();
        $level_of_finished = LevelOfFinished::where('activation', 1)->get(['name_en','name_ar', 'id']);
        $amenities = Amenities::where('activation', 1)->get(['name_en','name_ar', 'id']);

        /*$price_lists = [
            0=>'100-10000',
            1=>'10000-30000',
            2=>'30000-50000',
            3=>'50000-100000',
            4=>'1000000+',
        ];
*/
        $search_data = [
            'offer_type_list'=>$offer_type_list,
            'property_type_list'=>$property_type_list,
            'level_of_finished'=>$level_of_finished,
            'amenities'=>$amenities,
        ];

        $companies_section = [
            'companies'=>$companies_query->latest()->where('view_in_front',1)->get(),
            'count'=>$companies_query->count()
        ];

        $latest_ads = Ads::Valid()->active()
                        ->inRandomOrder()
                        ->where(request(['country_id']))
                        ->limit(6)
                        ->get();
        $projects = Project::active()
        ->where(request(['country_id']))
        ->where('view_in_front',1)->get();

        return $this->response(compact('cities_insights', 'companies_section', 'projects','search_data','latest_ads'));
    }


    public function getPackages()
    {
        $all = Package::active()->latest()->get();
        $packages = $all->groupBy('country_id');
        return $this->response(compact('packages'));
    }

    public function bumpUpUpdate()
    {
        $ads = Ads::Valid()->active()->get();
        foreach ($ads as $key => $ad) {
            if ($ad->is_bump_up != null) {
                $now  = strtotime("now");
                $bump_up  = strtotime($ad->is_bump_up);
                  if($now > $bump_up)
                   {
                    $diff = $now - $bump_up;
                    $hours = $diff / ( 60 * 60 );
                        if ($hours >= 24) {
                            $ad->updateAdToBumpUp();
                        }
                   }
            }
        }
    }

    public function getSearchAds()
    {
        $this->bumpUpUpdate();
        $search = request('search');
        $ads = Ads::active()->BusinessOrder()->Valid();
        if ($search) {
            $ads = $ads->where(function($query) use($search){
                return $query->where('title', "LIKE", "%{$search}%")
                        ->orWhereHas('city', function($query) use($search){
                            return $query->where('name_ar', "LIKE", "%{$search}%")
                                    ->orWhere('name_en', "LIKE", "%{$search}%");
                        });
            });
        }
        if (request('offer_type_id')) {
            $ads = $ads->where('offer_type_id', request('offer_type_id'));
        }
        if (request('property_type_id')) {
            $ads = $ads->where('property_type_id', request('property_type_id'));
        }
        if (request('level_of_finished_id')) {
            $ads = $ads->where('level_of_finished_id', request('level_of_finished_id'));
        }
        if (request('amenitie_id')) {
            $ads = $ads->where('amenitie_id', request('amenitie_id'));
        }

        if (request('max_price') && request('min_price') ) {
            $ads = $ads->where(function($query){
                $query->where('price','>=',request('min_price'))
                    ->where('price','<=',request('max_price'));
            });
        }

        if (request('min_bedrooms_num') && request('max_bedrooms_num')) {
            $ads = $ads->where(function($query){
                $query->where('bedrooms_num','>=',request('min_bedrooms_num'))
                    ->where('bedrooms_num','<=',request('max_bedrooms_num'));
            });
        }
        if (request('min_size') && request('max_size')) {
            $ads = $ads->where(function($query){
                $query->where('size','>=',request('min_size'))
                    ->where('size','<=',request('max_size'));
            });
        }

        if (request('city_id')) {
            $ads = $ads->where('city_id', request('city_id'));
        }
        if (request('country_id')) {
            $ads = $ads->where('country_id', request('country_id'));
        }

        if (request('bathrooms_num')) {
            $ads = $ads->where('bathrooms_num', request('bathrooms_num'));
        }

        if (request('finishing_level')) {
            $ads = $ads->where('finishing_level', request('finishing_level'));
        }

        if (request('latitude') && request('longitude')) {
            $ads = $ads->where(function($query){
                $max_distance = 200;
                $lat_small = request('latitude') - ($max_distance * 0.018);
                $lat_large = request('latitude') + ($max_distance * 0.018);
                $lng_small = request('longitude') - ($max_distance *0.018);
                $lng_large = request('longitude') + ($max_distance *0.018);
                $query->whereBetween('latitude', [$lat_small, $lat_large])
                    ->whereBetween('longitude', [$lng_small, $lng_large]);
            });
        }
        $ads = $ads->paginate(20);
        return $this->response(['data'=>$ads]);
    }


    /*public function getSearchAds()
    {
        $search = request('search');
        $ads = Ads::Valid()->active()->BusinessOrder();

        if ($search) {
            $ads = $ads->where(function($query) use($search){
                return $query->where('title', "LIKE", "%{$search}%")
                        ->whereHas('city', function($query) use($search){
                            return $query->where('name_ar', "LIKE", "%{$search}%")
                                    ->where('name_en', "LIKE", "%{$search}%");
                        });
            });
        }
        if (request('offer_type_id')) {
            $ads->where('offer_type_id', request('offer_type_id'));
        }

        if (request('max_price') && request('min_price') ) {
            $query->where(function($query){
                $query->where('price','>',request('min_price'))
                    ->where('price','<',request('max_price'));
            });
        }

        if (request('city_id')) {
            $ads = $ads->where('city_id', request('city_id'));
        }
        if (request('country_id')) {
            $ads = $ads->where('country_id', request('country_id'));
        }

        if (request('bedrooms_num')) {
            $ads = $ads->where('bedrooms_num', request('bedrooms_num'));
        }

        if (request('bathrooms_num')) {
            $ads = $ads->where('bathrooms_num', request('bathrooms_num'));
        }

        if (request('finishing_level')) {
            $ads = $ads->where('finishing_level', request('finishing_level'));
        }


        $ads = $ads->paginate(20);

        return $this->response(['data'=>$ads]);
    }
    */


    public function getAd($id)
    {
        $ads = new Ads;
        $ad = $ads->find($id);

        if (!$ad) {
            return $this->response(['message'=>'Item not found'],404);
        }
        $ad->increment('views');

        $ads_for_same_user = Ads::where(function($query) use($ad) {
            return $query->where('owner_id',$ad->owner_id)
                        ->where('agent_id',$ad->agent_id);
        })
            ->Valid()->active()
            ->where('id','!=',$id)
            ->take(3)->latest()->get();

        $similar_ads = Ads::valid()->active()->where(['offer_type_id'=>$ad->offer_type_id,
                    'property_type_id'=>$ad->property_type_id,
                    'unit_view_id'=>$ad->unit_view_id])
            ->where('id','!=',$id)
            ->take(3)
            ->latest()->get();
        return $this->response(compact('ad', 'ads_for_same_user','similar_ads'));

    }


    public function getFavourite()
    {
        $favourites =  $this->auth->favourite()->paginate(20);
        return $this->response(compact('favourites'));
    }

    /**
     * Get Blog
     */
    public function getBlog()
    {
        $rows = Blog::latest()->select('id', 'title_ar', 'title_en', 'content_ar', 'content_en', 'image')->paginate(10);
        return $this->response(['data' => $rows]);
    }

    public function getBlogById($id)
    {
        $row = Blog::select('id', 'title_ar', 'title_en', 'content_ar', 'content_en', 'image', 'views')->find($id);
        $row->increment('views');
        return $this->response(['data' => $row]);
    }

    public function getLifeStyle()
    {
        $rows = LifeStyleCategory::with('lifestyle')->get();
        return $this->response(['data' => $rows]);
    }

    /**
     * Get user action
     */

    public function postReport()
    {
        $this->validator([
            'ad_id'=>'required',
            'reason'=>'required',
        ]);

        $auth = $this->auth;
        Reports::create([
            'ad_id' => request('ad_id'),
            'user_id' => $auth->id,
            'reason' => request('reason')
        ]);

        return $this->response(['status'=>true]);
    }

    public function postFavourite()
    {
        $auth = $this->auth;
        $isFaved = $auth->favourite()->find(request('ad_id'));
        if ($isFaved) {
            $sync = $auth->favourite()->detach(request('ad_id'));
        }else {
            $sync = $auth->favourite()->attach(request('ad_id'));
        }
        // return $sync;
        return $this->response(['status'=>!(bool)$sync]);
    }


    public function postContactUs()
    {
        $this->validator([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'message'=>'required',
        ]);

        ContactUs::create(request()->all());

        return $this->response(['status'=>true]);
    }


    public function getAdsByCompanyId($company_id)
    {
        $company = User::active()
                    ->with('company')
                    ->find($company_id);
        $ads = Ads::Valid()->active()->where('owner_id', $company_id)->paginate(20);
        return $this->response(['ads' =>$ads, 'company' => $company]);
    }

    public function getAdsByCityId($city_id)
    {
        $city = City::active()->find($city_id);
        $ads = Ads::Valid()->active()->where('city_id', $city_id)->paginate(20);
        return $this->response(['ads' =>$ads]);
    }

    public function getAdsByAgentId($agent_id)
    {
        $ads = Ads::Valid()->active()->where('agent_id', $agent_id)->paginate(20);
        return $this->response(['ads' =>$ads]);
    }


    public function getAdsList()
    {
        $ads_list = collect(json_decode(request('ads'), true))->toArray();
        $ads = Ads::whereIn('id', $ads_list)->get();
        // $ads = Ads::Valid()->active()->whereIn('id', $ads_list)->get();
        return $this->response(['ads' =>$ads]);
    }


    public function getProjects($lang)
    {
        $developers = Developer::Developer()->active()->get(['id', 'name']);
        $projects   = Project::latest()->Active();
        if (request('country_id')) {
            $projects = $projects->where(request(['country_id']));
        }
        if (request('city_id')) {
            $projects = $projects->where('city_id', request('city_id'));
        }
        if (request('developer_id')) {
            $projects = $projects->where(request(['developer_id']));
        }

        $projects = $projects->paginate(20);
        return $this->response(compact('projects', 'developers'));
    }

    public function getProject($id)
    {
        $ProjectModule = new Project;
        $project = $ProjectModule->find($id);
        $similar_projects = $ProjectModule->active()
                                ->where('country_id', $project->country_id)
                                ->latest()->limit(4)->get();
        return $this->response(compact('project', 'similar_projects'));
    }

    public function sendMailToProject($id)
    {
        $ProjectModule = new Project;
        $project = $ProjectModule->find($id);

        $this->validator([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
        ]);

        $email = request('email');
        $phone = request('phone');
        $name = request('name');
        $emailTo = $project->email != null ? $project->email : "info@sakeny.com";

        ProjectContact::create([
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'project_id' => $project->id,
        ]);

        Mail::send('emails.request-call', compact('email', 'phone', 'name'), function ($mail) use ($project, $name, $emailTo) {
            $mail->from(env('MAIL_USERNAME'), env('APP_NAME'));
            $mail->to($emailTo);
            $mail->subject("New request by {$name} on {$project->title_en} project - sakeny");
        });

        return $this->response(['status'=>true]);
    }

    public function sendEmail() {
        $this->validator([
            'body'=>'required',
            'subject'=>'required',
            'from'=>'required',
            'to'=>'required',
        ]);

        Mail::raw(request('body'), function($message)
        {
            $message->from(request('from'), request('subject'));
            $message->subject(request('subject'));
            $message->to(request('to'));
        });

        return $this->response(['status'=>true]);
    }

    public function attachVideo($id) {
        $ad = Ads::find($id);

        $this->validator([
            'video' => 'required|mimes:mp4,3gp,avi',
        ]);

        $video = request()->file('video')->store('s3');
        $ad->update(['video' => $video]);

        return $this->response(['data' => $ad]);

    }

    public function saveSearch()
    {
        $this->validator([
            'user_id'=>'required',
            'link'=>'required',
        ]);
        SearchHistory::create(request()->all());
        return $this->response(['status'=>true]);
    }

    public function savedSearchList()
    {
        $search_history =  $this->auth->searchHistory()->paginate(20);
        return $this->response(compact('search_history'));
    }

    public function saveCompareAds()
    {
        $this->validator([
            'user_id'=>'required',
            'title'=>'required',
            'ads_ids'=>'required',
        ]);
        CompareAds::create(request()->all());
        return $this->response(['status'=>true]);
    }

    public function savedCompareAdsList()
    {
        $compare_ads =  $this->auth->compareAds()->paginate(20);
        return $this->response(compact('compare_ads'));
    }

    public function getBanners()
    {
        // $Middle = Banner::where(request(['country_id','city_id','page']) + ['place'=>2])->inRandomOrder()->limit(2)->get();
        // $RightSide = Banner::where(request(['country_id','city_id','page']) + ['place'=>2])->inRandomOrder()->limit(1)->get();
        // $LeftSide = Banner::where(request(['country_id','city_id','page']) + ['place'=>2])->inRandomOrder()->limit(1)->get();
        $req = [];
        if (request('country_id'))
            array_push($req,"country_id");

        if (request('city_id'))
            array_push($req,"city_id");

        if (request('page'))
            array_push($req,"page");

        $Head = Banner::where(request($req));
        $Middle = Banner::where(request($req));
        $RightSide = Banner::where(request($req));
        $LeftSide = Banner::where(request($req));

        $Head = $Head->Head()->get();
        $Middle = $Middle->Middle()->get();
        $RightSide = $RightSide->RightSide()->get();
        $LeftSide = $LeftSide->LeftSide()->get();
        return $this->response(compact('Head','Middle','RightSide','LeftSide'));
    }


}
