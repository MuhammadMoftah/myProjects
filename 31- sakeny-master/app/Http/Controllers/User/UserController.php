<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssignPhoneRequest;
use App\Http\Requests\SendMessageForProjectRequest;
use App\Models\AdFavourite;
use App\Models\Ads;
use App\Models\AdsEditHistory;
use App\Models\AdsImage;
use App\Models\AdsImageEditHistory;
use App\Models\Amenities;
use App\Models\Banner;
use App\Models\Chat\ChatRooms;
use App\Models\Chat\RoomMessages;
use App\Models\City;
use App\Models\Company;
use App\Models\CompareAds;
use App\Models\ContactUs;
use App\Models\Country;
use App\Models\Developer;
use App\Models\District;
use App\Models\HeaderImage;
use App\Models\History;
use App\Models\HomeBanner;
use App\Models\LevelOfFinished;
use App\Models\OfferType;
use App\Models\Package;
use App\Models\PackagePayment;
use App\Models\Project;
use App\Models\ProjectContact;
use App\Models\PropertyType;
use App\Models\Reports;
use App\Models\UnitView;
use App\Models\User;
use App\Models\Video;
use App\Services\PackageService;
use App\Services\SubscriptionService;
use Auth;
use DB;
use Hash;
use Illuminate\Http\Request;
use Mail;
use Session;
use Socialite;

class UserController extends Controller
{

    public function sendMail($email, $subject, $content)
    {
        Mail::raw($content, function ($message) use ($email, $subject, $content) {
            //            $message->from(env('MAIL_USERNAME'), env('APP_NAME'));
            $message->to($email);
            $message->subject($subject);
        });
    }

    // public function changeLang($lang)
    // {
    //     session()->put('locale', $lang);

    //     $prev_url = url()->previous();
    //     $prev_url = str_replace("/en", '/' . $lang, $prev_url);
    //     $prev_url = str_replace("/ar", '/' . $lang, $prev_url);

    //     return redirect($prev_url);
    // }

    // public function contactUs() {
    //     $title = trans('lang.Contactus');
    //     return view("site.pages.contactUs", compact('title'));
    // }

    public function changeLang($lang)
    {
        // change codition for lang ar , en only
        if ($lang == 'ar' || $lang == 'en') {
            app()->setLocale($lang);
            session()->put('locale', $lang);
            \LaravelLocalization::setLocale($lang);
            $url = \LaravelLocalization::getLocalizedURL(app()->getLocale(), url()->previous());
            return redirect($url);
        }
        return redirect()->back();
    }

    public function changeCountry($country_id)
    {
        $country = Country::findOrFail($country_id);
        session()->put('country_id', $country->id);
        $url = \LaravelLocalization::getLocalizedURL(app()->getLocale(), route('user.index'));
        return redirect($url);
    }

    public function getIndex()
    {
        if (Session::get('country_id')) {
            $country_id = Session::get('country_id');
        } else {
            session(['country_id' => 1]);
            $country_id = 1;
        }

        $cities = cache()->remember('cities', env('CACHE_EXPIRE'), function () use ($country_id) {
            return City::active()->where('country_id', $country_id)->get(['name_en', 'name_ar', 'id']);
        });

        $offer_type_list = cache()->remember('offer_types', env('CACHE_EXPIRE'), function () {
            return OfferType::get();
        });

        $property_type_list = cache()->remember('property_type_list', env('CACHE_EXPIRE'), function () {
            return PropertyType::where('activation', 1)->latest()->get();
        });

        $level_of_finished = cache()->remember('level_of_finished', env('CACHE_EXPIRE'), function () {
            return LevelOfFinished::where('activation', 1)->get(['name_en', 'name_ar', 'id']);
        });

        $amenities = cache()->remember('amenities', env('CACHE_EXPIRE'), function () {
            return Amenities::where('activation', 1)->get(['name_en', 'name_ar', 'id']);
        });

        $search_data = [
            'offer_type_list' => $offer_type_list,
            'property_type_list' => $property_type_list,
            'level_of_finished' => $level_of_finished,
            'amenities' => $amenities,
        ];

        $developers = cache()->remember('developers', env('CACHE_EXPIRE'), function () {
            return Developer::Developer()->whereHas('projects', function ($query) {
                $query->where('country_id', Session::get('country_id'));
            })->active()->where('show_in_front', 1)->get(['name', 'image']);
        });

        $developers_count = $developers->count();

        $developers_section = [
            'developers' => $developers,
            'count' => $developers_count,
        ];

        $latest_ads = cache()->remember('latest_ads', env('CACHE_EXPIRE'), function () use ($country_id) {
            return Ads::with('country', 'city', 'images', 'offer_type')->Valid()->BusinessOrder()->active()
                ->whereHas('owner', function ($query) {
                    $query->where('activation', 1);
                })->where('country_id', $country_id)->limit(21)->get(['id', 'title', 'price', 'offer_type_id', 'city_id', 'country_id']);
        });

        $projects = cache()->remember('projects', env('CACHE_EXPIRE'), function () use ($country_id) {
            return Project::with('district', 'images')->orderBy('feature', 'Desc')->active()
                ->where('country_id', $country_id)
                ->where('view_in_front', 1)->latest()->limit(21)->get(['id', 'title_en', 'title_ar', 'district_id', 'description_en', 'longitude', 'latitude']);
        });

        $cover_image = cache()->remember('headerImage', env('CACHE_EXPIRE'), function () use ($country_id) {
            return HeaderImage::where('active', 1)->first();
        });

        $videos = cache()->remember('videos', env('CACHE_EXPIRE'), function () use ($country_id) {
            return Video::where('active', 1)->latest()->get();
        });

        $title = trans('lang.sakeny');

        $first_right_ad = cache()->remember('first_right_ad', env('CACHE_EXPIRE'), function () {
            return HomeBanner::where('type', 'first_right_ad')->where('active', 1)->first();
        });
        $first_left_ad = cache()->remember('first_left_ad', env('CACHE_EXPIRE'), function () {
            return HomeBanner::where('type', 'first_left_ad')->where('active', 1)->first();
        });

        $second_right_ad = cache()->remember('second_right_ad', env('CACHE_EXPIRE'), function () {
            return HomeBanner::where('type', 'second_right_ad')->where('active', 1)->first();
        });
        $second_left_ad = cache()->remember('second_left_ad', env('CACHE_EXPIRE'), function () {
            return HomeBanner::where('type', 'second_left_ad')->where('active', 1)->first();
        });

        $third_right_ad = cache()->remember('third_right_ad', env('CACHE_EXPIRE'), function () {
            return HomeBanner::where('type', 'third_right_ad')->where('active', 1)->first();
        });
        $third_left_ad = cache()->remember('third_left_ad', env('CACHE_EXPIRE'), function () {
            return HomeBanner::where('type', 'third_left_ad')->where('active', 1)->first();
        });

        $top_of_site_ad = cache()->remember('top_of_site_ad', env('CACHE_EXPIRE'), function () {
            return HomeBanner::where('type', 'top_of_site')->where('active', 1)->first();
        });
        $bottom_of_site_ad = cache()->remember('bottom_of_site_ad', env('CACHE_EXPIRE'), function () {
            return HomeBanner::where('type', 'bottom_of_site')->where('active', 1)->first();
        });

        return view('site.pages.index', compact(
            'cover_image',
            'search_data',
            'developers_section',
            'latest_ads',
            'projects',
            'cities',
            'videos',
            'title',
            'first_right_ad',
            'first_left_ad',
            'second_left_ad',
            'second_right_ad',
            'third_left_ad',
            'third_right_ad',
            'top_of_site_ad',
            'bottom_of_site_ad'
        ));
    }

