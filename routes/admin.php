<?php


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\AdminRoleController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BrandsController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubcategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\ProductController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;


// set multi-language
Route::post('/set-language', function (Request $request) {
    Session::put('langName', $request->language); 
    App::setLocale($request->language); 

    return redirect()->back(); 
});


Route::middleware('setLanguage')->group(function(){

    Route::get('/admin/logout', [AdminController::class, "logout"]);
    Route::match(["get", "post"], '/admin/login', [AdminController::class, "login"]); // login page


    Route::group(["prefix" => '/admin', 'middleware' => ['admin']], function () {
        Route::get('/dashboards', [AdminController::class, "dashboards"])->name('dashboards');


        //______ Role & Permission _____//
        Route::resource('/permission', PermissionController::class)->names('admin.permission');
        Route::get('/permission-data', [PermissionController::class, 'getData'])->name('admin.permission-data');

        Route::resource('/role', RoleController::class)->names('admin.role');
        Route::resource('/admin-role', AdminRoleController::class)->names('admin.admin-role');


        //______ Slider _____//
        Route::resource('/slider', SliderController::class)->names('admin.slider');
        Route::get('/slider-data', [SliderController::class, 'getData'])->name('admin.slider-data');
        Route::post('/slider/status', [SliderController::class, 'changeSliderStatus'])->name('admin.slider.status');


        //______ Category _____//
        Route::resource('/categories', CategoryController::class)->names('admin.category');
        Route::get('/category-data', [CategoryController::class, 'getData'])->name('admin.category-data');
        Route::post('/categories/status', [CategoryController::class, 'changeCategoryStatus'])->name('admin.category.status');
        Route::get('/get-subcategory/{category}', [CategoryController::class, 'getSubCategories'])->name('admin.get.subcategory');


        //______ Subcategory _____//
        Route::resource('/subcategories', SubcategoryController::class)->names('admin.subcategory');
        Route::get('/subcategory-data', [SubcategoryController::class, 'getData'])->name('admin.subcategory-data');
        Route::post('/subcategory/status', [SubcategoryController::class, 'changeSubCategoryStatus'])->name('admin.subcategory.status');
        Route::get('/subcategory/edit/{id}', [SubcategoryController::class, 'subCategoryEdit'])->name('subcategory.edit');


        //______ ChildCategory _____//
        Route::resource('/childCategories', ChildCategoryController::class)->names('admin.childCategory');
        Route::get('/childCategory-data', [ChildCategoryController::class, 'getData'])->name('admin.childCategory-data');
        Route::post('/childCategory/status', [ChildCategoryController::class, 'changeChildCategoryStatus'])->name('admin.childCategory.status');
        Route::get('/childCategory/edit/{id}', [ChildCategoryController::class, 'childCategoryEdit'])->name('childCategory.edit');


        //______ Brand _____//
        Route::resource('/brands', BrandsController::class)->names('admin.brand');
        Route::get('/brand-data', [BrandsController::class, 'getData'])->name('admin.brand-data');
        Route::post('/change-brand-status', [BrandsController::class, 'changeBrandStatus'])->name('admin.brand.status');


        //______ Attribute Name & Values _____//
        Route::resource('/product', ProductController::class)->names('admin.product');
        Route::get('/product-data', [ProductController::class, 'getData'])->name('admin.product-data');
        Route::post('/change-product-status', [ProductController::class, 'changeProductStatus'])->name('admin.product.status');

        //______ Product _____//
        Route::resource('/product', ProductController::class)->names('admin.product');
        Route::get('/product-data', [ProductController::class, 'getData'])->name('admin.product-data');
        Route::post('/change-product-status', [ProductController::class, 'changeProductStatus'])->name('admin.product.status');
        Route::get('/product/variant/{id}', [ProductController::class, 'product_variant'])->name('admin.product-variant');


        //______ Coupon _____//
        Route::resource('/coupons', CouponController::class)->names('admin.coupons');
        Route::get('/coupon-data', [CouponController::class, 'getData'])->name('admin.coupon-data');
        Route::post('/change-coupon-status', [CouponController::class, 'changeCouponStatus'])->name('admin.coupon.status');


        //______ Review _____//
        Route::resource('/reviews', ReviewController::class)->names('admin.reviews');
        Route::get('/review-data', [ReviewController::class, 'getData'])->name('admin.review-data');
        Route::post('/change-review-status', [ReviewController::class, 'changeReviewStatus'])->name('admin.review.status');

    });

});

