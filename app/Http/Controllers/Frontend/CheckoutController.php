<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\ShippingRule;
use Brian2694\Toastr\Facades\Toastr;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function checkout()
    {
        // if( !Auth::Check() ){
        //     return redirect()->route('register.login');
        // }

        $data['cartItems']        =  Cart::content();
        $data['coupons']          =  Coupon::where('status', 1)->get();
        $data['shipping_rules']   =  ShippingRule::where('status', 1)->get();
        
        return view('frontend.pages.product_pages.checkout', $data);
    }

}