    public function getDistricts($lang, $city_id)
    {
        $districts = District::Active()->where('city_id', $city_id)->get();
        $selected_districts = '';
        $selected_districts = $selected_districts . '<option value="">' . trans('lang.select district') . '</option>';

        foreach ($districts as $dictrict) {
            $name = app()->getLocale() == 'en' ? $dictrict->name_en : $dictrict->name_ar;
            $selected_districts = $selected_districts . '<option value="' . $dictrict->id . '">' . $name . '</option>';
        }

        return $selected_districts;
    }

    public function bumpUpUpdate()
    {
        $ads = Ads::Valid()->active()->get();
        foreach ($ads as $key => $ad) {
            if ($ad->is_bump_up != null) {
                $now = strtotime("now");
                $bump_up = strtotime($ad->is_bump_up);
                if ($now > $bump_up) {
                    $diff = $now - $bump_up;
                    $hours = $diff / (60 * 60);
                    if ($hours >= 24) {
                        $ad->updateAdToBumpUp();
                    }
                }
            }
        }
    }

    public function search()
    {
        $this->bumpUpUpdate();

        if (Session::get('country_id')) {
            $country_id = Session::get('country_id');
        } else {
            session(['country_id' => 1]);
            $country_id = 1;
        }

        $cities = City::active()->where('country_id', $country_id)->get();

        $offer_type_list = OfferType::get();
        $property_type_list = PropertyType::where('activation', 1)->latest()->get();

        $search_data = [
            'offer_type_list' => $offer_type_list,
            'property_type_list' => $property_type_list,
        ];

        $ads = Ads::active()->BusinessOrder()->Valid()->where('country_id', $country_id)->whereHas('owner', function ($query) {
            $query->where('activation', 1);
        });

        if (request('search')) {
            $keyword = request('search');
            $ads = $ads->where(function ($query) use ($keyword) {
                $query->where('title', 'LIKE', '%' . $keyword . '%')->orWhere('description', 'LIKE', '%' . $keyword . '%')
                    ->orWhere(function ($query) use ($keyword) {
                        $query->whereHas('owner', function ($query) use ($keyword) {
                            $query->where('name', 'LIKE', '%' . $keyword . '%');
                        })->orWhereHas('agent', function ($query) use ($keyword) {
                            $query->where('name', 'LIKE', '%' . $keyword . '%');
                        });
                    });
            });
        }

        if (request('offer_type_id')) {
            $ads = $ads->where('offer_type_id', request('offer_type_id'));
        }

        if (request('property_type_id')) {
            $ads = $ads->where('property_type_id', request('property_type_id'));
        }

        if (request('max_price')) {
            $ads = $ads->where(function ($query) {
                $query->where('price', '<=', request('max_price'));
            });
        }

        if (request('min_price')) {
            $ads = $ads->where(function ($query) {
                $query->where('price', '>=', request('min_price'));
            });
        }

        if (request('min_bedrooms_num')) {
            $ads = $ads->where(function ($query) {
                $query->where('bedrooms_num', '>=', request('min_bedrooms_num'));
            });
        }
        if (request('max_bedrooms_num')) {
            $ads = $ads->where(function ($query) {
                $query->where('bedrooms_num', '<=', request('max_bedrooms_num'));
            });
        }
        if (request('min_size')) {
            $ads = $ads->where(function ($query) {
                $query->where('size', '>=', request('min_size'));
            });
        }
        if (request('max_size')) {
            $ads = $ads->where(function ($query) {
                $query->where('size', '<=', request('max_size'));
            });
        }

        if (request('city_id')) {
            $ads = $ads->where('city_id', request('city_id'));
        }

        if (request('district_id')) {
            $ads = $ads->where('district_id', request('district_id'));
        }

        if (request('lat') && request('lng')) {
            $lat = request('lat');
            $lng = request('lng');
            $distance = 50.3495983457;
            $ads->where([
                ['latitude', '!=', $lat],
                ['longitude', '!=', $lng],
            ])->whereRaw(
                DB::raw("(3959 * acos( cos( radians($lat) ) * cos( radians( latitude ) )  *
                                      cos( radians( longitude ) - radians($lng) ) + sin( radians($lat) ) * sin(
                                      radians( latitude ) ) ) ) < $distance ")
            );
        }

        $ads = $ads->paginate(12);

        foreach ($ads as $ad) {
            $ad->increment('search');
        }

        $cover_image = HeaderImage::where('active', 1)->first();

        $Head = Banner::where('country_id', $country_id);
        $Middle = Banner::where('country_id', $country_id);
        $RightSide = Banner::where('country_id', $country_id);
        $LeftSide = Banner::where('country_id', $country_id);

        $Head = $Head->Head()->first();
        $Middle = $Middle->Middle()->first();
        $RightSide = $RightSide->RightSide()->first();
        $LeftSide = $LeftSide->LeftSide()->first();

