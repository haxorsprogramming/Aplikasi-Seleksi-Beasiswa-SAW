<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
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
        view()->share('icDelete', 'mdi mdi-trash-can');
        view()->share('icEdit', 'mdi mdi-settings');
        view()->share('icStartEvent', 'mdi mdi-clock-start');
    }
}
