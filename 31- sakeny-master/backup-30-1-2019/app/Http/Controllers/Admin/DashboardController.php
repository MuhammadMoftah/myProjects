<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Company;
use App\Models\Ads;
use Carbon\Carbon;
use DB;

class DashboardController extends Controller
{

    public function index()
    {
        $active_agents = User::where('type', 3)->where('activation', 1)->count();
        $available_agents = User::where('type', 3)->count();
        $active_ads = Ads::where('status', 1)->count();
        $in_active_ads = Ads::where('status', 0)->count();
        $expired_ads = Ads::whereDate('expire_date', '>', date('Y-m-d'))->count();
//        $stared_ads =
//        $banners_num =
//        $total_views =

        $num_registred_users     = User::User()->count();
        $num_registred_companies     = Company::count();
        $daily_registred_users     = User::User()->whereDate('created_at', DB::raw('CURDATE()'))->count();
        $daily_registred_companies     = Company::whereDate('created_at', DB::raw('CURDATE()'))->count();
        $num_ads     = Ads::count();
        $num_premium_ads     = Ads::where('is_premium' , '!=' , null)->count();
        return view('admin.index', compact('num_registred_users', 'daily_registred_users', 'num_registred_companies',
                                        'daily_registred_companies' , 'num_ads', 'num_premium_ads', 'active_ads',
            'in_active_ads', 'expired_ads', 'active_agents', 'available_agents'));
    }

}
