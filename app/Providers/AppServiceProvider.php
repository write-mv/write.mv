<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Livewire\Component;
use Illuminate\Support\Facades\URL;
use Filament\Facades\Filament;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Component::macro('notify', function ($message) {
            $this->dispatchBrowserEvent('notify', $message);
        });

        Filament::serving(function (): void {
            Filament::registerTheme(mix('css/app.css'));
        });
    }
}
