<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\HomeController;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
|
*/

// Route::get('/', function () {
//     return view('frontend.pages.home');
// });



    Route::get('/', [HomeController::class, "home"])->name('home');
    Route::get('/about-us', [HomeController::class, "about_us"])->name('about.us');
    Route::get('/contact-us', [HomeController::class, "contact_us"])->name('contact.us');
    Route::get('/faq', [HomeController::class, "faq_page"])->name('faq');
    Route::get('/team', [HomeController::class, "team_page"])->name('team');
    Route::get('/privacy-policy', [HomeController::class, "privacy_policy"])->name('privacy.policy');


    Route::get('/checkout', [HomeController::class, "checkout"])->name('checkout');
    Route::get('/product-category', [HomeController::class, "product_category"])->name('product.category');
    Route::get('/product-brands', [HomeController::class, "product_brands"])->name('product.brands');
    
    
    Route::get('/change-password', [HomeController::class, "changePassword"])->name('change.password');
    Route::get('/forget-password', [HomeController::class, "forgetPassword"])->name('forget.password');
    







/*
|--------------------------------------------------------------------------
| Breeze Package Routes
|--------------------------------------------------------------------------
|
*/


require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
