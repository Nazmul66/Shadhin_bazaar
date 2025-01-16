<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CheckoutRequest;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CODController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CheckoutRequest $request)
    {
        // dd($request->all());

        $order_address_data = [
            'full_name' => $request->input('full_name'),
            'email'     => $request->input('email'),
            'phone'     => $request->input('phone'),
            'city'      => $request->input('city'),
            'address'   => $request->input('address'),
        ];

        $order = new Order();

        $order->invoice_id        = 'INV-' . str_replace('.', '', microtime(true)) . '-' . date('Ymd');
        $order->user_id           = 0;
        $order->subtotal          = getCartTotal();
        $order->total_amount      = getMainCartTotal();
        $order->currency_name     = getSetting()->currency_name;
        $order->currency_symbol   = getSetting()->currency_symbol;
        $order->product_qty       = Cart::content()->count();
        $order->payment_method    = "";
        $order->payment_status    = "";
        $order->delivery_charge   = json_encode(Session::get('shippingCost')) ?: null;
        $order->coupon            = json_encode(Session::get('coupon')) ?: null;
        $order->order_address     = json_encode($order_address_data);
        $order->order_status      = 0;

        dd($order);
        $order->save();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
