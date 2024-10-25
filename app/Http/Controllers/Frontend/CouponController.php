<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function apply_coupon(Request $request)
    {
        // dd($request->all());

        if( $request->coupon_code === null){
            return response()->json(['message' => 'Coupon field is required']);
        }

        $coupon = Coupon::where(['code' => $request->coupon_code, 'status' => 1])->first();

        if( $coupon === null){
            return response()->json(['message' => 'Invalid Coupon Code']);
        }
        else if( $coupon->start_date > date('Y-m-d') ){
            return response()->json(['message' => 'Coupon not exists']);
        }
        else if( $coupon->end_date < date('Y-m-d') ){
            return response()->json(['message' => 'Coupon is expired!']);
        }

        if( $coupon->discount_type === "amount" ){
           Session::put('coupon', [
               'coupon_name' => $coupon->name,
               'coupon_code' => $coupon->code,
               'discount_type' => "amount",
               'discount' => $coupon->discount,
           ]);
        }
        else if( $coupon->discount_type === "percent" ){
            Session::put('coupon', [
                'coupon_name' => $coupon->name,
                'coupon_code' => $coupon->code,
                'discount_type' => "percent",
                'discount' => $coupon->discount,
            ]);
        }

        return response()->json(['message' => 'Coupon Applied successfully']);
    }


    public function coupon_calculation(Request $request)
    {
        $all_carts = DB::table('carts')
                ->leftJoin('products', 'products.id', 'carts.product_id')
                ->leftJoin('product_colors', 'product_colors.id', 'carts.color_id')
                ->leftJoin('product_sizes', 'product_sizes.id', 'carts.size_id')
                ->select('carts.*', 'products.thumb_image', 'products.name', 'products.id as pdt_id', 'products.slug', 'products.price', 'products.offer_price', 'product_sizes.size_name', 'product_sizes.size_price', 'product_colors.color_name', 'product_colors.color_price')
                ->whereNull('carts.order_id')
                ->where('carts.user_id', Auth::user()->id ?? 1)
                ->get();

        $subTotal = 0;
        foreach( $all_carts as $item  ){
            $subTotal += ( ($item->offer_price ? $item->offer_price : $item->price) + $item->color_price + $item->size_price ) * $item->qty;
        }

        if( Session::has('coupon') ){
            $coupon = Session::get('coupon');

            if( $coupon['discount_type'] === "amount" ){
                 $total = $subTotal - $coupon['discount'];
                 return response()->json(['status' => 'success', 'cart_total' => $total, 'discount' => $coupon['discount']]);
            }

            else if( $coupon['discount_type'] === "percent" ){
                $discount = $subTotal - ( $subTotal * $coupon['discount'] / 100);
                $total    = $subTotal - $discount;
                return response()->json(['status' => 'success', 'cart_total' => $total, 'discount' => $discount]);
            }
        }
    }


}
