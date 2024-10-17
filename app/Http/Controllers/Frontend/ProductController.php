<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show_product_details(string $slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('frontend.pages.product_pages.product_details', compact('product'));
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
