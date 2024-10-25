<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CouponController;
use App\Http\Controllers\Frontend\FlashSaleController;

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
    Route::get('/blogs', [HomeController::class, "blogs"])->name('blogs');
    Route::get('/blogs-details', [HomeController::class, "blogs_details"])->name('blogs.details');
    Route::get('/track-order', [HomeController::class, "track_order"])->name('track.order');

    //__ Flash Sales __//
    Route::get('/flash-sale', [FlashSaleController::class, "index"])->name('flash.sale');

    //__ Products __//
    Route::get('/product-details/{slug}', [ProductController::class, "show_product_details"])->name('product.details');
    Route::post('/get-color-size-price', [ProductController::class, 'getColorSizePrice'])->name('get.color.size.price');
    Route::post('/product/add-to-cart', [ProductController::class, 'productAddToCart'])->name('addToCart');
    Route::get('/remove-cart/{id}/{color_id?}/{size_id?}', [ProductController::class, 'removeCart'])->name('remove.cart');
    Route::get('/get-cart-data', [ProductController::class, 'getCart'])->name('get.cart.data');
    
    //__ Carts __//
    Route::get('/show-cart', [CartController::class, 'cart_view'])->name('show-cart');
    Route::post('/update-cart-quantity', [CartController::class, 'update_cart_quantity'])->name('update.cart.quantity');
    Route::post('/cart/delete-item', [CartController::class, 'deleteCartItem'])->name('delete.cart.item');
    Route::post('/clear-cart', [CartController::class, 'clearCart'])->name('clear.cart');
    Route::get('/get-sidebar-cart', [CartController::class, 'get_sidebar_cart'])->name('get.sidebar.cart');
    Route::get('/get-main-cart', [CartController::class, 'get_main_cart'])->name('get.main.cart');


    //__ Coupon __//
    Route::post('/apply-coupon', [CouponController::class, 'apply_coupon'])->name('apply.coupon');
    Route::get('/coupon-calculation', [CouponController::class, 'coupon_calculation'])->name('coupon.calculation');


    Route::get('/product-category', [ProductController::class, "product_category"])->name('product.category');
    Route::get('/product-brands', [ProductController::class, "product_brands"])->name('product.brands');


    // Route::get('/cart', [HomeController::class, "cart_view"])->name('cart');
    // Route::get('/wishlist', [HomeController::class, "wishlist_view"])->name('wishlist');
    // Route::get('/compare', [HomeController::class, "compare_view"])->name('compare');
    // Route::get('/checkout', [HomeController::class, "checkout"])->name('checkout');
    
    
    // Route::get('/register-login', [HomeController::class, "register_login"])->name('register.login');
    // Route::get('/change-password', [HomeController::class, "changePassword"])->name('change.password');
    // Route::get('/forget-password', [HomeController::class, "forgetPassword"])->name('forget.password');   
    


/*
|--------------------------------------------------------------------------
| Breeze Package Routes
|--------------------------------------------------------------------------
|
*/


require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/user.php';
