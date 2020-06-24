<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Pacakage repository  
        $this->app->bind(
            'App\Repositories\Package\PackageRepositoryInterface',
            'App\Repositories\Package\PackageRepository'
        );

        // Duration repository  
        $this->app->bind(
            'App\Repositories\Duration\DurationRepositoryInterface',
            'App\Repositories\Duration\DurationRepository'
        );

        // AdType repository  
        $this->app->bind(
            'App\Repositories\AdType\AdTypeRepositoryInterface',
            'App\Repositories\AdType\AdTypeRepository'
        );
        // DurationType repository  
        $this->app->bind(
            'App\Repositories\DurationType\DurationTypeRepositoryInterface',
            'App\Repositories\DurationType\DurationTypeRepository'
        );
        // Subscription repository  
        $this->app->bind(
            'App\Repositories\Subscription\SubscriptionRepositoryInterface',
            'App\Repositories\Subscription\SubscriptionRepository'
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
