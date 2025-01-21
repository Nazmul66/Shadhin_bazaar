<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\ProductSize;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function product_page(Request $request)
    {
        if( $request->has('categories') ){
            $categoryItems = Category::where('status', 1)->get();
            $category = Category::where('slug', $request->categories)->firstOrFail();
            $products = Product::where([
                'category_id' => $category->id,
                'is_approved' => 1,
                'status' => 1,
            ])->paginate(12);
        }
        elseif( $request->has('sub_categories') ){
            $categoryItems = Subcategory::where('status', 1)->get();
            $subCat = Subcategory::where('slug', $request->sub_categories)->firstOrFail();
            $products = Product::where([
                'subCategory_id' => $subCat->id,
                'is_approved' => 1,
                'status' => 1,
            ])->paginate(12);
        }
        else{
            $categoryItems = Category::where('status', 1)->get();
            $products = Product::where([
                'is_approved' => 1,
                'status' => 1,
            ])->orderBy('id', 'DESC')->paginate(12);
        }

        $brands = Brand::where('status', 1)->get();
        return view('frontend.pages.product_pages.product', compact('products', 'categoryItems', 'brands'));
    }

    public function show_product_details($slug)
    {
        $products = Product::where('status', 1)->orderBy('product_view', 'desc')->get();
        $product = Product::leftJoin('categories', 'categories.id', 'products.category_id')
                ->select('products.*', 'categories.category_name as cat_name')
                ->where('products.slug', $slug)
                ->first();

        // Handle case where the product is not found
        if (!$product) {
            abort(404);
        }

        $product->increment('product_view');

        $product_sizes  = ProductSize::where('product_id', $product->id)->get();
        $product_colors = ProductColor::where('product_id', $product->id)->get();
        $product_images = ProductImage::where('product_id', $product->id)->orderBy('order_id', 'desc')->get();

        $related_products = 
                    Product::where('category_id', '=', $product->category_id)
                    ->where('id', '!=', $product->id)
                    ->where('status', 1)
                    ->get();

        $socialLinks = \Share::page(url()->current(), 'Share title')
                ->facebook()
                ->twitter()
                ->linkedin()
                ->whatsapp()
                ->reddit()
                ->pinterest()
                ->telegram();

        $socialLinks = str_replace('<a ', '<a target="_blank" ', $socialLinks);

        return view('frontend.pages.product_pages.product_details', [
            'products'         => $products,
            'product'          => $product,
            'product_sizes'    => $product_sizes,
            'product_colors'   => $product_colors,
            'product_images'   => $product_images,
            'related_products' => $related_products,
            'socialLinks'      => $socialLinks,
        ]);
    }


}
