<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Boards;
use App\Idea;
use App\Product;
use App\Observers\BoardObserver;
use App\Observers\IdeaObserver;
use App\Observers\ProductObserver;
use App\Observers\TopicObserver;
use App\Topic;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Boards::observe(new BoardObserver());
        Product::observe(new ProductObserver());
        Idea::observe(new IdeaObserver());
        Topic::observe(new TopicObserver());
    }
}
