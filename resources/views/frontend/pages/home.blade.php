@extends('frontend.layout.master')

@push('add-meta')
    <title>Sazao || e-Commerce HTML Template</title>
@endpush

@push('add-css')

@endpush

{{-- @php
    $wishlistItems = App\Models\Wishlist::where('user_id', auth()->id())->pluck('product_id')->toArray();
@endphp --}}

@section('body-content')

<!-- Slider -->
<div class="tf-slideshow slider-style2 slider-electronic slider-position slider-effect-fade">
    <div dir="ltr" class="swiper tf-sw-slideshow" data-effect="fade" data-preview="1" data-tablet="1" data-mobile="1" data-centered="false" data-space="0" data-space-mb="0" data-loop="true" data-auto-play="true">
        <div class="swiper-wrapper">

            @foreach ($sliders as $row)
                <div class="swiper-slide">
                    <div class="wrap-slider">
                        <img src="{{ asset($row->slider_image) }}" alt="{{ $row->title }}">
                        <div class="box-content">
                            <div class="container">
                                <div class="content-slider">
                                    <div class="box-title-slider">
                                        <div>
                                            <p class="fade-item fade-item-1 subtitle text-btn-uppercase text-primary">{{ $row->type }}</p>
                                            <div class="fade-item fade-item-2 title-display heading">{{ $row->title }}</div>
                                        </div>
                                        <p class="fade-item fade-item-3 body-text-1 subheading"><strong>Price: {{ $row->starting_price }} Tk </strong></p>
                                    </div>
                                    <div class="fade-item fade-item-4 box-btn-slider">
                                        <a href="{{ url($row->btn_url ?? "/" ) }}" class="tf-btn btn-fill">
                                            <span class="text">Shop Now</span>
                                            <i class='bx bx-right-arrow-alt'></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="wrap-pagination d-block">
        <div class="container">
            <div class="sw-dots sw-pagination-slider type-square justify-content-center"></div>
        </div>
    </div>
</div>
<!-- /Slider -->

<!-- Marquee -->
<section class="tf-marquee">
            <div class="marquee-wrapper">
                <div class="initial-child-container">
                    <div class="marquee-child-item">
                        <p class="text-btn-uppercase">Free shipping on all orders over $20.00</p>
                    </div>
                    <div class="marquee-child-item">
                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                    </div>
                    <div class="marquee-child-item">
                        <p class="text-btn-uppercase">Returns are free within 14 days</p>
                    </div>
                    <div class="marquee-child-item">
                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                    </div>
                    <!-- 2 -->
                    <div class="marquee-child-item">
                        <p class="text-btn-uppercase">Free shipping on all orders over $20.00</p>
                    </div>
                    <div class="marquee-child-item">
                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                    </div>
                    <div class="marquee-child-item">
                        <p class="text-btn-uppercase">Returns are free within 14 days</p>
                    </div>
                    <div class="marquee-child-item">
                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                    </div>
                    <!-- 3 -->
                    <div class="marquee-child-item">
                        <p class="text-btn-uppercase">Free shipping on all orders over $20.00</p>
                    </div>
                    <div class="marquee-child-item">
                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                    </div>
                    <div class="marquee-child-item">
                        <p class="text-btn-uppercase">Returns are free within 14 days</p>
                    </div>
                    <div class="marquee-child-item">
                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                    </div>
                    <!-- 4 -->
                    <div class="marquee-child-item">
                        <p class="text-btn-uppercase">Free shipping on all orders over $20.00</p>
                    </div>
                    <div class="marquee-child-item">
                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                    </div>
                    <div class="marquee-child-item">
                        <p class="text-btn-uppercase">Returns are free within 14 days</p>
                    </div>
                    <div class="marquee-child-item">
                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                    </div>
                    <!-- 5 -->
                    <div class="marquee-child-item">
                        <p class="text-btn-uppercase">Free shipping on all orders over $20.00</p>
                    </div>
                    <div class="marquee-child-item">
                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                    </div>
                    <div class="marquee-child-item">
                        <p class="text-btn-uppercase">Returns are free within 14 days</p>
                    </div>
                    <div class="marquee-child-item">
                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                    </div>
                    <!-- 6 -->
                    <div class="marquee-child-item">
                        <p class="text-btn-uppercase">Free shipping on all orders over $20.00</p>
                    </div>
                    <div class="marquee-child-item">
                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                    </div>
                    <div class="marquee-child-item">
                        <p class="text-btn-uppercase">Returns are free within 14 days</p>
                    </div>
                    <div class="marquee-child-item">
                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                    </div>
                </div>
            </div>
        </section>
<!-- /Marquee -->

<!-- Categories -->
<section class="flat-spacing">
    <div class="container">
        <div class="heading-section-2 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
            <h3 class="heading">Popular Categories</h3>
            {{-- <a href="shop-collection.html" class="btn-line py_8">View All Collection</a> --}}
        </div>
    </div>

    <div class="container-full slider-layout-right">
        <div dir="ltr" class="swiper tf-sw-collection swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden" data-preview="5.1" data-tablet="3.1" data-mobile="2.1" data-space-lg="20" data-space-md="20" data-space="15" data-pagination="1" data-pagination-md="1" data-pagination-lg="1">
            <div class="swiper-wrapper" id="swiper-wrapper-bce54eacbb9682ae" aria-live="polite" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">


                @foreach ( App\Models\Category::where('status', 1)->orderBy('id', "desc")->get(); as $key => $item)
                    <!-- {{ $key + 1 }} -->
                    <div class="swiper-slide swiper-slide-next" role="group" aria-label="1 / 7" style="width: 256.275px; margin-right: 20px;">
                        <div class="collection-position-2 style-3 hover-img wow fadeInUp" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s; animation-name: fadeInUp;">
                            <a class="img-style">
                                <img class=" ls-is-cached lazyloaded" data-src="{{ asset($item->category_img) }}" src="{{ asset($item->category_img) }}" alt="{{ $item->slug }}" style="height: 300px;">
                            </a>
                            @php
                                $subcategory = App\Models\Subcategory::where('category_id', $item->id)->where('status', 1)->count();
                            @endphp
                            <div class="content">
                                <a href="{{ route('product.page', ['categories' => $item->slug]) }}" class="cls-btn"><h6 class="text" style="font-size: 15px;">{{ $item->category_name }}</h6> <span class="count-item text-secondary">{{ $subcategory }} items</span><i class='icon bx bx-up-arrow-alt'></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach


                {{-- <!-- 2 -->
                <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 7" style="width: 256.275px; margin-right: 20px;">
                    <div class="collection-position-2 style-3 hover-img wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                        <a class="img-style">
                            <img class=" ls-is-cached lazyloaded" data-src="images/collections/cls10.jpg" src="images/collections/cls10.jpg" alt="banner-cls">
                        </a>
                        <div class="content">
                            <a href="shop-collection.html" class="cls-btn"><h6 class="text">Tops</h6><span class="count-item text-secondary">12 items</span><i class="icon icon-arrowUpRight"></i></a>
                        </div>
                    </div>
                </div>
                <!-- 3 -->
                <div class="swiper-slide" role="group" aria-label="3 / 7" style="width: 256.275px; margin-right: 20px;">
                    <div class="collection-position-2 style-3 hover-img wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <a class="img-style">
                            <img class=" ls-is-cached lazyloaded" data-src="images/collections/cls11.jpg" src="images/collections/cls11.jpg" alt="banner-cls">
                        </a>
                        <div class="content">
                            <a href="shop-collection.html" class="cls-btn"><h6 class="text">Bottoms</h6><span class="count-item text-secondary">12 items</span><i class="icon icon-arrowUpRight"></i></a>
                        </div>
                    </div>
                </div>
                <!-- 4 -->
                <div class="swiper-slide" role="group" aria-label="4 / 7" style="width: 256.275px; margin-right: 20px;">
                    <div class="collection-position-2 style-3 hover-img wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                        <a class="img-style">
                            <img class=" ls-is-cached lazyloaded" data-src="images/collections/cls12.jpg" src="images/collections/cls12.jpg" alt="banner-cls">
                        </a>
                        <div class="content">
                            <a href="shop-collection.html" class="cls-btn"><h6 class="text">Outerwear</h6><span class="count-item text-secondary">12 items</span><i class="icon icon-arrowUpRight"></i></a>
                        </div>
                    </div>
                </div>
                <!-- 5 -->
                <div class="swiper-slide" role="group" aria-label="5 / 7" style="width: 256.275px; margin-right: 20px;">
                    <div class="collection-position-2 style-3 hover-img wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                        <a class="img-style">
                            <img class=" ls-is-cached lazyloaded" data-src="images/collections/cls4.jpg" src="images/collections/cls4.jpg" alt="banner-cls">
                        </a>
                        <div class="content">
                            <a href="shop-collection.html" class="cls-btn"><h6 class="text">Shoes</h6><span class="count-item text-secondary">12 items</span><i class="icon icon-arrowUpRight"></i></a>
                        </div>
                    </div>
                </div>
                <!-- 6 -->
                <div class="swiper-slide" role="group" aria-label="6 / 7" style="width: 256.275px; margin-right: 20px;">
                    <div class="collection-position-2 style-3 hover-img">
                        <a class="img-style">
                            <img class=" ls-is-cached lazyloaded" data-src="images/collections/cls6.jpg" src="images/collections/cls6.jpg" alt="banner-cls">
                        </a>
                        <div class="content">
                            <a href="shop-collection.html" class="cls-btn"><h6 class="text">Accessories</h6><span class="count-item text-secondary">12 items</span><i class="icon icon-arrowUpRight"></i></a>
                        </div>
                    </div>
                </div>
                <!-- 7 -->
                <div class="swiper-slide" role="group" aria-label="7 / 7" style="width: 256.275px; margin-right: 20px;">
                    <div class="collection-position-2 style-3 hover-img wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                        <a class="img-style">
                            <img class=" ls-is-cached lazyloaded" data-src="images/collections/cls12.jpg" src="images/collections/cls12.jpg" alt="banner-cls">
                        </a>
                        <div class="content">
                            <a href="shop-collection.html" class="cls-btn"><h6 class="text">Outerwear</h6><span class="count-item text-secondary">12 items</span><i class="icon icon-arrowUpRight"></i></a>
                        </div>
                    </div>
                </div> --}}
            </div>
        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
    </div>
