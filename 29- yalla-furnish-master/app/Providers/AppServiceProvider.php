<?php

namespace App\Providers;

use App\Services\site\ShowroomService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(ShowroomService $showroom_service)
    {
        if (env("APP_ENV") != "local") {
            url()->forceScheme('https');
        }

        Schema::defaultStringLength(191);

        view()->composer('*', function ($view) use ($showroom_service) {
            $user_showrooms = '';
            if (auth()->guard('user')->check()) {
                $user_showrooms = $showroom_service->getUserShworooms(auth()->guard('user')->user()->id);
            }
            $view->with([
                'user_showrooms' => $user_showrooms,
            ]);
        });
    }
}
