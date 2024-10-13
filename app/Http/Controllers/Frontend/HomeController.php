<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        return view('frontend.pages.home');
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

    public function checkout()
    {
        return view('frontend.pages.product_pages.checkout');
    }
}
