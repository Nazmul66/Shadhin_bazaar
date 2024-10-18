<?php

  //__ Set Sidebar Item Active __// 
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
  

  //__ Check discount for products __//  
  function checkDiscount($product)
  {
      $current_date = date('Y-m-d');

      if( $product->offer_price > 0 && $current_date >= $product->offer_start_date  && $current_date <= $product->offer_end_date){
        return true;
      }
      return false;
  }


    //__ Calculate for discount percentage __// 
    function calcDiscountPercent($originalPrice, $discountPrice)
    {
      $discountAmount = $originalPrice - $discountPrice;
      $discountPercent = ( $discountAmount / $discountPrice ) * 100;

      return round($discountPercent);
    }


    //__ Check Product Type __//
    function productType(string $type)
    {
        if( $type == "new_arrived"){
            return 'new'; 
        }
        else if( $type == "featured"){
          return 'featured';
        }
        else if( $type == "best"){
          return 'best';
        }
        else if( $type == "top"){
          return 'top';
        }
        else{
          return 'none';
        }
    }


    //__ Tags measurement __//
    function productTags(string $tags)
    {
        $explode = explode(',', $tags); // 
        $implode = implode(', ', $explode);
        return  $implode;
    }


?>