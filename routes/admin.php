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
use App\Http\Controllers\Backend\AttributeNameController;
use App\Http\Controllers\Backend\AttributeValueController;
use App\Http\Controllers\Backend\AdminRoleController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BrandsController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubcategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\FlashSaleController;
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

    Route::get('/cc', [AdminController::class, "cacheClear"])->name('cacheClear');
    Route::get('/admin/logout', [AdminController::class, "logout"]);
    Route::match(["get", "post"], '/admin/login', [AdminController::class, "login"]); // login page


    Route::group(["as" => 'admin.',"prefix" => '/admin', 'middleware' => ['admin']], function () {
        Route::get('/dashboards', [AdminController::class, "dashboards"])->name('dashboards');


        //______ Role & Permission _____//
        Route::resource('/permission', PermissionController::class)->names('permission');
        Route::get('/permission-data', [PermissionController::class, 'getData'])->name('permission-data');
        Route::resource('/role', RoleController::class)->names('role');
        Route::resource('/admin-role', AdminRoleController::class)->names('admin-role');


        //______ Slider _____//
        Route::resource('/slider', SliderController::class)->names('slider');
        Route::get('/slider-data', [SliderController::class, 'getData'])->name('slider-data');
        Route::post('/slider/status', [SliderController::class, 'changeSliderStatus'])->name('slider.status');


        //______ Category _____//
        Route::resource('/categories', CategoryController::class)->names('category');
        Route::get('/category-data', [CategoryController::class, 'getData'])->name('category-data');
        Route::post('/categories/status', [CategoryController::class, 'changeCategoryStatus'])->name('category.status');
        Route::get('/get-subcategory/{category}', [CategoryController::class, 'getSubCategories'])->name('get.subcategory');


        //______ Subcategory _____//
        Route::resource('/subcategories', SubcategoryController::class)->names('subcategory');
        Route::get('/subcategory-data', [SubcategoryController::class, 'getData'])->name('subcategory-data');
        Route::post('/subcategory/status', [SubcategoryController::class, 'changeSubCategoryStatus'])->name('subcategory.status');


        //______ ChildCategory _____//
        Route::resource('/childCategories', ChildCategoryController::class)->names('childCategory');
        Route::get('/childCategory-data', [ChildCategoryController::class, 'getData'])->name('childCategory-data');
        Route::post('/childCategory/status', [ChildCategoryController::class, 'changeChildCategoryStatus'])->name('childCategory.status');


        //______ Brand _____//
        Route::resource('/brands', BrandsController::class)->names('brand');
        Route::get('/brand-data', [BrandsController::class, 'getData'])->name('brand-data');
        Route::post('/change-brand-status', [BrandsController::class, 'changeBrandStatus'])->name('brand.status');


        //______ Attribute Name _____//
        Route::resource('/attribute-name', AttributeNameController::class)->names('attribute.name')->except(['show']);
        Route::get('/attribute-name/data', [AttributeNameController::class, 'getData'])->name('attribute-name.data');
        Route::post('/attribute-name-status', [AttributeNameController::class, 'changeStatus'])->name('attribute-name.status');


        //______ Attribute Values _____//
        Route::resource('/attribute-value', AttributeValueController::class)->names('attribute.value')->except(['show']);
        Route::get('/attribute-value/data', [AttributeValueController::class, 'getData'])->name('attribute-value.data');
        Route::post('/attribute-value-status', [AttributeValueController::class, 'changeStatus'])->name('attribute-value.status');
        

        //______ Product _____//
        Route::resource('/product', ProductController::class)->names('product');
        Route::get('/product-data', [ProductController::class, 'getData'])->name('product-data');
        Route::post('/change-product-status', [ProductController::class, 'changeProductStatus'])->name('product.status');
        Route::get('/product/variant/{id}', [ProductController::class, 'product_variant'])->name('product-variant');
        Route::put('/product/variant/{id}', [ProductController::class, 'update_product_variant'])->name('product-variant.update'); 


        Route::get('/delete/images/{id}', [ProductController::class, 'delete_multiple_image'])->name('multiple-image.delete'); 
        Route::get('/delete/sizes/{id}', [ProductController::class, 'delete_product_size'])->name('product-size.delete'); 
        Route::get('/delete/colors/{id}', [ProductController::class, 'delete_product_color'])->name('product-color.delete');


        //______ Flash Sale _____//
        Route::put('/flash-sale', [FlashSaleController::class, 'flashSale_index'])->name('flashSale.index');
        Route::resource('/flash-sale-item', FlashSaleController::class)->names('flashSale.item')->except(['show']);
        Route::get('/flash-sale-item-data', [FlashSaleController::class, 'getData'])->name('flashSale.item-data');
        Route::post('/flash-sale-item/status', [FlashSaleController::class, 'changeFlashSaleItemStatus'])->name('flashSale.item.status');
        Route::post('/flash-sale-item/show-home', [FlashSaleController::class, 'showFlashSaleItem'])->name('flashSale.item.show');
        

        //______ Coupon _____//
        Route::resource('/coupons', CouponController::class)->names('coupons');
        Route::get('/coupon-data', [CouponController::class, 'getData'])->name('coupon-data');
        Route::post('/change-coupon-status', [CouponController::class, 'changeCouponStatus'])->name('coupon.status');


        //______ Review _____//
        Route::resource('/reviews', ReviewController::class)->names('reviews');
        Route::get('/review-data', [ReviewController::class, 'getData'])->name('review-data');
        Route::post('/change-review-status', [ReviewController::class, 'changeReviewStatus'])->name('review.status');
    });

});

