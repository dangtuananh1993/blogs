<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Listeners\UpdateSlug;
use App\Listeners\GenTagSlug;
use App\Listeners\GenCategorySlug;
use App\Listeners\UserCreatePostUpdate;
use App\Events\SlugPostCreated;
use App\Events\PostUpdated;


use App\Events\TagCreated;
use App\Events\TagUpdated;
use App\Events\CategoryCreated;
use App\Events\CategoryUpdated;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        SlugPostCreated::class => [
            UpdateSlug::class,
            UserCreatePostUpdate::class,
        ],

        PostUpdated::class => [
            UpdateSlug::class,
        ],

        TagCreated::class => [
            GenTagSlug::class,
        ],

        TagUpdated::class => [
            GenTagSlug::class,
        ],

        CategoryCreated::class => [
            GenCategorySlug::class,
        ],
        CategoryUpdated::class => [
            GenCategorySlug::class,
        ],
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
