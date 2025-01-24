@php
    $categories = App\Models\Category::where('front_status', 1)->where('status', 1)->get();
@endphp

<header id="header" class="header-default header-style-5 header-white">
    <div class="main-header bg-blue-2">
        <div class="container">
            <div class="row wrapper-header align-items-center line-top-rgba">
                <div class="col-md-4 col-3 d-xl-none">
                    <a href="#mobileMenu" class="mobile-menu" data-bs-toggle="offcanvas" aria-controls="mobileMenu">
                        <i class='bx bx-menu-alt-left text-white' style="font-size: 36px;"></i>
                    </a>
                </div>
                <div class="col-xl-8 col-md-4 col-6">
                    <div class="wrapper-header-left justify-content-center justify-content-xl-start">
                        <a href="index.html" class="logo-header">
                            <img src="{{ asset('public/frontend/images/logo/logo-white.svg') }}" alt="logo" class="logo">
                        </a>
                        <div class="d-xl-block d-none">
                            <form>
                                <div class="form-search-select">
                                    {{-- <div class="tf-dropdown-sort" data-bs-toggle="dropdown">
                                        <div class="btn-select">
                                            <span class="text-sort-value">All</span>
                                            <i class='bx bx-chevron-down' style="font-size: 24px;"></i>
                                        </div>
                                        <div class="dropdown-menu">
                                            <div class="select-item active">
                                                <span class="text-value-item">All</span>
                                            </div>
                                            <div class="select-item">
                                                <span class="text-value-item">Best selling</span>
                                            </div>
                                            <div class="select-item">
                                                <span class="text-value-item">Alphabetically, A-Z</span>
                                            </div>
                                            <div class="select-item">
                                                <span class="text-value-item">Alphabetically, Z-A</span>
                                            </div>
                                            <div class="select-item">
                                                <span class="text-value-item">Price, low to high</span>
                                            </div>
                                            <div class="select-item">
                                                <span class="text-value-item">Price, high to low</span>
                                            </div>
                                            <div class="select-item">
                                                <span class="text-value-item">Date, old to new</span>
                                            </div>
                                            <div class="select-item">
                                                <span class="text-value-item">Date, new to old</span>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <input type="text" placeholder="What are you looking for today?">
                                    <button class="tf-btn"><span class="text">Search</span></button>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
                <div class="col-xl-4 col-md-4 col-3">
                    <div class="wrapper-header-right">
                        <div class="d-none d-xl-flex box-support">
                            <i class='bx bxs-color text-white ' style="font-size: 32px;"></i>
                            <div>
                                <div class="text-title text-white">Hotline: +01 1234 8888</div>
                                <div class="text-white text-caption-2">24/7 Support Center</div>
                            </div>
                        </div>

                        {{-- <ul class="nav-icon d-flex justify-content-end align-items-center">
                            <li class="nav-search d-inline-flex d-xl-none"><a href="#search" data-bs-toggle="modal" class="nav-icon-item">
                                <svg class="icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M21.35 21.0004L17 16.6504" stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>    
                            </a></li>
                            <li class="nav-account">
                                <a href="#" class="nav-icon-item">
                                    <svg class="icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92172 15.4214 5.17157 16.1716C4.42143 16.9217 4 17.9391 4 19V21" stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z" stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                                <div class="dropdown-account dropdown-login">
                                    <div class="sub-top">
                                        <a href="{{ route('login') }}" class="tf-btn btn-reset">Login</a>
                                        <p class="text-center text-secondary-2">Don’t have an account? <a href="{{ route('register') }}">Register</a></p>
                                    </div>
                                    <div class="sub-bot">
                                        <span class="body-text-">Support</span>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-wishlist"><a href="wish-list.html" class="nav-icon-item">
                                <svg class="icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.8401 4.60987C20.3294 4.09888 19.7229 3.69352 19.0555 3.41696C18.388 3.14039 17.6726 2.99805 16.9501 2.99805C16.2276 2.99805 15.5122 3.14039 14.8448 3.41696C14.1773 3.69352 13.5709 4.09888 13.0601 4.60987L12.0001 5.66987L10.9401 4.60987C9.90843 3.57818 8.50915 2.99858 7.05012 2.99858C5.59109 2.99858 4.19181 3.57818 3.16012 4.60987C2.12843 5.64156 1.54883 7.04084 1.54883 8.49987C1.54883 9.95891 2.12843 11.3582 3.16012 12.3899L4.22012 13.4499L12.0001 21.2299L19.7801 13.4499L20.8401 12.3899C21.3511 11.8791 21.7565 11.2727 22.033 10.6052C22.3096 9.93777 22.4519 9.22236 22.4519 8.49987C22.4519 7.77738 22.3096 7.06198 22.033 6.39452C21.7565 5.72706 21.3511 5.12063 20.8401 4.60987V4.60987Z" stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>  
                                </a>
                            </li>
                            <li class="nav-cart"><a href="#shoppingCart" data-bs-toggle="modal" class="nav-icon-item">
                                <svg class="icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.5078 10.8734V6.36686C16.5078 5.17166 16.033 4.02541 15.1879 3.18028C14.3428 2.33514 13.1965 1.86035 12.0013 1.86035C10.8061 1.86035 9.65985 2.33514 8.81472 3.18028C7.96958 4.02541 7.49479 5.17166 7.49479 6.36686V10.8734M4.11491 8.62012H19.8877L21.0143 22.1396H2.98828L4.11491 8.62012Z" stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>  
                                <span class="count-box">{{ Cart::content()->count() }}</span></a>
                            </li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom bg-blue-3 d-none d-xl-block">
        <div class="container">
            <div class="wrapper-header d-flex justify-content-between align-items-center">
                <div class="box-left">
                    <div class="tf-list-categories">
                        <a href="#" class="categories-title"><i class='bx bxs-dashboard' style="font-size: 24px;"></i><span class="text">Shop By Categories</span> <i class='bx bx-chevron-down' style="font-size: 24px;"></i></a>
                        <div class="list-categories-inner">
                            <ul>
                                @foreach ($categories as $item)
                                    @php
                                        $subCats = App\Models\SubCategory::where('category_id', $item->id)->where('status', 1)->get();
                                    @endphp

                                    <li class="sub-categories2">
                                        <a href="{{ route('product.page', ['categories' => $item->slug]) }}" class="categories-item"><span class="inner-left">
                                            <img src="{{ asset($item->category_img) }}" alt="{{ $item->slug  }}"> 
                                            {{ $item->category_name }}</span>

                                            @if ( $subCats->count() > 0 )
                                                <i class='bx bx-chevron-right' style="font-size: 24px;"></i>
                                            @endif
                                        </a>

                                        @if ( $subCats->count() > 0 )
                                            <ul class="list-categories-inner">
                                                @foreach ($subCats as $row)
                                                    <li>
                                                        <a href="{{ route('product.page', ['sub_categories' => $row->slug]) }}" class="categories-item">
                                                            <span class="inner-left">
                                                                <img src="{{ asset($row->subcategory_img) }}" alt="{{ $row->slug  }}">  
                                                                {{ $row->subcategory_name }}
                                                            </span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    
                    <nav class="box-navigation">
                        <ul class="box-nav-ul d-flex align-items-center">
                            <li class="menu-item active">
                                <a href="#" class="item-link">Home<i class='bx bx-chevron-down' style="font-size: 20px;"></i></a>
                                <div class="sub-menu mega-menu">
                                    <div class="container">
                                        <div class="row-demo">
                                            <div class="demo-item">
                                                <a href="index.html">
                                                    <div class="demo-image position-relative">
                                                        <img class="lazyload" data-src="{{ asset('public/frontend/images/demo/home-fashion-womenswear.jpg') }}" src="{{ asset('public/frontend/images/demo/home-fashion-womenswear.jpg') }}" alt="home-fashion-womenswear">
                                                        <div class="demo-label">
                                                            <span class="demo-new">New</span>
                                                            <span>Trend</span>
                                                        </div>
                                                    </div>
                                                    <span class="demo-name">Fashion Womenswear</span>
                                                </a>
                                            </div>
                                            <div class="demo-item">
                                                <a href="home-fashion-eleganceNest.html">
                                                    <div class="demo-image position-relative">
                                                        <img class="lazyload" data-src="{{ asset('public/frontend/images/demo/home-fashion-eleganceNest.jpg') }}" src="{{ asset('public/frontend/images/demo/home-fashion-eleganceNest.jpg') }}" alt="home-fashion-eleganceNest">
                                                        <div class="demo-label">
                                                            <span class="demo-new">New</span>
                                                            <span class="demo-hot">Hot</span>
                                                        </div>
                                                    </div>
                                                    <span class="demo-name">Fashion EleganceNest</span>
                                                </a>
                                            </div>
                                            <div class="demo-item">
                                                <a href="home-fashion-main.html">
                                                    <div class="demo-image position-relative">
                                                        <img class="lazyload" data-src="{{ asset('public/frontend/images/demo/home-fashion-main.jpg') }}" src="{{ asset('public/frontend/images/demo/home-fashion-main.jpg') }}" alt="home-fashion-main">
                                                        <div class="demo-label">
                                                            <span class="demo-hot">Hot</span>
                                                        </div>
                                                    </div>
                                                    <span class="demo-name">Fashion Main</span>
                                                </a>
                                            </div>
                                            <div class="demo-item">
                                                <a href="home-fashion-trendset.html">
                                                    <div class="demo-image">
                                                        <img class="lazyload" data-src="{{ asset('public/frontend/images/demo/home-fashion-trendset.jpg') }}" src="{{ asset('public/frontend/images/demo/home-fashion-trendset.jpg') }}" alt="home-fashion-trendset">
                                                    </div>
                                                    <span class="demo-name">Fashion TrendsetHome</span>
                                                </a>
                                            </div>
                                            <div class="demo-item">
                                                <a href="home-fashion-vogueLing.html">
                                                    <div class="demo-image">
                                                        <img class="lazyload" data-src="{{ asset('public/frontend/images/demo/home-fashion-vogueLiving.jpg') }}" src="{{ asset('public/frontend/images/demo/home-fashion-vogueLiving.jpg') }}" alt="home-fashion-vogueLiving">
                                                    </div>
                                                    <span class="demo-name">Fashion VogueLiving</span>
                                                </a>
                                            </div>
                                            <div class="demo-item">
                                                <a href="home-fashion-elegantAbode.html">
                                                    <div class="demo-image">
                                                        <img class="lazyload" data-src="{{ asset('public/frontend/images/demo/home-fashion-elegantAbode.jpg') }}" src="{{ asset('public/frontend/images/demo/home-fashion-elegantAbode.jpg') }}" alt="home-fashion-elegantAbode">
                                                    </div>
                                                    <span class="demo-name">Fashion ElegantAbode</span>
                                                </a>
                                            </div>
                                            <div class="demo-item">
                                                <a href="home-fashion-glamDwell.html">
                                                    <div class="demo-image position-relative">
                                                        <img class="lazyload" data-src="{{ asset('public/frontend/images/demo/home-fashion-glamDwell.jpg') }}" src="{{ asset('public/frontend/images/demo/home-fashion-glamDwell.jpg') }}" alt="home-fashion-glamDwell">
                                                        <div class="demo-label">
                                                            <span class="demo-new">New</span>
                                                        </div>
                                                    </div>
                                                    <span class="demo-name">Fashion GlamDwell</span>
                                                </a>
                                            </div>
                                            <div class="demo-item">
                                                <a href="home-fashion-classyCove.html">
                                                    <div class="demo-image">
                                                        <img class="lazyload" data-src="{{ asset('public/frontend/images/demo/home-fashion-classycove.jpg') }}" src="{{ asset('public/frontend/images/demo/home-fashion-classycove.jpg') }}" alt="home-fashion-classyCove">
                                                    </div>
                                                    <span class="demo-name">Fashion ClassyCove</span>
                                                </a>
                                            </div>
                                            <div class="demo-item">
                                                <a href="home-fashion-chicHaven.html">
                                                    <div class="demo-image">
                                                        <img class="lazyload" data-src="{{ asset('public/frontend/images/demo/home-fashion-chicHaven.jpg') }}" src="{{ asset('public/frontend/images/demo/home-fashion-chicHaven.jpg') }}" alt="home-fashion-chicHaven1">
                                                    </div>
                                                    <span class="demo-name">Fashion ChicHaven 1</span>
                                                </a>
                                            </div>
                                            <div class="demo-item">
                                                <a href="home-fashion-chicHaven-02.html">
                                                    <div class="demo-image">
                                                        <img class="lazyload" data-src="{{ asset('public/frontend/images/demo/home-fashion-chicHaven2.jpg') }}" src="{{ asset('public/frontend/images/demo/home-fashion-chicHaven2.jpg') }}" alt="home-fashion-chicHaven2">
                                                    </div>
                                                    <span class="demo-name">Fashion ChicHaven 2</span>
                                                </a>
                                            </div>
                                            <div class="demo-item">
                                                <a href="home-fashion-tiktok.html">
                                                    <div class="demo-image">
                                                        <img class="lazyload" data-src="{{ asset('public/frontend/images/demo/home-fashion-tiktok.jpg') }}" src="{{ asset('public/frontend/images/demo/home-fashion-tiktok.jpg') }}" alt="home-fashion-tiktok">
                                                    </div>
                                                    <span class="demo-name">Fashion TikTok</span>
                                                </a>
                                            </div>
                                            <div class="demo-item">
                                                <a href="home-fashion-luxeLiving.html">
                                                    <div class="demo-image">
                                                        <img class="lazyload" data-src="{{ asset('public/frontend/images/demo/home-fashion-luxeLiving.jpg') }}" src="{{ asset('public/frontend/images/demo/home-fashion-luxeLiving.jpg') }}" alt="home-fashion-luxeLiving">
                                                    </div>
                                                    <span class="demo-name">Fashion LuxeLiving</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="text-center view-all-demo">
                                            <a href="#modalDemo" data-bs-toggle="modal" class="tf-btn"><span class="text">View All Demos</span></a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="menu-item">
                                <a href="#" class="item-link">Shop<i class='bx bx-chevron-down' style="font-size: 20px;"></i></a>
                                <div class="sub-menu mega-menu">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <div class="mega-menu-item">
                                                    <div class="menu-heading">Shop Layout</div>
                                                    <ul class="menu-list">
                                                        <li><a href="shop-default-grid.html" class="menu-link-text">Default Grid</a></li>
                                                        <li><a href="shop-default-list.html" class="menu-link-text">Default List</a></li>
                                                        <li><a href="shop-fullwidth-list.html" class="menu-link-text">Full Width List</a></li>
                                                        <li><a href="shop-fullwidth-grid.html" class="menu-link-text">Full Width Grid</a></li>
                                                        <li><a href="shop-left-sidebar.html" class="menu-link-text">Left Sidebar</a></li>
                                                        <li><a href="shop-right-sidebar.html" class="menu-link-text">Right Sidebar</a></li>
                                                        <li><a href="shop-filter-dropdown.html" class="menu-link-text">Filter Dropdown</a></li>
                                                        <li><a href="shop-filter-canvas.html" class="menu-link-text">Filter Canvas</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="mega-menu-item">
                                                    <div class="menu-heading">Shop Features</div>
                                                    <ul class="menu-list">
                                                        <li><a href="shop-categories-top.html" class="menu-link-text">Categories Top 1</a></li>
                                                        <li><a href="shop-categories-top-02.html" class="menu-link-text">Categories Top 2</a></li>
                                                        <li><a href="shop-collection.html" class="menu-link-text">Shop Collection</a></li>
                                                        <li><a href="shop-breadcrumb-img.html" class="menu-link-text">Breadcrumb IMG</a></li>
                                                        <li><a href="shop-breadcrumb-left.html" class="menu-link-text">Breadcrumb Left</a></li>
                                                        <li><a href="shop-breadcrumb-background.html" class="menu-link-text">Breadcrumb BG</a></li>
                                                        <li><a href="shop-load-button.html" class="menu-link-text">Load Button</a></li>
                                                        <li><a href="shop-pagination.html" class="menu-link-text">Pagination</a></li>
                                                        <li><a href="shop-infinite-scrolling.html" class="menu-link-text">Infinite Scrolling</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="mega-menu-item">
                                                    <div class="menu-heading">Products Hover</div>
                                                    <ul class="menu-list">

                                                        <li><a href="product-style-01.html" class="menu-link-text">Product Style 1</a></li>
                                                        <li><a href="product-style-02.html" class="menu-link-text">Product Style 2</a></li>
                                                        <li><a href="product-style-03.html" class="menu-link-text">Product Style 3</a></li>
                                                        <li><a href="product-style-04.html" class="menu-link-text">Product Style 4</a></li>
                                                        <li><a href="product-style-05.html" class="menu-link-text">Product Style 5</a></li>
                                                        <li><a href="product-style-06.html" class="menu-link-text">Product Style 6</a></li>
                                                        <li><a href="product-style-07.html" class="menu-link-text">Product Style 7</a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="mega-menu-item">
                                                    <div class="menu-heading">My Pages</div>
                                                    <ul class="menu-list">
                                                        <li><a href="wish-list.html" class="menu-link-text">Wish List</a></li>
                                                        <li><a href="search-result.html" class="menu-link-text">Search Result</a></li>
                                                        <li><a href="shopping-cart.html" class="menu-link-text">Shopping Cart</a></li>
                                                        <li><a href="login.html" class="menu-link-text">Login/Register</a></li>
                                                        <li><a href="forget-password.html" class="menu-link-text">Forget Password</a></li>
                                                        <li><a href="order-tracking.html" class="menu-link-text">Order Tracking</a></li>
                                                        <li><a href="my-account.html" class="menu-link-text">My Account</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="wrapper-sub-shop">
                                                    <div class="menu-heading">Recent Products</div>
                                                    <div dir="ltr" class="swiper tf-product-header">
                                                        <div class="swiper-wrapper">
                                                            <div class="swiper-slide">
                                                                <div class="card-product">
                                                                    <div class="card-product-wrapper">
                                                                        <a href="product-detail.html" class="product-img">
                                                                        <img class="lazyload img-product" data-src="{{ asset('public/frontend/images/products/womens/women-19.jpg') }}" src="{{ asset('public/frontend/images/products/womens/women-19.jpg') }}" alt="image-product">
                                                                        <img class="lazyload img-hover" data-src="{{ asset('public/frontend/images/products/womens/women-20.jpg') }}" src="{{ asset('public/frontend/images/products/womens/women-20.jpg') }}" alt="image-product">
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
                                                                        <a href="product-detail.html" class="title link">V-neck cotton T-shirt</a>
                                                                        <span class="price">$59.99</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <div class="card-product">
                                                                    <div class="card-product-wrapper">
                                                                        <a href="product-detail.html" class="product-img">
                                                                        <img class="lazyload img-product" data-src="{{ asset('public/frontend/images/products/womens/women-37.jpg') }}" src="{{ asset('public/frontend/images/products/womens/women-37.jpg') }}" alt="image-product">
                                                                        <img class="lazyload img-hover" data-src="{{ asset('public/frontend/images/products/womens/women-38.jpg') }}" src="{{ asset('public/frontend/images/products/womens/women-38.jpg') }}" alt="image-product">
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
                                                                        <a href="product-detail.html" class="title link">Polarized sunglasses</a>
                                                                        <span class="price">$59.99</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <div class="card-product">
                                                                    <div class="card-product-wrapper">
                                                                        <a href="product-detail.html" class="product-img">
                                                                        <img class="lazyload img-product" data-src="{{ asset('public/frontend/images/products/womens/women-8.jpg') }}" src="{{ asset('public/frontend/images/products/womens/women-8.jpg') }}" alt="image-product">
                                                                        <img class="lazyload img-hover" data-src="{{ asset('public/frontend/images/products/womens/women-9.jpg') }}" src="{{ asset('public/frontend/images/products/womens/women-9.jpg') }}" alt="image-product">
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
                                                                        <a href="product-detail.html" class="title link">Ribbed cotton-blend top</a>
                                                                        <span class="price">$59.99</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <div class="card-product">
                                                                    <div class="card-product-wrapper">
                                                                        <a href="product-detail.html" class="product-img">
                                                                        <img class="lazyload img-product" data-src="{{ asset('public/frontend/images/products/womens/women-171.jpg') }}" src="{{ asset('public/frontend/images/products/womens/women-172.jpg') }}" alt="image-product">
                                                                        <img class="lazyload img-hover" data-src="{{ asset('public/frontend/images/products/womens/women-171.jpg') }}" src="{{ asset('public/frontend/images/products/womens/women-172.jpg') }}" alt="image-product">
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
                                                                        <a href="product-detail.html" class="title link">Faux-leather trousers</a>
                                                                        <span class="price">$79.99</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="menu-item">
                                <a href="#" class="item-link">Products<i class='bx bx-chevron-down' style="font-size: 20px;"></i></a>
                                <div class="sub-menu mega-menu">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="mega-menu-item">
                                                    <div class="menu-heading">Products Layout</div>
                                                    <ul class="menu-list">
                                                        <li><a href="product-detail.html" class="menu-link-text">Product Default</a></li>
                                                        <li><a href="product-grid-1.html" class="menu-link-text">Product Grid1</a></li>
                                                        <li><a href="product-grid-2.html" class="menu-link-text">Product Grid2</a></li>
                                                        <li><a href="product-stacked.html" class="menu-link-text">Product stacked</a></li>
                                                        <li><a href="product-right-thumbnails.html" class="menu-link-text">Product right thumbnails</a></li>
                                                        <li><a href="product-bottom-thumbnails.html" class="menu-link-text">Product bottom thumbnails</a></li>
                                                        <li><a href="product-description-accordion.html" class="menu-link-text">Product Description Accordion</a></li>
                                                        <li><a href="product-description-list.html" class="menu-link-text">Product Description List</a></li>
                                                        <li><a href="product-description-menutab.html" class="menu-link-text">Product Description MenuTab</a></li>
                                                        <li><a href="product-description-fullwidth.html" class="menu-link-text">Product Description Fullwidth</a></li>
                                                        <li><a href="product-fixed-price.html" class="menu-link-text">Product Fixed Price</a></li>
                                                        <li><a href="product-fixed-scroll.html" class="menu-link-text">Product Fixed Scrolls</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="mega-menu-item">
                                                    <div class="menu-heading">Colors Swatched</div>
                                                    <ul class="menu-list">
                                                        <li><a href="product-swatch-color.html" class="menu-link-text">Product Swatch Color</a></li>
                                                        <li><a href="product-swatch-rounded.html" class="menu-link-text">Product Swatch Rounded</a></li>
                                                        <li><a href="product-swatch-rounded-color.html" class="menu-link-text">Product Swatch Rounded Colors</a></li>
                                                        <li><a href="product-swatch-image.html" class="menu-link-text">Product Swatch Image</a></li>
                                                        <li><a href="product-swatch-rounded-image.html" class="menu-link-text">Product Swatch Rounded Image</a></li>
                                                        <li><a href="product-swatch-dropdown.html" class="menu-link-text">Product Swatch Dropdown</a></li>
                                                        <li><a href="product-swatch-dropdown-color.html" class="menu-link-text">Product Swatch Dropdown Colors</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="mega-menu-item">
                                                    <div class="menu-heading">Products Features</div>
                                                    <ul class="menu-list">
                                                        <li><a href="product-frequently-bought-together.html" class="menu-link-text">Frequently Bought Together 1</a></li>
                                                        <li><a href="product-frequently-bought-together-02.html" class="menu-link-text">Frequently Bought Together 2</a></li>
                                                        <li><a href="product-up-sell.html" class="menu-link-text">Up Sell</a></li>
                                                        <li><a href="product-pre-order.html" class="menu-link-text">Pre-orders</a></li>
                                                        <li><a href="product-grouped.html" class="menu-link-text">Grouped</a></li>
                                                        <li><a href="product-customer-note.html" class="menu-link-text">Customer Note</a></li>
                                                        <li><a href="product-out-of-stock.html" class="menu-link-text">Out Of Stock</a></li>
                                                        <li><a href="product-pickup-available.html" class="menu-link-text">Pick Up Available</a></li>
                                                        <li><a href="product-variable.html" class="menu-link-text">Variable</a></li>
                                                        <li><a href="product-deals.html" class="menu-link-text">Deals</a></li>
                                                        <li><a href="product-with-discount.html" class="menu-link-text">With Discount</a></li>
                                                        <li><a href="product-external.html" class="menu-link-text">External</a></li>
                                                        <li><a href="product-subscribe-save.html" class="menu-link-text">Subscribe Save</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="menu-heading">Best seller</div>
                                                <div class="sec-cls-header">
                                                    <div class="collection-position hover-img">
                                                        <a href="shop-collection.html" class="img-style">
                                                        <img class="lazyload" data-src="{{ asset('public/frontend/images/collections/cls-header.jpg') }}" src="{{ asset('public/frontend/images/collections/cls-header.jpg') }}" alt="banner-cls">
                                                    </a>
                                                        <div class="content">
                                                            <div class="title-top">
                                                                <h4 class="title"><a href="shop-collection.html" class="link text-white wow fadeInUp">Shop our top picks</a></h4>
                                                                <p class="desc text-white wow fadeInUp">Reserved for special occasions</p>
                                                            </div>
                                                            <div>
                                                                <a href="shop-collection.html" class="tf-btn btn-md btn-white"><span class="text">Shop Now</span><i class="icon icon-arrowUpRight"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="menu-item position-relative">
                                <a href="#" class="item-link">Blog<i class='bx bx-chevron-down' style="font-size: 20px;"></i></a>
                                <div class="sub-menu submenu-default">
                                    <ul class="menu-list">
                                        <li><a href="blog-default.html" class="menu-link-text">Blog Default</a></li>
                                        <li><a href="blog-list.html" class="menu-link-text">Blog List</a></li>
                                        <li><a href="blog-grid.html" class="menu-link-text">Blog Grid</a></li>
                                        <li><a href="blog-detail.html" class="menu-link-text">Blog Detail 1</a></li>
                                        <li><a href="blog-detail-02.html" class="menu-link-text">Blog Detail 2</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="menu-item position-relative">
                                <a href="#" class="item-link">Pages<i class='bx bx-chevron-down' style="font-size: 20px;"></i></a>
                                <div class="sub-menu submenu-default">
                                    <ul class="menu-list">
                                        <li><a href="about-us.html" class="menu-link-text">About Us</a></li>
                                        <li><a href="store-list.html" class="menu-link-text">Store List 1</a></li>
                                        <li><a href="store-list-02.html" class="menu-link-text">Store List 2</a></li>
                                        <li><a href="contact.html" class="menu-link-text">Contact Us 1</a></li>
                                        <li><a href="contact-02.html" class="menu-link-text">Contact Us 2</a></li>
                                        <li><a href="404.html" class="menu-link-text">404</a></li>
                                        <li><a href="FAQs.html" class="menu-link-text">FAQs</a></li>
                                        <li><a href="term-of-use.html" class="menu-link-text">Terms Of Use</a></li>
                                        <li><a href="coming-soon.html" class="menu-link-text">Coming Soon</a></li>
                                        <li><a href="customer-feedback.html" class="menu-link-text">Customer Feedbacks</a></li>
                                        <li><a href="my-account.html" class="menu-link-text">My Account</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="box-right">
                    {{-- <div class="tf-dropdown-sort" data-bs-toggle="dropdown">
                        <div class="btn-select">
                            <i class='bx bx-user' style="font-size: 20px;"></i>
                            <span class="text-sort-value">Nazmul Hassan</span>
                            <i class='bx bx-chevron-down' style="font-size: 24px;"></i>
                        </div>
                        <div class="dropdown-menu">
                            <div class="select-item active">
                                <span class="text-value-item">My Account</span>
                            </div>
                            <div class="select-item">
                                <span class="text-value-item">My Profile</span>
                            </div>
                            <div class="select-item">
                                <span class="text-value-item">Logout</span>
                            </div>

                        </div>
                    </div> --}}

                    <ul class="nav-icon d-flex justify-content-end align-items-center">
                        <li class="nav-search">
                            <a href="#search" data-bs-toggle="modal" class="nav-icon-item">
                                <svg class="icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M21.35 21.0004L17 16.6504" stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>    
                            </a>
                        </li>
                        <li class="nav-search d-inline-flex d-xl-none"><a href="#search" data-bs-toggle="modal" class="nav-icon-item">
                            <svg class="icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M21.35 21.0004L17 16.6504" stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>    
                        </a></li>

                        <li class="nav-account">
                            <div class="nav-icon-item" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg class="icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92172 15.4214 5.17157 16.1716C4.42143 16.9217 4 17.9391 4 19V21" stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z" stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>

                            @if ( Auth::guard('web')->check() )
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">My Account</a></li>
                                    <li><a class="dropdown-item" href="#">My Order List</a></li>
                                    <li><a class="dropdown-item" href="#">Wishlist</a></li>
                                    <li>
                                        <form method="POST" class="dropdown-item" action="{{ route('logout') }}">
                                            @csrf
                                             
                                            <button type="submit" class="btn btn-primary">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            @else
                                <div class="dropdown-account dropdown-login">
                                    <div class="sub-top">
                                        <a href="{{ route('login') }}" class="tf-btn btn-reset">Login</a>
                                        <p class="text-center text-secondary-2">Don’t have an account? <a href="{{ route('register') }}">Register</a></p>
                                    </div>
                                    {{-- <div class="sub-bot">
                                        <span class="body-text-">Support</span>
                                    </div> --}}
                                </div>
                            @endif
                        </li>
                        
                        <li class="nav-wishlist"><a href="wish-list.html" class="nav-icon-item">
                            <svg class="icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.8401 4.60987C20.3294 4.09888 19.7229 3.69352 19.0555 3.41696C18.388 3.14039 17.6726 2.99805 16.9501 2.99805C16.2276 2.99805 15.5122 3.14039 14.8448 3.41696C14.1773 3.69352 13.5709 4.09888 13.0601 4.60987L12.0001 5.66987L10.9401 4.60987C9.90843 3.57818 8.50915 2.99858 7.05012 2.99858C5.59109 2.99858 4.19181 3.57818 3.16012 4.60987C2.12843 5.64156 1.54883 7.04084 1.54883 8.49987C1.54883 9.95891 2.12843 11.3582 3.16012 12.3899L4.22012 13.4499L12.0001 21.2299L19.7801 13.4499L20.8401 12.3899C21.3511 11.8791 21.7565 11.2727 22.033 10.6052C22.3096 9.93777 22.4519 9.22236 22.4519 8.49987C22.4519 7.77738 22.3096 7.06198 22.033 6.39452C21.7565 5.72706 21.3511 5.12063 20.8401 4.60987V4.60987Z" stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>  
                            </a>
                        </li>
                        <li class="nav-cart"><a href="#shoppingCart" data-bs-toggle="modal" class="nav-icon-item">
                            <svg class="icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.5078 10.8734V6.36686C16.5078 5.17166 16.033 4.02541 15.1879 3.18028C14.3428 2.33514 13.1965 1.86035 12.0013 1.86035C10.8061 1.86035 9.65985 2.33514 8.81472 3.18028C7.96958 4.02541 7.49479 5.17166 7.49479 6.36686V10.8734M4.11491 8.62012H19.8877L21.0143 22.1396H2.98828L4.11491 8.62012Z" stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>  
                            <span class="count-box">{{ Cart::content()->count() }}</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>