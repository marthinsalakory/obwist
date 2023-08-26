<?php

namespace App\Providers;

use Carbon\Carbon;
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
        view()->composer('layouts.app', function ($view) {
            $view
                ->with('current_datetime', Carbon::now())
                ->with('current_date', Carbon::now()->format('Y-m-d'))
                ->with('current_date_year', Carbon::now()->format('Y'))
                ->with('current_date_mount', Carbon::now()->format('m'))
                ->with('current_date_day', Carbon::now()->format('d'))
                ->with('current_time', Carbon::now()->format('H:i:s'))
                ->with('current_time_hour', Carbon::now()->format('H'))
                ->with('current_time_minute', Carbon::now()->format('i'))
                ->with('current_time_seccond', Carbon::now()->format('s'));
        });
    }
}
