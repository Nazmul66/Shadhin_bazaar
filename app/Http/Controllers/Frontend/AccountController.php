<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        return view('frontend.pages.user.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function dashboard_profile()
    {
        return view('frontend.pages.user.dashboard_profile');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function dashboard_orders(Request $request)
    {
        $orders = Order::leftJoin('transactions', 'transactions.order_id', 'orders.order_id')
                ->leftJoin('users', 'users.id', 'orders.user_id')
                ->select('orders.*','users.id as user_id', 'users.name as cus_name', 'users.email as cus_email', 'users.phone as cus_phone')
                ->where('users.id', Auth::user()->id)
                ->get();

        return view('frontend.pages.user.dashboard_order', compact('orders'));
    }

    /**
      * Display the specified resource.
    */
    public function dashboard_orders_views(string $id)
    {
        $order  = DB::table('orders')
        ->leftJoin('transactions', 'transactions.order_id', 'orders.order_id')
        ->where('orders.id', $id)
        ->select('orders.*', 'transactions.transaction_id')
        ->first();
        
        $order_products = OrderProduct::where('order_id', $order->order_id)->get();
        
        return view('frontend.pages.user.dashboard_order_view', compact('order', 'order_products'));
    }

    /**
      * Show the form for editing the specified resource.
    */
    public function dashboard_wishlist()
    {
        return view('frontend.pages.user.dashboard_wishlist');
    }

}
