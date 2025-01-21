@extends('frontend.layout.master')

@push('add-meta')
    <title>Sazao || About-us Template</title>
@endpush

@push('add-css')

@endpush


@section('body-content')

   <!-- page-title -->
   <div class="page-title" style="background-image: url({{ asset('public/frontend/images/section/page-title.jpg') }});">
    <div class="container-full">
        <div class="row">
            <div class="col-12">
                <h3 class="heading text-center">
                    @if ( request()->has('categories') )
                        {{ ucwords(request()->categories) }}
                    @elseif ( request()->has('sub_categories') )
                        {{ ucwords(request()->sub_categories) }}
                    @else
                        All Products
                    @endif
                </h3>
                <ul class="breadcrumbs d-flex align-items-center justify-content-center">
                    <li>
                        <a class="link" href="index.html">Homepage</a>
                    </li>
                    <li>
                        <i class='bx bx-chevron-right'></i>
                    </li>
                    <li>
                        @if ( request()->has('categories'))
                            {{ ucwords(request()->categories) }}
                        @elseif ( request()->has('sub_categories') )
                            {{ ucwords(request()->sub_categories) }}
                        @else
                            Products
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /page-title -->

<!-- Section product -->
<section class="flat-spacing">
    <div class="container">
        <div class="tf-shop-control">
            <div class="tf-control-filter">
                <button id="filterShop" class="filterShop tf-btn-filter">
                    <i class='bx bx-filter-alt' style="font-size: 22px;"></i>
                    <span class="text">Filters</span></button>
                <div class="d-none d-lg-flex shop-sale-text">
                    <i class='bx bx-check-circle text-success' style="font-size: 22px;"></i>
                    <p class="text-caption-1">Best Quality items</p>
                </div>
            </div>
            <ul class="tf-control-layout">
                <li class="tf-view-layout-switch sw-layout-2" data-value-layout="tf-col-2">
                    <div class="item">
                        <svg class="icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="6" cy="6" r="2.5" stroke="#181818"/>
                            <circle cx="14" cy="6" r="2.5" stroke="#181818"/>
                            <circle cx="6" cy="14" r="2.5" stroke="#181818"/>
                            <circle cx="14" cy="14" r="2.5" stroke="#181818"/>
                        </svg>
                    </div>
                </li>
                <li class="tf-view-layout-switch sw-layout-3 active" data-value-layout="tf-col-3">
                    <div class="item">
                        <svg class="icon" width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="3" cy="6" r="2.5" stroke="#181818"/>
                            <circle cx="11" cy="6" r="2.5" stroke="#181818"/>
                            <circle cx="19" cy="6" r="2.5" stroke="#181818"/>
                            <circle cx="3" cy="14" r="2.5" stroke="#181818"/>
                            <circle cx="11" cy="14" r="2.5" stroke="#181818"/>
                            <circle cx="19" cy="14" r="2.5" stroke="#181818"/>
                        </svg>
                    </div>
                </li>
                <li class="tf-view-layout-switch sw-layout-4" data-value-layout="tf-col-4">
                    <div class="item">
                        <svg class="icon" width="30" height="20" viewBox="0 0 30 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="3" cy="6" r="2.5" stroke="#181818"/>
                            <circle cx="11" cy="6" r="2.5" stroke="#181818"/>
                            <circle cx="19" cy="6" r="2.5" stroke="#181818"/>
                            <circle cx="27" cy="6" r="2.5" stroke="#181818"/>
                            <circle cx="3" cy="14" r="2.5" stroke="#181818"/>
                            <circle cx="11" cy="14" r="2.5" stroke="#181818"/>
                            <circle cx="19" cy="14" r="2.5" stroke="#181818"/>
                            <circle cx="27" cy="14" r="2.5" stroke="#181818"/>
                        </svg>
                    </div>
                </li>
            </ul>
            <div class="tf-control-sorting">
                <p class="d-none d-lg-block text-caption-1">Sort by:</p>
                <div class="tf-dropdown-sort" data-bs-toggle="dropdown">
                    <div class="btn-select">
                        <span class="text-sort-value">Best selling</span>
                        <i class='bx bx-chevron-down' style="font-size: 20px;"></i>
                    </div>
                    <div class="dropdown-menu">
                        <div class="select-item" data-sort-value="best-selling">
                            <span class="text-value-item">Best selling</span>
                        </div>
                        <div class="select-item" data-sort-value="a-z">
                            <span class="text-value-item">Alphabetically, A-Z</span>
                        </div>
                        <div class="select-item" data-sort-value="z-a">
                            <span class="text-value-item">Alphabetically, Z-A</span>
                        </div>
                        <div class="select-item" data-sort-value="price-low-high">
                            <span class="text-value-item">Price, low to high</span>
                        </div>
                        <div class="select-item" data-sort-value="price-high-low">
                            <span class="text-value-item">Price, high to low</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrapper-control-shop">
            <div class="meta_filter_shop">
                <div class="count-text">
                    <span class="count">{{ $products->count() }} Products Found</span>
                </div>
                {{-- <div id="product-count-list" class="count-text"></div> --}}
                {{-- <div id="applied-filters"></div> --}}
                <button id="remove_all" class="remove_all_filters text-btn-uppercase">Reset Filters <i class='bx bx-x' style="font-size: 20px;"></i></button>
            </div>

            <div class="row">
                <div class="col-xl-3">
                    <div class="sidebar-filter canvas-filter left">
                        <div class="canvas-wrapper">
                            <div class="canvas-header d-flex d-xl-none">
                                <h5>Filters</h5>
                                <span class="icon-close close-filter"></span>
                            </div>
                            <div class="canvas-body">

                                {{-- Category Wise Filter --}}
                                <div class="widget-facet facet-fieldset">
                                    <h6 class="facet-title" style="font-size: 20px;">Product Categories</h6>

                                    <div class="box-fieldset-item">
                                        @if ( request()->has('categories') )
                                            @foreach ($categoryItems as $item)
                                                <fieldset class="fieldset-item">
                                                    <input type="checkbox"
                                                     name="brand" 
                                                     class="tf-check" 
                                                     id="{{ $item->slug }}"
                                                     {{ request()->categories == $item->slug ? 'checked' : '' }}
                                                     >
                                                    <label for="{{ $item->slug }}">{{ $item->category_name }}</label>
                                                </fieldset>
                                            @endforeach
                                        @endif

                                        @if ( request()->has('sub_categories') )
                                            @foreach ($categoryItems as $item)
                                                <fieldset class="fieldset-item">
                                                    <input type="checkbox" 
                                                    name="brand" 
                                                    class="tf-check" 
                                                    id="{{ $item->slug }}"
                                                    {{ request()->sub_categories == $item->slug ? 'checked' : '' }}
                                                    >
                                                    <label for="{{ $item->slug }}">{{ $item->subcategory_name }}</label>
                                                </fieldset>
                                            @endforeach
                                        @endif
                                    </div>

                                  
                                </div>

                                {{-- Price Range Filter --}}
                                <div class="widget-facet facet-price">
                                    <h6 class="facet-title" style="font-size: 20px;">Price</h6>
                                    <div class="price-val-range" id="price-value-range" data-min="0" data-max="500"></div>
                                    <div class="box-price-product">
                                        <div class="box-price-item">
                                            <span class="title-price">Min price</span>
                                            <div class="price-val" id="price-min-value" data-currency="$"></div>
                                        </div>
                                        <div class="box-price-item">
                                            <span class="title-price">Max price</span>
                                            <div class="price-val" id="price-max-value" data-currency="$"></div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Size Filter --}}
                                <div class="widget-facet facet-size">
                                    <h6 class="facet-title" style="font-size: 20px;">Size</h6>
                                    <div class="facet-size-box size-box">
                                        <span class="size-item size-check">XS</span>
                                        <span class="size-item size-check">S</span>
                                        <span class="size-item size-check">M</span>
                                        <span class="size-item size-check">L</span>
                                        <span class="size-item size-check">XL</span>
                                        <span class="size-item size-check">2XL</span>
                                        <span class="size-item size-check">3XL</span>
                                        <span class="size-item size-check free-size">Free Size</span>
                                    </div>
                                </div>

                                {{-- Colors Filter --}}
                                <div class="widget-facet facet-color">
                                    <h6 class="facet-title" style="font-size: 20px;">Colors</h6>
                                    <div class="facet-color-box">
                                        <div class="color-item color-check"><span class="color bg-light-pink-2"></span>Pink</div>
                                        <div class="color-item color-check"><span class="color bg-red"></span> Red</div>
                                        <div class="color-item color-check"><span class="color bg-beige-2"></span>Beige</div>
                                        <div class="color-item color-check"><span class="color bg-orange-2"></span>Orange</div>
                                        <div class="color-item color-check"><span class="color bg-light-green"></span>Green</div>
                                        <div class="color-item color-check"><span class="color bg-main"></span>Black</div>
                                        <div class="color-item color-check"><span class="color bg-white line-black"></span>White</div>
                                        <div class="color-item color-check"><span class="color bg-purple-3"></span>Purple</div>
                                        <div class="color-item color-check"><span class="color bg-grey"></span>Grey</div>
                                        <div class="color-item color-check"><span class="color bg-light-blue-5"></span>Light Blue</div>
                                        <div class="color-item color-check"><span class="color bg-dark-blue"></span>Dark Blue</div>
                                    </div>
                                </div>

                                {{-- Stock Filter --}}
                                <div class="widget-facet facet-fieldset">
                                    <h6 class="facet-title" style="font-size: 20px;">Availability</h6>
                                    <div class="box-fieldset-item">
                                        <fieldset class="fieldset-item">
                                            <input type="radio" name="availability" class="tf-check" id="inStock">
                                            <label for="inStock">In stock <span class="count-stock">(32)</span></label>
                                        </fieldset>
                                        <fieldset class="fieldset-item">
                                            <input type="radio" name="availability" class="tf-check" id="outStock">
                                            <label for="outStock">Out of stock <span class="count-stock">(2)</span></label>
                                        </fieldset>
                                    </div>
                                </div>

                                {{-- Brands Filter --}}
                                <div class="widget-facet facet-fieldset">
                                    <h6 class="facet-title" style="font-size: 20px;">Brands</h6>
                                    <div class="box-fieldset-item">

                                        @foreach ($brands as $item)
                                            <fieldset class="fieldset-item">
                                                <input type="checkbox" name="brand" class="tf-check" id="{{ $item->slug }}">
                                                <label for="{{ $item->slug }}">{{ $item->brand_name }}</label>
                                            </fieldset>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="canvas-bottom d-block d-xl-none">
                                <button id="reset-filter" class="tf-btn btn-reset">Reset Filters</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-9">
                    <div class="wrapper-shop tf-grid-layout tf-col-3" id="gridLayout" style="">

                        @foreach ($products as $row)
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
                                            <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                                <i class='bx bx-heart' style="font-size: 24px;"></i>
                                                <span class="tooltip">Wishlist</span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare" class="box-icon compare btn-icon-action">
                                                <i class='bx bx-git-compare' style="font-size: 24px;"></i>
                                                <span class="tooltip">Compare</span>
                                            </a>
                                            <a href="#quickView" data-id={{ $row->id }} data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                                <ion-icon name="eye-outline" style="font-size: 24px;"></ion-icon>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                        <div class="list-btn-main">
                                            <a href="#quickAdd" data-id={{ $row->id }} data-bs-toggle="modal" class="btn-main-product quickAdd">Quick Add</a>
                                        </div>
                                    </div>


                                    <div class="card-product-info">
                                        <a href="{{ route('product.details', $row->slug) }}" class="title link">{{ $row->name }}</a>
                                        <div class="box-rating">
                                            <ul class="list-star">
                                                <li class="bx bxs-star" style="color: #F0A750;"></li>
                                                <li class="bx bxs-star" style="color: #F0A750;"></li>
                                                <li class="bx bxs-star" style="color: #F0A750;"></li>
                                                <li class="bx bxs-star" style="color: #F0A750;"></li>
                                                <li class="bx bx-star" style="color: #F0A750;"></li>
                                            </ul>
                                            <span class="text-caption-1 text-secondary">(1.234)</span>
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
                                                <div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="stock-status d-flex justify-content-between align-items-center">
                                                <div class="stock-item text-caption-1">
                                                    <span class="stock-label text-secondary-2">Available:</span>
                                                    <span class="stock-value">{{ $row->qty }}</span>
                                                </div>
                                                <div class="stock-item text-caption-1">
                                                    <span class="stock-label text-secondary-2">Sold:</span>
                                                    <span class="stock-value">{{ $row->product_sold }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{-- <!-- card product 2 -->
                        <div class="card-product grid" data-availability="In stock" data-brand="nike">
                            <div class="card-product-wrapper">
                                <a href="product-detail.html" class="product-img">
                                    <img class="img-product ls-is-cached lazyloaded" data-src="{{ asset('public/frontend/images/products/womens/women-176.jpg') }}" src="{{ asset('public/frontend/images/products/womens/women-176.jpg') }}" alt="image-product">
                                    <img class="img-hover ls-is-cached lazyloaded" data-src="{{ asset('public/frontend/images/products/womens/women-179.jpg') }}" src="{{ asset('public/frontend/images/products/womens/women-179.jpg') }}" alt="image-product">
                                </a>
                                <div class="on-sale-wrap"><span class="on-sale-item">-25%</span></div>
                                <div class="marquee-product bg-main">
                                    <div class="marquee-wrapper">
                                        <div class="initial-child-container">
                                            <div class="marquee-child-item">
                                                <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale 25% OFF</p>
                                            </div>
                                            <div class="marquee-child-item">
                                                <span class="icon icon-lightning text-critical"></span>
                                            </div>
                                            <div class="marquee-child-item">
                                                <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale 25% OFF</p>
                                            </div>
                                            <div class="marquee-child-item">
                                                <span class="icon icon-lightning text-critical"></span>
                                            </div>
                                            <div class="marquee-child-item">
                                                <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale 25% OFF</p>
                                            </div>
                                            <div class="marquee-child-item">
                                                <span class="icon icon-lightning text-critical"></span>
                                            </div>
                                            <div class="marquee-child-item">
                                                <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale 25% OFF</p>
                                            </div>
                                            <div class="marquee-child-item">
                                                <span class="icon icon-lightning text-critical"></span>
                                            </div>
                                            <div class="marquee-child-item">
                                                <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale 25% OFF</p>
                                            </div>
                                            <div class="marquee-child-item">
                                                <span class="icon icon-lightning text-critical"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="marquee-wrapper">
                                        <div class="initial-child-container">
                                            <div class="marquee-child-item">
                                                <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale 25% OFF</p>
                                            </div>
                                            <div class="marquee-child-item">
                                                <span class="icon icon-lightning text-critical"></span>
                                            </div>
                                            <div class="marquee-child-item">
                                                <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale 25% OFF</p>
                                            </div>
                                            <div class="marquee-child-item">
                                                <span class="icon icon-lightning text-critical"></span>
                                            </div>
                                            <div class="marquee-child-item">
                                                <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale 25% OFF</p>
                                            </div>
                                            <div class="marquee-child-item">
                                                <span class="icon icon-lightning text-critical"></span>
                                            </div>
                                            <div class="marquee-child-item">
                                                <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale 25% OFF</p>
                                            </div>
                                            <div class="marquee-child-item">
                                                <span class="icon icon-lightning text-critical"></span>
                                            </div>
                                            <div class="marquee-child-item">
                                                <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale 25% OFF</p>
                                            </div>
                                            <div class="marquee-child-item">
                                                <span class="icon icon-lightning text-critical"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                <a href="product-detail.html" class="title link">Polarized sunglasses</a>
                                <div class="price"><span class="old-price">$98.00</span> <span class="current-price">$79.99</span></div>
                                <ul class="list-color-product">
                                    <li class="list-color-item color-swatch active line">
                                        <span class="d-none text-capitalize color-filter">Light Blue</span>
                                        <span class="swatch-value bg-light-blue"></span>
                                        <img class=" ls-is-cached lazyloaded" data-src="images/products/womens/women-176.jpg" src="images/products/womens/women-176.jpg" alt="image-product">
                                    </li>
                                    <li class="list-color-item color-swatch">
                                        <span class="d-none text-capitalize color-filter">Light Blue</span>
                                        <span class="swatch-value bg-light-blue-2"></span>
                                        <img class=" ls-is-cached lazyloaded" data-src="images/products/womens/women-177.jpg" src="images/products/womens/women-177.jpg" alt="image-product">
                                    </li>
                                </ul>
                            </div>
                        </div>


                        <!-- pagination -->
                        {{-- <ul class="wg-pagination justify-content-center" style="">
                            <li><a href="#" class="pagination-item text-button">1</a></li>
                            <li class="active">
                                <div class="pagination-item text-button">2</div>
                            </li>
                            <li><a href="#" class="pagination-item text-button">3</a></li>
                            <li><a href="#" class="pagination-item text-button"><i class="icon-arrRight"></i></a></li>
                        </ul> --}}
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- /Section product -->

@endsection

@push('add-js')
    <script type="text/javascript" src="{{ asset('public/frontend/js/nouislider.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/frontend/js/shop.js') }}"></script>

    {{-- Add To Cart Ajax --}}
    @include('frontend.include.full_ajax_cart')
    
@endpush