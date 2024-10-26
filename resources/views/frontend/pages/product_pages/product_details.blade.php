@php
    $multi_images = App\Models\ProductImage::where('product_id', $product->id)->get();       
    $product_colors = App\Models\ProductColor::where('product_id', $product->id)->get();
    $product_sizes = App\Models\ProductSize::where('product_id', $product->id)->get();
    $brand = App\Models\Brand::where('id', $product->brand_id)->first();
@endphp


@extends('frontend.layout.master')

@push('add-meta')
    <title>Sazao || About-us Template</title>
@endpush

@push('add-css')

@endpush


@section('body-content')

    <!--==========================
    PRODUCT  REPORT MODAL VIEW
    ===========================-->
    <section class="product_popup_modal report_modal">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Report Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                                class="far fa-times"></i></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <form>
                                    <div class="wsus__single_input">
                                        <label>Subject</label>
                                        <input type="text" placeholder="Type Subject">
                                    </div>
                                    <div class="wsus__single_input">
                                        <label>email</label>
                                        <input type="email" placeholder="Type Email">
                                    </div>
                                    <div class="wsus__single_input">
                                        <label>Description</label>
                                        <textarea cols="3" rows="3"
                                            placeholder="Brief description of your issue"></textarea>
                                    </div>
                                    <div class="wsus__report_img">
                                        <div class="img_upload">
                                            <div class="gallery">
                                                <a class="cam" href="javascript:void(0)"><span><i
                                                            class="fas fa-image"></i></span></a>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="common_btn">submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==========================
    PRODUCT REPORT MODAL VIEW 
    ===========================-->


    <!--==========================
      PRODUCT MODAL VIEW START
    ===========================-->
    <section class="product_popup_modal">
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                                class="far fa-times"></i></button>
                        <div class="row">
                            <div class="col-xl-6 col-12 col-sm-10 col-md-8 col-lg-6 m-auto display">
                                <div class="wsus__quick_view_img">
                                    <a class="venobox wsus__pro_det_video" data-autoplay="true" data-vbtype="video"
                                        href="https://youtu.be/7m16dFI1AF8">
                                        <i class="fas fa-play"></i>
                                    </a>
                                    <div class="row modal_slider">
                                        <div class="col-xl-12">
                                            <div class="modal_slider_img">
                                                <img src="images/zoom1.jpg" alt="product" class="img-fluid w-100">
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="modal_slider_img">
                                                <img src="images/zoom2.jpg" alt="product" class="img-fluid w-100">
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="modal_slider_img">
                                                <img src="images/zoom3.jpg" alt="product" class="img-fluid w-100">
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="modal_slider_img">
                                                <img src="images/zoom4.jpg" alt="product" class="img-fluid w-100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="wsus__pro_details_text">
                                    <a class="title" href="#">Electronics Black Wrist Watch</a>
                                    <p class="wsus__stock_area"><span class="in_stock">in stock</span> (167 item)</p>
                                    <h4>$50.00 <del>$60.00</del></h4>
                                    <p class="review">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span>20 review</span>
                                    </p>
                                    <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>

                                    <div class="wsus_pro_hot_deals">
                                        <h5>offer ending time : </h5>
                                        <div class="simply-countdown simply-countdown-one"></div>
                                    </div>
                                    <div class="wsus_pro_det_color">
                                        <h5>color :</h5>
                                        <ul>
                                            <li><a class="blue" href="#"><i class="far fa-check"></i></a></li>
                                            <li><a class="orange" href="#"><i class="far fa-check"></i></a></li>
                                            <li><a class="yellow" href="#"><i class="far fa-check"></i></a></li>
                                            <li><a class="black" href="#"><i class="far fa-check"></i></a></li>
                                            <li><a class="red" href="#"><i class="far fa-check"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="wsus_pro__det_size">
                                        <h5>size :</h5>
                                        <ul>
                                            <li><a href="#">S</a></li>
                                            <li><a href="#">M</a></li>
                                            <li><a href="#">L</a></li>
                                            <li><a href="#">XL</a></li>
                                        </ul>
                                    </div>
                                    <div class="wsus__quentity">
                                        <h5>quentity :</h5>
                                        <form class="select_number">
                                            <input class="number_area" type="text" min="1" max="100" value="1" />
                                        </form>
                                        <h3>$50.00</h3>
                                    </div>
                                    <div class="wsus__selectbox">
                                        <div class="row">
                                            <div class="col-xl-6 col-sm-6">
                                                <h5 class="mb-2">select:</h5>
                                                <select class="select_2" name="state">
                                                    <option>default select</option>
                                                    <option>select 1</option>
                                                    <option>select 2</option>
                                                    <option>select 3</option>
                                                    <option>select 4</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-6 col-sm-6">
                                                <h5 class="mb-2">select:</h5>
                                                <select class="select_2" name="state">
                                                    <option>default select</option>
                                                    <option>select 1</option>
                                                    <option>select 2</option>
                                                    <option>select 3</option>
                                                    <option>select 4</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="wsus__button_area">
                                        <li><a class="add_cart" href="#">add to cart</a></li>
                                        <li><a class="buy_now" href="#">buy now</a></li>
                                        <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                        <li><a href="#"><i class="far fa-random"></i></a></li>
                                    </ul>
                                    <p class="brand_model"><span>model :</span> 12345670</p>
                                    <p class="brand_model"><span>brand :</span> The Northland</p>
                                    <div class="wsus__pro_det_share">
                                        <h5>share :</h5>
                                        <ul class="d-flex">
                                            <li><a class="facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a class="whatsapp" href="#"><i class="fab fa-whatsapp"></i></a></li>
                                            <li><a class="instagram" href="#"><i class="fab fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==========================
      PRODUCT MODAL VIEW END
    ===========================-->


    <!--============================
        BREADCRUMB START
    ==============================-->
    <section id="wsus__breadcrumb" style="background: url({{ asset('public/frontend/images/breadcrumb_bg.jpg') }});">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>products details</h4>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><a href="#">peoduct</a></li>
                            <li><a href="#">product details</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        BREADCRUMB END
    ==============================-->


    <!--============================
        PRODUCT DETAILS START
    ==============================-->
    <section id="wsus__product_details">
        <div class="container">
            <div class="wsus__details_bg">
                <div class="row">
                    <div class="col-xl-4 col-md-5 col-lg-5">
                        <div id="sticky_pro_zoom">
                            <div class="exzoom hidden" id="exzoom">
                                <div class="exzoom_img_box">
                                    {{-- <a class="venobox wsus__pro_det_video" data-autoplay="true" data-vbtype="video"
                                        href="https://youtu.be/7m16dFI1AF8">
                                        <i class="fas fa-play"></i>
                                    </a> --}}
                                    <ul class='exzoom_img_ul'>
                                        <li><img class="zoom ing-fluid w-100" src="{{ asset($product->thumb_image) }}" alt="product"></li>

                                        @foreach ($multi_images as $row)
                                            <li>
                                                <img class="zoom ing-fluid w-100" src="{{ asset($row->images) }}" alt="product">
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="exzoom_nav"></div>
                                <p class="exzoom_btn">
                                    <a href="javascript:void(0);" class="exzoom_prev_btn"> <i class="far fa-chevron-left"></i> </a>
                                    <a href="javascript:void(0);" class="exzoom_next_btn"> <i class="far fa-chevron-right"></i> </a>
                                </p>
                            </div>
                        </div>
                    </div>


                    {{-- Product details content --}}
                    <div class="col-xl-5 col-md-7 col-lg-7">
                        <div class="wsus__pro_details_text">
                            <a class="title" href="#">{{ $product->name }}</a>
                            <p class="wsus__stock_area">
                               @if ( $product->qty > 0 )
                                  <span class="in_stock">in stock</span> ({{ $product->qty }} item)
                               @else
                                  <span class="in_stock" style="background: red">Out of stock</span>
                               @endif
                            </p>
                            <h4>
                                @if ( !empty(checkDiscount($product)) )
                                    <span id="product_offer_price">${{ $product->offer_price }}</span> <del id="product_price">${{ $product->price }}</del>
                                @else
                                    <span id="product_offer_price">${{ $product->price }}</span>
                                @endif
                            </h4>

                            <p class="review">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span>20 review</span>
                            </p>
                            <!-- <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia
                                neque
                                sint obcaecati asperiores dolor cumque. ad voluptate dolores reprehenderit hic adipisci
                                Similique eaque illum.</p> -->

                            <div class="wsus_pro_hot_deals">
                                <h5>offer ending time : </h5>
                                <div class="simply-countdown simply-countdown-one"></div>
                            </div>

                            <form class="shopping-cart-form" method="POST">
                                @csrf
                                @php
                                    if( !empty($product->offer_price) ){
                                        $price = $product->offer_price;
                                    }
                                    else{ $price = $product->price; }
                                @endphp

                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="name" value="{{ $product->name }}">
                                <input type="hidden" name="price" value="{{ $price }}">

                                @if ( $product_colors->count() > 0 )
                                    <div class="wsus_pro_det_color">
                                        <h5>color :</h5>
                                        <ul>
                                            <input type="hidden" id="color_id_input" name="color_id" value="{{ $product_colors[0]->id }}">
                                            @foreach ($product_colors as $key => $item)
                                                <li class="color-item " data-id="{{ $item->id }}" data-product-id="{{ $product->id }}" style="background: {{ $item->color_name }};">
                                                    <a class="{{ $key == 0 ? 'active' : '' }}">
                                                        <i class="far fa-check"></i>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
    
                                @if ( $product_sizes->count() > 0 )
                                    <div class="wsus_pro__det_size">
                                        <h5>Size :</h5>
                                        <ul>
                                            <input type="hidden" id="size_id_input" name="size_id" value="{{ $product_sizes[0]->id }}">
                                            @foreach ($product_sizes as $key => $item)
                                                <li class="size-item " data-id="{{ $item->id }}" data-product-id="{{ $product->id }}">
                                                    <a href="javascript:void(0);" class="{{ $key == 0 ? 'active' : '' }}">{{ $item->size_name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
    
                                <div class="wsus__quentity">
                                    <h5>quentity :</h5>
                                    <div class="select_number">
                                        <input class="number_area" type="number" name="qty" id="qty" min="1" max="100" value="1" />
                                    </div>
                                </div>
    
                                <ul class="wsus__button_area">
                                    <li><button type="submit" class="add_cart" {{ $product->qty > 0 ? '' : 'disabled' }} style="{{ $product->qty > 0 ? '' : 'background: #aaa; color: #FFF; cursor: not-allowed;' }}" >add to cart</button></li>
                                    <li><button type="submit" class="buy_now" {{ $product->qty > 0 ? '' : 'disabled' }} style="    border: none;{{ $product->qty > 0 ? '' : 'background: #aaa; color: #FFF; cursor: not-allowed;' }}" >Buy Now</button></li>
                                    <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                    <li><a href="#"><i class="far fa-random"></i></a></li>
                                </ul>
                            </form>
                           
                            @if ( !empty($product->sku) )
                                <p class="brand_model"><span>Product Sku :</span> <span class="badge bg-danger text-white">{{ $product->sku }}</span></p>
                            @endif
                            
                            <p class="brand_model"><span>brand :</span> <span class="badge bg-primary text-white">{{ $brand->brand_name }}</span></p>

                            <div class="wsus__pro_det_share">
                                <h5>share :</h5>
                                <ul class="d-flex">
                                    <li><a class="facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a class="whatsapp" href="#"><i class="fab fa-whatsapp"></i></a></li>
                                    <li><a class="instagram" href="#"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>

                            <p><strong>Products Tag :</strong> <span style="font-size: 14px;">{{ productTags($product->tags) }}</span></p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-12 mt-md-5 mt-lg-0">
                        <div class="wsus_pro_det_sidebar" id="sticky_sidebar">
                            <ul>
                                <li>
                                    <span><i class="fal fa-truck"></i></span>
                                    <div class="text">
                                        <h4>Return Available</h4>
                                        <!-- <p>Lorem Ipsum is simply dummy text of the printing</p> -->
                                    </div>
                                </li>
                                <li>
                                    <span><i class="far fa-shield-check"></i></span>
                                    <div class="text">
                                        <h4>Secure Payment</h4>
                                        <!-- <p>Lorem Ipsum is simply dummy text of the printing</p> -->
                                    </div>
                                </li>
                                <li>
                                    <span><i class="fal fa-envelope-open-dollar"></i></span>
                                    <div class="text">
                                        <h4>Warranty Available</h4>
                                        <!-- <p>Lorem Ipsum is simply dummy text of the printing</p> -->
                                    </div>
                                </li>
                            </ul>
                            <div class="wsus__det_sidebar_banner">
                                <img src="images/blog_1.jpg" alt="banner" class="img-fluid w-100">
                                <div class="wsus__det_sidebar_banner_text_overlay">
                                    <div class="wsus__det_sidebar_banner_text">
                                        <p>Black Friday Sale</p>
                                        <h4>Up To 70% Off</h4>
                                        <a href="#" class="common_btn">shop now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="wsus__pro_det_description">
                        <div class="wsus__details_bg">
                            <ul class="nav nav-pills mb-3" id="pills-tab3" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab7" data-bs-toggle="pill"
                                        data-bs-target="#pills-home22" type="button" role="tab"
                                        aria-controls="pills-home" aria-selected="true">Description</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-contact" type="button" role="tab"
                                        aria-controls="pills-contact" aria-selected="false">Vendor Info</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contact-tab2" data-bs-toggle="pill"
                                        data-bs-target="#pills-contact2" type="button" role="tab"
                                        aria-controls="pills-contact2" aria-selected="false">Reviews</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contact-tab23" data-bs-toggle="pill"
                                        data-bs-target="#pills-contact23" type="button" role="tab"
                                        aria-controls="pills-contact23" aria-selected="false">comment</button>
                                </li>
                            </ul>


                            <div class="tab-content" id="pills-tabContent4">
                                {{-- Descriptions --}}
                                <div class="tab-pane fade  show active " id="pills-home22" role="tabpanel"
                                    aria-labelledby="pills-home-tab7">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="wsus__description_area">

                                                {!! $product->long_description !!}

                                                {{-- <h1>Heading</h1>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum
                                                    sapiente aliquam ut neque voluptatibus inventore odit nesciunt.
                                                    Nobis quas saepe repellat repudiandae qui sint? Delectus dignissimos
                                                    maiores fuga doloremque magni, ratione provident exercitationem
                                                    aliquam tempore velit facere autem magnam, architecto inventore
                                                    recusandae dolorum, illo sequi officiis dolore! Unde enim,
                                                    exercitationem. Lorem ipsum</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum
                                                    sapiente aliquam ut neque voluptatibus inventore odit nesciunt.
                                                    Nobis quas saepe repellat repudiandae qui sint? Delectus dignissimos
                                                    maiores fuga doloremque magni, ratione provident exercitationem
                                                    aliquam tempore velit facere autem magnam, architecto inventore
                                                    recusandae dolorum, illo sequi officiis dolore! Unde enim,
                                                    exercitationem. Lorem ipsum</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum
                                                    sapiente aliquam ut neque voluptatibus inventore odit nesciunt.
                                                    Nobis quas saepe repellat repudiandae qui sint? Delectus dignissimos
                                                    maiores fuga doloremque magni, ratione provident exercitationem
                                                    aliquam tempore velit facere autem magnam, architecto inventore
                                                    recusandae dolorum, illo sequi officiis dolore! Unde enim,
                                                    exercitationem. Lorem ipsum</p>
                                                <ul>
                                                    <li>Consectetur adipisicing elit. Voluptatum sapiente aliquam ut
                                                        neque voluptatibus inventore odit nesciunt. Nobis quas saepe
                                                        repellat</li>
                                                    <li>Delectus dignissimos maiores fuga doloremque magni, ratione
                                                        provident exercitationem aliquam tempore velit facere autem
                                                        magnam</li>
                                                    <li>velit facere autem magnam, architecto inventore recusandae
                                                        dolorum, illo sequi officiis dolore! Unde enim</li>
                                                    <li>Repudiandae qui sint? Delectus dignissimos maiores fuga
                                                        doloremque magni, ratione provident exercitationem aliquam
                                                        tempore velit facere autem</li>
                                                    <li>Ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum
                                                        sapiente aliquam ut neque voluptatibus inventore odit nesciunt.
                                                        Nobis quas saepe repella</li>
                                                </ul>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum
                                                    sapiente aliquam ut neque voluptatibus inventore odit nesciunt.
                                                    Nobis quas saepe repellat repudiandae qui sint? Delectus dignissimos
                                                    maiores fuga doloremque magni, ratione provident exercitationem
                                                    aliquam tempore velit facere autem magnam, architecto inventore
                                                    recusandae dolorum, illo sequi officiis dolore! Unde enim,
                                                    exercitationem. Lorem ipsum</p>
                                                <h4>Heading 5</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum
                                                    sapiente aliquam ut neque voluptatibus inventore odit nesciunt.
                                                    Nobis quas saepe repellat repudiandae qui sint? Delectus dignissimos
                                                    maiores fuga doloremque magni, ratione provident exercitationem
                                                    aliquam tempore velit facere autem magnam, architecto inventore
                                                    recusandae dolorum, illo sequi officiis dolore! Unde enim,
                                                    exercitationem. Lorem ipsum</p> --}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-4 col-md-4">
                                                <div class="description_single">
                                                    <h6><span>1</span> Free Shipping & Return</h6>
                                                    <p>We offer free shipping for products on orders above 50$ and
                                                        offer
                                                        free delivery for all orders in US.</p>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-4">
                                                <div class="description_single">
                                                    <h6><span>2</span> Free and Easy Returns</h6>
                                                    <p>We guarantee our products and you could get back all of your
                                                        money anytime you want in 30 days.</p>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-4">
                                                <div class="description_single">
                                                    <h6><span>3</span> Special Financing </h6>
                                                    <p>Get 20%-50% off items over 50$ for a month or over 250$ for a
                                                        year with our special credit card.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Vendor Info --}}
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                    aria-labelledby="pills-contact-tab">
                                    <div class="wsus__pro_det_vendor">
                                        <div class="row">
                                            <div class="col-xl-6 col-xxl-5 col-md-6">
                                                <div class="wsus__vebdor_img">
                                                    <img src="images/slider_1.jpg" alt="vensor" class="img-fluid w-100">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-xxl-7 col-md-6 mt-4 mt-md-0">
                                                <div class="wsus__pro_det_vendor_text">
                                                    <h4>jhon deo</h4>
                                                    <p class="rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <span>(41 review)</span>
                                                    </p>
                                                    <p><span>Store Name:</span> OAIO Store</p>
                                                    <p><span>Address:</span> Steven Street, El Carjon, CA 92020, United
                                                        States (US)</p>
                                                    <p><span>Phone:</span> 1234567890</p>
                                                    <p><span>mail:</span> example@gmail.com</p>
                                                    <a href="vendor_details.html" class="see_btn">visit store</a>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="wsus__vendor_details">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                        Venenatis tellus in metus vulputate eu scelerisque felis. Vel
                                                        pretium lectus quam id leo in vitae turpis massa. Nunc id cursus
                                                        metus aliquam. Libero id faucibus nisl tincidunt eget. Aliquam
                                                        id
                                                        diam maecenas ultricies mi eget mauris. Volutpat ac tincidunt
                                                        vitae
                                                        semper quis lectus. Vestibulum mattis ullamcorper velit sed. A
                                                        arcu
                                                        cursus vitae congue mauris.
                                                        <span>A arcu cursus vitae congue mauris. Sagittis id consectetur
                                                            purus ut. Tellus rutrum tellus pellentesque eu tincidunt
                                                            tortor
                                                            aliquam nulla. Diam in arcu cursus euismod quis. Eget sit
                                                            amet
                                                            tellus cras adipiscing enim eu. In fermentum et sollicitudin
                                                            ac
                                                            orci phasellus. A condimentum vitae sapien pellentesque
                                                            habitant
                                                            morbi tristique senectus et. In dictum non consectetur a
                                                            erat.
                                                            Nunc scelerisque viverra mauris in aliquam sem fringilla.
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Reviews --}}
                                <div class="tab-pane fade" id="pills-contact2" role="tabpanel"
                                    aria-labelledby="pills-contact-tab2">
                                    <div class="wsus__pro_det_review">
                                        <div class="wsus__pro_det_review_single">
                                            <div class="row">
                                                <div class="col-xl-8 col-lg-7">
                                                    <div class="wsus__comment_area">
                                                        <h4>Reviews <span>02</span></h4>
                                                        <div class="wsus__main_comment">
                                                            <div class="wsus__comment_img">
                                                                <img src="{{ asset('public/frontend/images/client_img_3.jpg') }}" alt="user"
                                                                    class="img-fluid w-100">
                                                            </div>
                                                            <div class="wsus__comment_text reply">
                                                                <h6>Shopnil mahadi <span>4 <i
                                                                            class="fas fa-star"></i></span></h6>
                                                                <span>09 Jul 2021</span>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                                                                    elit.
                                                                    Cupiditate sint molestiae eos? Officia, fuga eaque.
                                                                </p>
                                                                <ul class="">
                                                                    <li><img src="{{ asset('public/frontend/images/headphone_1.jpg') }}" alt="product"
                                                                            class="img-fluid w-100"></li>
                                                                    <li><img src="{{ asset('public/frontend/images/headphone_2.jpg') }}" alt="product"
                                                                            class="img-fluid w-100"></li>
                                                                    <li><img src="{{ asset('public/frontend/images/kids_1.jpg') }}" alt="product"
                                                                            class="img-fluid w-100"></li>
                                                                </ul>
                                                                <a href="#" data-bs-toggle="collapse"
                                                                    data-bs-target="#flush-collapsetwo">reply</a>
                                                                <div class="accordion accordion-flush"
                                                                    id="accordionFlushExample2">
                                                                    <div class="accordion-item">
                                                                        <div id="flush-collapsetwo"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="flush-collapsetwo"
                                                                            data-bs-parent="#accordionFlushExample">
                                                                            <div class="accordion-body">
                                                                                <form>
                                                                                    <div
                                                                                        class="wsus__riv_edit_single text_area">
                                                                                        <i class="far fa-edit"></i>
                                                                                        <textarea cols="3" rows="1"
                                                                                            placeholder="Your Text"></textarea>
                                                                                    </div>
                                                                                    <button type="submit"
                                                                                        class="common_btn">submit</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="wsus__main_comment">
                                                            <div class="wsus__comment_img">
                                                                <img src="{{ asset('public/frontend/images/client_img_1.jpg') }}" alt="user"
                                                                    class="img-fluid w-100">
                                                            </div>
                                                            <div class="wsus__comment_text reply">
                                                                <h6>Smith jhon <span>5 <i
                                                                            class="fas fa-star"></i></span>
                                                                </h6>
                                                                <span>09 Jul 2021</span>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                                                                    elit.
                                                                    Cupiditate sint molestiae eos? Officia, fuga eaque.
                                                                </p>
                                                                <a href="#" data-bs-toggle="collapse"
                                                                    data-bs-target="#flush-collapsetwo2">reply</a>
                                                                <div class="accordion accordion-flush"
                                                                    id="accordionFlushExample2">
                                                                    <div class="accordion-item">
                                                                        <div id="flush-collapsetwo2"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="flush-collapsetwo"
                                                                            data-bs-parent="#accordionFlushExample">
                                                                            <div class="accordion-body">
                                                                                <form>
                                                                                    <div
                                                                                        class="wsus__riv_edit_single text_area">
                                                                                        <i class="far fa-edit"></i>
                                                                                        <textarea cols="3" rows="1"
                                                                                            placeholder="Your Text"></textarea>
                                                                                    </div>
                                                                                    <button type="submit"
                                                                                        class="common_btn">submit</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="pagination">
                                                            <nav aria-label="Page navigation example">
                                                                <ul class="pagination">
                                                                    <li class="page-item">
                                                                        <a class="page-link" href="#"
                                                                            aria-label="Previous">
                                                                            <i class="fas fa-chevron-left"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="page-item"><a
                                                                            class="page-link page_active" href="#">1</a>
                                                                    </li>
                                                                    <li class="page-item"><a class="page-link"
                                                                            href="#">2</a></li>
                                                                    <li class="page-item"><a class="page-link"
                                                                            href="#">3</a></li>
                                                                    <li class="page-item"><a class="page-link"
                                                                            href="#">4</a></li>
                                                                    <li class="page-item">
                                                                        <a class="page-link" href="#" aria-label="Next">
                                                                            <i class="fas fa-chevron-right"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </nav>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-5 mt-4 mt-lg-0">
                                                    <div class="wsus__post_comment rev_mar" id="sticky_sidebar3">
                                                        <h4>write a Review</h4>
                                                        <form action="#">
                                                            <p class="rating">
                                                                <span>select your rating : </span>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                            </p>
                                                            <div class="row">
                                                                <div class="col-xl-12">
                                                                    <div class="wsus__single_com">
                                                                        <input type="text" placeholder="Name">
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-12">
                                                                    <div class="wsus__single_com">
                                                                        <input type="email" placeholder="Email">
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-12">
                                                                    <div class="col-xl-12">
                                                                        <div class="wsus__single_com">
                                                                            <textarea cols="3" rows="3"
                                                                                placeholder="Write your review"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="img_upload">
                                                                <div class="gallery">
                                                                    <a class="cam" href="javascript:void(0)"><span><i
                                                                        class="fas fa-image"></i></span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <button class="common_btn" type="submit">submit
                                                                review</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Comments --}}
                                <div class="tab-pane fade" id="pills-contact23" role="tabpanel"
                                    aria-labelledby="pills-contact-tab23">
                                    <div class="wsus__pro_det_comment">
                                        <div class="row">
                                            <div class="col-xl-7 col-lg-6">
                                                <div class="wsus__comment_area">
                                                    <h4>comment <span>03</span></h4>
                                                    <div class="wsus__main_comment">
                                                        <div class="wsus__comment_img">
                                                            <img src="{{ asset('public/frontend/images/dashboard_user.jpg') }}" alt="user"
                                                                class="img-fluid w-100">
                                                        </div>
                                                        <div class="wsus__comment_text reply">
                                                            <h6>Shopnil mahadi <span>09 Jul 2021</span></h6>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                                Cupiditate sint molestiae eos? Officia, fuga eaque.</p>
                                                            <a href="#" data-bs-toggle="collapse"
                                                                data-bs-target="#flush-collapsetwo2">reply</a>
                                                            <div class="accordion accordion-flush"
                                                                id="accordionFlushExample2">
                                                                <div class="accordion-item">
                                                                    <div id="flush-collapsetwo2"
                                                                        class="accordion-collapse collapse"
                                                                        aria-labelledby="flush-collapsetwo"
                                                                        data-bs-parent="#accordionFlushExample">
                                                                        <div class="accordion-body">
                                                                            <form>
                                                                                <div
                                                                                    class="wsus__riv_edit_single text_area">
                                                                                    <i class="far fa-edit"></i>
                                                                                    <textarea cols="3" rows="1"
                                                                                        placeholder="Your Text"></textarea>
                                                                                </div>
                                                                                <button type="submit"
                                                                                    class="common_btn">submit</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="wsus__main_comment wsus__com_reply">
                                                        <div class="wsus__comment_img">
                                                            <img src="{{ asset('public/frontend/images/ts-3.jpg') }}" alt="user"
                                                                class="img-fluid w-100">
                                                        </div>
                                                        <div class="wsus__comment_text reply">
                                                            <h6>Smith jhon <span>09 Jul 2021</span></h6>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                                Cupiditate sint molestiae eos? Officia, fuga eaque.</p>
                                                            <a href="#" data-bs-toggle="collapse"
                                                                data-bs-target="#flush-collapsetwo">reply</a>
                                                            <div class="accordion accordion-flush"
                                                                id="accordionFlushExample">
                                                                <div class="accordion-item">
                                                                    <div id="flush-collapsetwo"
                                                                        class="accordion-collapse collapse"
                                                                        aria-labelledby="flush-collapsetwo"
                                                                        data-bs-parent="#accordionFlushExample">
                                                                        <div class="accordion-body">
                                                                            <form>
                                                                                <div
                                                                                    class="wsus__riv_edit_single text_area">
                                                                                    <i class="far fa-edit"></i>
                                                                                    <textarea cols="3" rows="1"
                                                                                        placeholder="Your Text"></textarea>
                                                                                </div>
                                                                                <button type="submit"
                                                                                    class="common_btn">submit</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="wsus__main_comment">
                                                        <div class="wsus__comment_img">
                                                            <img src="{{ asset('public/frontend/images/team_1.jpg') }}" alt="user"
                                                                class="img-fluid w-100">
                                                        </div>
                                                        <div class="wsus__comment_text reply">
                                                            <h6>Smith jhon <span>09 Jul 2021</span></h6>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                                Cupiditate sint molestiae eos? Officia, fuga eaque.</p>
                                                            <a href="#" data-bs-toggle="collapse"
                                                                data-bs-target="#flush-collapsetwo3">reply</a>
                                                            <div class="accordion accordion-flush"
                                                                id="accordionFlushExample3">
                                                                <div class="accordion-item">
                                                                    <div id="flush-collapsetwo3"
                                                                        class="accordion-collapse collapse"
                                                                        aria-labelledby="flush-collapsetwo"
                                                                        data-bs-parent="#accordionFlushExample">
                                                                        <div class="accordion-body">
                                                                            <form>
                                                                                <div
                                                                                    class="wsus__riv_edit_single text_area">
                                                                                    <i class="far fa-edit"></i>
                                                                                    <textarea cols="3" rows="1"
                                                                                        placeholder="Your Text"></textarea>
                                                                                </div>
                                                                                <button type="submit"
                                                                                    class="common_btn">submit</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="pagination">
                                                        <nav aria-label="Page navigation example">
                                                            <ul class="pagination">
                                                                <li class="page-item">
                                                                    <a class="page-link" href="#" aria-label="Previous">
                                                                        <i class="fas fa-chevron-left"></i>
                                                                    </a>
                                                                </li>
                                                                <li class="page-item"><a class="page-link page_active"
                                                                        href="#">1</a></li>
                                                                <li class="page-item"><a class="page-link"
                                                                        href="#">2</a>
                                                                </li>
                                                                <li class="page-item"><a class="page-link"
                                                                        href="#">3</a>
                                                                </li>
                                                                <li class="page-item"><a class="page-link"
                                                                        href="#">4</a>
                                                                </li>
                                                                <li class="page-item">
                                                                    <a class="page-link" href="#" aria-label="Next">
                                                                        <i class="fas fa-chevron-right"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </nav>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-5 col-lg-6 mt-4 mt-lg-0">
                                                <div class="wsus__post_comment" id="sticky_sidebar2">
                                                    <h4>post a comment</h4>
                                                    <form action="#">
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <div class="wsus__single_com">
                                                                    <input type="text" placeholder="Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="wsus__single_com">
                                                                    <input type="email" placeholder="Email">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <div class="wsus__single_com">
                                                                    <textarea cols="3" rows="3"
                                                                        placeholder="Your Comment"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="common_btn" type="submit">post comment</button>
                                                    </form>
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
        </div>
    </section>
    <!--============================
        PRODUCT DETAILS END
    ==============================-->


    <!--============================
        RELATED PRODUCT START
    ==============================-->
    <section id="wsus__flash_sell">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="wsus__section_header">
                        <h3>Related Products</h3>
                        <a class="see_btn" href="#">see more <i class="fas fa-caret-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row flash_sell_slider">

                @foreach ($related_products as $item)
                    @php
                        $category = App\Models\Category::where('id', $item->category_id)->first();
                        $productImage = App\Models\ProductImage::where('product_id', $item->id)->get();
                        
                    @endphp

                    <div class="col-xl-3 col-sm-6 col-lg-4">
                        <div class="wsus__product_item">
                            <span class="wsus__new">{{ productType($item->type) }}</span>
                            <span class="wsus__minus">-{{ calcDiscountPercent($item->price, $item->offer_price) }}%</span>
                            <a class="wsus__pro_link" href="product_details.html">
                                <img src="{{ asset($item->thumb_image) }}" alt="{{ $item->name }}" class="img-fluid w-100 img_1" />
                                @if ( !empty( $productImage[0]->images ) )
                                   <img src="{{ asset($productImage[0]->images) }}" alt="{{ $item->name }}" class="img-fluid w-100 img_2" />
                                @else
                                   <img src="{{ asset($item->thumb_image) }}" alt="{{ $item->name }}" class="img-fluid w-100 img_2" />
                                @endif
                               
                            </a>
                            <ul class="wsus__single_pro_icon">
                                <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2"><i
                                            class="far fa-eye"></i></a></li>
                                <li><a href="#"><i class="far fa-heart"></i></a></li>
                                <li><a href="#"><i class="far fa-random"></i></a>
                            </ul>
                            <div class="wsus__product_details">
                                <a class="wsus__category" href="#">{{ $category->category_name }} </a>
                                <p class="wsus__pro_rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span>(133 review)</span>
                                </p>
                                <a class="wsus__pro_name" href="{{ route('product.details', $item->slug) }}">{{ $item->name }}</a>
                                <p class="wsus__price">
                                    @if ( !empty(checkDiscount($item)) )
                                        ${{ $item->offer_price }} <del>${{ $item->price }}</del>
                                    @else
                                        ${{ $item->price }}
                                    @endif
                                </p>
                                <a class="add_cart" href="#">add to cart</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--============================
        RELATED PRODUCT END
    ==============================-->

