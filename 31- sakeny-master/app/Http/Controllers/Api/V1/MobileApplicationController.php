<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Ads;
use App\Models\Blog;
use App\Models\City;
use App\Models\User;
use App\Models\Company;
use App\Models\Country;
use App\Models\Package;
use App\Models\Project;
use App\Models\Reports;
use App\Models\Settings;
use App\Models\ContactUs;
use App\Models\OfferType;
use Illuminate\Http\Request;
use App\Models\LifeStyleCategory;
use App\Http\Controllers\Api\BaseController;

class MobileApplicationController extends BaseController
{
    function __construct()
    {
    	parent::__construct();
    }

    public function getHome()
    {
        $latest_ads = Ads::Valid()->active()->inRandomOrder()->limit(3)->get();
        $projects = Project::with('images','developer')->limit(6)->get();
        return $this->response(compact('projects','latest_ads'));
    }

    public function getPublicAds()
    {
        $ads = Ads::Valid()->active()->inRandomOrder()->paginate(20);
        return $this->response(compact('ads'));
    }

}
