<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;


/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(["prefix" => '/admin'], function () {
    Route::match(["get", "post"], '/login', [AdminController::class, "login"]); // login page
    
    Route::group(["middleware" => ['admin']], function () {
        Route::get('/dashboard', [AdminController::class, "dashboard"])->name('dashboard');
    });
});







/*
|--------------------------------------------------------------------------
| Breeze Package Routes
|--------------------------------------------------------------------------
|
*/


require __DIR__.'/auth.php';