@endsection

@push('add-js')

<script>
    $(document).ready(function () {
        $('.select_2').select2();

        let colorId = $('.color-item.active').data('id') || $('.color-item').first().data('id'); // First color ID
        let sizeId = $('.size-item.active').data('id') || $('.size-item').first().data('id');   // First size ID
        let qty = $('#qty').val() || 1; // Initial quantity, fallback to 1 if not set
        let productId = "{{ $product->id }}"; // Assuming product ID is passed from Blade template

        // Set default hidden input values
        $('#color_id_input').val(colorId);
        $('#size_id_input').val(sizeId);

        // Trigger price update on page load
        updatePrice();

        // When a Color is selected
        $('.color-item').click(function() {
            $('.color-item a').removeClass('active');
            $(this).find('a').addClass('active');

            colorId = $(this).data('id'); // Set the selected color ID
            $('#color_id_input').val(colorId);

            updatePrice();
        });

        // When a Size is selected
        $('.size-item a').click(function() {
            $('.size-item a').removeClass('active');
            $(this).addClass('active');
            
            sizeId = $(this).parent().data('id'); // Set the selected size ID
            $('#size_id_input').val(sizeId);
            
            updatePrice();
        });

         // Increment quantity
        $('.add').click(function() {
            qty = parseInt($('#qty').val()) + 1;
            // $('#qty').val(qty);  // Update the quantity field value
            updatePrice();
        });

        // Decrement quantity
        $('.sub').click(function() {
            qty = Math.max(1, parseInt($('#qty').val()) - 1);  // Ensures qty is never less than 1
            // $('#qty').val(qty);  // Update the quantity field value
            updatePrice();
        });
        
        // Function to update the price
        function updatePrice() {
            if (colorId || sizeId || qty) {
                $.ajax({
                    url: `{{ route('get.color.size.price') }}`,
                    type: 'POST',
                    data: {
                        colorId: colorId,
                        sizeId: sizeId,
                        productId: productId,
                        qty: qty  // Pass the current quantity to the server
                    },
                    success: function(res) {
                        if (res.offer_price) {
                            $('#product_offer_price').text(`$${res.offer_price}`);
                            $('#product_price').text(`$${res.price}`);
                        } else {
                            $('#product_offer_price').text(`$${res.price}`);
                            $('#product_price').text('');
                        }
                    },
                    error: function(error) {
                        console.log('Error:', error);
                    }
                });
            }
        }

    });
