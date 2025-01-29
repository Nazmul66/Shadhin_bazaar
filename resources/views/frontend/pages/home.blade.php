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

<!-- Categories -->
<section class="flat-spacing-4">
    <div class="container">
        <div class="heading-section text-center wow fadeInUp">
            <h3 class="heading">Popular Categories {{ Auth::user()->name ?? "" }}</h3>
        </div>
        <div class="flat-collection-circle wow fadeInUp" data-wow-delay="0.1s">
            <div dir="ltr" class="swiper tf-sw-categories" data-preview="7" data-tablet="4" data-mobile-sm="3" data-mobile="2" data-space-lg="30" data-space-md="20" data-space="15" data-pagination="2" data-pagination-md="4" data-pagination-lg="1">
                <div class="swiper-wrapper">

                    @foreach ($categories as $row)               
                        <div class="swiper-slide">
                            <div class="collection-circle hover-img">
                                <a href="shop-categories-top.html" class="img-style">
                                    <img class="lazyload" data-src="{{ asset($row->category_img) }}" src="{{ asset($row->category_img) }}" alt="{{ $row->slug  }}">
                                </a>
                                <div class="collection-content text-center">
                                    <div>
                                        <a href="shop-categories-top.html" class="cls-title">
                                            <h6 class="text">{{ $row->category_name }}</h6>
                                            <i class="icon icon-arrowUpRight"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex d-lg-none sw-pagination-categories sw-dots type-circle justify-content-center"></div>

            </div>
            <div class="nav-prev-categories d-none d-lg-flex nav-sw style-line nav-sw-left"><i class='bx bx-chevron-left' style="font-size: 24px;"></i></div>
            <div class="nav-next-categories d-none d-lg-flex nav-sw style-line nav-sw-right"><i class='bx bx-chevron-right' style="font-size: 24px;"></i></div>
        </div>
    </div>
</section>
<!-- /Categories -->

<!-- Deal of the day -->
<section class="flat-spacing-4 pt-0">
    <div class="container">
        <div class="heading-section-2 wow fadeInUp">
            <h4>Deal of the day</h4>
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
<!-- /Deal of the day -->

<!-- Collection -->
<section class="flat-spacing pt-0">
    <div class="container">
        <div dir="ltr" class="swiper tf-sw-collection" data-preview="3" data-tablet="2" data-mobile-sm="1.7" data-mobile="1" data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1" data-pagination-md="1" data-pagination-lg="1">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="collection-position-2 style-5 style-7 hover-img wow fadeInUp" data-wow-delay="0s">
                        <a class="img-style">
                            <img class="lazyload" data-src="{{ asset('public/frontend/images/collections/cls-electronic-1.jpg') }}" src="{{ asset('public/frontend/images/collections/cls-electronic-1.jpg') }}" alt="banner-cls">
                        </a>
                        <div class="content text-start">
                            <h5 class="title mb_8"><a href="shop-default-grid.html" class="link">New Apple Watch</a></h5>
                            <p class="mb_16">Stay connected and stylish with <br> the latest Apple Watch.</p>
                            <div>
                                <a href="shop-default-grid.html" class="btn-line">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="collection-position-2 style-5 style-7 hover-img wow fadeInUp" data-wow-delay="0.1s">
                        <a class="img-style">
                            <img class="lazyload" data-src="{{ asset('public/frontend/images/collections/cls-electronic-2.jpg') }}" src="{{ asset('public/frontend/images/collections/cls-electronic-2.jpg') }}" alt="banner-cls">
                        </a>
                        <div class="content text-start">
                            <h5 class="title mb_8"><a href="shop-default-grid.html" class="link">Discover Galaxy</a></h5>
                            <p class="mb_16">Experience the cutting-edge <br> Samsung S24</p>
                            <div>
                                <a href="shop-default-grid.html" class="btn-line">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="collection-position-2 style-5 style-7 hover-img wow fadeInUp" data-wow-delay="0.2s">
                        <a class="img-style">
                            <img class="lazyload" data-src="{{ asset('public/frontend/images/collections/cls-electronic-3.jpg') }}" src="{{ asset('public/frontend/images/collections/cls-electronic-3.jpg') }}" alt="banner-cls">
                        </a>
                        <div class="content text-start">
                            <h5 class="title mb_8"><a href="shop-default-grid.html" class="link">Smart Speaker</a></h5>
                            <p class="mb_16">Google home smart speaker with <br> google assistant</p>
                            <div>
                                <a href="shop-default-grid.html" class="btn-line">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sw-pagination-collection sw-dots type-circle justify-content-center"></div>
        </div>
    </div>
