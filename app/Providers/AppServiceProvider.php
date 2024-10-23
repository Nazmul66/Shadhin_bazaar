<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
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
            $settings      = Setting::first();
            $all_carts     = DB::table('carts')->leftJoin('products', 'products.id', 'carts.product_id')
                            ->leftJoin('product_colors', 'product_colors.id', 'carts.color_id')
                            ->leftJoin('product_sizes', 'product_sizes.id', 'carts.size_id')
                            ->select('carts.*', 'products.thumb_image', 'products.name', 'products.id as pdt_id', 'products.slug', 'products.price', 'products.offer_price', 'product_sizes.size_name', 'product_sizes.size_price', 'product_colors.color_name', 'product_colors.color_price')
                            ->whereNull('carts.order_id')
                            ->where('carts.user_id', 1)
                            ->get();

            $view->with([
                'settings'     => $settings,
                'all_carts'     => $all_carts,
            ]);
    
        });
    }
}
