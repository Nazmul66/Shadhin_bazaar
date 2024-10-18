<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

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

    public function productAddToCart(Request $request)
    {
    //    dd($request->all());

      $data = [
        'id' => $request->product_id, 
        'name' => $request->name,
        'price' => $request->price,
        'qty' => $request->qty,
        'weight' => 10,
        'attributes' => [
            'color_id' => $request->color_id,
            'size_id' => $request->size_id,
        ]
      ];
 
    //  dd($data);
    Cart::add($data);
    }

    public function cart_clear()
    {
        Cart::destroy();
        return redirect()->back();
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
