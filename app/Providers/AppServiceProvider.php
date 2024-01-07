<?php

namespace App\Providers;

use Carbon\Carbon;
use Filament\Facades\Filament;
use Illuminate\Support\HtmlString;
use Illuminate\Support\ServiceProvider;
use Livewire\Component;

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

        Carbon::macro('render', function ($format = 'M jS, Y') {

            return new HtmlString(
                "<time datetime='{$this->format('Y-m-d')}'> {$this->format($format)} </time>"
            );
        });

        Filament::serving(function (): void {
            Filament::registerTheme(mix('css/app.css'));
        });
    }
}
