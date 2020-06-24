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
        // Comment repository  
        $this->app->bind(
        'App\Repositories\Interfaces\CommentRepositoryInterface',
        'App\Repositories\CommentRepository'
        );
         // Reply repository  
        $this->app->bind(
            'App\Repositories\Interfaces\ReplyRepositoryInterface',
            'App\Repositories\ReplyRepository'
        );
        // Image repository  
        $this->app->bind(
            'App\Repositories\Interfaces\ImageRepositoryInterface',
            'App\Repositories\ImageRepository'
        );
        // ChatFollow repository  
        $this->app->bind(
            'App\Repositories\Interfaces\ChatFollowRepositoryInterface',
            'App\Repositories\ChatFollowRepository'
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