</section>
<!-- /Collection -->

<!-- Today's Popular Picks -->
<section class="flat-spacing-4 pt-0">
    <div class="container">
        <div class="heading-section-2 wow fadeInUp">
            <h3>Today's Popular Picks</h3>
            <a href="shop-default-grid.html" class="line-under">See All Products</a>
        </div>
        <div dir="ltr" class="swiper tf-sw-recent" data-preview="6" data-tablet="4" data-mobile="2" data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1" data-pagination-md="1" data-pagination-lg="1">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="card-product wow fadeInUp" data-wow-delay="0s">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="{{ asset('public/frontend/images/products/electronic/electronic-11.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-11.jpg') }}" alt="image-product">
                                <img class="lazyload img-hover" data-src="{{ asset('public/frontend/images/products/electronic/electronic-12.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-12.jpg') }}" alt="image-product">
                            </a>
                            <div class="list-product-btn">
                                <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Wishlist</span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare" class="box-icon compare btn-icon-action">
                                    <span class="icon icon-gitDiff"></span>
                                    <span class="tooltip">Compare</span>
                                </a>
                                <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                    <span class="icon icon-eye"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                            <div class="list-btn-main">
                                <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add To cart</a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link"> Kodak Pixpro Fz45-bk 45mm</a>
                            <div class="box-rating">
                                <ul class="list-star">
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                </ul>
                                <span class="text-caption-1 text-secondary">(1.234)</span>
                            </div>
                            <span class="price">$59.99</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card-product wow fadeInUp" data-wow-delay="0.1s">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="{{ asset('public/frontend/images/products/electronic/electronic-1.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-1.jpg') }}" alt="image-product">
                                <img class="lazyload img-hover" data-src="{{ asset('public/frontend/images/products/electronic/electronic-2.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-2.jpg') }}" alt="image-product">
                            </a>
                            <div class="on-sale-wrap"><span class="on-sale-item">-25%</span></div>
                            <div class="list-product-btn">
                                <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Wishlist</span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare" class="box-icon compare btn-icon-action">
                                    <span class="icon icon-gitDiff"></span>
                                    <span class="tooltip">Compare</span>
                                </a>
                                <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                    <span class="icon icon-eye"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                            <div class="list-btn-main">
                                <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add To cart</a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">PlayStation DualSense Wireless Controller</a>
                            <div class="box-rating">
                                <ul class="list-star">
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                </ul>
                                <span class="text-caption-1 text-secondary">(1.234)</span>
                            </div>
                            <span class="price">$59.99</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card-product wow fadeInUp" data-wow-delay="0.2s">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="{{ asset('public/frontend/images/products/electronic/electronic-13.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-13.jpg') }}" alt="image-product">
                                <img class="lazyload img-hover" data-src="{{ asset('public/frontend/images/products/electronic/electronic-14.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-14.jpg') }}" alt="image-product">
                            </a>
                            <div class="list-product-btn">
                                <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Wishlist</span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare" class="box-icon compare btn-icon-action">
                                    <span class="icon icon-gitDiff"></span>
                                    <span class="tooltip">Compare</span>
                                </a>
                                <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                    <span class="icon icon-eye"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                            <div class="list-btn-main">
                                <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add To cart</a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">Apple iPhone 14 Plus, Gold/Blue 128GB</a>
                            <div class="box-rating">
                                <ul class="list-star">
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                </ul>
                                <span class="text-caption-1 text-secondary">(1.234)</span>
                            </div>
                            <span class="price">$59.99</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card-product wow fadeInUp" data-wow-delay="0.3s">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="{{ asset('public/frontend/images/products/electronic/electronic-15.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-15.jpg') }}" alt="image-product">
                                <img class="lazyload img-hover" data-src="{{ asset('public/frontend/images/products/electronic/electronic-16.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-16.jpg') }}" alt="image-product">
                            </a>
                            <div class="list-product-btn">
                                <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Wishlist</span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare" class="box-icon compare btn-icon-action">
                                    <span class="icon icon-gitDiff"></span>
                                    <span class="tooltip">Compare</span>
                                </a>
                                <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                    <span class="icon icon-eye"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                            <div class="list-btn-main">
                                <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add To cart</a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">Apple iPhone 14 Plus, Gold/Blue 128GB</a>
                            <div class="box-rating">
                                <ul class="list-star">
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                </ul>
                                <span class="text-caption-1 text-secondary">(1.234)</span>
                            </div>
                            <span class="price">$59.99</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card-product wow fadeInUp" data-wow-delay="0.4s">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="{{ asset('public/frontend/images/products/electronic/electronic-17.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-17.jpg') }}" alt="image-product">
                                <img class="lazyload img-hover" data-src="{{ asset('public/frontend/images/products/electronic/electronic-18.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-18.jpg') }}" alt="image-product">
                            </a>
                            <div class="list-product-btn">
                                <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Wishlist</span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare" class="box-icon compare btn-icon-action">
                                    <span class="icon icon-gitDiff"></span>
                                    <span class="tooltip">Compare</span>
                                </a>
                                <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                    <span class="icon icon-eye"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                            <div class="list-btn-main">
                                <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add To cart</a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">LG AI DD™ Inverter 16kg automatic F2721HVRB</a>
                            <div class="box-rating">
                                <ul class="list-star">
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                </ul>
                                <span class="text-caption-1 text-secondary">(1.234)</span>
                            </div>
                            <span class="price">$59.99</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card-product wow fadeInUp" data-wow-delay="0.5s">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="{{ asset('public/frontend/images/products/electronic/electronic-19.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-19.jpg') }}" alt="image-product">
                                <img class="lazyload img-hover" data-src="{{ asset('public/frontend/images/products/electronic/electronic-20.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-20.jpg') }}" alt="image-product">
                            </a>
                            <div class="list-product-btn">
                                <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Wishlist</span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare" class="box-icon compare btn-icon-action">
                                    <span class="icon icon-gitDiff"></span>
                                    <span class="tooltip">Compare</span>
                                </a>
                                <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                    <span class="icon icon-eye"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                            <div class="list-btn-main">
                                <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add To cart</a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">Instant Pot Vortex Plus XL 8-quart Dual</a>
                            <div class="box-rating">
                                <ul class="list-star">
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                </ul>
                                <span class="text-caption-1 text-secondary">(1.234)</span>
                            </div>
                            <span class="price">$59.99</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sw-pagination-recent sw-dots type-circle justify-content-center"></div>
        </div>
    </div>
