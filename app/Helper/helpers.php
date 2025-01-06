<?php

  //__ Set Sidebar Item Active __// 

use App\Models\Setting;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

  function setActive(array $route)
  {
      if( is_array($route) ){
          foreach( $route as $r ){
              if( request()->routeIs($r)){
                return 'mm-active';
              }
          }
      }
  }
  
  if (!function_exists('getSetting')) {
    /**
     * @return mixed
     */
    function getSetting()
    {
        $setting = Setting::first();
        return $setting;
    }
}

  //__ Check discount for products __//  
  function checkDiscount($product)
  {
    $current_date = Carbon::now()->format('Y-m-d');
    $offer_start_date = Carbon::parse($product->offer_start_date)->format('Y-m-d');
    $offer_end_date = Carbon::parse($product->offer_end_date)->format('Y-m-d');

      if( $product->purchase_price > 0 && $current_date >= $offer_start_date  && $current_date <= $offer_end_date){
        return true;
      }
      return false;
  }


  function getCartTotal()
  {
    $total = 0;
    foreach (Cart::content() as  $product) {
        $total += ($product->price + ($product->options->size_price ?? 0) + ($product->options->color_price ?? 0)) * $product->qty;
    }
    return $total;
  }

  function getMainCartTotal()
  {
    if( Session::has('coupon') ){
        $coupon = Session::get('coupon');

        if( $coupon['discount_type'] === "amount" ){
            $total  =  getCartTotal() - $coupon['discount'];
            return $total;
        }
        elseif( $coupon['discount_type'] === "percent" ){
            $discount  =  ( getCartTotal() * $coupon['discount'] ) / 100;
            $total     =  getCartTotal() - $discount;
            return $total;
        }
    }
    else{
       return getCartTotal();
    }
  }


    //__ Calculate for discount percentage __// 
    function calcDiscountPercent($originalPrice, $discountPrice)
    {
      $discountAmount = $originalPrice - $discountPrice;
      $discountPercent = ( $discountAmount / $discountPrice ) * 100;

      return round($discountPercent);
    }


    // //__ Check Product Type __//
    // function productType(string $type)
    // {
    //     if( $type == "new_arrived"){
    //         return 'new'; 
    //     }
    //     else if( $type == "featured"){
    //       return 'featured';
    //     }
    //     else if( $type == "best"){
    //       return 'best';
    //     }
    //     else if( $type == "top"){
    //       return 'top';
    //     }
    //     else{
    //       return 'none';
    //     }
    // }


    // //__ Tags measurement __//
    // function productTags(string $tags)
    // {
    //     $explode = explode(',', $tags); // 
    //     $implode = implode(', ', $explode);
    //     return  $implode;
    // }

    
    // // Calculate Cart subTotal
    // function cart_subTotal(){
    //       $all_carts = DB::table('carts')
    //             ->leftJoin('products', 'products.id', 'carts.product_id')
    //             ->leftJoin('product_colors', 'product_colors.id', 'carts.color_id')
    //             ->leftJoin('product_sizes', 'product_sizes.id', 'carts.size_id')
    //             ->select('carts.*', 'products.thumb_image', 'products.name', 'products.id as pdt_id', 'products.slug', 'products.price', 'products.offer_price', 'product_sizes.size_name', 'product_sizes.size_price', 'product_colors.color_name', 'product_colors.color_price')
    //             ->whereNull('carts.order_id')
    //             ->where('carts.user_id', Auth::user()->id)
    //             ->get();


    //       // calculate data
    //       $subtotal = 0;
    //       foreach ($all_carts as $data) {
    //         // Calculate item price (base price + size price + color price) * quantity
    //         $itemBasePrice = $data->offer_price ? $data->offer_price : $data->price;
    //         $itemTotalPrice = ($itemBasePrice + $data->size_price + $data->color_price) * $data->qty;

    //         // Add this item's total to the subtotal
    //         $subtotal += $itemTotalPrice;
    //       }

    //       return $subtotal;
    // }


    //   // Calculate Cart Count
    //   function all_carts(){
    //     return DB::table('carts')
    //           ->leftJoin('products', 'products.id', 'carts.product_id')
    //           ->leftJoin('product_colors', 'product_colors.id', 'carts.color_id')
    //           ->leftJoin('product_sizes', 'product_sizes.id', 'carts.size_id')
    //           ->select('carts.*', 'products.thumb_image', 'products.name', 'products.id as pdt_id', 'products.slug', 'products.price', 'products.offer_price', 'product_sizes.size_name', 'product_sizes.size_price', 'product_colors.color_name', 'product_colors.color_price')
    //           ->whereNull('carts.order_id')
    //           ->where('carts.user_id', Auth::user()->id )
    //           ->get();
    //   }


    // // Calculate Cart Count
    // function total_counts(){
    //   return DB::table('carts')
    //         ->leftJoin('products', 'products.id', 'carts.product_id')
    //         ->leftJoin('product_colors', 'product_colors.id', 'carts.color_id')
    //         ->leftJoin('product_sizes', 'product_sizes.id', 'carts.size_id')
    //         ->select('carts.*', 'products.thumb_image', 'products.name', 'products.id as pdt_id', 'products.slug', 'products.price', 'products.offer_price', 'product_sizes.size_name', 'product_sizes.size_price', 'product_colors.color_name', 'product_colors.color_price')
    //         ->whereNull('carts.order_id')
    //         ->where('carts.user_id', Auth::user()->id)
    //         ->get()->count();
    // }


?>