</section>
<!-- /Categories -->

<!-- Popular Category Products -->
<section class="flat-spacing-4 space-30">
    <div class="container">
        <div class="heading-section-2 wow fadeInUp">
            <h4 style="font-size: 30px!important;">Popular Category Products</h4>
            <ul class="tab-product-v3 justify-content-sm-center" role="tablist">
                <li class="nav-tab-item" role="presentation">
                    <a href="#AllProducts" class="active text-caption-1" data-bs-toggle="tab">All Products</a>
                </li>
                @foreach ($categories as $key => $item)
                    <li class="nav-tab-item" role="presentation">
                        <a href="#{{ $item->slug }}" class="text-caption-1" data-bs-toggle="tab">{{ $item->category_name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="flat-animate-tab">
            <div class="tab-content">
                <div class="tab-pane active show" id="AllProducts" role="tabpanel">
                    <div dir="ltr" class="swiper tf-sw-latest" data-preview="5" data-tablet="4" data-mobile="2" data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1" data-pagination-md="1" data-pagination-lg="1">
                        <div class="swiper-wrapper">

                            @foreach ($products as $row)
                                @php
                                    $wishlistItems = App\Models\Wishlist::where('user_id', auth()->id())->pluck('product_id')->toArray();
                                @endphp
                                <div class="swiper-slide">
                                    <div class="card-product wow fadeInUp" data-wow-delay="0.1s">
                                        <div class="card-product-wrapper">
                                            <a href="{{ route('product.details', $row->slug) }}" class="product-img">
                                                <img class="lazyload img-product" data-src="{{ asset($row->thumb_image) }}" src="{{ asset($row->thumb_image) }}" alt="{{ $row->slug }}">

                                                @php
                                                    $image = App\Models\ProductImage::where('product_id', $row->id)->first();

                                                    $discount = '';
                                                    if( checkDiscount($row) ){
                                                        if ( !empty($row->discount_type === "amount" ) ){
                                                            $discount = '-'. $row->discount_value . "Tk";
                                                        }   
                                                        else if( $row->discount_type === "percent" ){
                                                            $discount = '-'. $row->discount_value . "%";
                                                        }
                                                    }
                                                    
                                                @endphp

                                                @if (!empty($image))
                                                    <img class="lazyload img-hover" data-src="{{ asset($image->images) }}" src="{{ asset($image->images) }}" alt="{{ $row->slug }}">
                                                @endif
                                            </a>
                                            <div class="on-sale-wrap">
                                                <span class="on-sale-item">
                                                    {{ $discount }}
                                                </span>
                                            </div>


                                            @if ( checkDiscount($row) )
                                                @if ( !empty($row->discount_type === "amount") || !empty($row->discount_type === "percent") )
                                                    <div class="marquee-product bg-main">
                                                        <div class="marquee-wrapper">
                                                            <div class="initial-child-container">
                                                                <div class="marquee-child-item">
                                                                    <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                                </div>
                                                                <div class="marquee-child-item">
                                                                    <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                                </div>
                                                                <div class="marquee-child-item">
                                                                    <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                                </div>
                                                                <div class="marquee-child-item">
                                                                    <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                                </div>
                                                                <div class="marquee-child-item">
                                                                    <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                                </div>
                                                                <div class="marquee-child-item">
                                                                    <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                                </div>
                                                                <div class="marquee-child-item">
                                                                    <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                                </div>
                                                                <div class="marquee-child-item">
                                                                    <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                                </div>
                                                                <div class="marquee-child-item">
                                                                    <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                                </div>
                                                                <div class="marquee-child-item">
                                                                    <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="marquee-wrapper">
                                                            <div class="initial-child-container">
                                                                <div class="marquee-child-item">
                                                                    <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                                </div>
                                                                <div class="marquee-child-item">
                                                                    <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                                </div>
                                                                <div class="marquee-child-item">
                                                                    <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                                </div>
                                                                <div class="marquee-child-item">
                                                                    <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                                </div>
                                                                <div class="marquee-child-item">
                                                                    <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                                </div>
                                                                <div class="marquee-child-item">
                                                                    <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                                </div>
                                                                <div class="marquee-child-item">
                                                                    <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                                </div>
                                                                <div class="marquee-child-item">
                                                                    <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                                </div>
                                                                <div class="marquee-child-item">
                                                                    <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                                </div>
                                                                <div class="marquee-child-item">
                                                                    <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif

                                            
                                            <div class="list-product-btn">
                                                <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action {{ in_array($row->id, $wishlistItems) ? 'active' : '' }}" data-id="{{ $row->id }}">
                                                    <i class='bx bx-heart' style="font-size: 24px;"></i>
                                                    <span class="tooltip">Wishlist</span>
                                                </a>

                                                {{-- <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare" class="box-icon compare btn-icon-action">
                                                    <i class='bx bx-git-compare' style="font-size: 24px;"></i>
                                                    <span class="tooltip">Compare</span>
                                                </a> --}}
                                                <a href="#quickView" data-id={{ $row->id }} data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                                    <ion-icon name="eye-outline" style="font-size: 24px;"></ion-icon>
                                                    <span class="tooltip">Quick View</span>
                                                </a>
                                            </div>
                                            <div class="list-btn-main">
                                                <a href="#quickAdd" data-id={{ $row->id }} data-bs-toggle="modal" class="btn-main-product quickAdd">Quick Add</a>
                                            </div>
                                        </div>

                                        @php
                                            $avgRatings = App\Models\ProductReview::where('product_id', $row->id)->where('status', 1)->avg('ratings');
                                            $reviews = App\Models\ProductReview::where('product_id', $row->id)->where('status', 1)->count();
                                        @endphp

                                        <div class="card-product-info">
                                            <a href="{{ route('product.details', $row->slug) }}" class="title link">{{ $row->name }}</a>
                                            <div class="box-rating">
                                                <ul class="list-star">
                                                    
                                                    @for ( $i = 1; $i <= 5; $i++ )
                                                        @if ( $i <= round($avgRatings))
                                                            <li class="bx bxs-star" style="color: #F0A750;"></li>
                                                        @else
                                                            <li class="bx bx-star" style="color: #F0A750;"></li>
                                                        @endif
                                                    @endfor
                                                </ul>
                                                <span class="text-caption-1 text-secondary">({{ $reviews }} )</span>
                                            </div>

                                            @if ( checkDiscount($row) )
                                                @if ( !empty($row->discount_type === "amount") )
                                                    <span class="price"><span class="old-price">${{ $row->selling_price }}</span> ${{ $row->selling_price - $row->discount_value }}</span>
                                                @elseif( !empty($row->discount_type === "percent") )
                                                @php
                                                    $discount_val = $row->selling_price * $row->discount_value / 100;
                                                @endphp
                                                    <span class="price"><span class="old-price">${{ $row->selling_price }}</span> ${{ $row->selling_price - $discount_val }}</span>
                                                @else
                                                    <span class="price"> ${{ $row->selling_price }}</span>
                                                @endif
                                            @else
                                                <span class="price"> ${{ $row->selling_price }}</span>
                                            @endif

                                            <div class="box-progress-stock">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="stock-status d-flex justify-content-between align-items-center">
                                                    <div class="stock-item text-caption-1">
                                                        <span class="stock-label text-secondary-2">Stock:</span>
                                                        <span class="stock-value">{{ $row->qty }}</span>
                                                    </div>
                                                    {{-- <div class="stock-item text-caption-1">
                                                        <span class="stock-label text-secondary-2">Sold:</span>
                                                        <span class="stock-value">{{ $row->product_sold }}</span>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="sw-pagination-latest sw-dots type-circle justify-content-center"></div>
                    </div>
                </div>

                {{-- Looping all categorized data --}}
                @foreach ($categories as $key => $item)
                    <div class="tab-pane" id="{{ $item->slug }}" role="tabpanel">
                        <div dir="ltr" class="swiper tf-sw-latest" data-preview="5" data-tablet="4" data-mobile="2" data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1" data-pagination-md="1" data-pagination-lg="1">

                            <div class="swiper-wrapper">
                                @foreach (App\Models\Product::where('category_id', $item->id)->where('is_approved', 1)->where('status', 1)->get(); as $row)
                                    @php
                                        $wishlistItems = App\Models\Wishlist::where('user_id', auth()->id())->pluck('product_id')->toArray();
                                    @endphp
                                    
                                    <div class="swiper-slide">
                                        <div class="card-product wow fadeInUp" data-wow-delay="0.1s">
                                            <div class="card-product-wrapper">
                                                <a href="{{ route('product.details', $row->slug) }}" class="product-img">
                                                    <img class="lazyload img-product" data-src="{{ asset($row->thumb_image) }}" src="{{ asset($row->thumb_image) }}" alt="{{ $row->slug }}">

                                                    @php
                                                        $image = App\Models\ProductImage::where('product_id', $row->id)->first();

                                                        $discount = '';
                                                        if( checkDiscount($row) ){
                                                            if ( !empty($row->discount_type === "amount" ) ){
                                                                $discount = '-'. $row->discount_value . "Tk";
                                                            }   
                                                            else if( $row->discount_type === "percent" ){
                                                                $discount = '-'. $row->discount_value . "%";
                                                            }
                                                        }
                                                    @endphp

                                                    @if (!empty($image))
                                                        <img class="lazyload img-hover" data-src="{{ asset($image->images) }}" src="{{ asset($image->images) }}" alt="{{ $row->slug }}">
                                                    @endif
                                                </a>
                                                <div class="on-sale-wrap">
                                                    <span class="on-sale-item">
                                                        {{ $discount }}
                                                    </span>
                                                </div>

                                                @if ( checkDiscount($row) )
                                                    @if ( !empty($row->discount_type === "amount") || !empty($row->discount_type === "percent") )
                                                        <div class="marquee-product bg-main">
                                                            <div class="marquee-wrapper">
                                                                <div class="initial-child-container">
                                                                    <div class="marquee-child-item">
                                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                                    </div>
                                                                    <div class="marquee-child-item">
                                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                                    </div>
                                                                    <div class="marquee-child-item">
                                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                                    </div>
                                                                    <div class="marquee-child-item">
                                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                                    </div>
                                                                    <div class="marquee-child-item">
                                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                                    </div>
                                                                    <div class="marquee-child-item">
                                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                                    </div>
                                                                    <div class="marquee-child-item">
                                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                                    </div>
                                                                    <div class="marquee-child-item">
                                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                                    </div>
                                                                    <div class="marquee-child-item">
                                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                                    </div>
                                                                    <div class="marquee-child-item">
                                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="marquee-wrapper">
                                                                <div class="initial-child-container">
                                                                    <div class="marquee-child-item">
                                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                                    </div>
                                                                    <div class="marquee-child-item">
                                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                                    </div>
                                                                    <div class="marquee-child-item">
                                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                                    </div>
                                                                    <div class="marquee-child-item">
                                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                                    </div>
                                                                    <div class="marquee-child-item">
                                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                                    </div>
                                                                    <div class="marquee-child-item">
                                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                                    </div>
                                                                    <div class="marquee-child-item">
                                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                                    </div>
                                                                    <div class="marquee-child-item">
                                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                                    </div>
                                                                    <div class="marquee-child-item">
                                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                                    </div>
                                                                    <div class="marquee-child-item">
                                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endif

                                                
                                                <div class="list-product-btn">
                                                    <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action {{ in_array($row->id, $wishlistItems) ? 'active' : '' }}" data-id="{{ $row->id }}">
                                                        <i class='bx bx-heart' style="font-size: 24px;"></i>
                                                        <span class="tooltip">Wishlist</span>
                                                    </a>
                                                    {{-- <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare" class="box-icon compare btn-icon-action">
                                                        <i class='bx bx-git-compare' style="font-size: 24px;"></i>
                                                        <span class="tooltip">Compare</span>
                                                    </a> --}}
                                                    <a href="#quickView" data-id={{ $row->id }} data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                                        <ion-icon name="eye-outline" style="font-size: 24px;"></ion-icon>
                                                        <span class="tooltip">Quick View</span>
                                                    </a>
                                                </div>
                                                <div class="list-btn-main">
                                                    <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add To cart</a>
                                                </div>
                                            </div>

                                            @php
                                                $avgRatings = App\Models\ProductReview::where('product_id', $row->id)->where('status', 1)->avg('ratings');
                                                $reviews = App\Models\ProductReview::where('product_id', $row->id)->where('status', 1)->count();
                                            @endphp

                                            <div class="card-product-info">
                                                <a href="{{ route('product.details', $row->slug) }}" class="title link">{{ $row->name }}</a>
                                                <div class="box-rating">
                                                    <ul class="list-star">
                                                        
                                                        @for ( $i = 1; $i <= 5; $i++ )
                                                            @if ( $i <= round($avgRatings))
                                                                <li class="bx bxs-star" style="color: #F0A750;"></li>
                                                            @else
                                                                <li class="bx bx-star" style="color: #F0A750;"></li>
                                                            @endif
                                                        @endfor
                                                    </ul>
                                                    <span class="text-caption-1 text-secondary">({{ $reviews }} )</span>
                                                </div>

                                                @if ( checkDiscount($row) )
                                                    @if ( !empty($row->discount_type === "amount") )
                                                        <span class="price"><span class="old-price">${{ $row->selling_price }}</span> ${{ $row->selling_price - $row->discount_value }}</span>
                                                    @elseif( !empty($row->discount_type === "percent") )
                                                    @php
                                                        $discount_val = $row->selling_price * $row->discount_value / 100;
                                                    @endphp
                                                        <span class="price"><span class="old-price">${{ $row->selling_price }}</span> ${{ $row->selling_price - $discount_val }}</span>
                                                    @else
                                                        <span class="price"> ${{ $row->selling_price }}</span>
                                                    @endif
                                                @else
                                                    <span class="price"> ${{ $row->selling_price }}</span>
                                                @endif

                                                <div class="box-progress-stock">
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <div class="stock-status d-flex justify-content-between align-items-center">
                                                        <div class="stock-item text-caption-1">
                                                            <span class="stock-label text-secondary-2">Stock:</span>
                                                            <span class="stock-value">{{ $row->qty }}</span>
                                                        </div>
                                                        {{-- <div class="stock-item text-caption-1">
                                                            <span class="stock-label text-secondary-2">Sold:</span>
                                                            <span class="stock-value">{{ $row->product_sold }}</span>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="sw-pagination-latest sw-dots type-circle justify-content-center"></div>
                        </div>
                    </div>
                @endforeach

                {{-- Quick View Modal Show
                @include('frontend.include.product_quick_view') --}}
            </div>
        </div>
    </div>
</section>
<!-- /Popular Category Products -->

<!-- Collection -->
<section class="space-30 mb-5">
    <div class="container">
        <div class="row">
            @foreach ($collections as $row)
                <div class="col-lg-4 mb-3">
                    <div class="collection-position style-lg hover-img">
                        <a class="img-style">
                            <img class=" ls-is-cached lazyloaded" data-src="{{ asset($row->image) }}" src="{{ asset($row->image) }}" alt="{{ $row->slug }}" style="height: 400px;">
                        </a>
                        <div class="content">
                            <h3 class="title wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;"><a href="shop-collection.html" class="link text-white">{{ $row->title }}</a></h3>
                            <div class="wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                <a href="shop-collection.html" class="btn-line style-white">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- /Collection -->

<!-- Top Products -->
<section class="flat-spacing-4 pt-0">
    <div class="container">
        <div class="heading-section-2 wow fadeInUp">
            <h4 style="font-size: 30px!important;">Top Products</h4>
            <a href="{{ route('product.page') }}" class="line-under">See All Products</a>
        </div>

        <div dir="ltr" class="swiper tf-sw-recent" data-preview="6" data-tablet="4" data-mobile="2" data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1" data-pagination-md="1" data-pagination-lg="1">
            <div class="swiper-wrapper">

                @foreach ($top_products as $row)
                    @php
                        $wishlistItems = App\Models\Wishlist::where('user_id', auth()->id())->pluck('product_id')->toArray();
                    @endphp
                    <div class="swiper-slide">
                        <div class="card-product wow fadeInUp" data-wow-delay="0.1s">
                            <div class="card-product-wrapper">
                                <a href="{{ route('product.details', $row->slug) }}" class="product-img">
                                    <img class="lazyload img-product" data-src="{{ asset($row->thumb_image) }}" src="{{ asset($row->thumb_image) }}" alt="{{ $row->slug }}">

                                    @php
                                        $image = App\Models\ProductImage::where('product_id', $row->id)->first();

                                        $discount = '';
                                        if( checkDiscount($row) ){
                                            if ( !empty($row->discount_type === "amount" ) ){
                                                $discount = '-'. $row->discount_value . "Tk";
                                            }   
                                            else if( $row->discount_type === "percent" ){
                                                $discount = '-'. $row->discount_value . "%";
                                            }
                                        }
                                        
                                    @endphp

                                    @if (!empty($image))
                                        <img class="lazyload img-hover" data-src="{{ asset($image->images) }}" src="{{ asset($image->images) }}" alt="{{ $row->slug }}">
                                    @endif
                                </a>
                                <div class="on-sale-wrap">
                                    <span class="on-sale-item">
                                        {{ $discount }}
                                    </span>
                                </div>


                                @if ( checkDiscount($row) )
                                    @if ( !empty($row->discount_type === "amount") || !empty($row->discount_type === "percent") )
                                        <div class="marquee-product bg-main">
                                            <div class="marquee-wrapper">
                                                <div class="initial-child-container">
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="marquee-wrapper">
                                                <div class="initial-child-container">
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif

                                
                                <div class="list-product-btn">
                                    <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action {{ in_array($row->id, $wishlistItems) ? 'active' : '' }}" data-id="{{ $row->id }}">
                                        <i class='bx bx-heart' style="font-size: 24px;"></i>
                                        <span class="tooltip">Wishlist</span>
                                    </a>

                                    {{-- <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare" class="box-icon compare btn-icon-action">
                                        <i class='bx bx-git-compare' style="font-size: 24px;"></i>
                                        <span class="tooltip">Compare</span>
                                    </a> --}}
                                    <a href="#quickView" data-id={{ $row->id }} data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                        <ion-icon name="eye-outline" style="font-size: 24px;"></ion-icon>
                                        <span class="tooltip">Quick View</span>
                                    </a>
                                </div>
                                <div class="list-btn-main">
                                    <a href="#quickAdd" data-id={{ $row->id }} data-bs-toggle="modal" class="btn-main-product quickAdd">Quick Add</a>
                                </div>
                            </div>

                            @php
                                $avgRatings = App\Models\ProductReview::where('product_id', $row->id)->where('status', 1)->avg('ratings');
                                $reviews = App\Models\ProductReview::where('product_id', $row->id)->where('status', 1)->count();
                            @endphp

                            <div class="card-product-info">
                                <a href="{{ route('product.details', $row->slug) }}" class="title link">{{ $row->name }}</a>
                                <div class="box-rating">
                                    <ul class="list-star">
                                        
                                        @for ( $i = 1; $i <= 5; $i++ )
                                            @if ( $i <= round($avgRatings))
                                                <li class="bx bxs-star" style="color: #F0A750;"></li>
                                            @else
                                                <li class="bx bx-star" style="color: #F0A750;"></li>
                                            @endif
                                        @endfor
                                    </ul>
                                    <span class="text-caption-1 text-secondary">({{ $reviews }} )</span>
                                </div>

                                @if ( checkDiscount($row) )
                                    @if ( !empty($row->discount_type === "amount") )
                                        <span class="price"><span class="old-price">${{ $row->selling_price }}</span> ${{ $row->selling_price - $row->discount_value }}</span>
                                    @elseif( !empty($row->discount_type === "percent") )
                                    @php
                                        $discount_val = $row->selling_price * $row->discount_value / 100;
                                    @endphp
                                        <span class="price"><span class="old-price">${{ $row->selling_price }}</span> ${{ $row->selling_price - $discount_val }}</span>
                                    @else
                                        <span class="price"> ${{ $row->selling_price }}</span>
                                    @endif
                                @else
                                    <span class="price"> ${{ $row->selling_price }}</span>
                                @endif

                                <div class="box-progress-stock">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="stock-status d-flex justify-content-between align-items-center">
                                        <div class="stock-item text-caption-1">
                                            <span class="stock-label text-secondary-2">Stock:</span>
                                            <span class="stock-value">{{ $row->qty }}</span>
                                        </div>
                                        {{-- <div class="stock-item text-caption-1">
                                            <span class="stock-label text-secondary-2">Sold:</span>
                                            <span class="stock-value">{{ $row->product_sold }}</span>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="sw-pagination-recent sw-dots type-circle justify-content-center"></div>
        </div>
    </div>
</section>
<!-- /Top Products -->

<!-- Featured Products -->
<section class="flat-spacing-4 pt-0">
    <div class="container">
        <div class="heading-section-2 wow fadeInUp">
            <h4 style="font-size: 30px!important;">Featured Products</h4>
            <a href="{{ route('product.page') }}" class="line-under">See All Products</a>
        </div>

        <div dir="ltr" class="swiper tf-sw-recent" data-preview="6" data-tablet="4" data-mobile="2" data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1" data-pagination-md="1" data-pagination-lg="1">
            <div class="swiper-wrapper">

                @foreach ($featured_products as $row)
                    @php
                        $wishlistItems = App\Models\Wishlist::where('user_id', auth()->id())->pluck('product_id')->toArray();
                    @endphp
                    <div class="swiper-slide">
                        <div class="card-product wow fadeInUp" data-wow-delay="0.1s">
                            <div class="card-product-wrapper">
                                <a href="{{ route('product.details', $row->slug) }}" class="product-img">
                                    <img class="lazyload img-product" data-src="{{ asset($row->thumb_image) }}" src="{{ asset($row->thumb_image) }}" alt="{{ $row->slug }}">

                                    @php
                                        $image = App\Models\ProductImage::where('product_id', $row->id)->first();

                                        $discount = '';
                                        if( checkDiscount($row) ){
                                            if ( !empty($row->discount_type === "amount" ) ){
                                                $discount = '-'. $row->discount_value . "Tk";
                                            }   
                                            else if( $row->discount_type === "percent" ){
                                                $discount = '-'. $row->discount_value . "%";
                                            }
                                        }
                                        
                                    @endphp

                                    @if (!empty($image))
                                        <img class="lazyload img-hover" data-src="{{ asset($image->images) }}" src="{{ asset($image->images) }}" alt="{{ $row->slug }}">
                                    @endif
                                </a>
                                <div class="on-sale-wrap">
                                    <span class="on-sale-item">
                                        {{ $discount }}
                                    </span>
                                </div>


                                @if ( checkDiscount($row) )
                                    @if ( !empty($row->discount_type === "amount") || !empty($row->discount_type === "percent") )
                                        <div class="marquee-product bg-main">
                                            <div class="marquee-wrapper">
                                                <div class="initial-child-container">
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="marquee-wrapper">
                                                <div class="initial-child-container">
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif

                                
                                <div class="list-product-btn">
                                    <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action {{ in_array($row->id, $wishlistItems) ? 'active' : '' }}" data-id="{{ $row->id }}">
                                        <i class='bx bx-heart' style="font-size: 24px;"></i>
                                        <span class="tooltip">Wishlist</span>
                                    </a>

                                    {{-- <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare" class="box-icon compare btn-icon-action">
                                        <i class='bx bx-git-compare' style="font-size: 24px;"></i>
                                        <span class="tooltip">Compare</span>
                                    </a> --}}
                                    <a href="#quickView" data-id={{ $row->id }} data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                        <ion-icon name="eye-outline" style="font-size: 24px;"></ion-icon>
                                        <span class="tooltip">Quick View</span>
                                    </a>
                                </div>
                                <div class="list-btn-main">
                                    <a href="#quickAdd" data-id={{ $row->id }} data-bs-toggle="modal" class="btn-main-product quickAdd">Quick Add</a>
                                </div>
                            </div>

                            @php
                                $avgRatings = App\Models\ProductReview::where('product_id', $row->id)->where('status', 1)->avg('ratings');
                                $reviews = App\Models\ProductReview::where('product_id', $row->id)->where('status', 1)->count();
                            @endphp

                            <div class="card-product-info">
                                <a href="{{ route('product.details', $row->slug) }}" class="title link">{{ $row->name }}</a>
                                <div class="box-rating">
                                    <ul class="list-star"> 
                                        @for ( $i = 1; $i <= 5; $i++ )
                                            @if ( $i <= round($avgRatings))
                                                <li class="bx bxs-star" style="color: #F0A750;"></li>
                                            @else
                                                <li class="bx bx-star" style="color: #F0A750;"></li>
                                            @endif
                                        @endfor
                                    </ul>
                                    <span class="text-caption-1 text-secondary">({{ $reviews }} )</span>
                                </div>

                                @if ( checkDiscount($row) )
                                    @if ( !empty($row->discount_type === "amount") )
                                        <span class="price"><span class="old-price">${{ $row->selling_price }}</span> ${{ $row->selling_price - $row->discount_value }}</span>
                                    @elseif( !empty($row->discount_type === "percent") )
                                    @php
                                        $discount_val = $row->selling_price * $row->discount_value / 100;
                                    @endphp
                                        <span class="price"><span class="old-price">${{ $row->selling_price }}</span> ${{ $row->selling_price - $discount_val }}</span>
                                    @else
                                        <span class="price"> ${{ $row->selling_price }}</span>
                                    @endif
                                @else
                                    <span class="price"> ${{ $row->selling_price }}</span>
                                @endif

                                <div class="box-progress-stock">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="stock-status d-flex justify-content-between align-items-center">
                                        <div class="stock-item text-caption-1">
                                            <span class="stock-label text-secondary-2">Stock:</span>
                                            <span class="stock-value">{{ $row->qty }}</span>
                                        </div>
                                        {{-- <div class="stock-item text-caption-1">
                                            <span class="stock-label text-secondary-2">Sold:</span>
                                            <span class="stock-value">{{ $row->product_sold }}</span>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="sw-pagination-recent sw-dots type-circle justify-content-center"></div>
        </div>
    </div>
</section>
<!-- /Featured Products -->

<!-- banner -->
<section class="" style="background-image: url('http://localhost/shadhin_bazaar/public/backend/images/slider/29183700.jpg');">
    <div class="container">
        <div class="banner-supper-sale">
            <h6>Supper Sale:</h6>
            <div class="code-sale">K82FS8</div>
            <div class="body-text-1">-20% Discount for first purchse</div>
            <a href="#" class="tf-btn btn-fill"><span class="text text-button">Discover More</span></a>
        </div>
    </div>
</section>
<!-- /banner -->

<!-- product -->
<section class="flat-spacing-4">
    <div class="container">
        <div class="grid-card-product tf-grid-layout lg-col-3 md-col-2">

            <div class="column-card-product">
                <h5 class="heading wow fadeInUp">View products</h5>
                <div class="list-card-product">

                    @foreach ($view_products as $row)
                        <div class="card-product list-st-2 wow fadeInUp">
                            <div class="card-product-wrapper">
                                <a href="{{ route('product.details', $row->slug) }}" class="product-img">
                                    <img class="lazyload img-product" data-src="{{ asset($row->thumb_image) }}" src="{{ asset($row->thumb_image) }}" alt="{{ $row->slug }}">

                                    @php
                                        $image = App\Models\ProductImage::where('product_id', $row->id)->first();

                                        $discount = '';
                                        if( checkDiscount($row) ){
                                            if ( !empty($row->discount_type === "amount" ) ){
                                                $discount = '-'. $row->discount_value . "Tk";
                                            }   
                                            else if( $row->discount_type === "percent" ){
                                                $discount = '-'. $row->discount_value . "%";
                                            }
                                        }
                                    @endphp

                                    @if (!empty($image))
                                        <img class="lazyload img-hover" data-src="{{ asset($image->images) }}" src="{{ asset($image->images) }}" alt="{{ $row->slug }}">
                                    @endif
                                </a>
                                <div class="on-sale-wrap"><span class="on-sale-item">{{ $discount }}</span></div>
                            </div>
                            <div class="card-product-info">
                                <a href="{{ route('product.details', $row->slug) }}" class="title link">{{ $row->name }}</a>

                                @php
                                    $avgRatings = App\Models\ProductReview::where('product_id', $row->id)->where('status', 1)->avg('ratings');
                                    $reviews = App\Models\ProductReview::where('product_id', $row->id)->where('status', 1)->count();
                                @endphp

                                <div class="bottom">
                                    <div class="inner-left">
                                        <div class="box-rating">
                                            <ul class="list-star">
                                                @for ( $i = 1; $i <= 5; $i++ )
                                                    @if ( $i <= round($avgRatings))
                                                        <li class="bx bxs-star" style="color: #F0A750;"></li>
                                                    @else
                                                        <li class="bx bx-star" style="color: #F0A750;"></li>
                                                    @endif
                                                @endfor
                                            </ul>
                                            <span class="text-caption-1 text-secondary">({{ $reviews }} )</span>
                                        </div>

                                        @if ( checkDiscount($row) )
                                            @if ( !empty($row->discount_type === "amount") )
                                                <span class="price"><span class="old-price">${{ $row->selling_price }}</span> ${{ $row->selling_price - $row->discount_value }}</span>
                                            @elseif( !empty($row->discount_type === "percent") )
                                            @php
                                                $discount_val = $row->selling_price * $row->discount_value / 100;
                                            @endphp
                                                <span class="price"><span class="old-price">${{ $row->selling_price }}</span> ${{ $row->selling_price - $discount_val }}</span>
                                            @else
                                                <span class="price"> ${{ $row->selling_price }}</span>
                                            @endif
                                        @else
                                            <span class="price"> ${{ $row->selling_price }}</span>
                                        @endif

                                    </div>
                                    <a href="#quickAdd" data-id={{ $row->id }} data-bs-toggle="modal" class="box-icon quickAdd">
                                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.2187 10.3327V5.99935C16.2187 4.85008 15.7622 3.74788 14.9495 2.93522C14.1369 2.12256 13.0347 1.66602 11.8854 1.66602C10.7361 1.66602 9.63394 2.12256 8.82129 2.93522C8.00863 3.74788 7.55208 4.85008 7.55208 5.99935V10.3327M4.30208 8.16602H19.4687L20.5521 21.166H3.21875L4.30208 8.16602Z" stroke="#181818" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>   
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <div class="column-card-product">
                <h5 class="heading wow fadeInUp">New Arrivals</h5>
                <div class="list-card-product">
                    
                    @foreach ($new_products as $row)
                        <div class="card-product list-st-2 wow fadeInUp">
                            <div class="card-product-wrapper">
                                <a href="{{ route('product.details', $row->slug) }}" class="product-img">
                                    <img class="lazyload img-product" data-src="{{ asset($row->thumb_image) }}" src="{{ asset($row->thumb_image) }}" alt="{{ $row->slug }}">

                                    @php
                                        $image = App\Models\ProductImage::where('product_id', $row->id)->first();

                                        $discount = '';
                                        if( checkDiscount($row) ){
                                            if ( !empty($row->discount_type === "amount" ) ){
                                                $discount = '-'. $row->discount_value . "Tk";
                                            }   
                                            else if( $row->discount_type === "percent" ){
                                                $discount = '-'. $row->discount_value . "%";
                                            }
                                        }
                                    @endphp

                                    @if (!empty($image))
                                        <img class="lazyload img-hover" data-src="{{ asset($image->images) }}" src="{{ asset($image->images) }}" alt="{{ $row->slug }}">
                                    @endif
                                </a>
                                <div class="on-sale-wrap"><span class="on-sale-item">{{ $discount }}</span></div>
                            </div>
                            <div class="card-product-info">
                                <a href="{{ route('product.details', $row->slug) }}" class="title link">{{ $row->name }}</a>

                                @php
                                    $avgRatings = App\Models\ProductReview::where('product_id', $row->id)->where('status', 1)->avg('ratings');
                                    $reviews = App\Models\ProductReview::where('product_id', $row->id)->where('status', 1)->count();
                                @endphp

                                <div class="bottom">
                                    <div class="inner-left">
                                        <div class="box-rating">
                                            <ul class="list-star">
                                                @for ( $i = 1; $i <= 5; $i++ )
                                                    @if ( $i <= round($avgRatings))
                                                        <li class="bx bxs-star" style="color: #F0A750;"></li>
                                                    @else
                                                        <li class="bx bx-star" style="color: #F0A750;"></li>
                                                    @endif
                                                @endfor
                                            </ul>
                                            <span class="text-caption-1 text-secondary">({{ $reviews }} )</span>
                                        </div>

                                        @if ( checkDiscount($row) )
                                            @if ( !empty($row->discount_type === "amount") )
                                                <span class="price"><span class="old-price">${{ $row->selling_price }}</span> ${{ $row->selling_price - $row->discount_value }}</span>
                                            @elseif( !empty($row->discount_type === "percent") )
                                            @php
                                                $discount_val = $row->selling_price * $row->discount_value / 100;
                                            @endphp
                                                <span class="price"><span class="old-price">${{ $row->selling_price }}</span> ${{ $row->selling_price - $discount_val }}</span>
                                            @else
                                                <span class="price"> ${{ $row->selling_price }}</span>
                                            @endif
                                        @else
                                            <span class="price"> ${{ $row->selling_price }}</span>
                                        @endif

                                    </div>
                                    <a href="#quickAdd" data-id={{ $row->id }} data-bs-toggle="modal" class="box-icon quickAdd">
                                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.2187 10.3327V5.99935C16.2187 4.85008 15.7622 3.74788 14.9495 2.93522C14.1369 2.12256 13.0347 1.66602 11.8854 1.66602C10.7361 1.66602 9.63394 2.12256 8.82129 2.93522C8.00863 3.74788 7.55208 4.85008 7.55208 5.99935V10.3327M4.30208 8.16602H19.4687L20.5521 21.166H3.21875L4.30208 8.16602Z" stroke="#181818" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>   
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <div class="column-card-product">
                <h5 class="heading wow fadeInUp">Maybe you will love</h5>
                <div class="list-card-product">
                    @foreach ($random_products as $row)
                        <div class="card-product list-st-2 wow fadeInUp">
                            <div class="card-product-wrapper">
                                <a href="{{ route('product.details', $row->slug) }}" class="product-img">
                                    <img class="lazyload img-product" data-src="{{ asset($row->thumb_image) }}" src="{{ asset($row->thumb_image) }}" alt="{{ $row->slug }}">

                                    @php
                                        $image = App\Models\ProductImage::where('product_id', $row->id)->first();

                                        $discount = '';
                                        if( checkDiscount($row) ){
                                            if ( !empty($row->discount_type === "amount" ) ){
                                                $discount = '-'. $row->discount_value . "Tk";
                                            }   
                                            else if( $row->discount_type === "percent" ){
                                                $discount = '-'. $row->discount_value . "%";
                                            }
                                        }
                                    @endphp

                                    @if (!empty($image))
                                        <img class="lazyload img-hover" data-src="{{ asset($image->images) }}" src="{{ asset($image->images) }}" alt="{{ $row->slug }}">
                                    @endif
                                </a>
                                <div class="on-sale-wrap"><span class="on-sale-item">{{ $discount }}</span></div>
                            </div>
                            <div class="card-product-info">
                                <a href="{{ route('product.details', $row->slug) }}" class="title link">{{ $row->name }}</a>

                                @php
                                    $avgRatings = App\Models\ProductReview::where('product_id', $row->id)->where('status', 1)->avg('ratings');
                                    $reviews = App\Models\ProductReview::where('product_id', $row->id)->where('status', 1)->count();
                                @endphp

                                <div class="bottom">
                                    <div class="inner-left">
                                        <div class="box-rating">
                                            <ul class="list-star">
                                                @for ( $i = 1; $i <= 5; $i++ )
                                                    @if ( $i <= round($avgRatings))
                                                        <li class="bx bxs-star" style="color: #F0A750;"></li>
                                                    @else
                                                        <li class="bx bx-star" style="color: #F0A750;"></li>
                                                    @endif
                                                @endfor
                                            </ul>
                                            <span class="text-caption-1 text-secondary">({{ $reviews }} )</span>
                                        </div>

                                        @if ( checkDiscount($row) )
                                            @if ( !empty($row->discount_type === "amount") )
                                                <span class="price"><span class="old-price">${{ $row->selling_price }}</span> ${{ $row->selling_price - $row->discount_value }}</span>
                                            @elseif( !empty($row->discount_type === "percent") )
                                            @php
                                                $discount_val = $row->selling_price * $row->discount_value / 100;
                                            @endphp
                                                <span class="price"><span class="old-price">${{ $row->selling_price }}</span> ${{ $row->selling_price - $discount_val }}</span>
                                            @else
                                                <span class="price"> ${{ $row->selling_price }}</span>
                                            @endif
                                        @else
                                            <span class="price"> ${{ $row->selling_price }}</span>
                                        @endif

                                    </div>
                                    <a href="#quickAdd" data-id={{ $row->id }} data-bs-toggle="modal" class="box-icon quickAdd">
                                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.2187 10.3327V5.99935C16.2187 4.85008 15.7622 3.74788 14.9495 2.93522C14.1369 2.12256 13.0347 1.66602 11.8854 1.66602C10.7361 1.66602 9.63394 2.12256 8.82129 2.93522C8.00863 3.74788 7.55208 4.85008 7.55208 5.99935V10.3327M4.30208 8.16602H19.4687L20.5521 21.166H3.21875L4.30208 8.16602Z" stroke="#181818" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>   
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /product -->

<!-- Best Products -->
<section class="flat-spacing-4 pt-0">
    <div class="container">
        <div class="heading-section-2 wow fadeInUp">
            <h4 style="font-size: 30px!important;">Best Products</h4>
            <a href="{{ route('product.page') }}" class="line-under">See All Products</a>
        </div>

        <div dir="ltr" class="swiper tf-sw-products" data-preview="6" data-tablet="4" data-mobile="2" data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1" data-pagination-md="1" data-pagination-lg="1">
            <div class="swiper-wrapper">

                @foreach ($best_products as $row)
                    @php
                        $wishlistItems = App\Models\Wishlist::where('user_id', auth()->id())->pluck('product_id')->toArray();
                    @endphp
                    <div class="swiper-slide">
                        <div class="card-product wow fadeInUp" data-wow-delay="0.1s">
                            <div class="card-product-wrapper">
                                <a href="{{ route('product.details', $row->slug) }}" class="product-img">
                                    <img class="lazyload img-product" data-src="{{ asset($row->thumb_image) }}" src="{{ asset($row->thumb_image) }}" alt="{{ $row->slug }}">

                                    @php
                                        $image = App\Models\ProductImage::where('product_id', $row->id)->first();

                                        $discount = '';
                                        if( checkDiscount($row) ){
                                            if ( !empty($row->discount_type === "amount" ) ){
                                                $discount = '-'. $row->discount_value . "Tk";
                                            }   
                                            else if( $row->discount_type === "percent" ){
                                                $discount = '-'. $row->discount_value . "%";
                                            }
                                        }
                                        
                                    @endphp

                                    @if (!empty($image))
                                        <img class="lazyload img-hover" data-src="{{ asset($image->images) }}" src="{{ asset($image->images) }}" alt="{{ $row->slug }}">
                                    @endif
                                </a>
                                <div class="on-sale-wrap">
                                    <span class="on-sale-item">
                                        {{ $discount }}
                                    </span>
                                </div>


                                @if ( checkDiscount($row) )
                                    @if ( !empty($row->discount_type === "amount") || !empty($row->discount_type === "percent") )
                                        <div class="marquee-product bg-main">
                                            <div class="marquee-wrapper">
                                                <div class="initial-child-container">
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="marquee-wrapper">
                                                <div class="initial-child-container">
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif

                                
                                <div class="list-product-btn">
                                    <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action {{ in_array($row->id, $wishlistItems) ? 'active' : '' }}" data-id="{{ $row->id }}">
                                        <i class='bx bx-heart' style="font-size: 24px;"></i>
                                        <span class="tooltip">Wishlist</span>
                                    </a>

                                    {{-- <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare" class="box-icon compare btn-icon-action">
                                        <i class='bx bx-git-compare' style="font-size: 24px;"></i>
                                        <span class="tooltip">Compare</span>
                                    </a> --}}
                                    <a href="#quickView" data-id={{ $row->id }} data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                        <ion-icon name="eye-outline" style="font-size: 24px;"></ion-icon>
                                        <span class="tooltip">Quick View</span>
                                    </a>
                                </div>
                                <div class="list-btn-main">
                                    <a href="#quickAdd" data-id={{ $row->id }} data-bs-toggle="modal" class="btn-main-product quickAdd">Quick Add</a>
                                </div>
                            </div>

                            @php
                                $avgRatings = App\Models\ProductReview::where('product_id', $row->id)->where('status', 1)->avg('ratings');
                                $reviews = App\Models\ProductReview::where('product_id', $row->id)->where('status', 1)->count();
                            @endphp

                            <div class="card-product-info">
                                <a href="{{ route('product.details', $row->slug) }}" class="title link">{{ $row->name }}</a>
                                <div class="box-rating">
                                    <ul class="list-star">
                                        
                                        @for ( $i = 1; $i <= 5; $i++ )
                                            @if ( $i <= round($avgRatings))
                                                <li class="bx bxs-star" style="color: #F0A750;"></li>
                                            @else
                                                <li class="bx bx-star" style="color: #F0A750;"></li>
                                            @endif
                                        @endfor
                                    </ul>
                                    <span class="text-caption-1 text-secondary">({{ $reviews }} )</span>
                                </div>

                                @if ( checkDiscount($row) )
                                    @if ( !empty($row->discount_type === "amount") )
                                        <span class="price"><span class="old-price">${{ $row->selling_price }}</span> ${{ $row->selling_price - $row->discount_value }}</span>
                                    @elseif( !empty($row->discount_type === "percent") )
                                    @php
                                        $discount_val = $row->selling_price * $row->discount_value / 100;
                                    @endphp
                                        <span class="price"><span class="old-price">${{ $row->selling_price }}</span> ${{ $row->selling_price - $discount_val }}</span>
                                    @else
                                        <span class="price"> ${{ $row->selling_price }}</span>
                                    @endif
                                @else
                                    <span class="price"> ${{ $row->selling_price }}</span>
                                @endif


                                <div class="box-progress-stock">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="stock-status d-flex justify-content-between align-items-center">
                                        <div class="stock-item text-caption-1">
                                            <span class="stock-label text-secondary-2">Stock:</span>
                                            <span class="stock-value">{{ $row->qty }}</span>
                                        </div>
                                        {{-- <div class="stock-item text-caption-1">
                                            <span class="stock-label text-secondary-2">Sold:</span>
                                            <span class="stock-value">{{ $row->product_sold }}</span>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="sw-pagination-products sw-dots type-circle justify-content-center"></div>
        </div>
    </div>
</section>
<!-- /Best Products -->

<!-- Category Section One Products -->
<section class="flat-spacing-4 pt-0">
    <div class="container">

        @php
            $categorySliderOne = json_decode($catSliderSectionOne->value, true);
            $lastKey = [];

            foreach( $categorySliderOne as $key => $category ){
                if( $category == null ){
                    break;
                }
                $lastKey = [$key => $category];
            }
            // dd($lastKey);

            if( array_keys($lastKey)[0] === "category" ){
                $category = App\Models\Category::find($lastKey['category']);
                $item_name = $category->category_name;
                $products = App\Models\Product::where('category_id', $category->id)->where('is_approved', 1)->where('status', 1)->get();
            }
            elseif( array_keys($lastKey)[0] === "sub_category" ){
                $category = App\Models\Subcategory::find($lastKey['sub_category']);
                $item_name = $category->subcategory_name;
                $products = App\Models\Product::where('subCategory_id', $category->id)->where('is_approved', 1)->where('status', 1)->get();
            }else{
                $category = App\Models\ChildCategory::find($lastKey['child_category']);
                $item_name = $category->name;
                $products = App\Models\Product::where('childCategory_id', $category->id)->where('is_approved', 1)->where('status', 1)->get();
            }
        @endphp


        <div class="heading-section-2 wow fadeInUp">
            <h4 style="font-size: 30px!important;">{{ $item_name }} Category</h4>
            <a href="{{ route('product.page') }}" class="line-under">See All Products</a>
        </div>

        <div dir="ltr" class="swiper tf-sw-products" data-preview="6" data-tablet="4" data-mobile="2" data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1" data-pagination-md="1" data-pagination-lg="1">
            <div class="swiper-wrapper">

                @foreach ($products as $row)
                    @php
                        $wishlistItems = App\Models\Wishlist::where('user_id', auth()->id())->pluck('product_id')->toArray();
                    @endphp
                    <div class="swiper-slide">
                        <div class="card-product wow fadeInUp" data-wow-delay="0.1s">
                            <div class="card-product-wrapper">
                                <a href="{{ route('product.details', $row->slug) }}" class="product-img">
                                    <img class="lazyload img-product" data-src="{{ asset($row->thumb_image) }}" src="{{ asset($row->thumb_image) }}" alt="{{ $row->slug }}">

                                    @php
                                        $image = App\Models\ProductImage::where('product_id', $row->id)->first();

                                        $discount = '';
                                        if( checkDiscount($row) ){
                                            if ( !empty($row->discount_type === "amount" ) ){
                                                $discount = '-'. $row->discount_value . "Tk";
                                            }   
                                            else if( $row->discount_type === "percent" ){
                                                $discount = '-'. $row->discount_value . "%";
                                            }
                                        }
                                        
                                    @endphp

                                    @if (!empty($image))
                                        <img class="lazyload img-hover" data-src="{{ asset($image->images) }}" src="{{ asset($image->images) }}" alt="{{ $row->slug }}">
                                    @endif
                                </a>
                                <div class="on-sale-wrap">
                                    <span class="on-sale-item">
                                        {{ $discount }}
                                    </span>
                                </div>


                                @if ( checkDiscount($row) )
                                    @if ( !empty($row->discount_type === "amount") || !empty($row->discount_type === "percent") )
                                        <div class="marquee-product bg-main">
                                            <div class="marquee-wrapper">
                                                <div class="initial-child-container">
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="marquee-wrapper">
                                                <div class="initial-child-container">
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif

                                
                                <div class="list-product-btn">
                                    <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action {{ in_array($row->id, $wishlistItems) ? 'active' : '' }}" data-id="{{ $row->id }}">
                                        <i class='bx bx-heart' style="font-size: 24px;"></i>
                                        <span class="tooltip">Wishlist</span>
                                    </a>

                                    {{-- <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare" class="box-icon compare btn-icon-action">
                                        <i class='bx bx-git-compare' style="font-size: 24px;"></i>
                                        <span class="tooltip">Compare</span>
                                    </a> --}}
                                    <a href="#quickView" data-id={{ $row->id }} data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                        <ion-icon name="eye-outline" style="font-size: 24px;"></ion-icon>
                                        <span class="tooltip">Quick View</span>
                                    </a>
                                </div>
                                <div class="list-btn-main">
                                    <a href="#quickAdd" data-id={{ $row->id }} data-bs-toggle="modal" class="btn-main-product quickAdd">Quick Add</a>
                                </div>
                            </div>

                            @php
                                $avgRatings = App\Models\ProductReview::where('product_id', $row->id)->where('status', 1)->avg('ratings');
                                $reviews = App\Models\ProductReview::where('product_id', $row->id)->where('status', 1)->count();
                            @endphp

                            <div class="card-product-info">
                                <a href="{{ route('product.details', $row->slug) }}" class="title link">{{ $row->name }}</a>
                                <div class="box-rating">
                                    <ul class="list-star">
                                        
                                        @for ( $i = 1; $i <= 5; $i++ )
                                            @if ( $i <= round($avgRatings))
                                                <li class="bx bxs-star" style="color: #F0A750;"></li>
                                            @else
                                                <li class="bx bx-star" style="color: #F0A750;"></li>
                                            @endif
                                        @endfor
                                    </ul>
                                    <span class="text-caption-1 text-secondary">({{ $reviews }} )</span>
                                </div>

                                @if ( checkDiscount($row) )
                                    @if ( !empty($row->discount_type === "amount") )
                                        <span class="price"><span class="old-price">${{ $row->selling_price }}</span> ${{ $row->selling_price - $row->discount_value }}</span>
                                    @elseif( !empty($row->discount_type === "percent") )
                                    @php
                                        $discount_val = $row->selling_price * $row->discount_value / 100;
                                    @endphp
                                        <span class="price"><span class="old-price">${{ $row->selling_price }}</span> ${{ $row->selling_price - $discount_val }}</span>
                                    @else
                                        <span class="price"> ${{ $row->selling_price }}</span>
                                    @endif
                                @else
                                    <span class="price"> ${{ $row->selling_price }}</span>
                                @endif


                                <div class="box-progress-stock">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="stock-status d-flex justify-content-between align-items-center">
                                        <div class="stock-item text-caption-1">
                                            <span class="stock-label text-secondary-2">Stock:</span>
                                            <span class="stock-value">{{ $row->qty }}</span>
                                        </div>
                                        {{-- <div class="stock-item text-caption-1">
                                            <span class="stock-label text-secondary-2">Sold:</span>
                                            <span class="stock-value">{{ $row->product_sold }}</span>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="sw-pagination-products sw-dots type-circle justify-content-center"></div>
        </div>
    </div>
</section>
<!-- /Category Section One Products -->

<!-- Category Section One Products -->
<section class="flat-spacing-4 pt-0">
    <div class="container">

        @php
            $categorySliderTwo = json_decode($catSliderSectionTwo->value, true);
            $lastKey = [];

            foreach( $categorySliderTwo as $key => $category ){
                if( $category == null ){
                    break;
                }
                $lastKey = [$key => $category];
            }
            // dd($lastKey);

            if( array_keys($lastKey)[0] === "category" ){
                $category = App\Models\Category::find($lastKey['category']);
                $item_name = $category->category_name;
                $products = App\Models\Product::where('category_id', $category->id)->where('is_approved', 1)->where('status', 1)->get();
            }
            elseif( array_keys($lastKey)[0] === "sub_category" ){
                $category = App\Models\Subcategory::find($lastKey['sub_category']);
                $item_name = $category->subcategory_name;
                $products = App\Models\Product::where('subCategory_id', $category->id)->where('is_approved', 1)->where('status', 1)->get();
            }else{
                $category = App\Models\ChildCategory::find($lastKey['child_category']);
                $item_name = $category->name;
                $products = App\Models\Product::where('childCategory_id', $category->id)->where('is_approved', 1)->where('status', 1)->get();
            }
        @endphp


        <div class="heading-section-2 wow fadeInUp">
            <h4 style="font-size: 30px!important;">{{ $item_name }} Category</h4>
            <a href="{{ route('product.page') }}" class="line-under">See All Products</a>
        </div>

        <div dir="ltr" class="swiper tf-sw-products" data-preview="6" data-tablet="4" data-mobile="2" data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1" data-pagination-md="1" data-pagination-lg="1">
            <div class="swiper-wrapper">

                @foreach ($products as $row)
                    @php
                        $wishlistItems = App\Models\Wishlist::where('user_id', auth()->id())->pluck('product_id')->toArray();
                    @endphp
                    <div class="swiper-slide">
                        <div class="card-product wow fadeInUp" data-wow-delay="0.1s">
                            <div class="card-product-wrapper">
                                <a href="{{ route('product.details', $row->slug) }}" class="product-img">
                                    <img class="lazyload img-product" data-src="{{ asset($row->thumb_image) }}" src="{{ asset($row->thumb_image) }}" alt="{{ $row->slug }}">

                                    @php
                                        $image = App\Models\ProductImage::where('product_id', $row->id)->first();

                                        $discount = '';
                                        if( checkDiscount($row) ){
                                            if ( !empty($row->discount_type === "amount" ) ){
                                                $discount = '-'. $row->discount_value . "Tk";
                                            }   
                                            else if( $row->discount_type === "percent" ){
                                                $discount = '-'. $row->discount_value . "%";
                                            }
                                        }
                                        
                                    @endphp

                                    @if (!empty($image))
                                        <img class="lazyload img-hover" data-src="{{ asset($image->images) }}" src="{{ asset($image->images) }}" alt="{{ $row->slug }}">
                                    @endif
                                </a>
                                <div class="on-sale-wrap">
                                    <span class="on-sale-item">
                                        {{ $discount }}
                                    </span>
                                </div>


                                @if ( checkDiscount($row) )
                                    @if ( !empty($row->discount_type === "amount") || !empty($row->discount_type === "percent") )
                                        <div class="marquee-product bg-main">
                                            <div class="marquee-wrapper">
                                                <div class="initial-child-container">
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="marquee-wrapper">
                                                <div class="initial-child-container">
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif

                                
                                <div class="list-product-btn">
                                    <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action {{ in_array($row->id, $wishlistItems) ? 'active' : '' }}" data-id="{{ $row->id }}">
                                        <i class='bx bx-heart' style="font-size: 24px;"></i>
                                        <span class="tooltip">Wishlist</span>
                                    </a>

                                    {{-- <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare" class="box-icon compare btn-icon-action">
                                        <i class='bx bx-git-compare' style="font-size: 24px;"></i>
                                        <span class="tooltip">Compare</span>
                                    </a> --}}
                                    <a href="#quickView" data-id={{ $row->id }} data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                        <ion-icon name="eye-outline" style="font-size: 24px;"></ion-icon>
                                        <span class="tooltip">Quick View</span>
                                    </a>
                                </div>
                                <div class="list-btn-main">
                                    <a href="#quickAdd" data-id={{ $row->id }} data-bs-toggle="modal" class="btn-main-product quickAdd">Quick Add</a>
                                </div>
                            </div>

                            @php
                                $avgRatings = App\Models\ProductReview::where('product_id', $row->id)->where('status', 1)->avg('ratings');
                                $reviews = App\Models\ProductReview::where('product_id', $row->id)->where('status', 1)->count();
                            @endphp

                            <div class="card-product-info">
                                <a href="{{ route('product.details', $row->slug) }}" class="title link">{{ $row->name }}</a>
                                <div class="box-rating">
                                    <ul class="list-star">
                                        
                                        @for ( $i = 1; $i <= 5; $i++ )
                                            @if ( $i <= round($avgRatings))
                                                <li class="bx bxs-star" style="color: #F0A750;"></li>
                                            @else
                                                <li class="bx bx-star" style="color: #F0A750;"></li>
                                            @endif
                                        @endfor
                                    </ul>
                                    <span class="text-caption-1 text-secondary">({{ $reviews }} )</span>
                                </div>

                                @if ( checkDiscount($row) )
                                    @if ( !empty($row->discount_type === "amount") )
                                        <span class="price"><span class="old-price">${{ $row->selling_price }}</span> ${{ $row->selling_price - $row->discount_value }}</span>
                                    @elseif( !empty($row->discount_type === "percent") )
                                    @php
                                        $discount_val = $row->selling_price * $row->discount_value / 100;
                                    @endphp
                                        <span class="price"><span class="old-price">${{ $row->selling_price }}</span> ${{ $row->selling_price - $discount_val }}</span>
                                    @else
                                        <span class="price"> ${{ $row->selling_price }}</span>
                                    @endif
                                @else
                                    <span class="price"> ${{ $row->selling_price }}</span>
                                @endif


                                <div class="box-progress-stock">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="stock-status d-flex justify-content-between align-items-center">
                                        <div class="stock-item text-caption-1">
                                            <span class="stock-label text-secondary-2">Stock:</span>
                                            <span class="stock-value">{{ $row->qty }}</span>
                                        </div>
                                        {{-- <div class="stock-item text-caption-1">
                                            <span class="stock-label text-secondary-2">Sold:</span>
                                            <span class="stock-value">{{ $row->product_sold }}</span>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="sw-pagination-products sw-dots type-circle justify-content-center"></div>
        </div>
    </div>
</section>
<!-- /Category Section One Products -->

<!-- Testimonials -->
<section class="flat-spacing-4">
    <div class="container">
        <div class="heading-section text-center wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
            <h3 class="heading">Customer Say!</h3>
            <p class="subheading">Our customers adore our products, and we constantly aim to delight them.</p>
        </div>
        <div dir="ltr" class="swiper tf-sw-testimonial wow fadeInUp swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden" data-wow-delay="0.1s" data-preview="3" data-tablet="2" data-mobile="1" data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1" data-pagination-md="1" data-pagination-lg="1" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
            <div class="swiper-wrapper" id="swiper-wrapper-da194db3f7f84887" aria-live="polite" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
                <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 4" style="width: 410px; margin-right: 30px;">
                    <div class="testimonial-item style-2">
                        <div class="content-top">
                            <div class="list-star-default">
                                <i class="icon icon-star"></i>
                                <i class="icon icon-star"></i>
                                <i class="icon icon-star"></i>
                                <i class="icon icon-star"></i>
                                <i class="icon icon-star"></i>
                            </div>
                            <p class="text-secondary">"Fantastic shop! Great selection, fair prices, and friendly staff. Highly recommended. The quality of the products is exceptional, and the prices are very reasonable!"</p>
                            <div class="box-author">
                                <div class="text-title author">Sybil Sharp</div>
                                <svg class="icon" width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_15758_14563)">
                                    <path d="M6.875 11.6255L8.75 13.5005L13.125 9.12549" stroke="#3DAB25" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M10 18.5005C14.1421 18.5005 17.5 15.1426 17.5 11.0005C17.5 6.85835 14.1421 3.50049 10 3.50049C5.85786 3.50049 2.5 6.85835 2.5 11.0005C2.5 15.1426 5.85786 18.5005 10 18.5005Z" stroke="#3DAB25" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_15758_14563">
                                    <rect width="20" height="20" fill="white" transform="translate(0 0.684082)"></rect>
                                    </clipPath>
                                    </defs>
                                </svg> 
                            </div>
                        </div>
                        <div class="box-avt">
                            <div class="avatar avt-60 round">
                                <img src="images/avatar/user-4.jpg" alt="avt">
                            </div>
                            <div class="box-price">
                                <p class="text-title text-line-clamp-1">Contrasting sheepskin sweatshirt</p>
                                <div class="text-button price">$60.00</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 4" style="width: 410px; margin-right: 30px;">
                    <div class="testimonial-item style-2">
                        <div class="content-top">
                            <div class="list-star-default">
                                <i class="icon icon-star"></i>
                                <i class="icon icon-star"></i>
                                <i class="icon icon-star"></i>
                                <i class="icon icon-star"></i>
                                <i class="icon icon-star"></i>
                            </div>
                            <p class="text-secondary">"I absolutely love this shop! The products are high-quality and the customer service is excellent. I always leave with exactly what I need and a smile on my face."</p>
                            <div class="box-author">
                                <div class="text-title author">Mark G.</div>
                                <svg class="icon" width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_15758_14)">
                                    <path d="M6.875 11.6255L8.75 13.5005L13.125 9.12549" stroke="#3DAB25" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M10 18.5005C14.1421 18.5005 17.5 15.1426 17.5 11.0005C17.5 6.85835 14.1421 3.50049 10 3.50049C5.85786 3.50049 2.5 6.85835 2.5 11.0005C2.5 15.1426 5.85786 18.5005 10 18.5005Z" stroke="#3DAB25" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_15758_14">
                                    <rect width="20" height="20" fill="white" transform="translate(0 0.684082)"></rect>
                                    </clipPath>
                                    </defs>
                                </svg> 
                            </div>
                        </div>
                        <div class="box-avt">
                            <div class="avatar avt-60 round">
                                <img src="images/avatar/user-5.jpg" alt="avt">
                            </div>
                            <div class="box-price">
                                <p class="text-title text-line-clamp-1">Contrasting sheepskin sweatshirt</p>
                                <div class="text-button price">$60.00</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide" role="group" aria-label="3 / 4" style="width: 410px; margin-right: 30px;">
                    <div class="testimonial-item style-2">
                        <div class="content-top">
                            <div class="list-star-default">
                                <i class="icon icon-star"></i>
                                <i class="icon icon-star"></i>
                                <i class="icon icon-star"></i>
                                <i class="icon icon-star"></i>
                                <i class="icon icon-star"></i>
                            </div>
                            <p class="text-secondary">"I love this shop! Top-quality products and incredibly friendly staff. They always go the extra mile to ensure I'm satisfied with my purchase."</p>
                            <div class="box-author">
                                <div class="text-title author">Emily S.</div>
                                <svg class="icon" width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_15758_145)">
                                    <path d="M6.875 11.6255L8.75 13.5005L13.125 9.12549" stroke="#3DAB25" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M10 18.5005C14.1421 18.5005 17.5 15.1426 17.5 11.0005C17.5 6.85835 14.1421 3.50049 10 3.50049C5.85786 3.50049 2.5 6.85835 2.5 11.0005C2.5 15.1426 5.85786 18.5005 10 18.5005Z" stroke="#3DAB25" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_15758_145">
                                    <rect width="20" height="20" fill="white" transform="translate(0 0.684082)"></rect>
                                    </clipPath>
                                    </defs>
                                </svg> 
                            </div>
                        </div>
                        <div class="box-avt">
                            <div class="avatar avt-60 round">
                                <img src="images/avatar/user-6.jpg" alt="avt">
                            </div>
                            <div class="box-price">
                                <p class="text-title text-line-clamp-1">Contrasting sheepskin sweatshirt</p>
                                <div class="text-button price">$60.00</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide" role="group" aria-label="4 / 4" style="width: 410px; margin-right: 30px;">
                    <div class="testimonial-item style-2">
                        <div class="content-top">
                            <div class="list-star-default">
                                <i class="icon icon-star"></i>
                                <i class="icon icon-star"></i>
                                <i class="icon icon-star"></i>
                                <i class="icon icon-star"></i>
                                <i class="icon icon-star"></i>
                            </div>
                            <p class="text-secondary">"Fantastic shop! Great selection, fair prices, and friendly staff. Highly recommended. The quality of the products is exceptional, and the prices are very reasonable!"</p>
                            <div class="box-author">
                                <div class="text-title author">Sybil Sharp</div>
                                <svg class="icon" width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_15758_1456)">
                                    <path d="M6.875 11.6255L8.75 13.5005L13.125 9.12549" stroke="#3DAB25" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M10 18.5005C14.1421 18.5005 17.5 15.1426 17.5 11.0005C17.5 6.85835 14.1421 3.50049 10 3.50049C5.85786 3.50049 2.5 6.85835 2.5 11.0005C2.5 15.1426 5.85786 18.5005 10 18.5005Z" stroke="#3DAB25" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_15758_1456">
                                    <rect width="20" height="20" fill="white" transform="translate(0 0.684082)"></rect>
                                    </clipPath>
                                    </defs>
                                </svg> 
                            </div>
                        </div>
                        <div class="box-avt">
                            <div class="avatar avt-60 round">
                                <img src="images/avatar/user-4.jpg" alt="avt">
                            </div>
                            <div class="box-price">
                                <p class="text-title text-line-clamp-1">Contrasting sheepskin sweatshirt</p>
                                <div class="text-button price">$60.00</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sw-pagination-testimonial sw-dots type-circle d-flex justify-content-center swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1" aria-current="true"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span></div>
        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
    </div>
</section>
<!-- /Testimonials -->

<!-- Iconbox -->
<section class="flat-spacing-4 line-top-container">
    <div class="container">
        <div dir="ltr" class="swiper tf-sw-iconbox" data-preview="4" data-tablet="3" data-mobile-sm="2" data-mobile="1" data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1" data-pagination-sm="2" data-pagination-md="3" data-pagination-lg="4">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="tf-icon-box">
                        <div class="icon-box"><span class="icon icon-return"></span></div>
                        <div class="content text-center">
                            <h6>14-Day Returns</h6>
                            <p class="text-secondary">Risk-free shopping with easy returns.</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="tf-icon-box">
                        <div class="icon-box"><i class='bx bxs-truck' ></i></div>
                        <div class="content text-center">
                            <h6>Free Shipping</h6>
                            <p class="text-secondary">No extra costs, just the price you see.</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="tf-icon-box">
                        <div class="icon-box"><i class='bx bx-support'></i></div>
                        <div class="content text-center">
                            <h6>24/7 Support</h6>
                            <p class="text-secondary">24/7 support, always here just for you</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="tf-icon-box">
                        <div class="icon-box"><i class='bx bx-badge-check'></i></div>
                        <div class="content text-center">
                            <h6>Member Discounts</h6>
                            <p class="text-secondary">Special prices for our loyal customers.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sw-pagination-iconbox sw-dots type-circle justify-content-center"></div>
        </div>
    </div>
</section>
<!-- /Iconbox -->

<!-- Brands -->
<section class="flat-spacing-5 line-top">
    <div dir="ltr" class="swiper tf-sw-partner sw-auto" data-preview="auto" data-tablet="auto" data-mobile-sm="auto" data-mobile="auto" data-space-lg="74" data-space-md="50" data-space="50" data-loop="true" data-auto-play="true" data-delay="0">
        <div class="swiper-wrapper">
            @foreach ($brands as $row)
                <div class="swiper-slide">
                    <a href="{{ route('product.page', ['brands' => $row->slug]) }}" class="brand-item">
                        <img src="{{ asset($row->image) }}" alt="{{ $row->slug }}">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- /Brands -->

@endsection


@push('add-js')

   @include('frontend.include.full_ajax_cart')
   
@endpush