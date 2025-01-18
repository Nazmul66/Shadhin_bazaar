<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\SslCommerzPaymentController;
use App\Http\Controllers\Frontend\BkashController;
use App\Http\Controllers\Frontend\CODController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CouponController;
use App\Http\Controllers\Frontend\FlashSaleController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ShippingRuleController;
use App\Http\Controllers\Frontend\AjaxCallController;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
|
*/

// Route::get('/', function () {
//     return view('frontend.pages.home');
// });
Route::middleware(['auth'])->group(function () {

    Route::controller(HomeController::class)->group(function () {
        Route::get('/', "home")->name('home');
        Route::get('/about-us', "about_us")->name('about.us');
        Route::get('/contact-us', "contact_us")->name('contact.us');
        Route::get('/faq', "faq_page")->name('faq');
        Route::get('/team', "team_page")->name('team');
        Route::get('/privacy-policy', "privacy_policy")->name('privacy.policy');
        Route::get('/terms-condition', "terms_condition")->name('terms.condition');
        Route::get('/customer-feedback', "customer_feedback")->name('customer.feedback');
        Route::get('/blogs', "blogs")->name('blogs');
        Route::get('/blogs-details', "blogs_details")->name('blogs.details');
        // Route::get('/wishlist', "wishlist_view")->name('wishlist');
        // Route::get('/compare', "compare_view")->name('compare');
        Route::get('/shop-page', "shop_page")->name('shop.page');
        Route::get('/track-order', "track_order")->name('track.order');
        Route::get('/register-login', "register_login")->name('register.login');
    });


    Route::controller(AjaxCallController::class)->group(function () {
        Route::get('/cart-quick-view', "cartQuickView")->name('cart.quick.view');
    });


    //__ Flash Sales __//
    Route::controller(FlashSaleController::class)->group(function () {
        Route::get('/flash-sale', "index")->name('flash.sale');
    });

    //__ Products __//
    Route::controller(ProductController::class)->group(function () {
        Route::get('/product-details/{slug}', "show_product_details")->name('product.details');
        Route::post('/get-color-size-price', 'getColorSizePrice')->name('get.color.size.price');
        Route::post('/product/add-to-cart', 'productAddToCart')->name('addToCart');
        Route::get('/remove-cart/{id}/{color_id?}/{size_id?}', 'removeCart')->name('remove.cart');
        Route::get('/get-cart-data', 'getCart')->name('get.cart.data');
    });
    

    //__ Carts __//
    Route::controller(CartController::class)->group(function () {
        Route::get('/cart', 'cart_view')->name('show-cart');
        Route::post('/add-cart', "addCart")->name('add.cart');
        Route::post('/cart/update-quantity', "updateProductQuantity")->name('cart.update.quantity');
        Route::get('/cart/remove-product/{rowId}', "cart_remove_product")->name('cart.remove.product');
        Route::get('/get-sidebar-cart', "get_sidebar_cart")->name('get.sidebar.cart');
        Route::get('/cart-count', "cart_count")->name('cart.count');
        Route::get('/cart-sidebar-product-total', "getTotalCart")->name('cart.sidebar-product-total');
        Route::get('/clear-cart', "clear_cart")->name('clear.cart');
    });

    // Route::post('/update-cart-quantity', [CartController::class, 'update_cart_quantity'])->name('update.cart.quantity');
    // Route::post('/cart/delete-item', [CartController::class, 'deleteCartItem'])->name('delete.cart.item');
    // Route::post('/clear-cart', [CartController::class, 'clearCart'])->name('clear.cart');
    // Route::get('/get-sidebar-cart', [CartController::class, 'get_sidebar_cart'])->name('get.sidebar.cart');
    // Route::get('/get-main-cart', [CartController::class, 'get_main_cart'])->name('get.main.cart');


    //__ Coupon __//
    Route::controller(CouponController::class)->group(function () {
        Route::post('/apply-coupon', 'apply_coupon')->name('apply.coupon');
        Route::get('/coupon-calculation', 'coupon_calculation')->name('coupon.calculation');
    });


    //__ Shipping Rules  __//
    Route::controller(ShippingRuleController::class)->group(function () {
        Route::post('/apply-shipping', 'apply_shipping')->name('apply.shipping');
        Route::get('/shipping-rules-calculation', 'shipping_rules_calculation')->name('shipping.rules.calculation');
    });


    //__ Checkout __//
    Route::controller(CheckoutController::class)->group(function () {
        Route::get('/checkout', 'checkout')->name('checkout')->middleware('NoBack');
    });

    //__ Cash On Delivery Payment Gateway __//
    Route::controller(CODController::class)->group(function () {
        Route::post('/cod', 'index')->name('payment.cod');
        Route::get('/success-payment/{order_id}', 'success_payment')->name('payment.success')->middleware('NoBack');
    });


    //__ SSL_Commerze Payment Gateway __//
    Route::controller(SslCommerzPaymentController::class)->group(function () {
        Route::post('/ssl_commercz-pay', 'index')->name('payment.ssl_commercz');
        Route::post('/success', 'success')->name('order-success');
        Route::post('/fail', 'fail');
        Route::post('/cancel', 'cancel');
    });


   // Route::controller(BkashController::class)->group(function () {
    //     Route::post('/bkash', 'index')->name('payment.bkash');
        
    //     // Payment Routes for bKash
    //     Route::get('/bkash/payment', [App\Http\Controllers\BkashTokenizePaymentController::class,'index']);
    //     Route::get('/bkash/create-payment', [App\Http\Controllers\BkashTokenizePaymentController::class,'createPayment'])->name('bkash-create-payment');
    //     Route::get('/bkash/callback', [App\Http\Controllers\BkashTokenizePaymentController::class,'callBack'])->name('bkash-callBack');

    //     //search payment
    //     Route::get('/bkash/search/{trxID}', [App\Http\Controllers\BkashTokenizePaymentController::class,'searchTnx'])->name('bkash-serach');

    //     //refund payment routes
    //     Route::get('/bkash/refund', [App\Http\Controllers\BkashTokenizePaymentController::class,'refund'])->name('bkash-refund');
    //     Route::get('/bkash/refund/status', [App\Http\Controllers\BkashTokenizePaymentController::class,'refundStatus'])->name('bkash-refund-status');
    // });
    

    // Route::get('/change-password', [HomeController::class, "changePassword"])->name('change.password');
    // Route::get('/forget-password', [HomeController::class, "forgetPassword"])->name('forget.password');   
    
});

/*
|--------------------------------------------------------------------------
| Breeze Package Routes
|--------------------------------------------------------------------------
|
*/


require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/user.php';
