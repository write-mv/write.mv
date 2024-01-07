<?php

namespace App\Providers;

use App\Events\BlogNameUpdated;
use App\Listeners\ClearTeamIdFromSession;
use App\Listeners\ReGenerateBlogOgImage;
use App\Listeners\SendWelcomeMail;
use App\Listeners\SetTeamIdInSession;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

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

        Verified::class => [
            SendWelcomeMail::class,
        ],

        Login::class => [
            SetTeamIdInSession::class,
        ],
        Logout::class => [
            ClearTeamIdFromSession::class,
        ],

        BlogNameUpdated::class => [
            ReGenerateBlogOgImage::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    #[\Override]
    public function boot()
    {
        //
    }
}
