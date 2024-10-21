<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function show_product_details(string $slug)
    {
        $data['product'] = Product::where('slug', $slug)->first();
        $data['related_products'] = Product::where('category_id', '=', $data['product']->category_id)
                                ->where('id', '!=', $data['product']->id)
                                ->where('status', 1)
                                ->get();
        return view('frontend.pages.product_pages.product_details', $data);
    }


    // add to cart 
    public function productAddToCart(Request $request)
    {
    //  dd($request->all());
        $exist_cart = Cart::where('product_id', $request->product_id)
        ->where('color_id', $request->color_id)
        ->where('size_id', $request->size_id)
        ->whereNull('order_id')
        ->where('user_id', Auth::user()->id ?? 1)  // Use authenticated user's ID or default to 1 for testing
        ->first();

        if (!empty($exist_cart)) {
            // Check if quantity is provided, else increment by 1
            if ($request->qty) {
                // If the quantity is provided, add it to the existing quantity
                $exist_cart->qty += $request->qty;
            } else {
                // If no quantity is provided, increment by 1
                $exist_cart->increment('qty');
            }
            // Save or update the cart item with the new quantity
            $exist_cart->save();
        } else {
            // Create a new cart entry for different product/color/size combinations
            $cart = new Cart();

            $cart->product_id = $request->product_id;
            $cart->color_id   = $request->color_id;
            $cart->size_id    = $request->size_id;
            $cart->user_id    = Auth::user()->id ?? 1;
            $cart->price      = $request->price;
            $cart->qty        = $request->qty ?? 1;  // Default to 1 if no quantity is provided

            $cart->save();
        }

        // Get the updated cart count
        $total_cart = Cart::where('user_id', Auth::user()->id ?? 1)->count();

        // Return a response
        return response()->json(['status' => 'success', 'data' => $cart ?? $exist_cart, 'total' => $total_cart]);
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







    public function product_category()
    {
        return view('frontend.pages.product_pages.product_category');
    }

    public function product_brands()
    {
        return view('frontend.pages.product_pages.brands');
    }
}
