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
        // Subscriptions  
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
