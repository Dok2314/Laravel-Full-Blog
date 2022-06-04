<?php

namespace App\Providers;

use App\Events\DeletedArticle;
use App\Events\NewUpdatedArticle;
use App\Listeners\DeletedArticleListener;
use App\Listeners\NewArticleMailingWatcher;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\NewCreatedArticle;
use App\Listeners\NewArticleWatcher;
use App\Listeners\NewArticleUpdateWatcher;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        NewCreatedArticle::class => [
            NewArticleWatcher::class,
            NewArticleMailingWatcher::class
        ],
        NewUpdatedArticle::class => [
            NewArticleUpdateWatcher::class
        ],
        DeletedArticle::class => [
            DeletedArticleListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
