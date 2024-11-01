<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StripPaymentController extends Controller
{
    public function index(Request $request)
    {
        dd($request->all(), 'stripe');
    } 
}
