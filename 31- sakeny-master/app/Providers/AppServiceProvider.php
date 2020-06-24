<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Country;
use Session;
use App\Models\Banner;
use App\Models\Ads;
use App\Models\District;
use App\Models\Chat\RoomMessages;
use App\Models\Settings;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        url()->forceScheme('https');

        view()->composer('*', function ($view) {
            $countries = cache()->remember('countries', env('CACHE_EXPIRE'), function () {
                return Country::all();
            });

            if (Session::get('country_id')) {
                $country_id = Session::get('country_id');
            } else {
                session(['country_id' => 1]);
                $country_id = 1;
            }

            $country = Country::where('id', $country_id)->first();

            $popular_areas = cache()->remember('popular_areas', env('CACHE_EXPIRE'), function () {
                return District::getPopularDistricts();
            });

            $setting = cache()->remember('setting', env('CACHE_EXPIRE'), function () {
                return Settings::first();
            });

            $messages_count = 0;

            if (auth()->guard('user')->check()) {
                $user = auth()->guard('user')->user();
                if ($user->type == 1) {
                    $messages_count = RoomMessages::whereHas('room', function ($query) use ($user) {
                        $query->whereHas('ad', function ($query) use ($user) {
                            $query->where('owner_id', $user->id);
                        })->orWhere('user_id', $user->id);
                    })->where('seen', 0)->where('sender_id', '!=', $user->id)->count();
                } elseif ($user->type == 2) {
                    $messages_count = RoomMessages::whereHas('room', function ($query) use ($user) {
                        $query->whereHas('ad', function ($query) use ($user) {
                            $query->where('owner_id', $user->id)->where('agent_id', null);
                        });
                    })->where('seen', 0)->where('sender_id', '!=', $user->id)->count();
                } elseif ($user->type == 3) {
                    $messages_count = RoomMessages::whereHas('room', function ($query) use ($user) {
                        $query->whereHas('ad', function ($query) use ($user) {
                            $query->where('agent_id', $user->id);
                        });
                    })->where('seen', 0)->where('sender_id', '!=', $user->id)->count();
                }
            }

            $view->with([
                'countries' => $countries,
                'country' => $country,
                //                'popular_ads' => $popular_ads,
                'popular_areas' => $popular_areas,
                'messages_count' => $messages_count,
                'setting' => $setting
            ]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        require_once __DIR__ . '/../Http/Helpers.php';

        if ($this->app->isLocal()) {
            $this->app->register('Barryvdh\Debugbar\ServiceProvider');
        }
    }
}