</section>
<!-- /Today's Popular Picks -->

<!-- banner -->
<section>
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
                <h5 class="heading wow fadeInUp">Featured products</h5>
                <div class="list-card-product">
                    <div class="card-product list-st-2 wow fadeInUp">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="{{ asset('public/frontend/images/products/electronic/electronic-21.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-21.jpg') }}" alt="image-product">
                                <img class="lazyload img-hover" data-src="{{ asset('public/frontend/images/products/electronic/electronic-22.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-22.jpg') }}" alt="image-product">
                            </a>
                            <div class="on-sale-wrap"><span class="on-sale-item">-25%</span></div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">Instant Pot Vortex Plus XL 8-quart Dual Basket Air Fryer Oven</a>
                            <div class="bottom">
                                <div class="inner-left">
                                    <div class="box-rating">
                                        <ul class="list-star">
                                            <li class="icon icon-star"></li>
                                            <li class="icon icon-star"></li>
                                            <li class="icon icon-star"></li>
                                            <li class="icon icon-star"></li>
                                            <li class="icon icon-star"></li>
                                        </ul>
                                        <span class="text-caption-1 text-secondary">(1.234)</span>
                                    </div>
                                    <span class="price py-4"> $59.99</span>
                                </div>
                                <a href="#shoppingCart" data-bs-toggle="modal" class="box-icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.2187 10.3327V5.99935C16.2187 4.85008 15.7622 3.74788 14.9495 2.93522C14.1369 2.12256 13.0347 1.66602 11.8854 1.66602C10.7361 1.66602 9.63394 2.12256 8.82129 2.93522C8.00863 3.74788 7.55208 4.85008 7.55208 5.99935V10.3327M4.30208 8.16602H19.4687L20.5521 21.166H3.21875L4.30208 8.16602Z" stroke="#181818" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>   
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-product list-st-2 wow fadeInUp">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="{{ asset('public/frontend/images/products/electronic/electronic-7.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-7.jpg') }}" alt="image-product">
                                <img class="lazyload img-hover" data-src="{{ asset('public/frontend/images/products/electronic/electronic-8.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-8.jpg') }}" alt="image-product">
                            </a>
                            <div class="on-sale-wrap"><span class="on-sale-item">-25%</span></div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">JBL Live 460nc for Android IOS & Android</a>
                            <div class="bottom">
                                <div class="inner-left">
                                    <div class="box-rating">
                                        <ul class="list-star">
                                            <li class="icon icon-star"></li>
                                            <li class="icon icon-star"></li>
                                            <li class="icon icon-star"></li>
                                            <li class="icon icon-star"></li>
                                            <li class="icon icon-star"></li>
                                        </ul>
                                        <span class="text-caption-1 text-secondary">(1.234)</span>
                                    </div>
                                    <span class="price py-4"> $59.99</span>
                                </div>
                                <a href="#shoppingCart" data-bs-toggle="modal" class="box-icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.2187 10.3327V5.99935C16.2187 4.85008 15.7622 3.74788 14.9495 2.93522C14.1369 2.12256 13.0347 1.66602 11.8854 1.66602C10.7361 1.66602 9.63394 2.12256 8.82129 2.93522C8.00863 3.74788 7.55208 4.85008 7.55208 5.99935V10.3327M4.30208 8.16602H19.4687L20.5521 21.166H3.21875L4.30208 8.16602Z" stroke="#181818" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>   
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-product list-st-2 wow fadeInUp">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="{{ asset('public/frontend/images/products/electronic/electronic-1.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-1.jpg') }}" alt="image-product">
                                <img class="lazyload img-hover" data-src="{{ asset('public/frontend/images/products/electronic/electronic-2.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-2.jpg') }}" alt="image-product">
                            </a>
                            <div class="on-sale-wrap"><span class="on-sale-item">-25%</span></div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">PlayStation DualSense Wireless Controller</a>
                            <div class="bottom">
                                <div class="inner-left">
                                    <div class="box-rating">
                                        <ul class="list-star">
                                            <li class="icon icon-star"></li>
                                            <li class="icon icon-star"></li>
                                            <li class="icon icon-star"></li>
                                            <li class="icon icon-star"></li>
                                            <li class="icon icon-star"></li>
                                        </ul>
                                        <span class="text-caption-1 text-secondary">(1.234)</span>
                                    </div>
                                    <span class="price py-4"> $59.99</span>
                                </div>
                                <a href="#shoppingCart" data-bs-toggle="modal" class="box-icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.2187 10.3327V5.99935C16.2187 4.85008 15.7622 3.74788 14.9495 2.93522C14.1369 2.12256 13.0347 1.66602 11.8854 1.66602C10.7361 1.66602 9.63394 2.12256 8.82129 2.93522C8.00863 3.74788 7.55208 4.85008 7.55208 5.99935V10.3327M4.30208 8.16602H19.4687L20.5521 21.166H3.21875L4.30208 8.16602Z" stroke="#181818" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>   
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column-card-product">
                <h5 class="heading wow fadeInUp">New Arrivals</h5>
                <div class="list-card-product">
                    <div class="card-product list-st-2 wow fadeInUp">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="{{ asset('public/frontend/images/products/electronic/electronic-19.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-19.jpg') }}" alt="image-product">
                                <img class="lazyload img-hover" data-src="{{ asset('public/frontend/images/products/electronic/electronic-20.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-20.jpg') }}" alt="image-product">
                            </a>
                            <div class="on-sale-wrap"><span class="on-sale-item">-25%</span></div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">LG AI DD™ Inverter 16kg automatic F2721HVRB</a>
                            <div class="bottom">
                                <div class="inner-left">
                                    <div class="box-rating">
                                        <ul class="list-star">
                                            <li class="icon icon-star"></li>
                                            <li class="icon icon-star"></li>
                                            <li class="icon icon-star"></li>
                                            <li class="icon icon-star"></li>
                                            <li class="icon icon-star"></li>
                                        </ul>
                                        <span class="text-caption-1 text-secondary">(1.234)</span>
                                    </div>
                                    <span class="price py-4"> $59.99</span>
                                </div>
                                <a href="#shoppingCart" data-bs-toggle="modal" class="box-icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.2187 10.3327V5.99935C16.2187 4.85008 15.7622 3.74788 14.9495 2.93522C14.1369 2.12256 13.0347 1.66602 11.8854 1.66602C10.7361 1.66602 9.63394 2.12256 8.82129 2.93522C8.00863 3.74788 7.55208 4.85008 7.55208 5.99935V10.3327M4.30208 8.16602H19.4687L20.5521 21.166H3.21875L4.30208 8.16602Z" stroke="#181818" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>   
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-product list-st-2 wow fadeInUp">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="{{ asset('public/frontend/images/products/electronic/electronic-13.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-13.jpg') }}" alt="image-product">
                                <img class="lazyload img-hover" data-src="{{ asset('public/frontend/images/products/electronic/electronic-14.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-14.jpg') }}" alt="image-product">
                            </a>
                            <div class="on-sale-wrap"><span class="on-sale-item">-25%</span></div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">Apple iPhone 14 Plus, Gold/Blue 128GB</a>
                            <div class="bottom">
                                <div class="inner-left">
                                    <div class="box-rating">
                                        <ul class="list-star">
                                            <li class="icon icon-star"></li>
                                            <li class="icon icon-star"></li>
                                            <li class="icon icon-star"></li>
                                            <li class="icon icon-star"></li>
                                            <li class="icon icon-star"></li>
                                        </ul>
                                        <span class="text-caption-1 text-secondary">(1.234)</span>
                                    </div>
                                    <span class="price py-4"> $59.99</span>
                                </div>
                                <a href="#shoppingCart" data-bs-toggle="modal" class="box-icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.2187 10.3327V5.99935C16.2187 4.85008 15.7622 3.74788 14.9495 2.93522C14.1369 2.12256 13.0347 1.66602 11.8854 1.66602C10.7361 1.66602 9.63394 2.12256 8.82129 2.93522C8.00863 3.74788 7.55208 4.85008 7.55208 5.99935V10.3327M4.30208 8.16602H19.4687L20.5521 21.166H3.21875L4.30208 8.16602Z" stroke="#181818" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>   
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-product list-st-2 wow fadeInUp">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="{{ asset('public/frontend/images/products/electronic/electronic-3.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-3.jpg') }}" alt="image-product">
                                <img class="lazyload img-hover" data-src="{{ asset('public/frontend/images/products/electronic/electronic-4.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-4.jpg') }}" alt="image-product">
                            </a>
                            <div class="on-sale-wrap"><span class="on-sale-item">-25%</span></div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">Apple Watch Ultra 2-  Rugged Titanium Case</a>
                            <div class="bottom">
                                <div class="inner-left">
                                    <div class="box-rating">
                                        <ul class="list-star">
                                            <li class="icon icon-star"></li>
                                            <li class="icon icon-star"></li>
                                            <li class="icon icon-star"></li>
                                            <li class="icon icon-star"></li>
                                            <li class="icon icon-star"></li>
                                        </ul>
                                        <span class="text-caption-1 text-secondary">(1.234)</span>
                                    </div>
                                    <span class="price py-4"> $59.99</span>
                                </div>
                                <a href="#shoppingCart" data-bs-toggle="modal" class="box-icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.2187 10.3327V5.99935C16.2187 4.85008 15.7622 3.74788 14.9495 2.93522C14.1369 2.12256 13.0347 1.66602 11.8854 1.66602C10.7361 1.66602 9.63394 2.12256 8.82129 2.93522C8.00863 3.74788 7.55208 4.85008 7.55208 5.99935V10.3327M4.30208 8.16602H19.4687L20.5521 21.166H3.21875L4.30208 8.16602Z" stroke="#181818" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>   
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column-card-product">
                <h5 class="heading wow fadeInUp">Maybe you will love</h5>
                <div class="list-card-product">
                    <div class="card-product list-st-2 wow fadeInUp">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="{{ asset('public/frontend/images/products/electronic/electronic-19.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-19.jpg') }}" alt="image-product">
                                <img class="lazyload img-hover" data-src="{{ asset('public/frontend/images/products/electronic/electronic-20.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-20.jpg') }}" alt="image-product">
                            </a>
                            <div class="on-sale-wrap"><span class="on-sale-item">-25%</span></div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">Instant Pot Vortex Plus XL 8-quart Dual Basket Air Fryer Oven</a>
                            <div class="bottom">
                                <div class="inner-left">
                                    <div class="box-rating">
                                        <ul class="list-star">
                                            <li class="icon icon-star"></li>
                                            <li class="icon icon-star"></li>
                                            <li class="icon icon-star"></li>
                                            <li class="icon icon-star"></li>
                                            <li class="icon icon-star"></li>
                                        </ul>
                                        <span class="text-caption-1 text-secondary">(1.234)</span>
                                    </div>
                                    <span class="price py-4"> $59.99</span>
                                </div>
                                <a href="#shoppingCart" data-bs-toggle="modal" class="box-icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.2187 10.3327V5.99935C16.2187 4.85008 15.7622 3.74788 14.9495 2.93522C14.1369 2.12256 13.0347 1.66602 11.8854 1.66602C10.7361 1.66602 9.63394 2.12256 8.82129 2.93522C8.00863 3.74788 7.55208 4.85008 7.55208 5.99935V10.3327M4.30208 8.16602H19.4687L20.5521 21.166H3.21875L4.30208 8.16602Z" stroke="#181818" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>   
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-product list-st-2 wow fadeInUp">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="{{ asset('public/frontend/images/products/electronic/electronic-9.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-9.jpg') }}" alt="image-product">
                                <img class="lazyload img-hover" data-src="{{ asset('public/frontend/images/products/electronic/electronic-10.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-10.jpg') }}" alt="image-product">
                            </a>
                            <div class="on-sale-wrap"><span class="on-sale-item">-25%</span></div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">iPad Mini 6 8.3 inch Wi-Fi 6-5G64GB</a>
                            <div class="bottom">
                                <div class="inner-left">
                                    <div class="box-rating">
                                        <ul class="list-star">
                                            <li class="icon icon-star"></li>
                                            <li class="icon icon-star"></li>
                                            <li class="icon icon-star"></li>
                                            <li class="icon icon-star"></li>
                                            <li class="icon icon-star"></li>
                                        </ul>
                                        <span class="text-caption-1 text-secondary">(1.234)</span>
                                    </div>
                                    <span class="price py-4"> $59.99</span>
                                </div>
                                <a href="#shoppingCart" data-bs-toggle="modal" class="box-icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.2187 10.3327V5.99935C16.2187 4.85008 15.7622 3.74788 14.9495 2.93522C14.1369 2.12256 13.0347 1.66602 11.8854 1.66602C10.7361 1.66602 9.63394 2.12256 8.82129 2.93522C8.00863 3.74788 7.55208 4.85008 7.55208 5.99935V10.3327M4.30208 8.16602H19.4687L20.5521 21.166H3.21875L4.30208 8.16602Z" stroke="#181818" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>   
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-product list-st-2 wow fadeInUp">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="{{ asset('public/frontend/images/products/electronic/electronic-6.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-6.jpg') }}" alt="image-product">
                                <img class="lazyload img-hover" data-src="{{ asset('public/frontend/images/products/electronic/electronic-7.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-7.jpg') }}" alt="image-product">
                            </a>
                            <div class="on-sale-wrap"><span class="on-sale-item">-25%</span></div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">JBL Live 460nc for Android IOS & Android</a>
                            <div class="bottom">
                                <div class="inner-left">
                                    <div class="box-rating">
                                        <ul class="list-star">
                                            <li class="icon icon-star"></li>
                                            <li class="icon icon-star"></li>
                                            <li class="icon icon-star"></li>
                                            <li class="icon icon-star"></li>
                                            <li class="icon icon-star"></li>
                                        </ul>
                                        <span class="text-caption-1 text-secondary">(1.234)</span>
                                    </div>
                                    <span class="price py-4"> $59.99</span>
                                </div>
                                <a href="#shoppingCart" data-bs-toggle="modal" class="box-icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.2187 10.3327V5.99935C16.2187 4.85008 15.7622 3.74788 14.9495 2.93522C14.1369 2.12256 13.0347 1.66602 11.8854 1.66602C10.7361 1.66602 9.63394 2.12256 8.82129 2.93522C8.00863 3.74788 7.55208 4.85008 7.55208 5.99935V10.3327M4.30208 8.16602H19.4687L20.5521 21.166H3.21875L4.30208 8.16602Z" stroke="#181818" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>   
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /product -->

