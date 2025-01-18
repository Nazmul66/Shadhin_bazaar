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

    Route::get('/', [HomeController::class, "home"])->name('home');
    Route::get('/about-us', [HomeController::class, "about_us"])->name('about.us');
    Route::get('/contact-us', [HomeController::class, "contact_us"])->name('contact.us');
    Route::get('/faq', [HomeController::class, "faq_page"])->name('faq');
    Route::get('/team', [HomeController::class, "team_page"])->name('team');
    Route::get('/privacy-policy', [HomeController::class, "privacy_policy"])->name('privacy.policy');
    Route::get('/terms-condition', [HomeController::class, "terms_condition"])->name('terms.condition');
    Route::get('/customer-feedback', [HomeController::class, "customer_feedback"])->name('customer.feedback');
    Route::get('/blogs', [HomeController::class, "blogs"])->name('blogs');
    Route::get('/blogs-details', [HomeController::class, "blogs_details"])->name('blogs.details');
    // Route::get('/wishlist', [HomeController::class, "wishlist_view"])->name('wishlist');
    // Route::get('/compare', [HomeController::class, "compare_view"])->name('compare');
    Route::get('/shop-page', [HomeController::class, "shop_page"])->name('shop.page');
    Route::get('/track-order', [HomeController::class, "track_order"])->name('track.order');
    Route::get('/register-login', [HomeController::class, "register_login"])->name('register.login');


    Route::get('/cart-quick-view', [AjaxCallController::class, "cartQuickView"])->name('cart.quick.view');


    //__ Flash Sales __//
    Route::get('/flash-sale', [FlashSaleController::class, "index"])->name('flash.sale');


    //__ Products __//
    Route::get('/product-details/{slug}', [ProductController::class, "show_product_details"])->name('product.details');
    Route::post('/get-color-size-price', [ProductController::class, 'getColorSizePrice'])->name('get.color.size.price');
    Route::post('/product/add-to-cart', [ProductController::class, 'productAddToCart'])->name('addToCart');
    Route::get('/remove-cart/{id}/{color_id?}/{size_id?}', [ProductController::class, 'removeCart'])->name('remove.cart');
    Route::get('/get-cart-data', [ProductController::class, 'getCart'])->name('get.cart.data');
    

    //__ Carts __//
    Route::get('/cart', [CartController::class, 'cart_view'])->name('show-cart');
    Route::post('/add-cart', [CartController::class, "addCart"])->name('add.cart');
    Route::post('/cart/update-quantity', [CartController::class, "updateProductQuantity"])->name('cart.update.quantity');
    Route::get('/cart/remove-product/{rowId}', [CartController::class, "cart_remove_product"])->name('cart.remove.product');
    Route::get('/get-sidebar-cart', [CartController::class, "get_sidebar_cart"])->name('get.sidebar.cart');
    Route::get('/cart-count', [CartController::class, "cart_count"])->name('cart.count');
    Route::get('/cart-sidebar-product-total', [CartController::class, "getTotalCart"])->name('cart.sidebar-product-total');
    Route::get('/clear-cart', [CartController::class, "clear_cart"])->name('clear.cart');

    // Route::post('/update-cart-quantity', [CartController::class, 'update_cart_quantity'])->name('update.cart.quantity');
    // Route::post('/cart/delete-item', [CartController::class, 'deleteCartItem'])->name('delete.cart.item');
    // Route::post('/clear-cart', [CartController::class, 'clearCart'])->name('clear.cart');
    // Route::get('/get-sidebar-cart', [CartController::class, 'get_sidebar_cart'])->name('get.sidebar.cart');
    // Route::get('/get-main-cart', [CartController::class, 'get_main_cart'])->name('get.main.cart');


    //__ Coupon __//
    Route::post('/apply-coupon', [CouponController::class, 'apply_coupon'])->name('apply.coupon');
    Route::get('/coupon-calculation', [CouponController::class, 'coupon_calculation'])->name('coupon.calculation');


    //__ Shipping Rules  __//
    Route::post('/apply-shipping', [ShippingRuleController::class, 'apply_shipping'])->name('apply.shipping');
    Route::get('/shipping-rules-calculation', [ShippingRuleController::class, 'shipping_rules_calculation'])->name('shipping.rules.calculation');


    //__ Checkout __//
    Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout')->middleware('NoBack');

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
    

/*
|--------------------------------------------------------------------------
| Breeze Package Routes
|--------------------------------------------------------------------------
|
*/


require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/user.php';
