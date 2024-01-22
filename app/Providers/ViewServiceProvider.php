<?php

namespace App\Providers;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View as ViewFacade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    #[\Override]
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // Using closure based composers...
        // ViewFacade::composer('layouts.navigation', function (View $view) {
        //     $view->with('pending_response_count', Comment::PendingComments(Auth::user())->count());
        // });
    }
}
