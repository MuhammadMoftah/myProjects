<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ModelsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // bind user with UserInterface
        $this->app->bind(
            'App\ModelInterfaces\UserInterface',
            'App\User'
        );
        // bind Admin with UserInterface
        $this->app->bind(
            'App\ModelInterfaces\UserInterface',
            'App\Admin'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
