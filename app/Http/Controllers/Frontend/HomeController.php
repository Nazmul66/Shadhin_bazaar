<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $sliders = Slider::where('status', 1)->orderBy('serial', 'desc')->get();
        return view('frontend.pages.home', [
            'sliders' => $sliders,
        ]);
    }

    public function about_us()
    {
        return view('frontend.pages.frontend_pages.about_us');
    }

    public function contact_us()
    {
        return view('frontend.pages.frontend_pages.contact_us');
    }
    
    public function faq_page()
    {
        return view('frontend.pages.frontend_pages.faq');
    }

    public function team_page()
    {
        return view('frontend.pages.frontend_pages.team');
    }

    public function privacy_policy()
    {
        return view('frontend.pages.frontend_pages.privacy_policy');
    }

    public function blogs()
    {
        return view('frontend.pages.frontend_pages.blogs');
    }

    public function blogs_details()
    {
        return view('frontend.pages.frontend_pages.blogs_details');
    }

    public function track_order()
    {
        return view('frontend.pages.frontend_pages.track_order');
    }

    public function register_login()
    {
        return view('frontend.pages.auth.login_register');
    }



    /**
    *   Authentication template
    */

    public function changePassword()
    {
        return view('frontend.pages.auth.changePassword');
    }

    public function forgetPassword()
    {
        return view('frontend.pages.auth.forgetPassword');
    }





    /**
     *  All Product Pages template shown
    */

    public function products()
    {
        return view('frontend.pages.product_pages.products');
    }

    public function cart_view()
    {
        return view('frontend.pages.product_pages.cart_view');
    }

    public function wishlist_view()
    {
        return view('frontend.pages.product_pages.wishlist_view');
    }
    
    public function compare_view()
    {
        return view('frontend.pages.product_pages.compare');
    }

    public function checkout()
    {
        return view('frontend.pages.product_pages.checkout');
    }

    public function product_category()
    {
        return view('frontend.pages.product_pages.product_category');
    }

    public function product_brands()
    {
        return view('frontend.pages.product_pages.brands');
    }


}
