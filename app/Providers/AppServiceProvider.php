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
        // icon delete
        view()->share('iconDelete', 'mdi mdi-trash-can');
        // icon edit
        view()->share('iconEdit', 'mdi mdi-settings');
        // icon start event
        view()->share('iconStartEvent', 'mdi mdi-clock-start');
        // icon info / detail
        view()->share('iconInfo', 'mdi mdi-book');
        // icon statistik
        view()->share('iconStatistik', 'mdi mdi-chart-pie');
        // icon flower
        view()->share('iconFlower', 'mdi mdi-flower');
        // icon checklist
        view()->share('iconCheck', 'mdi mdi-checkbox-marked-circle');
        // icon chat
        view()->share('iconChat', 'mdi mdi-forum');
    }
}