<!-- Most-viewed Products -->
<section class="flat-spacing-4 pt-0">
    <div class="container">
        <div class="heading-section-2 wow fadeInUp">
            <h4>Most-viewed Products</h4>
            <a href="shop-default-grid.html" class="line-under">See All Products</a>
        </div>
        <div dir="ltr" class="swiper tf-sw-products" data-preview="6" data-tablet="4" data-mobile="2" data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1" data-pagination-md="1" data-pagination-lg="1">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="card-product wow fadeInUp" data-wow-delay="0s">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="{{ asset('public/frontend/images/products/electronic/electronic-11.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-11.jpg') }}" alt="image-product">
                                <img class="lazyload img-hover" data-src="{{ asset('public/frontend/images/products/electronic/electronic-12.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-12.jpg') }}" alt="image-product">
                            </a>
                            <div class="list-product-btn">
                                <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Wishlist</span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare" class="box-icon compare btn-icon-action">
                                    <span class="icon icon-gitDiff"></span>
                                    <span class="tooltip">Compare</span>
                                </a>
                                <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                    <span class="icon icon-eye"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                            <div class="list-btn-main">
                                <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add To cart</a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link"> Kodak Pixpro Fz45-bk 45mm</a>
                            <div class="box-rating">
                                <ul class="list-star">
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                </ul>
                                <span class="text-caption-1 text-secondary">(1.234)</span>
                            </div>
                            <span class="price">$59.99</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card-product wow fadeInUp" data-wow-delay="0.1s">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="{{ asset('public/frontend/images/products/electronic/electronic-1.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-1.jpg') }}" alt="image-product">
                                <img class="lazyload img-hover" data-src="{{ asset('public/frontend/images/products/electronic/electronic-2.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-2.jpg') }}" alt="image-product">
                            </a>
                            <div class="on-sale-wrap"><span class="on-sale-item">-25%</span></div>
                            <div class="list-product-btn">
                                <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Wishlist</span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare" class="box-icon compare btn-icon-action">
                                    <span class="icon icon-gitDiff"></span>
                                    <span class="tooltip">Compare</span>
                                </a>
                                <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                    <span class="icon icon-eye"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                            <div class="list-btn-main">
                                <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add To cart</a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">PlayStation DualSense Wireless Controller</a>
                            <div class="box-rating">
                                <ul class="list-star">
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                </ul>
                                <span class="text-caption-1 text-secondary">(1.234)</span>
                            </div>
                            <span class="price">$59.99</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card-product wow fadeInUp" data-wow-delay="0.2s">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="{{ asset('public/frontend/images/products/electronic/electronic-13.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-13.jpg') }}" alt="image-product">
                                <img class="lazyload img-hover" data-src="{{ asset('public/frontend/images/products/electronic/electronic-14.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-14.jpg') }}" alt="image-product">
                            </a>
                            <div class="list-product-btn">
                                <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Wishlist</span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare" class="box-icon compare btn-icon-action">
                                    <span class="icon icon-gitDiff"></span>
                                    <span class="tooltip">Compare</span>
                                </a>
                                <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                    <span class="icon icon-eye"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                            <div class="list-btn-main">
                                <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add To cart</a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">Apple iPhone 14 Plus, Gold/Blue 128GB</a>
                            <div class="box-rating">
                                <ul class="list-star">
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                </ul>
                                <span class="text-caption-1 text-secondary">(1.234)</span>
                            </div>
                            <span class="price">$59.99</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card-product wow fadeInUp" data-wow-delay="0.3s">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="{{ asset('public/frontend/images/products/electronic/electronic-15.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-15.jpg') }}" alt="image-product">
                                <img class="lazyload img-hover" data-src="{{ asset('public/frontend/images/products/electronic/electronic-16.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-16.jpg') }}" alt="image-product">
                            </a>
                            <div class="list-product-btn">
                                <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Wishlist</span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare" class="box-icon compare btn-icon-action">
                                    <span class="icon icon-gitDiff"></span>
                                    <span class="tooltip">Compare</span>
                                </a>
                                <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                    <span class="icon icon-eye"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                            <div class="list-btn-main">
                                <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add To cart</a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">Apple iPhone 14 Plus, Gold/Blue 128GB</a>
                            <div class="box-rating">
                                <ul class="list-star">
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                </ul>
                                <span class="text-caption-1 text-secondary">(1.234)</span>
                            </div>
                            <span class="price">$59.99</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card-product wow fadeInUp" data-wow-delay="0.4s">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="{{ asset('public/frontend/images/products/electronic/electronic-17.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-17.jpg') }}" alt="image-product">
                                <img class="lazyload img-hover" data-src="{{ asset('public/frontend/images/products/electronic/electronic-18.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-18.jpg') }}" alt="image-product">
                            </a>
                            <div class="list-product-btn">
                                <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Wishlist</span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare" class="box-icon compare btn-icon-action">
                                    <span class="icon icon-gitDiff"></span>
                                    <span class="tooltip">Compare</span>
                                </a>
                                <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                    <span class="icon icon-eye"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                            <div class="list-btn-main">
                                <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add To cart</a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">LG AI DD™ Inverter 16kg automatic F2721HVRB</a>
                            <div class="box-rating">
                                <ul class="list-star">
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                </ul>
                                <span class="text-caption-1 text-secondary">(1.234)</span>
                            </div>
                            <span class="price">$59.99</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card-product wow fadeInUp" data-wow-delay="0.5s">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="{{ asset('public/frontend/images/products/electronic/electronic-19.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-19.jpg') }}" alt="image-product">
                                <img class="lazyload img-hover" data-src="{{ asset('public/frontend/images/products/electronic/electronic-20.jpg') }}" src="{{ asset('public/frontend/images/products/electronic/electronic-20.jpg') }}" alt="image-product">
                            </a>
                            <div class="list-product-btn">
                                <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Wishlist</span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare" class="box-icon compare btn-icon-action">
                                    <span class="icon icon-gitDiff"></span>
                                    <span class="tooltip">Compare</span>
                                </a>
                                <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                    <span class="icon icon-eye"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                            <div class="list-btn-main">
                                <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add To cart</a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">Instant Pot Vortex Plus XL 8-quart Dual</a>
                            <div class="box-rating">
                                <ul class="list-star">
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                    <li class="icon icon-star"></li>
                                </ul>
                                <span class="text-caption-1 text-secondary">(1.234)</span>
                            </div>
                            <span class="price">$59.99</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sw-pagination-products sw-dots type-circle justify-content-center"></div>
        </div>
    </div>
