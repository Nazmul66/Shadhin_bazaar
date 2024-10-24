@php
    $categories = App\Models\Category::where('status', 1)->take(9)->get();
    $mobile_cats = App\Models\Category::where('status', 1)->get();
@endphp   
   
   <!--============================
        HEADER START
    ==============================-->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-2 col-md-1 d-lg-none">
                    <div class="wsus__mobile_menu_area">
                        <span class="wsus__mobile_menu_icon"><i class="fal fa-bars"></i></span>
                    </div>
                </div>
                <div class="col-xl-2 col-7 col-md-8 col-lg-2">
                    <div class="wsus_logo_area">
                        <a class="wsus__header_logo" href="index.html">
                            <img src="{{ asset('public/frontend/images/logo_2.png') }}" alt="logo" class="img-fluid w-100">
                        </a>
                    </div>
                </div>
                <div class="col-xl-5 col-md-6 col-lg-4 d-none d-lg-block">
                    <div class="wsus__search">
                        <form>
                            <input type="text" placeholder="Search...">
                            <button type="submit"><i class="far fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-xl-5 col-3 col-md-3 col-lg-6">
                    <div class="wsus__call_icon_area">
                        <div class="wsus__call_area">
                            <div class="wsus__call">
                                <i class="fas fa-user-headset"></i>
                            </div>
                            <div class="wsus__call_text">
                                <p>example@gmail.com</p>
                                <p>+569875544220</p>
                            </div>
                        </div>
                        <ul class="wsus__icon_area">
                            <li><a href="wishlist.html"><i class="fal fa-heart"></i><span>05</span></a></li>
                            <li><a href="compare.html"><i class="fal fa-random"></i><span>03</span></a></li>
                            <li><a class="wsus__cart_icon" href="#"><i class="fal fa-shopping-bag"></i><span id="cart_count">
                                {{ App\Models\Cart::count() }}</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- Shopping cart sidebar Start --}}
        <div class="wsus__mini_cart">
            <h4>shopping cart <span class="wsus_close_mini_cart"><i class="far fa-times"></i></span></h4>

                <ul id="cart-items">
                    @if ( $all_carts->count() > 0 )
                        @foreach ($all_carts as $item)
                            <li>
                                <div class="wsus__cart_img">
                                    <a href="{{ route('product.details', $item->slug) }}">
                                        <img src="{{ asset($item->thumb_image) }}" alt="product" class="img-fluid w-100">
                                    </a>
                                    <a class="wsis__del_icon removeCart" data-colorId="{{ $item->color_id }}" data-sizeId="{{ $item->size_id }}" data-prdtId="{{ $item->pdt_id }}" style="cursor: pointer;"><i class="fas fa-minus-circle"></i></a>
                                </div>

                                <div class="wsus__cart_text">
                                    <a class="wsus__cart_title" href="{{ route('product.details', $item->slug) }}">{{ $item->name }}</a>
                                    <p>
                                        @if ( !empty($item->offer_price) )
                                            ${{ $item->offer_price }} <del>${{ $item->price }}</del> x {{ $item->qty }} Qty
                                        @else
                                            ${{ $item->price }} x {{ $item->qty }} Qty
                                        @endif
                                    </p>

                                    @if ( !empty($item->size_name) )
                                        <span class="variant_item"> Size: <span class="size_content">{{ $item->size_name }} </span>  ({{ '$'.$item->size_price }})</span>
                                    @endif

                                    @if ( !empty($item->color_name) )
                                        <span class="variant_item "> Color: <span class="color_content" style="background: {{ $item->color_name }}"></span>  ({{ '$'.$item->color_price }})</span>
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    @else
                        <span class="mt-4 d-block alert alert-danger text-center">Cart is empty</span>
                    @endif
                </ul>

                <h5>sub total <span id="cart-subtotal">${{ number_format(cart_subTotal(), 2) }}</span></h5>

                <div class="wsus__minicart_btn_area">
                    <a class="common_btn" href="{{ route('show-cart') }}">view cart</a>
                    <a class="common_btn" href="check_out.html">checkout</a>
                </div>
        </div>
        {{-- Shopping cart sidebar End --}}

        {{-- @if ( !empty($item->size_name) )
            <span class="variant_item"> Size: <span class="size_content">{{ $item->size_name }} </span>  ({{ '$'.$item->size_price }})</span>
        @endif

        @if ( !empty($item->color_name) )
            <span class="variant_item "> Color: <span class="color_content" style="background: {{ $item->color_name }}"></span>  ({{ '$'.$item->color_price }})</span>
        @endif --}}




    </header>
    <!--============================
        HEADER END
    ==============================-->


    <!--============================
        MAIN MENU START
    ==============================-->
    <nav class="wsus__main_menu d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="relative_contect d-flex">
                        <div class="wsus_menu_category_bar">
                            <i class="far fa-bars"></i>
                        </div>

                        {{-- Category start --}}
                        <ul class="wsus_menu_cat_item show_home toggle_menu">
                            @foreach ($categories as $category)
                            <li>
                                @php
                                    $sub_cats = App\Models\SubCategory::where('category_id', $category->id)
                                        ->where('status', 1)
                                        ->take(9)
                                        ->get()
                                @endphp
                                <a class="{{ $sub_cats->count() > 0 ? "wsus__droap_arrow" : "" }}" href="#">
                                    <img src="{{ asset($category->category_img) }}" alt="">  {{ $category->category_name }} 
                                </a>
                                @if ( $sub_cats->count() > 0 )
                                    <ul class="wsus_menu_cat_droapdown">
                                        @foreach ( $sub_cats as $subCat )
                                            <li>
                                                @php
                                                $child_Cat = App\Models\ChildCategory::where('subCategory_id', $subCat->id)
                                                        ->where('status', 1)
                                                        ->take(9)
                                                        ->get()
                                                @endphp
                                                <a href="#">
                                                    {{ $subCat->subcategory_name }} 
                                                    @if ( $child_Cat->count() > 0 )
                                                        <i class="fas fa-angle-right"></i>
                                                    @endif
                                                </a>

                                                @if ( $child_Cat->count() > 0 )
                                                    <ul class="wsus__sub_category">
                                                        @foreach ($child_Cat as $childCat )
                                                            <li><a href="#">{{ $childCat->name }}</a> </li>
                                                        @endforeach

                                                        @if ( $child_Cat->count() >= 9 )
                                                             <li>
                                                                <a href="#">
                                                                    View All ChildCategories 
                                                                    <i class="fas fa-angle-right"></i>
                                                                </a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                @endif

                                            </li>
                                        @endforeach

                                        @if ( $sub_cats->count() >= 9 )
                                            <li>
                                                <a href="#">
                                                   View All SubCategories
                                                   <i class="fas fa-angle-right"></i>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                @endif
                            </li>
                            @endforeach
                            
                            @if ( $categories->count() >= 9 )
                                <li>
                                    <a class="wsus__droap_arrow" href="#"><i class="fas fa-bars"></i> View All Categories</a>
                                </li>
                            @endif
                        </ul>
                         {{-- Category end --}}

                        <ul class="wsus__menu_item">
                            <li><a class="active" href="index.html">home</a></li>
                            <li><a href="product_grid_view.html">shop <i class="fas fa-caret-down"></i></a>
                                <div class="wsus__mega_menu">
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-3">
                                            <div class="wsus__mega_menu_colum">
                                                <h4>women</h4>
                                                <ul class="wsis__mega_menu_item">
                                                    <li><a href="#">New Arrivals</a></li>
                                                    <li><a href="#">Best Sellers</a></li>
                                                    <li><a href="#">Trending</a></li>
                                                    <li><a href="#">Clothing</a></li>
                                                    <li><a href="#">Shoes</a></li>
                                                    <li><a href="#">Bags</a></li>
                                                    <li><a href="#">Accessories</a></li>
                                                    <li><a href="#">Jewlery & Watches</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3">
                                            <div class="wsus__mega_menu_colum">
                                                <h4>men</h4>
                                                <ul class="wsis__mega_menu_item">
                                                    <li><a href="#">New Arrivals</a></li>
                                                    <li><a href="#">Best Sellers</a></li>
                                                    <li><a href="#">Trending</a></li>
                                                    <li><a href="#">Clothing</a></li>
                                                    <li><a href="#">Shoes</a></li>
                                                    <li><a href="#">Bags</a></li>
                                                    <li><a href="#">Accessories</a></li>
                                                    <li><a href="#">Jewlery & Watches</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3">
                                            <div class="wsus__mega_menu_colum">
                                                <h4>category</h4>
                                                <ul class="wsis__mega_menu_item">
                                                    <li><a href="#"> Healthy & Beauty</a></li>
                                                    <li><a href="#">Gift Ideas</a></li>
                                                    <li><a href="#">Toy & Games</a></li>
                                                    <li><a href="#">Cooking</a></li>
                                                    <li><a href="#">Smart Phones</a></li>
                                                    <li><a href="#">Cameras & Photo</a></li>
                                                    <li><a href="#">Accessories</a></li>
                                                    <li><a href="#">View All Categories</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3">
                                            <div class="wsus__mega_menu_colum">
                                                <h4>women</h4>
                                                <ul class="wsis__mega_menu_item">
                                                    <li><a href="#">New Arrivals</a></li>
                                                    <li><a href="#">Best Sellers</a></li>
                                                    <li><a href="#">Trending</a></li>
                                                    <li><a href="#">Clothing</a></li>
                                                    <li><a href="#">Shoes</a></li>
                                                    <li><a href="#">Bags</a></li>
                                                    <li><a href="#">Accessories</a></li>
                                                    <li><a href="#">Jewlery & Watches</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li><a href="vendor.html">vendor</a></li>
                            <li><a href="blog.html">blog</a></li>
                            <li><a href="daily_deals.html">campain</a></li>
                            <li class="wsus__relative_li"><a href="#">pages <i class="fas fa-caret-down"></i></a>
                                <ul class="wsus__menu_droapdown">
                                    <li><a href="404.html">404</a></li>
                                    <li><a href="faqs.html">faq</a></li>
                                    <li><a href="invoice.html">invoice</a></li>
                                    <li><a href="about_us.html">about</a></li>
                                    <li><a href="product_grid_view.html">product</a></li>
                                    <li><a href="check_out.html">check out</a></li>
                                    <li><a href="team.html">team</a></li>
                                    <li><a href="change_password.html">change password</a></li>
                                    <li><a href="custom_page.html">custom page</a></li>
                                    <li><a href="forget_password.html">forget password</a></li>
                                    <li><a href="privacy_policy.html">privacy policy</a></li>
                                    <li><a href="product_category.html">product category</a></li>
                                    <li><a href="brands.html">brands</a></li>
                                </ul>
                            </li>
                            <li><a href="track_order.html">track order</a></li>
                            <li><a href="daily_deals.html">daily deals</a></li>
                        </ul>
                        <ul class="wsus__menu_item wsus__menu_item_right">
                            <li><a href="contact.html">contact</a></li>
                            <li><a href="dsahboard.html">my account</a></li>
                            <li><a href="login.html">login</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!--============================
        MAIN MENU END
    ==============================-->


    <!--============================
        MOBILE MENU START
    ==============================-->
    <section id="wsus__mobile_menu">
        <span class="wsus__mobile_menu_close"><i class="fal fa-times"></i></span>
        <ul class="wsus__mobile_menu_header_icon d-inline-flex">

            <li><a href="wishlist.html"><i class="far fa-heart"></i> <span>2</span></a></li>

            <li><a href="compare.html"><i class="far fa-random"></i> </i><span>3</span></a></li>
        </ul>
        <form>
            <input type="text" placeholder="Search">
            <button type="submit"><i class="far fa-search"></i></button>
        </form>

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                    role="tab" aria-controls="pills-home" aria-selected="true">Categories</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                    role="tab" aria-controls="pills-profile" aria-selected="false">main menu</button>
            </li>
        </ul>


        <div class="tab-content" id="pills-tabContent">

            {{-- Show All Categories --}}
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="wsus__mobile_menu_main_menu">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <ul class="wsus_mobile_menu_category">
                            <li><a href="#"><i class="fas fa-star"></i> hot promotions</a></li>

                            @foreach ($mobile_cats as $row => $category)
                                <li>
                                    @php
                                        $mobile_subCats = App\Models\SubCategory::where('category_id', $category->id)
                                            ->where('status', 1)
                                            ->get()
                                    @endphp
                                    <a href="#" @if( $mobile_subCats->count() > 0 ) class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $row }}" aria-expanded="false"
                                    aria-controls="flush-collapse{{ $row }}  @endif">
                                        <img src="{{ $category->category_img }}" alt=""> {{ $category->category_name }}
                                    </a>

                                    <div id="flush-collapse{{ $row }}" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <ul>
                                                @foreach ($mobile_subCats as $row => $subCat)
                                                    <li><a href="#">{{ $subCat->subcategory_name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            @endforeach


                            {{-- <li><a href="#" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThreer" aria-expanded="false"
                                    aria-controls="flush-collapseThreer"><i class="fas fa-tv"></i> electronics</a>
                                <div id="flush-collapseThreer" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li><a href="#">Consumer Electronic</a></li>
                                            <li><a href="#">Accessories & Parts</a></li>
                                            <li><a href="#">other brands</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>

                            <li><a href="#" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThreerrp" aria-expanded="false"
                                    aria-controls="flush-collapseThreerrp"><i class="fas fa-chair-office"></i>
                                    furnicture</a>
                                <div id="flush-collapseThreerrp" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li><a href="#">home</a></li>
                                            <li><a href="#">office</a></li>
                                            <li><a href="#">restaurent</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>

                            <li><a href="#" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThreerrw" aria-expanded="false"
                                    aria-controls="flush-collapseThreerrw"><i class="fal fa-mobile"></i> Smart
                                    Phones</a>
                                <div id="flush-collapseThreerrw" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li><a href="#">apple</a></li>
                                            <li><a href="#">xiaomi</a></li>
                                            <li><a href="#">oppo</a></li>
                                            <li><a href="#">samsung</a></li>
                                            <li><a href="#">vivo</a></li>
                                            <li><a href="#">others</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li> --}}

                            {{-- <li><a href="#"><i class="fas fa-home-lg-alt"></i> Home & Garden</a></li>
                            <li><a href="#"><i class="far fa-camera"></i> Accessories</a></li>
                            <li><a href="#"><i class="fas fa-heartbeat"></i> healthy & Beauty</a></li>
                            <li><a href="#"><i class="fal fa-gift-card"></i> Gift Ideas</a></li>
                            <li><a href="#"><i class="fal fa-gamepad-alt"></i> Toy & Games</a></li> --}}
                            {{-- <li><a href="#"><i class="fal fa-gem"></i> View All Categories</a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>


            {{-- Main Menu --}}
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="wsus__mobile_menu_main_menu">
                    <div class="accordion accordion-flush" id="accordionFlushExample2">
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li><a href="#" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThree" aria-expanded="false"
                                    aria-controls="flush-collapseThree">shop</a>
                                <div id="flush-collapseThree" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample2">
                                    <div class="accordion-body">
                                        <ul>
                                            <li><a href="#">men's</a></li>
                                            <li><a href="#">wemen's</a></li>
                                            <li><a href="#">kid's</a></li>
                                            <li><a href="#">others</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li><a href="vendor.html">vendor</a></li>
                            <li><a href="blog.html">blog</a></li>
                            <li><a href="daily_deals.html">campain</a></li>
                            <li><a href="#" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThree101" aria-expanded="false"
                                    aria-controls="flush-collapseThree101">pages</a>
                                <div id="flush-collapseThree101" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample2">
                                    <div class="accordion-body">
                                        <ul>
                                            <li><a href="404.html">404</a></li>
                                            <li><a href="faqs.html">faq</a></li>
                                            <li><a href="invoice.html">invoice</a></li>
                                            <li><a href="about_us.html">about</a></li>
                                            <li><a href="team.html">team</a></li>
                                            <li><a href="product_grid_view.html">product grid view</a></li>
                                            <li><a href="product_grid_view.html">product list view</a></li>
                                            <li><a href="team_details.html">team details</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li><a href="track_order.html">track order</a></li>
                            <li><a href="daily_deals.html">daily deals</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        MOBILE MENU END
    ==============================-->