        $title = trans('lang.ads') . ' | ' . trans('lang.sakeny');
        //        \LaravelFacebookPixel::createEvent('FindLocation', $parameters = []);
        //        \LaravelFacebookPixel::createEvent('Search', $parameters = []);
        return view('site.pages.search', compact(
            'cover_image',
            'ads',
            'cities',
            'search_data',
            'Middle',
            'RightSide',
            'LeftSide',
            'title'
        ));
    }

    public function getProjects()
    {
        if (Session::get('country_id')) {
            $country_id = Session::get('country_id');
        } else {
            session(['country_id' => 1]);
            $country_id = 1;
        }

        $developers = Developer::Developer()->whereHas('projects', function ($query) {
            $query->where('country_id', Session::get('country_id'));
        })->active()->get(['id', 'name']);

        $cities = City::active()->where('country_id', $country_id)->get();

        $districts = District::active()->where('country_id', $country_id)->get();

        $projects = Project::orderBy('feature', 'Desc')->Active();

        $projects = $projects->where('country_id', $country_id);

        if (request('city_id')) {
            $districts = District::active()->where(['country_id' => $country_id, 'city_id' => request('city_id')])->get();

            $projects = $projects->where('city_id', request('city_id'));
        }

        if (request('developer_id')) {
            $projects = $projects->where(request(['developer_id']));
        }

        if (request('district_id')) {
            $projects = $projects->where(request(['district_id']));
        }

        $projects = $projects->latest()->paginate(12);

        $title = trans('lang.projects') . ' | ' . trans('lang.sakeny');

        return view('site.pages.projects', compact('projects', 'developers', 'districts', 'cities', 'title'));
    }

    public function getAboutUs() // lang

    {
        $title = trans('lang.aboutus') . ' | ' . trans('lang.sakeny');

        return view('site.pages.aboutus', compact('title'));
    }

    public function getThankYou()
    {
        $title = trans('lang.thankyou');

        return view('site.pages.thank', compact('title'));
    }

    public function getTerms($lang)
    {
        $title = trans('lang.Terms & Conditions') . ' | ' . trans('lang.sakeny');

        return view('site.pages.terms', compact('title'));
    }

    public function getSingleProject($lang, $id, $project_title)
    {
        $ProjectModule = new Project;
        $project = $ProjectModule->findOrFail($id);
        $similar_projects = $ProjectModule->active()
            ->where([
                // 'country_id' => $project->country_id,
                'district_id' => $project->district_id,
            ])
            ->latest()->limit(6)->get();

        if (count($similar_projects) < 6) {
            $remain_number = 6 - count($similar_projects);

            $remain_projects = $ProjectModule->active()
                ->where([
                    'city_id' => $project->city_id,
                ])
                ->latest()->limit($remain_number)->get();

            $similar_projects = $similar_projects->merge($remain_projects);
        }

        if (app()->getLocale() == 'en') {
            $project_name = $project->title_en;
        } else {
            $project_name = $project->title_ar;
        }

        $title = $project_name . ' | ' . trans('lang.sakeny');
        //        \LaravelFacebookPixel::createEvent('ViewContent', $parameters = []);
        return view('site.pages.singleProject', compact('project', 'similar_projects', 'title'));
    }

    public function shareProject($provider, $id)
    {
        $project = new Project;
        $project = $project->findOrFail($id);
        $shareLink = $project->getShareLink($provider);
        return redirect($shareLink);
    }

    public function sendMailToProject(Request $request, $id)
    {
        $ProjectModule = new Project;
        $project = $ProjectModule->findOrFail($id);

        $this->validate($request, [
            'message' => 'required|max:4000',
        ]);

        $user = auth()->guard('user')->user();

        $email = $user->email;
        $phone = $user->phone;
        $name = $user->name;
        $user_message = request('message');
        $emailTo = $project->email != null ? $project->email : "info@sakeny.com";

        ProjectContact::create([
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'message' => $user_message,
            'project_id' => $project->id,
        ]);

        Mail::send('emails.request-call', compact('email', 'phone', 'name', 'user_message'), function ($mail) use ($project, $name, $emailTo) {
            //            $mail->from(env('MAIL_USERNAME'), env('APP_NAME'));
            $mail->to($emailTo);
            $mail->subject("New request by {$name} on {$project->title_en} project - sakeny");
        });

        return back()->withMessage(trans('lang.message_done'));
    }

    public function sendEmail(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:200',
            'email' => 'required|email|max:254',
            'phone' => 'required|numeric|min:1|digits_between:1,11',
            'message' => 'required|max:4000',
        ]);

        ContactUs::create(request()->all());

        return back()->withMessage(trans('lang.message_done'));
    }

    public function getCompanyStats($lang)
    {
        if (Session::get('country_id')) {
            $country_id = Session::get('country_id');
        } else {
            session(['country_id' => 1]);
            $country_id = 1;
        }

        $companies_query = Company::whereHas('user', function ($query) {
            return $query->active();
        });

        if ($country_id) {
            $companies_query = $companies_query->where('country_id', $country_id);
        }

        $companies = $companies_query->latest()->where('view_in_front', 1)->get();
        $count = $companies_query->count();

        return view('site.pages.companyStats', compact('companies', 'count', 'units_count'));
    }

    public function getCompanyRegister()
    {
        $title = trans('lang.register') . ' | ' . trans('lang.sakeny');

        return view('site.pages.companyRegister', compact('title'));
    }

    public function postCompanyRegister(Request $request)
    {
        $rules = [
            'email' => 'required|email|unique:users|unique:admins',
            'phone' => 'required|regex:/^\+?\d[0-9-]{9,12}/|numeric|unique:users',
            'password' => 'required|min:8|max:254|confirmed',
            'name' => 'required|max:255',
            'registered_name' => 'required|max:255',
            'description' => 'required|max:4000',
            'cr_number' => 'required|numeric|digits_between:1,10',
            'city' => 'required|max:200',
            'country_id' => 'required|exists:countries,id',
            'num_agents' => 'required|numeric|min:1|digits_between:1,10',
            'zip_code' => 'required|numeric|digits_between:1,5',
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'terms_condition' => 'required',
        ];

        if ($request->hasFile('cr_number_file')) {
            $rules['cr_number_file'] = 'required|mimes:pdf,png,jpg,jpeg,docx,doc|max:6144';
        }

        $this->validate($request, $rules);

        // $activation = rand(1000, 9999);

        # create new user
        $user = User::create(
            request(['name', 'email', 'phone']) +
                [
                    'activation' => 0,
                    'type' => 2,
                    'image' => request('logo'),
                    'password' => request('password'),
                ]
        );

        $package = Package::findOrFail(21);

        $number_of_premium_ads = $package->number_of_premium_ads;
        $number_of_regular_ads = $package->number_of_regular_ads;
        $number_of_agents = request('num_agents');
        $number_of_repost = $package->number_of_repost_ads;

        if (request('package_id')) {
            $package = Package::find(request('package_id'));
            if ($package) {
                $number_of_premium_ads = $package->number_of_premium_ads;
                $number_of_regular_ads = $package->number_of_regular_ads;
                $number_of_agents = $package->number_of_agents;
                $number_of_repost = $package->number_of_repost_ads;
            }
        } else {
            $number_of_agents = request('num_agents');
        }

        # complete company profile
        $company = Company::create(
            request([
                'registered_name', 'description', 'cr_number', 'cr_number_file',
                'phone', 'city', 'zip_code', 'logo', 'country_id',
            ]) +
                [
                    'user_id' => $user->id,
                    'number_of_premium_ads' => $number_of_premium_ads,
                    'number_of_regular_ads' => $number_of_regular_ads,
                    'number_of_agents' => $number_of_agents,
                    'number_of_repost' => $number_of_repost,
                ]
        );

        $freePackage = $packageService->getFreePackage();
        $subscriptionService->subscribe($freePackage, $company->id, 'company');

        $url = \LaravelLocalization::getURLFromRouteNameTranslated(app()->getLocale(), 'routes.thankyou');
        return redirect($url);
    }

    public function getUserLogin()
    {
        $title = trans('lang.login') . ' | ' . trans('lang.sakeny');
        session(['url.intended_after_login' => url()->previous()]);

        return view('site.pages.userLogin', compact('title'));
    }

    public function postUserLogin(Request $request, User $user_model)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        //login via email/phone
        $user = $user_model->User()->active()
            ->where(function ($query) {
                $query->where('email', request('email'))
                    ->orWhere('phone', request('email'));
            })->first();

        if ($user == null) {
            $user = $user_model->CompanyQ()->active()
                ->where(function ($query) {
                    $query->where('email', request('email'))
                        ->orWhere('phone', request('email'));
                })->first();
        }

        if ($user == null) {
            $user = $user_model->Agent()->active()
                ->where(function ($query) {
                    $query->where('email', request('email'))
                        ->orWhere('phone', request('email'));
                })->first();
        }

        if ($user && Hash::check(request('password'), $user->password)) {
            auth()->guard('user')->loginUsingId($user->id);
            // dd('ok');
            // return redirect(url()->previous());

            if (session()->has('url.intended_after_login')) {
                $url = session()->get('url.intended_after_login');
                return redirect($url);
            }
            // return redirect()->route('user.index', app()->getLocale());
            // $url = \LaravelLocalization::getLocalizedURL(app()->getLocale(), url()->previous());
            // return redirect($url);
        }

        return back()->withErrors(trans('lang.wrong_email_or_password'));
    }

    public function getUserRegister()
    {
        $title = trans('lang.register') . ' | ' . trans('lang.sakeny');
        return view('site.pages.userRegister', compact('title'));
    }

    public function postUserRegister(Request $request, SubscriptionService $subscriptionService, PackageService $packageService)
    {
        $this->validate($request, [
            'name' => 'required|max:200',
            'email' => 'required|email|unique:users|unique:admins',
            'phone' => 'required|regex:/^\+?\d[0-9-]{9,12}/|numeric|unique:users',
            'password' => 'required|min:8|confirmed',
            'gender' => 'required|in:0,1',
            'terms_condition' => 'required',
        ]);

        $user = User::create(
            request(['name', 'email', 'password', 'phone', 'gender', 'country_id', 'city_id']) +
                [
                    'activation' => 1,
                    'type' => 1,
                ]
        );

        $freePackage = $packageService->getFreePackage();
        $subscriptionService->subscribe($freePackage, $user->id, 'user');

        $url = \LaravelLocalization::getURLFromRouteNameTranslated(app()->getLocale(), 'routes.thankyou');
        return redirect($url);
    }

    public function userLogout()
    {
        auth()->guard('user')->logout();
        // return redirect()->route('user.login.get');
        return redirect()->back();
    }

    public function getSingleAd($lang, $id, $ad_name)
    {
        if (Session::get('country_id')) {
            $country_id = Session::get('country_id');
        } else {
            session(['country_id' => 1]);
            $country_id = 1;
        }

        $ads = new Ads;
        $ad = $ads->active()->Valid()->where([
            'id' => $id,
            'country_id' => $country_id,
        ])->whereHas('owner', function ($query) {
            $query->where('activation', 1);
        })->firstOrFail();

        $ad->increment('views');

        // set ad to user history
        if (auth()->guard('user')->check()) {
            $user = auth()->guard('user')->user();
            $user->manageHistory($ad->id);
        }

        $ads_for_same_user = Ads::where(function ($query) use ($ad) {
            return $query->where('owner_id', $ad->owner_id)
                ->where('agent_id', $ad->agent_id);
        })->Valid()->active()->where('id', '!=', $id)->take(3)->latest()->get();

        $similar_ads = Ads::valid()->active()->where([
            'offer_type_id' => $ad->offer_type_id,
            'property_type_id' => $ad->property_type_id,
            'unit_view_id' => $ad->unit_view_id,
        ])->where('id', '!=', $id)->take(3)->latest()->get();

        $cities = City::active()->where('country_id', $country_id)->get();

        $offer_type_list = OfferType::get();
        $property_type_list = PropertyType::where('activation', 1)->latest()->get();
        $level_of_finished = LevelOfFinished::where('activation', 1)->get(['name_en', 'name_ar', 'id']);
        $amenities = Amenities::where('activation', 1)->get(['name_en', 'name_ar', 'id']);

        $search_data = [
            'offer_type_list' => $offer_type_list,
            'property_type_list' => $property_type_list,
            'level_of_finished' => $level_of_finished,
            'amenities' => $amenities,
        ];

        $cover_image = HeaderImage::where('active', 1)->first();

        $Head = Banner::where('country_id', $country_id);
        $Middle = Banner::where('country_id', $country_id);
        $RightSide = Banner::where('country_id', $country_id);
        $LeftSide = Banner::where('country_id', $country_id);

        $Head = $Head->Head()->first();
        $Middle = $Middle->Middle()->first();
        $RightSide = $RightSide->RightSide()->first();
        $LeftSide = $LeftSide->LeftSide()->first();

        $title = $ad->title . ' | ' . trans('lang.sakeny');
        //        \LaravelFacebookPixel::createEvent('ViewContent', $parameters = []);
        return view('site.pages.singleAd', compact(
            'cover_image',
            'ad',
            'similar_ads',
            'ads_for_same_user',
            'Head',
            'LeftSide',
            'RightSide',
            'Middle',
            'cities',
            'search_data',
            'title'
        ));
    }

    public function shareAd($provider, $id)
    {
        $ad = new Ads;
        $ad = $ad->findOrFail($id);
        $shareLink = $ad->getShareLink($provider);
        return redirect($shareLink);
    }

    public function postReport(Request $request, $id)
    {
        $this->validate($request, [
            'reason' => 'required|max:4000',
        ]);

        $ad = Ads::findOrFail($id);

        $user = auth()->guard('user')->user();

        Reports::create([
            'ad_id' => $ad->id,
            'user_id' => $user->id,
            'reason' => request('reason'),
        ]);

        return back()->withMessage(trans('lang.message_done'));
    }

    public function redirectToProvider($provider)
    {
        Session::put('url', $_SERVER['HTTP_REFERER']);

        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        if ((!request('code') || request('denied')) && $provider == 'facebook') {
            return redirect()->route('user.index', app()->getLocale());
        }

        $social_user = Socialite::driver($provider)->user();

        $social_id = $social_user->id;
        $social_type = $provider;

        $user = User::Active()
            ->where(['social_type' => $social_type, 'social_id' => $social_id])
            ->orWhere('email', $social_user->email)
            ->first();

        if ($user) {
            auth()->guard('user')->loginUsingId($user->id);
            // return redirect()->route('user.index', app()->getLocale());
            // return Redirect::to(Session::get('url'));

            return redirect()->back();
        }

        $registered_user = User::create([
            'social_id' => $social_id,
            'social_type' => $social_type,
            'email' => $social_user->email,
            'name' => $social_user->name,
            'activation' => 1,
            'type' => 1,
        ]);

        if ($registered_user) {
            auth()->guard('user')->loginUsingId($registered_user->id);
            // return redirect()->route('user.index', app()->getLocale());
            return redirect()->to(Session::get('url'));
        }

        abort(500);
    }

    public function getCityAds($lang, $id)
    {
        $this->bumpUpUpdate();

        $ads = Ads::active()->BusinessOrder()->Valid()->where('city_id', $id)->whereHas('owner', function ($query) {
            $query->where('activation', 1);
        });

        $ads = $ads->paginate(12);

        // $title = trans('lang.apartments_for_sale_page_title_' . $id);
        // if(  \Lang::has('lang.properties_for_sale_page_title_' . $id) ) {
        //     $title = trans('lang.properties_for_sale_page_title_' . $id);
        // } else {
        //     $title = trans('lang.ads') . ' | ' . trans('lang.sakeny');
        // }
        $title = trans('lang.ads') . ' | ' . trans('lang.sakeny');
        // dd( trans('lang.apartments_for_sale_page_title_' . $id) );

        return view('site.pages.cityAds', compact('ads', 'title'));
    }

    public function getDistrictAds($district_id)
    {
        $this->bumpUpUpdate();

        // $district_name = str_replace('-', ' ', $slug);

        $ads = Ads::active()->BusinessOrder()->Valid()->where('district_id', $district_id)->whereHas('owner', function ($query) {
            $query->where('activation', 1);
        });

        // if(app()->getLocale() == 'ar')   {
        //     if ( $district_id = District::where('name_ar' , $district_name)->first()) {
        //         $district_id = District::where('name_ar' , $district_name)->first()->pluck('id');

        //         $ads = Ads::active()->BusinessOrder()->Valid()->whereHas('District', function($query)  use ($district_name) {
        //             $query->where('name_ar', $district_name);
        //         })->whereHas('owner', function ($query) {
        //             $query->where('activation', 1);
        //         });
        //     } else {
        //         return redirect()->back();
        //     }
        // } else {
        //     if($district_id = District::where('name_en' , $district_name)->first()) {
        //         $district_id = District::where('name_en' , $district_name)->first()->pluck('id');

        //         $ads = Ads::active()->BusinessOrder()->Valid()->whereHas('District', function($query) use ($district_name) {
        //             $query->where('name_en', $district_name);
        //         })->whereHas('owner', function ($query) {
        //             $query->where('activation', 1);
        //         });
        //     }else {
        //         return redirect()->back();
        //     }

        // }
        $ads = $ads->paginate(12);

        if (\Lang::has('lang.properties_for_sale_page_title_' . $district_id)) {
            $title = trans('lang.properties_for_sale_page_title_' . $district_id);
        } else {
            $title = trans('lang.ads') . ' | ' . trans('lang.sakeny');
        }

        // $title = trans('lang.ads') . ' | ' . trans('lang.sakeny');

        return view('site.pages.cityAds', compact('ads', 'title'));
    }

    public function AdCreateGet()
    {
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

        $title = trans('lang.Add_ad') . ' | ' . trans('lang.sakeny');
        //        \LaravelFacebookPixel::createEvent('SubmitApplication', $parameters = []);
        return view('site.pages.addAd', compact(
            'proprty_type_list',
            'level_of_finished',
            'amenities',
            'unit_view_list',
            'cities',
            'offer_type_list',
            'title'
        ));
    }

    public function AdCreatePost(Request $request, Ads $ad_model, AdsImage $adImage_model)
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


        if (count($request->images) > 0) {
            $this->validate($request, $adImage_model->getCreateRules($request));
        }

        $user = auth('user')->user();
        $subscription = $user->activesubscription;

        if (!$subscription) {
            return response()->json(['code' => 403, 'message' => trans('lang.you_need_to_subscribe')]);
        }

        if (!CanAddAd($subscription, $request->type)) {
            return response()->json(['code' => 403, 'message' => trans('lang.you_reach_max_ads_type')]);
        }

        $ad = new $ad_model;

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
        $ad->owner_id = $user->id;
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

    public function activeAd($id)
    {
        $user = auth()->guard('user')->user();
        $ad = Ads::active()->BusinessOrder()->Valid()->where([
            'id' => $id,
            'owner_id' => $user->id,
        ])->whereHas('owner', function ($query) {
            $query->where('activation', 1);
        })->firstOrFail();

        $ad->update(['status' => 0]);

        return back();
    }

    public function DeactivateAd($id)
    {
        $user = auth()->guard('user')->user();
        $ad = Ads::active()->BusinessOrder()->Valid()->where([
            'id' => $id,
            'owner_id' => $user->id,
        ])->whereHas('owner', function ($query) {
            $query->where('activation', 1);
        })->firstOrFail();

        $ad->update(['status' => 1]);

        return back();
    }

    public function getUserSaved($lang)
    {
        $user = auth()->guard('user')->user();

        $favourites = AdFavourite::whereHas('ad', function ($query) {
            $query->active()->Valid()->whereHas('owner', function ($query) {
                $query->where('activation', 1);
            });
        })->where('user_id', $user->id)->paginate(10);

        $title = trans('lang.get_saved') . ' | ' . trans('lang.sakeny');

        return view('site.pages.savedAds', compact('favourites', 'title'));
    }

    public function favouriteAd($lang, $id)
    {
        $user = auth()->guard('user')->user();

        $ad = Ads::active()->BusinessOrder()->Valid()->where([
            'id' => $id,
        ])->whereHas('owner', function ($query) {
            $query->where('activation', 1);
        })->firstOrFail();

        $favourite = AdFavourite::where([
            'user_id' => $user->id,
            'ad_id' => $ad->id,
        ])->first();

        if ($favourite) {
            $favourite->delete();
        } else {
            AdFavourite::create([
                'user_id' => $user->id,
                'ad_id' => $ad->id,
            ]);
        }

        return back();
    }

    public function getUserAds($lang, $id)
    {
        $user = User::findOrFail($id);

        $ads = Ads::active()->Valid()->whereHas('owner', function ($query) {
            $query->where('activation', 1);
        })->where('owner_id', $id);

        $ads = $ads->paginate(12);

        $title = trans('lang.ads') . ' | ' . trans('lang.sakeny');

        return view('site.pages.userAds', compact('ads', 'user', 'title'));
    }

    public function getMyAds($lang)
    {
        $user = auth()->guard('user')->user();

        $ads = Ads::active()->Valid()->whereHas('owner', function ($query) {
            $query->where('activation', 1);
        })->where('owner_id', $user->id);

        $ads = $ads->paginate(12);

        $title = trans('lang.my_ads') . ' | ' . trans('lang.sakeny');

        return view('site.pages.myAds', compact('ads', 'title'));
    }

    public function getEditAd($lang, $id)
    {
        $user = auth()->guard('user')->user();

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

        return view('site.pages.editAd', compact(
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
            'title'
        ));
    }

    public function postEditAd($id, Request $request, Ads $ad_model, AdsImageEditHistory $adImageHistory_model)
    {
        $ad = $ad_model->findOrFail($id);

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
            'price_negotiable' => 'required',
            'amenities' => 'required|array|min:1',
            'able_call' => 'required_without_all:able_chat,able_email',
            'able_chat' => 'required_without_all:able_email,able_call',
            'able_email' => 'required_without_all:able_chat,able_call',
        ]);

        if (isset($request->images)) {
            if (count($request->images) > 0) {
                $this->validate($request, $adImageHistory_model->getCreateRules($request));
            }
        }

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

        return back()->withMessage(trans('lang.ad_edited_successfully'));
    }

    public function changeStatus($id)
    {

        $user = auth()->guard('user')->user();

        $ad = Ads::where([
            'owner_id' => $user->id,
            'id' => $id,
        ])->whereHas('owner', function ($query) {
            $query->where('activation', 1);
        })->first();

        if ($ad->user_active == 0) {
            $ad->update([
                'user_active' => 1,
            ]);
        } else {
            $ad->update([
                'user_active' => 0,
            ]);
        }

        return back();
    }

    public function getMyExpired($lang)
    {
        $user = auth()->guard('user')->user();

        $ads = Ads::BusinessOrder()->expired()->whereHas('owner', function ($query) {
            $query->where('activation', 1);
        })->where('owner_id', $user->id);

        $ads = $ads->paginate(12);

        $title = trans('lang.expired_ads') . ' | ' . trans('lang.sakeny');

        return view('site.pages.expiredAds', compact('ads', 'title'));
    }

    public function deleteImage($image_id, AdsImage $adImage_model)
    {
        $ad_image = $adImage_model->findOrFail($image_id);
        $ad = $ad_image->ads;
        $user = auth()->guard('user')->user();

        if ($ad->owner_id !== $user->id && $ad->agent_id !== $user->id) {
            abort(404);
        }

        if (count($ad->images) == 1) {
            return back()->withErrors(trans('lang.you_cant_delete_last_image'));
        }

        $ad_image->deleteImage();

        $ad_image->delete();

        return back();
    }

    public function addCompare($id)
    {
        $user = auth()->guard('user')->user();

        $ad = Ads::active()->BusinessOrder()->Valid()->whereHas('owner', function ($query) {
            $query->where('activation', 1);
        })->where('id', $id)->firstOrFail();

        $ads_ids = array();

        $compare_list = CompareAds::where('user_id', $user->id)->first();

        if (!$compare_list) {
            array_push($ads_ids, $ad->id);
            CompareAds::create([
                'user_id' => $user->id,
                'ads_ids' => json_encode($ads_ids),
            ]);
        } else {
            $compare_list = CompareAds::where('user_id', $user->id)->first();

            if (count(json_decode($compare_list->ads_ids)) == 2) {
                return back()->withErrors(trans('you_reached_max_compare'));
            }

            $already_compared = $compare_list->checkInCompareList($ad->id);

            if ($already_compared) {
                return back()->withErrors(trans('already_in_compare_list'));
            }

            $compare_list->addToCompare($ad->id);

            return back();
        }

        return redirect()->route('user.my.comparing', app()->getLocale());
    }

    public function getComparing($lang)
    {
        $user = auth()->guard('user')->user();

        $ads = $user->getCompareList();

        $title = trans('lang.comparing') . ' | ' . trans('lang.sakeny');

        return view('site.pages.compare', compact('user', 'ads', 'title'));
    }

    public function deleteCompare($id)
    {
        $ad = Ads::active()->BusinessOrder()->Valid()->whereHas('owner', function ($query) {
            $query->where('activation', 1);
        })->where('id', $id)->firstOrFail();

        $user = auth()->guard('user')->user();

        $compare_list = CompareAds::where('user_id', $user->id)->first();

        if (!$compare_list) {
            abort(404);
        }

        $ads_ids = json_decode($compare_list->ads_ids);

        $new_ads_ids = array();

        foreach ($ads_ids as $ad_id) {
            if ($id != $ad_id) {
                array_push($new_ads_ids, $ad_id);
            }
        }

        $compare_list->update([
            'ads_ids' => json_encode($new_ads_ids),
        ]);

        return back();
    }

    public function createChatRoom($id, Request $request)
    {
        $this->validate($request, [
            'message' => 'required|max:4000',
        ]);

        $ad = Ads::active()->Valid()->whereHas('owner', function ($query) {
            $query->where('activation', 1);
        })->where('id', $id)->firstOrFail();

        $user = auth()->guard('user')->user();

        $chat_room = ChatRooms::checkIfRoomExists($ad->id);

        RoomMessages::create([
            'sender_id' => $user->id,
            'message' => $request->message,
            'chat_room_id' => $chat_room->id,
        ]);

        return back()->withMessage(trans('lang.message_sent_successfully'));
    }

    public function getInbox($lang)
    {
        $user = auth()->guard('user')->user();

        $rooms = ChatRooms::WhereHas('ad', function ($query) use ($user) {
            $query->where('owner_id', $user->id);
        })->orWhere('user_id', $user->id)->latest()->paginate(10);

        foreach ($rooms as $room) {
            $room['title_name'] = $room->user_id == $user->id ? $user->name : $room->getLastMessageAttribute()->sender->name;
        }

        $title = trans('lang.messaging') . ' | ' . trans('lang.sakeny');

        return view('site.pages.Inbox', compact('rooms', 'title'));
    }

    public function getChatRoom($lang, $id)
    {
        $user = auth()->guard('user')->user();

        $room = ChatRooms::where([
            'id' => $id,
        ])->where(function ($query) use ($user) {
            $query->WhereHas('ad', function ($query) use ($user) {
                $query->where('owner_id', $user->id);
            })->orWhere('user_id', $user->id);
        })->firstOrFail();

        $messages = RoomMessages::where('chat_room_id', $room->id)->where('sender_id', '!=', $user->id)->get();

        foreach ($messages as $message) {
            $message->update([
                'seen' => 1,
            ]);
        }

        $title = trans('lang.messaging') . ' | ' . trans('lang.sakeny');

        return view('site.pages.room', compact('room', 'title'));
    }

    public function postMessageToRoom($room_id, Request $request)
    {
        $this->validate($request, [
            'message' => 'required|max:4000',
        ]);

        $user = auth()->guard('user')->user();

        $room = ChatRooms::where([
            'id' => $room_id,
        ])->where(function ($query) use ($user) {
            $query->WhereHas('ad', function ($query) use ($user) {
                $query->where('owner_id', $user->id);
            })->orWhere('user_id', $user->id);
        })->firstOrFail();

        RoomMessages::create([
            'sender_id' => $user->id,
            'message' => $request->message,
            'chat_room_id' => $room->id,
        ]);

        return back();
    }

    public function getHistory($lang)
    {
        $user = auth()->guard('user')->user();

        $history = History::where('user_id', $user->id)->first();

        $ads = array();

        if ($history) {

            $ads = array();

            $ads_ids = json_decode($history->ads_ids);

            $ads_ids = array_reverse($ads_ids);

            foreach ($ads_ids as $id) {
                $ad = Ads::where('id', $id)->first();
                $ad ? array_push($ads, $ad) : '';
            }
        }

        $title = trans('lang.history') . ' | ' . trans('lang.sakeny');

        return view('site.pages.history', compact('ads', 'title'));
    }

    public function getForgetPassword($lang)
    {
        $title = trans('lang.iforgetmypassword') . ' | ' . trans('lang.sakeny');

        return view('site.pages.forgetPassword', compact('title'));
    }

    public function postForgetPassword(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        $user = User::User()->active()
            ->where(function ($query) {
                $query->where('email', request('email'))
                    ->orWhere('phone', request('email'));
            })->first();
        if ($user == null) {
            $user = User::CompanyQ()->active()
                ->where(function ($query) {
                    $query->where('email', request('email'))
                        ->orWhere('phone', request('email'));
                })->first();
        }

        if (!$user) {
            return back()->withErrors(trans('lang.email_doesnt_exists'))->withInput();
        }

        $token = bin2hex(random_bytes(20));

        $user->update([
            'reset_password_code' => $token,
        ]);

        $user->sendResetMail();

        return back()->withMessage(trans('lang.check_your_email'))->withInput();
    }

    public function getNewPassword($lang, $token)
    {
        $user = User::where('reset_password_code', $token)->firstOrFail();

        $title = trans('lang.iforgetmypassword') . ' | ' . trans('lang.sakeny');

        return view('site.pages.newPassword', compact('user', 'title'));
    }

    public function postNewPassword($token, Request $request)
    {
        $this->validate($request, [
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::User()->active()->where('reset_password_code', $token)->first();
        if ($user == null) {
            $user = User::CompanyQ()->active()->where('reset_password_code', $token)->firstOrFail();
        }

        if (Hash::check($request->password, $user->password)) {
            return back()->withErrors(trans('lang.this_is_your_old_password'));
        }

        $user->update([
            'password' => $request->password,
            'reset_password_code' => null,
        ]);

        return redirect()->route('user.login.get', app()->getLocale())->withMessage(trans('lang.password_changed'));
    }

    public function getProfile($lang)
    {
        $user = auth()->guard('user')->user();

        $title = trans('lang.profile') . ' | ' . trans('lang.sakeny');

        return view('site.pages.userProfile', compact('user', 'title'));
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

    public function test($offset, $limit)
    {
        $ads = Ads::active()->Valid()->where('country_id', 1)->whereHas('owner', function ($query) {
            $query->where('activation', 1);
        })->offset($offset)->limit($limit)->get();

        foreach ($ads as $ad) {
            $link = route('user.ad.get', ['id' => $ad->id, 'ad_name' => urlencode(str_replace('/', '', $ad->title)), 'lang' => app()->getLocale()]);
            $curl = curl_init($link);
            curl_setopt($curl, CURLOPT_NOBODY, true);
            $result = curl_exec($curl);
            if ($result !== false) {
                $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                if ($statusCode == 404 || $statusCode == 400) {
                    echo "URL Not Exists status:" . $statusCode;
                } else {
                }
            } else {
                echo "URL not Exists";
            }
        }
    }
    public function GetCities($lang, Request $request)
    {
        $cities = City::where('country_id', $request->country_id)->get();
        return response()->json(['cities' => $cities], 200);
    }

    public function getSales()
    {
        if (Session::get('country_id')) {
            $country_id = Session::get('country_id');
        } else {
            session(['country_id' => 1]);
            $country_id = 1;
        }

        $cities = cache()->remember('cities', env('CACHE_EXPIRE'), function () use ($country_id) {
            return City::active()->where('country_id', $country_id)->get(['name_en', 'name_ar', 'id']);
        });

        $allAds = [];

        $types = PropertyType::orderByRaw('FIELD(id,1) DESC')
            ->orderByRaw('FIELD(id,14) DESC')
            ->orderByRaw('FIELD(id,10) DESC')
            ->orderByRaw('FIELD(id,8) DESC')
            ->orderByRaw('FIELD(id,13) DESC')
            ->orderByRaw('FIELD(id,20) DESC')
            ->orderByRaw('FIELD(id,19) DESC')
            ->orderByRaw('FIELD(id,16) DESC')
            ->orderByRaw('FIELD(id,4) DESC')
            ->take(9)->get();

        foreach ($types as $type) {
            $ads = new Ads;
            $ads = $ads->newQuery();

            $ads->active()->BusinessOrder()->Valid()->where([
                'country_id' => $country_id,
                'offer_type_id' => 1,
                'property_type_id' => $type->id
            ])->whereHas('owner', function ($query) {
                $query->where('activation', 1);
            });

            if (request('search')) {
                $keyword = request('search');
                $ads = $ads->where(function ($query) use ($keyword) {
                    $query->where('title', 'LIKE', '%' . $keyword . '%')->orWhere('description', 'LIKE', '%' . $keyword . '%')
                        ->orWhere(function ($query) use ($keyword) {
                            $query->whereHas('owner', function ($query) use ($keyword) {
                                $query->where('name', 'LIKE', '%' . $keyword . '%');
                            })->orWhereHas('agent', function ($query) use ($keyword) {
                                $query->where('name', 'LIKE', '%' . $keyword . '%');
                            });
                        });
                });
            }

            if (request('max_price')) {
                $ads = $ads->where(function ($query) {
                    $query->where('price', '<=', request('max_price'));
                });
            }

            if (request('min_price')) {
                $ads = $ads->where(function ($query) {
                    $query->where('price', '>=', request('min_price'));
                });
            }

            if (request('min_bedrooms_num')) {
                $ads = $ads->where(function ($query) {
                    $query->where('bedrooms_num', '>=', request('min_bedrooms_num'));
                });
            }

            if (request('max_bedrooms_num')) {
                $ads = $ads->where(function ($query) {
                    $query->where('bedrooms_num', '<=', request('max_bedrooms_num'));
                });
            }

            if (request('min_size')) {
                $ads = $ads->where(function ($query) {
                    $query->where('size', '>=', request('min_size'));
                });
            }
            if (request('max_size')) {
                $ads = $ads->where(function ($query) {
                    $query->where('size', '<=', request('max_size'));
                });
            }

            if (request('city_id')) {
                $ads = $ads->where('city_id', request('city_id'));
            }

            if (request('district_id')) {
                $ads = $ads->where('district_id', request('district_id'));
            }

            $ads = $ads->latest()->take(5)->get();

            if (count($ads) >= 1) {
                $allAds[$type->id] = $ads;
            }
        }

        $title = trans('lang.prop_for_sale');
        $pageTitle = trans('lang.prop_for_sale_page_title');
        $pageMetaDescription = "شوف واختار بين افضل العقارات المعروضة للبيع في مصر من شقق، فيلات، دوبلكس، تاون هاوس، ستوديو، شاليهات، اراضي، منازل، مباني – سواء تجاري او سكني – وتواصل مع المعلن مباشرة بدون وسيط";

        return view('site.pages.sales', compact('allAds', 'title', 'pageTitle', 'pageMetaDescription', 'cities'));
    }

    // apartments for sale only - new url seo phase 2
    public function getApartmentsSale()
    {
        if (Session::get('country_id')) {
            $country_id = Session::get('country_id');
        } else {
            session(['country_id' => 1]);
            $country_id = 1;
        }

        $cities = cache()->remember('cities', env('CACHE_EXPIRE'), function () use ($country_id) {
            return City::active()->where('country_id', $country_id)->get(['name_en', 'name_ar', 'id']);
        });

        $ads = Ads::active()->BusinessOrder()->Valid()->where([
            'country_id' => $country_id,
            'offer_type_id' => 1,
            'property_type_id' => 1,
        ])->whereHas('owner', function ($query) {
            $query->where('activation', 1);
        });

        if (request('search')) {
            $keyword = request('search');
            $ads = $ads->where(function ($query) use ($keyword) {
                $query->where('title', 'LIKE', '%' . $keyword . '%')->orWhere('description', 'LIKE', '%' . $keyword . '%')
                    ->orWhere(function ($query) use ($keyword) {
                        $query->whereHas('owner', function ($query) use ($keyword) {
                            $query->where('name', 'LIKE', '%' . $keyword . '%');
                        })->orWhereHas('agent', function ($query) use ($keyword) {
                            $query->where('name', 'LIKE', '%' . $keyword . '%');
                        });
                    });
            });
        }

        if (request('max_price')) {
            $ads = $ads->where(function ($query) {
                $query->where('price', '<=', request('max_price'));
            });
        }

        if (request('min_price')) {
            $ads = $ads->where(function ($query) {
                $query->where('price', '>=', request('min_price'));
            });
        }

        if (request('min_bedrooms_num')) {
            $ads = $ads->where(function ($query) {
                $query->where('bedrooms_num', '>=', request('min_bedrooms_num'));
            });
        }
        if (request('max_bedrooms_num')) {
            $ads = $ads->where(function ($query) {
                $query->where('bedrooms_num', '<=', request('max_bedrooms_num'));
            });
        }

        if (request('min_size')) {
            $ads = $ads->where(function ($query) {
                $query->where('size', '>=', request('min_size'));
            });
        }
        if (request('max_size')) {
            $ads = $ads->where(function ($query) {
                $query->where('size', '<=', request('max_size'));
            });
        }

        if (request('city_id')) {
            $ads = $ads->where('city_id', request('city_id'));
        }

        if (request('district_id')) {
            $ads = $ads->where('district_id', request('district_id'));
        }

        $ads = $ads->paginate(24);

        $title = trans('lang.apartments_for_sale_page_title');
        $pageTitle = trans('lang.apartments_for_sale_url_title');
        $pageMetaDescription = "شقق للبيع كاش و بالتقسيط في جميع محافظات مصر، القاهرة، الاسكندرية، الجيزة. قارن بين اكتر من 1500 شقة وإمتلك شقتك الآن من خلال موقع سكني الموقع الاكبر لبيع العقارات في مصر";

        return view('site.pages.specificSales', compact('ads', 'cities', 'title', 'pageTitle', 'pageMetaDescription'));
    }

    // apartments for sale only by city - new url seo phase 2
    public function getApartmentsDistrictSale($id)
    {
        $this->bumpUpUpdate();

        if (Session::get('country_id')) {
            $country_id = Session::get('country_id');
        } else {
            session(['country_id' => 1]);
            $country_id = 1;
        }

        $ads = Ads::active()->BusinessOrder()->Valid()->where([
            'country_id' => $country_id,
            'offer_type_id' => 1,
            'property_type_id' => 1,
            'district_id' => $id,
        ])->whereHas('owner', function ($query) {
            $query->where('activation', 1);
        });

        $ads = $ads->paginate(24);

        $title = trans('lang.apartments_for_sale_page_title_' . $id);

        return view('site.pages.specificSales', compact('ads', 'title'));
    }

    public function getRents()
    {
        if (Session::get('country_id')) {
            $country_id = Session::get('country_id');
        } else {
            session(['country_id' => 1]);
            $country_id = 1;
        }

        $cities = cache()->remember('cities', env('CACHE_EXPIRE'), function () use ($country_id) {
            return City::active()->where('country_id', $country_id)->get(['name_en', 'name_ar', 'id']);
        });

        $allAds = [];

        $types = PropertyType::orderByRaw('FIELD(id,1) DESC')
            ->orderByRaw('FIELD(id,14) DESC')
            ->orderByRaw('FIELD(id,10) DESC')
            ->orderByRaw('FIELD(id,8) DESC')
            ->orderByRaw('FIELD(id,13) DESC')
            ->orderByRaw('FIELD(id,20) DESC')
            ->orderByRaw('FIELD(id,19) DESC')
            ->orderByRaw('FIELD(id,16) DESC')
            ->orderByRaw('FIELD(id,4) DESC')
            ->take(9)->get();

        foreach ($types as $type) {
            $ads = new Ads;

            $ads = $ads->active()->BusinessOrder()->Valid()->where([
                'country_id' => $country_id,
                'offer_type_id' => 2,
                'property_type_id' => $type->id
            ])->whereHas('owner', function ($query) {
                $query->where('activation', 1);
            });

            if (request('search')) {
                $keyword = request('search');
                $ads = $ads->where(function ($query) use ($keyword) {
                    $query->where('title', 'LIKE', '%' . $keyword . '%')->orWhere('description', 'LIKE', '%' . $keyword . '%')
                        ->orWhere(function ($query) use ($keyword) {
                            $query->whereHas('owner', function ($query) use ($keyword) {
                                $query->where('name', 'LIKE', '%' . $keyword . '%');
                            })->orWhereHas('agent', function ($query) use ($keyword) {
                                $query->where('name', 'LIKE', '%' . $keyword . '%');
                            });
                        });
                });
            }

            if (request('max_price')) {
                $ads = $ads->where(function ($query) {
                    $query->where('price', '<=', request('max_price'));
                });
            }

            if (request('min_price')) {
                $ads = $ads->where(function ($query) {
                    $query->where('price', '>=', request('min_price'));
                });
            }

            if (request('min_bedrooms_num')) {
                $ads = $ads->where(function ($query) {
                    $query->where('bedrooms_num', '>=', request('min_bedrooms_num'));
                });
            }

            if (request('max_bedrooms_num')) {
                $ads = $ads->where(function ($query) {
                    $query->where('bedrooms_num', '<=', request('max_bedrooms_num'));
                });
            }

            if (request('min_size')) {
                $ads = $ads->where(function ($query) {
                    $query->where('size', '>=', request('min_size'));
                });
            }
            if (request('max_size')) {
                $ads = $ads->where(function ($query) {
                    $query->where('size', '<=', request('max_size'));
                });
            }

            if (request('city_id')) {
                $ads = $ads->where('city_id', request('city_id'));
            }

            if (request('district_id')) {
                $ads = $ads->where('district_id', request('district_id'));
            }

            $ads = $ads->latest()->take(5)->get();

            if (count($ads) >= 1) {
                $allAds[$type->id] = $ads;
            }
        }

        $title = trans('lang.prop_for_rent');
        $pageTitle = trans('lang.prop_for_rent_page_title');
        $pageMetaDescription = "بتدور على ايجار عقار في مصر؟ كل اعلانات العقارات المعروضة للايجار هتلاقيها هنا، سواء كان الغرض من الايجار تجاري او سكني - شقق وفلل وشاليهات ، مكاتب ومحلات ومخازن في القاهرة والاسكندرية وكل محافظات مصر";

        return view('site.pages.rents', compact('allAds', 'title', 'pageMetaDescription', 'pageTitle', 'cities'));
    }

    // apartments for Rent only - new url seo phase 2
    public function getApartmentsRent()
    {
        if (Session::get('country_id')) {
            $country_id = Session::get('country_id');
        } else {
            session(['country_id' => 1]);
            $country_id = 1;
        }
        $cities = cache()->remember('cities', env('CACHE_EXPIRE'), function () use ($country_id) {
            return City::active()->where('country_id', $country_id)->get(['name_en', 'name_ar', 'id']);
        });

        $ads = Ads::active()->BusinessOrder()->Valid()->where([
            'country_id' => $country_id,
            'offer_type_id' => 2,
            'property_type_id' => 1,
        ])->whereHas('owner', function ($query) {
            $query->where('activation', 1);
        });

        if (request('search')) {
            $keyword = request('search');
            $ads = $ads->where(function ($query) use ($keyword) {
                $query->where('title', 'LIKE', '%' . $keyword . '%')->orWhere('description', 'LIKE', '%' . $keyword . '%')
                    ->orWhere(function ($query) use ($keyword) {
                        $query->whereHas('owner', function ($query) use ($keyword) {
                            $query->where('name', 'LIKE', '%' . $keyword . '%');
                        })->orWhereHas('agent', function ($query) use ($keyword) {
                            $query->where('name', 'LIKE', '%' . $keyword . '%');
                        });
                    });
            });
        }

        if (request('max_price')) {
            $ads = $ads->where(function ($query) {
                $query->where('price', '<=', request('max_price'));
            });
        }

        if (request('min_price')) {
            $ads = $ads->where(function ($query) {
                $query->where('price', '>=', request('min_price'));
            });
        }

        if (request('min_bedrooms_num')) {
            $ads = $ads->where(function ($query) {
                $query->where('bedrooms_num', '>=', request('min_bedrooms_num'));
            });
        }
        if (request('max_bedrooms_num')) {
            $ads = $ads->where(function ($query) {
                $query->where('bedrooms_num', '<=', request('max_bedrooms_num'));
            });
        }

        if (request('min_size')) {
            $ads = $ads->where(function ($query) {
                $query->where('size', '>=', request('min_size'));
            });
        }
        if (request('max_size')) {
            $ads = $ads->where(function ($query) {
                $query->where('size', '<=', request('max_size'));
            });
        }

        if (request('city_id')) {
            $ads = $ads->where('city_id', request('city_id'));
        }

        if (request('district_id')) {
            $ads = $ads->where('district_id', request('district_id'));
        }

        $ads = $ads->paginate(24);

        $title = trans('lang.apartments_for_rent_page_title');
        $pageTitle = trans('lang.apartments_for_rent_url_title');
        $pageMetaDescription = "إبحث عن شقق للايجار بأسعار مناسبة في القاهرة و الاسكندرية والجيزة وجميع محافظات مصر، اختار من 1000 شقة معروضة للايجار وتواصل مع المعلن مباشرة الآن";

        return view('site.pages.specificRents', compact('ads', 'title', 'pageMetaDescription', 'pageTitle', 'cities'));
    }

    public function update_images_path()
    {
        $images = AdsImage::all();
        //        dd($images);
        foreach ($images as $key => $record) {
            //            dd($record);
            //            dd($record->image);
            //            dd(str_replace("advertise","adds", $record->image));
            $new_folder = str_replace("advertise", "adds", $record->image);
            //            dd($new_folder);
            $record->image = $new_folder;
            //            dd($record);
            $record->update();
        }
        return Redirect()->route('user.index');
    }

    public function sendMessageToProject(SendMessageForProjectRequest $request, $id)
    {
        $ProjectModule = new Project;
        $project = $ProjectModule->findOrFail($id);

        $phone = $request->phone;
        $name = $request->name;
        $user_message = request('message');

        ProjectContact::create([
            'name' => $name,
            'phone' => $phone,
            'message' => $user_message,
            'project_id' => $project->id,
        ]);

        return back()->withMessage(trans('lang.message_done'));
    }

    public function assignPhone(AssignPhoneRequest $request)
    {
        auth()->guard('user')->user()->update(['phone' => $request->phone]);
        return back()->with('success_assign_phone', true);
    }
}