</section>
<!-- /Most-viewed Products -->

<!-- Featured -->
<section class="flat-spacing-4 pt-0">
    <div class="container">
        <div class="heading-section-2 wow fadeInUp">
            <h4>Our Featured Offers</h4>
            <a href="shop-default-grid.html" class="line-under">See All Offers</a>
        </div>
        <div dir="ltr" class="swiper tf-sw-products1" data-preview="4" data-tablet="4" data-mobile="2" data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1" data-pagination-md="1" data-pagination-lg="1">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="collection-circle style-1 hover-img wow fadeInUp" data-wow-delay="0s">
                        <a href="shop-default-grid.html" class="img-style">
                            <img class="lazyload" data-src="{{ asset('public/frontend/images/collections/collection-circle/cls-electronic8.jpg') }}" src="{{ asset('public/frontend/images/collections/collection-circle/cls-electronic8.jpg') }}" alt="collection-img">
                        </a>
                        <div class="collection-content text-center">
                            <h5 class="heading">Shop top deals on Samsung Fold and more.</h5>
                            <div>
                                <a href="shop-default-grid.html" class="btn-line">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="collection-circle style-1 hover-img wow fadeInUp" data-wow-delay="0.1s">
                        <a href="shop-default-grid.html" class="img-style">
                            <img class="lazyload" data-src="{{ asset('public/frontend/images/collections/collection-circle/cls-electronic9.jpg') }}" src="{{ asset('public/frontend/images/collections/collection-circle/cls-electronic9.jpg') }}" alt="collection-img">
                        </a>
                        <div class="collection-content text-center">
                            <h5 class="heading">Score top deals on Sony PS5 and accessories.</h5>
                            <div>
                                <a href="shop-default-grid.html" class="btn-line">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="collection-circle style-1 hover-img wow fadeInUp" data-wow-delay="0.2s">
                        <a href="shop-default-grid.html" class="img-style">
                            <img class="lazyload" data-src="{{ asset('public/frontend/images/collections/collection-circle/cls-electronic10.jpg') }}" src="{{ asset('public/frontend/images/collections/collection-circle/cls-electronic10.jpg') }}" alt="collection-img">
                        </a>
                        <div class="collection-content text-center">
                            <h5 class="heading">Grab amazing deals on Imac and Apple</h5>
                            <div>
                                <a href="shop-default-grid.html" class="btn-line">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="collection-circle style-1 hover-img wow fadeInUp" data-wow-delay="0.3s">
                        <a href="shop-default-grid.html" class="img-style">
                            <img class="lazyload" data-src="{{ asset('public/frontend/images/collections/collection-circle/cls-electronic11.jpg') }}" src="{{ asset('public/frontend/images/collections/collection-circle/cls-electronic11.jpg') }}" alt="collection-img">
                        </a>
                        <div class="collection-content text-center">
                            <h5 class="heading">Top deals on Bluetooth speakers and more.</h5>
                            <div>
                                <a href="shop-default-grid.html" class="btn-line">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sw-pagination-products1 sw-dots type-circle justify-content-center"></div>
        </div>
    </div>
</section>
<!-- /Featured -->

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
                        <div class="icon-box"><span class="icon icon-shipping"></span></div>
                        <div class="content text-center">
                            <h6>Free Shipping</h6>
                            <p class="text-secondary">No extra costs, just the price you see.</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="tf-icon-box">
                        <div class="icon-box"><span class="icon icon-headset"></span></div>
                        <div class="content text-center">
                            <h6>24/7 Support</h6>
                            <p class="text-secondary">24/7 support, always here just for you</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="tf-icon-box">
                        <div class="icon-box"><span class="icon icon-sealCheck"></span></div>
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