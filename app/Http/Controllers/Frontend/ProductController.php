<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
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

    public function product_category()
    {
        return view('frontend.pages.product_pages.product_category');
    }

    public function product_brands()
    {
        return view('frontend.pages.product_pages.brands');
    }
}
