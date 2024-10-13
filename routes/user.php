<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;



Route::middleware('setLanguage')->group(function(){

    Route::group(["as" => 'user.',"prefix" => '/user'], function () {

        Route::get('/', [UserController::class, "home"])->name('home');
        Route::get('/dashboard-profile', [UserController::class, "dashboard_profile"])->name('dashboard.profile');

    });

});