</script>

<script>
    $(document).ready(function () {
        //__ Add to cart __// 
        $('.shopping-cart-form').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission
            var formData = $(this).serialize(); // Serialize form data
    
            $.ajax({
                url: `{{ route('addToCart') }}`, // Laravel route to add product to cart
                type: 'POST', 
                data: formData, 
                success: function(res) {
                    // Update cart count
                    if( res.status === 'success' ){
                        $('#cart_count').text(res.total); // Update cart count badge

                        $('.wsus__mini_cart').addClass('.show_cart'); // Show mini-cart (corrected class addition)

                        updateCartUI(res.carts); // Update cart UI
                        updateCartSubtotal(); // Call to update subtotal after adding item
                    }
                    else{
                        window.location.href = "{{ route('register.login') }}";
                    }

                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        });
    
        //__ Remove cart items __// 
        $(document).on('click', '.removeCart', function() {
            var colorId = $(this).attr('data-colorId');
            var sizeId = $(this).attr('data-sizeId');
            var prdtId = $(this).attr('data-prdtId');
            var cartItem = $(this).closest('li'); // Get the closest cart item element
    
            $.ajax({
                url: `{{ url('/remove-cart') }}/${prdtId}/${colorId}/${sizeId}`,
                type: 'GET', 
                success: function(res) {
                    if (res.success === true) {
                        // Remove the cart item from the UI
                        cartItem.remove(); // Remove the item from the UI
    
                        // Update cart data
                        updateCartSubtotal(); // Call function to update subtotal

                        // Check if the cart is empty
                        if (res.total === 0) {
                            window.location.reload();
                            // If the cart is empty, show an empty cart message and reset the subtotal
                            $('#cart-items').html('<div class="text-center"><a class="common_btn mt-4 mb-3 text-center " href="#"><i class="fab fa-shopify" aria-hidden="true"></i> go shop</a></div>');
                            $('#cart-subtotal').text('$0.00'); // Reset the subtotal
                            $('#cart_count').text('0'); // Reset the cart count
                        }
                    } else {
                        console.log('Error removing item');
                    }
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        });
    
        //__ Function to update cart sidebar UI __//
        function updateCartUI(carts) {
            var cartItemsHtml = '';
    
            // Loop through each cart item and update the cart
            $.each(carts, function(index, item) {
                cartItemsHtml += `
                    <li>
                        <div class="wsus__cart_img">
                            <a href="{{ url('product/details') }}/${item.id}">
                                <img src="${item.image_url}" alt="product" class="img-fluid w-100">
                            </a>
                            <a class="wsis__del_icon removeCart" data-colorId="${item.color_id}" data-sizeId="${item.size_id}" data-prdtId="${item.pdt_id}" style="cursor: pointer;">
                                <i class="fas fa-minus-circle"></i>
                            </a>
                        </div>
                        <div class="wsus__cart_text">
                            <a class="wsus__cart_title" href="{{ url('product/details') }}/${item.slug}">${item.name}</a>
                            <p>
                                ${item.offer_price ? `$${item.offer_price} <del>$${item.price}</del>` : `$${item.price}`} x ${item.qty} Qty
                            </p>
                `;
    
                // Check and append size details if available
                if (item.size_name && item.size_price) {
                    cartItemsHtml += `
                        <span class="variant_item"> Size: <span class="size_content">${item.size_name}</span>  ($${item.size_price})</span>
                    `;
                }
    
                // Check and append color details if available
                if (item.color_name && item.color_price) {
                    cartItemsHtml += `
                        <span class="variant_item"> Color: <span class="color_content" style="background: ${item.color_name}; width: 20px; height: 20px; display: inline-block; border-radius: 50%;"></span>  ($${item.color_price})</span>
                    `;
                }
                cartItemsHtml += `</div> </li>`;
            });
    
            // Check if there are items in the cart
            if (carts.length > 0) {
                    // Calculate the subtotal
                    let subtotal = carts.reduce((total, item) => {
                        let price = item.offer_price ? item.offer_price : item.price;
                        return total + (price * item.qty) + (item.color_price || 0) + (item.size_price || 0);
                    }, 0);

                    // Set cart content and subtotal HTML
                    cartSubtotalHtml = `
                        <h5>Sub Total: <span id="cart-subtotal">$${subtotal.toFixed(2)}</span></h5>
                        <div class="wsus__minicart_btn_area">
                            <a class="common_btn" href="{{ route('show-cart') }}">View Cart</a>
                            <a class="common_btn" href="{{ route('checkout') }}">Checkout</a>
                        </div>
                    `;
            } else {
                // Show empty cart message
                cartItemsHtml = '<li>Your cart is empty.</li>';
                cartSubtotalHtml = ''; // Clear subtotal and buttons if cart is empty
            }

            // Update the cart items and subtotal sections
            $('#cart-items').html(cartItemsHtml);
            $('.cart_redirect').html(cartSubtotalHtml);

            // Update subtotal in the mini-cart
            $('#cart-subtotal').text(`$${res.subtotal.toFixed(2)}`);
        }
    
        //__ Update cart price calculation __//
        function updateCartSubtotal() {
            $.ajax({
                url: `{{ url('/get-cart') }}`, // Add the route to get updated cart
                type: 'GET',
                success: function(res) {
                    if (res.success) {
                        if (res.carts.length === 0) {
                            // If no items are in the cart
                            $('#cart-items').html('<span class="mt-4 d-block alert alert-danger text-center">Cart is empty</span>');
                            $('#cart-subtotal').text('$0.00'); // Reset subtotal display
                            $('#cart_count').text('0'); // Reset cart count
                        } else {
                            // Update subtotal and cart items as usual
                            var subtotal = 0;
                            $.each(res.carts, function(index, item) {
                                let price = item.offer_price ? item.offer_price : item.price;
                                subtotal += (price * item.qty) + (item.color_price || 0) + (item.size_price || 0);
                            });
                            $('#cart-subtotal').text(`$${subtotal.toFixed(2)}`); // Update subtotal display
                            $('#cart_count').text(res.total); // Update cart count
                        }
                    }
                },
                error: function(error) {
                    console.log('Error fetching updated cart:', error);
                }
            });
        }
    });
</script>
    

@endpush