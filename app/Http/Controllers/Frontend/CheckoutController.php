<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function checkout()
    {
        if( !Auth::Check() ){
            return redirect()->route('register.login');
        }

        return view('frontend.pages.product_pages.checkout');
    }


}
