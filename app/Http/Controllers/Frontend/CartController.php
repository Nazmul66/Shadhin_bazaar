<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    public function cart_view()
    {
        $data['cartItems']  =  Cart::content();
        return view('frontend.pages.product_pages.cart_view', $data);
    }

    public function addCart(Request $request)
    {
        // dd($request->all());
        $product = Product::findOrFail($request->product_id);

        $product_color = ProductColor::where('product_id', $product->id)->where('id', $request->color_id)->first();
        $product_size  = ProductSize::where('product_id', $product->id)->where('id', $request->size_id)->first();

        $productPrice = 0;
        if( checkDiscount($product) ){
            if( $product->discount_type === 'amount' ){
                $productPrice = $product->selling_price - $product->discount_value;
            }
            elseif( $product->discount_type === 'percent'){
                $productPrice = $product->selling_price - ($product->selling_price * $product->discount_value / 100);
            }
            else{
                $productPrice = $product->selling_price;
            }
        }
        else{
            $productPrice = $product->selling_price;  
        }

        $cartData = [];
        $cartData['id']                     = $product->id;
        $cartData['name']                   = $product->name;
        $cartData['qty']                    = $request->qty;
        $cartData['price']                  = $productPrice;
        $cartData['weight']                 = 10;
        $cartData['options']['size_id']     = $product_size->id;
        $cartData['options']['size_name']   = $product_size->size_name;
        $cartData['options']['size_price']  = $product_size->size_price;
        $cartData['options']['color_id']    = $product_color->id;
        $cartData['options']['color_name']  = $product_color->color_name;
        $cartData['options']['color_price'] = $product_color->color_price;
        $cartData['options']['slug']        = $product->slug;
        $cartData['options']['image']       = $product->thumb_image;
        $cartData['options']['image']       = $product->thumb_image;

        // dd($cartData);
        Cart::add($cartData);

        return response()->json([
           'status' => true,
           'button_value' => $request->button_value,
        ]);
    }

    public function updateProductQuantity(Request $request)
    {
        // dd($request->all());
        Cart::update($request->rowId, $request->quantity);
        $productTotal = $this->getProductTotal($request->rowId);
   
        // dd($productTotal);
        return response()->json([
            'status'       => 'success',
            'message'      => 'Product quantity updated',
            'productTotal' => $productTotal,
        ]);
    }

    public function getProductTotal($rowId)
    {
        $product = Cart::get($rowId);
        $totalPrice = ($product->price + ($product->options->size_price ?? 0) + ($product->options->color_price ?? 0)) * $product->qty;

        return $totalPrice;
    }

    public function clear_cart()
    {
        Cart::destroy();

        return response()->json([
           'status'  => 'success',
           'message' => 'Cart cleared successfully',
        ]);
    }















    // public function get_sidebar_cart()
    // {
    //     $userId = Auth::user()->id; 
    
    //     $all_carts = DB::table('carts')
    //             ->leftJoin('products', 'products.id', 'carts.product_id')
    //             ->leftJoin('product_colors', 'product_colors.id', 'carts.color_id')
    //             ->leftJoin('product_sizes', 'product_sizes.id', 'carts.size_id')
    //             ->select('carts.*', 'products.thumb_image', 'products.name', 'products.id as pdt_id', 'products.slug', 'products.price', 'products.offer_price', 'product_sizes.size_name', 'product_sizes.size_price', 'product_colors.color_name', 'product_colors.color_price')
    //             ->whereNull('carts.order_id')
    //             ->where('carts.user_id', $userId)
    //             ->get();

    //     $subtotal = 0;
    //     foreach ($all_carts as $item) {
    //         $item->image_url = asset($item->thumb_image);

    //         $basePrice = $item->offer_price ? $item->offer_price : $item->price;
    //         $subtotal += ($basePrice + $item->color_price + $item->size_price) * $item->qty;
    //     }

    //     return response()->json([
    //         'status' => 'success',
    //         'carts' => $all_carts,
    //         'subtotal' => $subtotal 
    //     ]);
    // }


    // public function get_main_cart()
    // {
    //     $all_carts = DB::table('carts')
    //             ->leftJoin('products', 'products.id', 'carts.product_id')
    //             ->leftJoin('product_colors', 'product_colors.id', 'carts.color_id')
    //             ->leftJoin('product_sizes', 'product_sizes.id', 'carts.size_id')
    //             ->select('carts.*', 'products.thumb_image', 'products.name', 'products.id as pdt_id', 'products.slug', 'products.price', 'products.offer_price', 'product_sizes.size_name', 'product_sizes.size_price', 'product_colors.color_name', 'product_colors.color_price')
    //             ->whereNull('carts.order_id')
    //             ->where('carts.user_id', Auth::user()->id)
    //             ->get();
        
    //     $subTotal = 0;
    //     foreach( $all_carts as $item  ){
    //         $item->image_url = asset($item->thumb_image);

    //         $subTotal += ( ($item->offer_price ? $item->offer_price : $item->price) + $item->color_price + $item->size_price ) * $item->qty;
    //     }

    //     return response()->json([
    //         'status' => 'success',
    //         'carts' => $all_carts,
    //         'total_count' => $all_carts->count(),
    //         'subtotal' => $subTotal 
    //     ]);
    // }

    // public function update_cart_quantity(Request $request)
    // {
    //     // dd($request->all());

    //     $userId = Auth::user()->id;
    
    //     // // Find the cart item by its ID and check if it belongs to the current user
    //     $cart = Cart::leftJoin('products', 'products.id', 'carts.product_id')
    //                 ->leftJoin('product_colors', 'product_colors.id', 'carts.color_id')
    //                 ->leftJoin('product_sizes', 'product_sizes.id', 'carts.size_id')
    //                 ->select('carts.*', 'products.thumb_image', 'products.name', 'products.id as pdt_id', 'products.slug', 'products.price', 'products.offer_price', 'product_sizes.size_name', 'product_sizes.size_price', 'product_colors.color_name', 'product_colors.color_price')
    //                 ->where('carts.id', $request->cart_id)
    //                 ->where('carts.product_id', $request->product_id)
    //                 ->where('carts.user_id', $userId)
    //                 ->whereNull('carts.order_id')
    //                 ->first();
    //     // dd( $cart );
    
    //     // // If the cart item exists
    //     if ($cart) {
    //         // Update the quantity of the cart item
    //         $cart->qty  =  $request->qty;
    //         $cart->save();
    
    //         // Recalculate the item price (considering color and size prices if applicable)
    //         $itemBasePrice = $cart->offer_price ? $cart->offer_price : $cart->price;
    //         $price = $itemBasePrice * $cart->qty;
    //         $mainPrice = ( $itemBasePrice + $cart->color_price + $cart->size_price ) * $cart->qty;
    
    //         // Recalculate the subtotal for all cart items for this user
    //         $all_carts = DB::table('carts')
    //                 ->leftJoin('products', 'products.id', 'carts.product_id')
    //                 ->leftJoin('product_colors', 'product_colors.id', 'carts.color_id')
    //                 ->leftJoin('product_sizes', 'product_sizes.id', 'carts.size_id')
    //                 ->select('carts.*', 'products.thumb_image', 'products.name', 'products.id as pdt_id', 'products.slug', 'products.price', 'products.offer_price', 'product_sizes.size_name', 'product_sizes.size_price', 'product_colors.color_name', 'product_colors.color_price')
    //                 ->whereNull('carts.order_id')
    //                 ->where('carts.user_id', Auth::user()->id)
    //                 ->get();
            
    //         $subtotal = 0;
    //         foreach ($all_carts as $item) {
    //             $basePrice = $item->offer_price ? $item->offer_price : $item->price;
    //             $subtotal += ($basePrice + $item->color_price + $item->size_price) * $item->qty;
    //         }
    //         // dd($itemFinal,  $subtotal);
    
    //         // Return the updated values as JSON
    //         return response()->json([
    //             'status' => 'success',
    //             'price' => $price, 
    //             'mainPrice' => $mainPrice, 
    //             'subtotal' => $subtotal 
    //         ]);
    //     } else {
    //         return response()->json(['status' => 'error', 'message' => 'Cart item not found'], 404);
    //     }
    // }
    
    
    // public function deleteCartItem(Request $request)
    // {
    //     $cartItem = Cart::where('id', $request->cart_id)
    //                     ->where('product_id', $request->prdtId)
    //                     ->where('user_id', Auth::user()->id)
    //                     ->whereNull('order_id')
    //                     ->first();
    
    //     if ($cartItem) {
    //         $cartItem->delete(); // Delete the item
    
    //         // Recalculate subtotal
    //         $all_carts = DB::table('carts')
    //                 ->leftJoin('products', 'products.id', 'carts.product_id')
    //                 ->leftJoin('product_colors', 'product_colors.id', 'carts.color_id')
    //                 ->leftJoin('product_sizes', 'product_sizes.id', 'carts.size_id')
    //                 ->select('carts.*', 'products.thumb_image', 'products.name', 'products.id as pdt_id', 'products.slug', 'products.price', 'products.offer_price', 'product_sizes.size_name', 'product_sizes.size_price', 'product_colors.color_name', 'product_colors.color_price')
    //                 ->whereNull('carts.order_id')
    //                 ->where('carts.user_id', Auth::user()->id)
    //                 ->get();
    
    //         $subtotal = 0;
    //         foreach ($all_carts as $item) {
    //             $basePrice = $item->offer_price ? $item->offer_price : $item->price;
    //             $subtotal += ($basePrice + $item->color_price + $item->size_price) * $item->qty;
    //         }

    //         // If the cart is now empty, forget the coupon session
    //         $discount = session('coupon')['discount'] ?? 0;

    //         if ($all_carts->isEmpty()) {
    //             session()->forget('coupon');
    //             $couponRemoved = true;
    //             $discount = 0; // No discount if coupon session is forgotten
    //         }
    
    //         // Return a success response
    //         return response()->json([
    //             'status' => 'success',
    //             'subtotal' => $subtotal,
    //             'total' => $all_carts,
    //             'discount' => $discount,
    //         ]);
    //     } else {
    //         return response()->json(['status' => 'error', 'message' => 'Cart item not found'], 404);
    //     }
    // }


    // public function clearCart()
    // {
    //     // Delete all cart items for this user
    //     Cart::where('user_id', Auth::user()->id)->delete();

    //     $all_carts = DB::table('carts')
    //             ->leftJoin('products', 'products.id', 'carts.product_id')
    //             ->leftJoin('product_colors', 'product_colors.id', 'carts.color_id')
    //             ->leftJoin('product_sizes', 'product_sizes.id', 'carts.size_id')
    //             ->select('carts.*', 'products.thumb_image', 'products.name', 'products.id as pdt_id', 'products.slug', 'products.price', 'products.offer_price', 'product_sizes.size_name', 'product_sizes.size_price', 'product_colors.color_name', 'product_colors.color_price')
    //             ->whereNull('carts.order_id')
    //             ->where('carts.user_id', Auth::user()->id)
    //             ->get();

    //     // If the cart is now empty, forget the coupon session
    //     if ($all_carts->isEmpty()) {
    //         session()->forget('coupon');
    //     }

    //     return response()->json([
    //         'status' => 'success',
    //     ]);
    // }

}
