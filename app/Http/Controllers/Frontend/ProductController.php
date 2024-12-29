<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function show_product_details()
    {
        // $data['product'] = Product::where('slug', $slug)->first();
        // $data['related_products'] = Product::where('category_id', '=', $data['product']->category_id)
        //                         ->where('id', '!=', $data['product']->id)
        //                         ->where('status', 1)
        //                         ->get();
        // return view('frontend.pages.product_pages.product_details', $data);
        return view('frontend.pages.product_pages.product_details');
    }


    // add to cart 
    public function productAddToCart(Request $request)
    {  
        if( !Auth::Check() ){
            return response()->json(['status' => 'warning', ]);
            // return redirect()->route('register.login');
        }

        $exist_cart = Cart::where('product_id', $request->product_id)
                ->where('color_id', $request->color_id)
                ->where('size_id', $request->size_id)
                ->whereNull('order_id')
                ->where('user_id', Auth::user()->id)
                ->first();
    
        if (!empty($exist_cart)) {
            if ($request->qty) {
                $exist_cart->qty += $request->qty;
            } else {
                $exist_cart->increment('qty');
            }
            // $exist_cart->price = $totalPrice;  
            $exist_cart->save();

        } else {
            $cart = new Cart();
    
            $cart->product_id = $request->product_id;
            $cart->color_id   = $request->color_id;
            $cart->size_id    = $request->size_id;
            $cart->user_id    = Auth::user()->id ;
            $cart->price      = $request->price;   // Set the total price including color and size adjustments
            $cart->qty        = $request->qty ?? 1;  // Default to 1 if no quantity is provided
    
            $cart->save();
        }
    
        $all_carts = DB::table('carts')
                    ->leftJoin('products', 'products.id', 'carts.product_id')
                    ->leftJoin('product_colors', 'product_colors.id', 'carts.color_id')
                    ->leftJoin('product_sizes', 'product_sizes.id', 'carts.size_id')
                    ->select('carts.*', 'products.thumb_image', 'products.name', 'products.id as pdt_id', 'products.slug', 'products.price', 'products.offer_price', 'product_sizes.size_name', 'product_sizes.size_price', 'product_colors.color_name', 'product_colors.color_price')
                    ->whereNull('carts.order_id')
                    ->where('carts.user_id', Auth::user()->id )
                    ->get();
        
        // calculate data
        $subtotal = 0;
        foreach ($all_carts as $data) {
            // Set the product image URL
            $data->image_url = asset($data->thumb_image);
    
            $itemBasePrice = $data->offer_price ? $data->offer_price : $data->price;
            $itemTotalPrice = ($itemBasePrice + $data->size_price + $data->color_price) * $data->qty;
    
            // Add this item's total to the subtotal
            $subtotal += $itemTotalPrice;
        }
    
        return response()->json([
            'status' => 'success', 
            'total' => $all_carts->count(), 
            "carts" => $all_carts, 
            'subtotal' => $subtotal
        ]);
    }


    // ajax call for realtime price update
    public function getColorSizePrice(Request $request)
    {
        // dd($request->all());
        $product = Product::where('id', $request->productId)->first();
        $qty = $request->qty ? (int) $request->qty : 1;  // Get quantity, default is 1 if not provided

        // Get the color price if a color is selected
        $color_price = 0;
        if ($request->colorId) {
            $productColor = ProductColor::where('product_id', $product->id)->where('id', $request->colorId)->first();
            $color_price = $productColor ? $productColor->color_price : 0;
        }

        // Get the size price if a size is selected
        $size_price = 0;
        if ($request->sizeId) {
            $productSize = ProductSize::where('product_id', $product->id)->where('id', $request->sizeId)->first();
            $size_price = $productSize ? $productSize->size_price : 0;
        }

        // Calculate final prices by adding color and size prices
        $final_price = $color_price + $size_price + ( $product->price * $qty );
        $final_offer_price = $product->offer_price ? $color_price + $size_price + ( $product->offer_price * $qty ) : null;

        return response()->json([
            'status' => 'success',
            'price' => $final_price,
            'offer_price' => $final_offer_price
        ]);
    }


    // delete cart data
    public function removeCart($prdtId, $colorId = null, $sizeId = null)
    {
        // dd($prdtId, $colorId , $sizeId);
        // Find the cart item with the product_id, and optionally match color_id and size_id
        $cartQuery = Cart::where('product_id', $prdtId);
    
        if (!empty($colorId)) {
            $cartQuery->where('color_id', $colorId);
        }
    
        if (!empty($sizeId)) {
            $cartQuery->where('size_id', $sizeId);
        }
    
        $cart = $cartQuery->first();

        if ($cart) {
            // Delete the cart item
            $cart->delete();

            $all_carts = DB::table('carts')
                    ->leftJoin('products', 'products.id', 'carts.product_id')
                    ->leftJoin('product_colors', 'product_colors.id', 'carts.color_id')
                    ->leftJoin('product_sizes', 'product_sizes.id', 'carts.size_id')
                    ->select('carts.*', 'products.thumb_image', 'products.name', 'products.id as pdt_id', 'products.slug', 'products.price', 'products.offer_price', 'product_sizes.size_name', 'product_sizes.size_price', 'product_colors.color_name', 'product_colors.color_price')
                    ->whereNull('carts.order_id')
                    ->where('carts.user_id', Auth::user()->id)
                    ->get();

                    // calculate data
        $subtotal = 0;
        foreach ($all_carts as $data) {
            // Calculate item price (base price + size price + color price) * quantity
            $itemBasePrice = $data->offer_price ? $data->offer_price : $data->price;
            $itemTotalPrice = ($itemBasePrice + $data->size_price + $data->color_price) * $data->qty;
    
            // Add this item's total to the subtotal
            $subtotal += $itemTotalPrice;
        }

            // If the cart is now empty, forget the coupon session
            if ($all_carts->isEmpty()) {
                session()->forget('coupon');
            }
            
            return response()->json([
                'success' => true, 
                'total' => $all_carts->count(), 
                'subtotal' => $subtotal
            ]);
        }
        else{
            return response()->json(['success' => false, 'message' => 'Item not found'], 404);
        }
    
    }


    // get subtotal card items
    public function getCart(Request $request)
    {
        // dd($request->all());
        $userId = Auth::user()->id;

        $all_carts = DB::table('carts')
                    ->leftJoin('products', 'products.id', 'carts.product_id')
                    ->leftJoin('product_colors', 'product_colors.id', 'carts.color_id')
                    ->leftJoin('product_sizes', 'product_sizes.id', 'carts.size_id')
                    ->select('carts.*', 'products.thumb_image', 'products.name', 'products.id as pdt_id', 'products.slug', 'products.price', 'products.offer_price', 'product_sizes.size_name', 'product_sizes.size_price', 'product_colors.color_name', 'product_colors.color_price')
                    ->whereNull('carts.order_id')
                    ->where('carts.user_id', $userId)
                    ->get();

        $subtotal = 0;
        foreach ($all_carts as $data) {
            $data->image_url = asset($data->thumb_image);
            
            $itemPrice = $data->offer_price ? $data->offer_price : $data->price;
            $itemTotal = ($itemPrice * $data->qty) + ($data->color_price ?? 0) + ($data->size_price ?? 0);
            $subtotal += $itemTotal;
        }

        return response()->json(['success' => true, 'carts' => $all_carts, 'subtotal' => $subtotal, 'total' => count($all_carts)]);
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
