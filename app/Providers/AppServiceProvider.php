<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void   
    {
        // It can change whole config files
        $generalSetting = Setting::first();
        if( !empty($generalSetting->timeZone) ){
            Config::set('app.timezone', $generalSetting->timeZone);
        }


        view()->composer('*', function ($view)
        {
            $settings                = Setting::first();

            $view->with([
                'settings'               => $settings,
            ]);
    
        });
    }
}
