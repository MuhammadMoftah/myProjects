<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */ 
    public function register()
    {
        require_once __DIR__ . '/../Http/Helpers.php';
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // dd(config("app.is_local"));
        if(config("app.is_local") == "NO")
              url()->forceScheme('https');
        view()->composer('*', function () {
            addVisitor();
        });

        \Validator::extend('textNoContainUrl', function ($attribute, $value) {
            return !preg_match( '/((http|https|ftp)\:\/\/)?[a-zA-Z0-9\.\/\?\:@\-_=#]+\.([a-zA-Z0-9\&\.\/\?\:@\-_=#])*/mi', $value) ;
         });

    }
}
