<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;



Route::middleware('setLanguage')->group(function(){

    Route::group(["as" => 'user.',"prefix" => '/user'], function () {

        Route::get('/dashboard', [UserController::class, "index"])->name('dashboard');
        Route::get('/dashboard-orders', [UserController::class, "dashboard_orders"])->name('dashboard.orders');
        Route::get('/dashboard/order-view', [UserController::class, "dashboard_orders_views"])->name('dashboard.order.view');
        Route::get('/dashboard-profile', [UserController::class, "dashboard_profile"])->name('dashboard.profile');
        Route::get('/dashboard-download', [UserController::class, "dashboard_download"])->name('dashboard.download');

    });

});

