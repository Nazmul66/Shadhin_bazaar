@extends('frontend.layout.master')

@push('add-meta')
    <title>Sazao || About-us Template</title>
@endpush

@push('add-css')

@endpush


@section('body-content')

  <!-- page-title -->
  <div class="page-title" style="background-image: url({{ asset('public/frontend/images/section/page-title.jpg') }});">
    <div class="container">
        <h3 class="heading text-center">Shopping Cart</h3>
        <ul class="breadcrumbs d-flex align-items-center justify-content-center">
            <li><a class="link" href="index.html">Homepage</a></li>
            <li><i class="icon-arrRight"></i></li>
            <li><a class="link" href="shop-default-grid.html">Shop</a></li>
            <li><i class="icon-arrRight"></i></li>
            <li>Shopping Cart</li>
        </ul>
    </div>
</div>
<!-- /page-title -->

<!-- Section cart -->
<section class="flat-spacing">
    <div class="container">
        <div class="row">
            <div class="col-xl-8">
                <div class="tf-cart-sold">
                    <div class="notification-sold bg-surface">
                        <img class="icon" src="{{ asset('public/frontend/images/logo/icon-fire.png') }}" alt="img">
                        <div class="count-text">Your cart will expire in
                            <div class="js-countdown time-count" data-timer="600" data-labels=":,:,:,"></div> minutes! Please checkout now before your items sell out!</div>
                    </div>
                    <div class="notification-progress">
                        <div class="text">Buy <span class="fw-semibold text-primary">$70.00</span> more to get <span class="fw-semibold">Freeship</span></div>
                        <div class="progress-cart">
                            <div class="value" style="width: 0%;" data-progress="50">
                                <span class="round"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <form>
                    <table class="tf-table-page-cart">
                        <thead>
                            <tr>
                                <th>Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th style="white-space: nowrap;">Total Price</th>
                                <th>
                                    <button class="tf-btn-clear" id="clear_cart">
                                        <span class="text">Clear Code</span>
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="cart-table-body">
                            @forelse ($cartItems as $row)
                                @php
                                    $totalPrice = ($row->price + ($row->options->size_price ?? 0) + ($row->options->color_price ?? 0)) * $row->qty;
                                @endphp

                                <tr class="tf-cart-item file-delete" id="remove-{{ $row->rowId }}">
                                    <td class="tf-cart-item_product">
                                        <a href="{{ route('product.details', $row->options->slug) }}" class="img-box">
                                            <img src="{{ asset($row->options->image) }}" alt="{{ $row->options->slug }}">
                                        </a>
                                        <div class="cart-info">
                                            <a href="{{ route('product.details', $row->options->slug) }}" class="cart-title link">{{ $row->name }}</a>
                                            <div class="variant-box">
                                                <div class="tf-select">
                                                    <div class="product_variant">
                                                        Color : {{ trans($row->options->color_name) }} ( ${{ $row->options->color_price }} )
                                                    </div>
                                                    {{-- <select>
                                                        <option selected="selected">Blue</option>
                                                        <option>Black</option>
                                                        <option>White</option>
                                                        <option>Red</option>
                                                        <option>Beige</option>
                                                        <option>Pink</option>
                                                    </select> --}}
                                                </div>
                                                <div class="tf-select">
                                                    <div class="product_variant">
                                                        Size : {{ strtoupper($row->options->size_name) }} ( ${{ $row->options->size_price }} )
                                                    </div>
                                                    {{-- <select>
                                                        <option selected="selected">XL</option>
                                                        <option>XS</option>
                                                        <option>S</option>
                                                        <option>M</option>
                                                        <option>L</option>
                                                        <option>XL</option>
                                                        <option>2XL</option>
                                                    </select> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-cart-title="Price" class="tf-cart-item_price text-center">
                                        <div class="cart_price text-button price_on_sale">${{ $row->price }}</div>
                                    </td>
                                    <td data-cart-title="Quantity" class="tf-cart-item_quantity">
                                        <div class="wg-quantity mx-md-auto">
                                            <span class="btn-quantity product-decrease">-</span>
                                            <input type="text" name="number" class="product_quantity" data-row_id="{{ $row->rowId }}" value="{{ $row->qty }}">
                                            <span class="btn-quantity product-increase">+</span>
                                        </div>
                                    </td>
                                    <td data-cart-title="Total" class="tf-cart-item_total text-center">
                                        <div id="{{ $row->rowId }}" class="cart_total text-button total_price">${{ $totalPrice }}</div>
                                    </td>
                                    <td class="remove-cart remove_item_alignemnt" id="remove_cart">
                                        <i class='icon bx bx-x icon-close-popup remove_product_cart' style="font-size: 20px;" data-id="{{ $row->rowId }}"></i>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="5">
                                    <div class="alert alert-danger text-center" role="alert">
                                        <p class="mb-3">There is no cart item</p>
                                        <a href="{{ route('checkout') }}" class="tf-btn btn-reset">Continue Shopping</a>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="ip-discount-code">
                        <input type="text" placeholder="Add voucher discount">
                        <button class="tf-btn"><span class="text">Apply Code</span></button>
                    </div>

                    <div class="group-discount">
                        <div class="box-discount">
                            <div class="discount-top">
                                <div class="discount-off">
                                    <div class="text-caption-1">Discount</div>
                                    <span class="sale-off text-btn-uppercase">10% OFF</span>
                                </div>
                                <div class="discount-from">
                                    <p class="text-caption-1">For all orders <br> from 200$</p>
                                </div>
                            </div>
                            <div class="discount-bot">
                                <span class="text-btn-uppercase">Mo234231</span>
                                <button class="tf-btn"><span class="text">Apply Code</span></button>
                            </div>
                        </div>

                        <div class="box-discount active">
                            <div class="discount-top">
                                <div class="discount-off">
                                    <div class="text-caption-1">Discount</div>
                                    <span class="sale-off text-btn-uppercase">10% OFF</span>
                                </div>
                                <div class="discount-from">
                                    <p class="text-caption-1">For all orders <br> from 200$</p>
                                </div>
                            </div>
                            <div class="discount-bot">
                                <span class="text-btn-uppercase">Mo234231</span>
                                <button class="tf-btn"><span class="text">Apply Code</span></button>
                            </div>
                        </div>

                        <div class="box-discount">
                            <div class="discount-top">
                                <div class="discount-off">
                                    <div class="text-caption-1">Discount</div>
                                    <span class="sale-off text-btn-uppercase">10% OFF</span>
                                </div>
                                <div class="discount-from">
                                    <p class="text-caption-1">For all orders <br> from 200$</p>
                                </div>
                            </div>
                            <div class="discount-bot">
                                <span class="text-btn-uppercase">Mo234231</span>
                                <button class="tf-btn"><span class="text">Apply Code</span></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


            <div class="col-xl-4">
                <div class="fl-sidebar-cart">
                    <div class="box-order bg-surface">
                        <h5 class="title">Order Summary</h5>
                        <div class="subtotal text-button d-flex justify-content-between align-items-center">
                            <span>Subtotal</span>
                            <span class="total">-$80.00</span>
                        </div>
                        <div class="discount text-button d-flex justify-content-between align-items-center">
                            <span>Discounts</span>
                            <span class="total">-$80.00</span>
                        </div>
                        <div class="ship">
                            <span class="text-button">Shipping</span>
                            <div class="flex-grow-1">
                                <fieldset class="ship-item">
                                    <input type="radio" name="ship-check" class="tf-check-rounded" id="free" checked>
                                    <label for="free">
                                        <span>Free Shipping</span>
                                        <span class="price">$0.00</span>
                                    </label>
                                </fieldset>
                                <fieldset class="ship-item">
                                    <input type="radio" name="ship-check" class="tf-check-rounded" id="local">
                                    <label for="local">
                                        <span>Local:</span>
                                        <span class="price">$35.00</span>
                                    </label>
                                </fieldset>
                                <fieldset class="ship-item">
                                    <input type="radio" name="ship-check" class="tf-check-rounded" id="rate">
                                    <label for="rate">
                                        <span>Flat Rate:</span>
                                        <span class="price">$35.00</span>
                                    </label>
                                </fieldset>
                            </div>
                        </div>
                        <h5 class="total-order d-flex justify-content-between align-items-center">
                            <span>Total</span>
                            <span class="total">$186,99</span>
                        </h5>
                        <div class="box-progress-checkout">
                            <fieldset class="check-agree">
                                <input type="checkbox" id="check-agree" class="tf-check-rounded">
                                <label for="check-agree">
                                    I agree with the <a href="term-of-use.html">terms and conditions</a>
                                </label>
                            </fieldset>
                            <a href="{{ route('checkout') }}" class="tf-btn btn-reset">Process To Checkout</a>
                            <p class="text-button text-center">Or continue shopping</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Section cart -->

<!-- Recent product -->
<section class="flat-spacing pt-0">
    <div class="container">
        <div class="heading-section text-center wow fadeInUp">
            <h4 class="heading">You may also like</h4>
        </div>
        <div dir="ltr" class="swiper tf-sw-recent" data-preview="4" data-tablet="3" data-mobile="2" data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1" data-pagination-md="1" data-pagination-lg="1">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="card-product wow fadeInUp" data-wow-delay="0s">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="images/products/womens/women-19.jpg" src="images/products/womens/women-19.jpg" alt="image-product">
                                <img class="lazyload img-hover" data-src="images/products/womens/women-20.jpg" src="images/products/womens/women-20.jpg" alt="image-product">
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
                    <div class="card-product wow fadeInUp" data-wow-delay="0.1s">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="images/products/womens/women-176.jpg" src="images/products/womens/women-176.jpg" alt="image-product">
                                <img class="lazyload img-hover" data-src="images/products/womens/women-179.jpg" src="images/products/womens/women-179.jpg" alt="image-product">
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
                            <span class="price"><span class="old-price">$98.00</span> $79.99</span>
                            <ul class="list-color-product">
                                <li class="list-color-item color-swatch active line">
                                    <span class="swatch-value bg-light-blue"></span>
                                    <img class="lazyload" data-src="images/products/womens/women-176.jpg" src="images/products/womens/women-176.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="swatch-value bg-light-blue-2"></span>
                                    <img class="lazyload" data-src="images/products/womens/women-177.jpg" src="images/products/womens/women-177.jpg" alt="image-product">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card-product card-product-size wow fadeInUp" data-wow-delay="0.2s">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="images/products/womens/women-29.jpg" src="images/products/womens/women-29.jpg" alt="image-product">
                                <img class="lazyload img-hover" data-src="images/products/womens/women-30.jpg" src="images/products/womens/women-30.jpg" alt="image-product">
                            </a>
                            <div class="variant-wrap size-list">
                                <ul class="variant-box">
                                    <li class="size-item">S</li>
                                    <li class="size-item">M</li>
                                    <li class="size-item">L</li>
                                    <li class="size-item">XL</li>
                                </ul>
                            </div>
                            <div class="variant-wrap countdown-wrap">
                                <div class="variant-box">
                                    <div class="js-countdown" data-timer="1007500" data-labels="D :,H :,M :,S"></div>
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
                                <a href="#quickAdd" data-bs-toggle="modal" class="btn-main-product">Quick Add</a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">Ramie shirt with pockets </a>
                            <span class="price"><span class="old-price">$98.00</span> $89.99</span>
                            <ul class="list-color-product">
                                <li class="list-color-item color-swatch active line">
                                    <span class="swatch-value bg-light-orange"></span>
                                    <img class="lazyload" data-src="images/products/womens/women-29.jpg" src="images/products/womens/women-29.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="swatch-value bg-light-grey"></span>
                                    <img class="lazyload" data-src="images/products/womens/women-33.jpg" src="images/products/womens/women-33.jpg" alt="image-product">
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card-product wow fadeInUp" data-wow-delay="0.3s">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="images/products/womens/women-1.jpg" src="images/products/womens/women-1.jpg" alt="image-product">
                                <img class="lazyload img-hover" data-src="images/products/womens/women-2.jpg" src="images/products/womens/women-2.jpg" alt="image-product">
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
                            <span class="price">$69.99</span>
                            <ul class="list-color-product">
                                <li class="list-color-item color-swatch active line">
                                    <span class="swatch-value bg-dark-grey"></span>
                                    <img class="lazyload" data-src="images/products/womens/women-1.jpg" src="images/products/womens/women-1.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="swatch-value bg-light-pink"></span>
                                    <img class="lazyload" data-src="images/products/womens/women-2.jpg" src="images/products/womens/women-2.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="swatch-value bg-dark-grey-2"></span>
                                    <img class="lazyload" data-src="images/products/womens/women-3.jpg" src="images/products/womens/women-3.jpg" alt="image-product">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sw-pagination-recent sw-dots type-circle justify-content-center"></div>
        </div>
    </div>
</section>
<!-- /Recent product -->

@endsection

@push('add-js')
<script>
    $(document).ready(function(){
        //__ Product Quantity Increament __//
        $('.product-increase').on('click', function(){
            let input = $(this).siblings('.product_quantity');
            let rowId = input.data('row_id');
            let quantity = parseInt(input.val()) || 0;
            quantity += 1; 
            input.val(quantity); 
            console.log(rowId);

            $.ajax({
                url: "{{ route('cart.update.quantity') }}",
                method: 'POST',
                data: {
                    quantity : quantity,
                    rowId    : rowId,
                },
                success: function(data) {
                    console.log(data);
                    if( data.status === 'success' ){ 
                        let productId = '#' + rowId;
                        $(productId).text('$' + data.productTotal);
                        toastr.success(data.message);
                    }
                },
                error: function(err) {
                    console.log(err);
                },
            })
        })

        //__ Product Quantity Decrement __//
        $('.product-decrease').on('click', function(){
            let input = $(this).siblings('.product_quantity');
            let rowId = input.data('row_id');
            let quantity = parseInt(input.val()) || 0;
            quantity -= 1; 
            if( quantity < 1 ){
                quantity = 1
            }
            input.val(quantity); 
            // console.log(rowId);

            $.ajax({
                url: "{{ route('cart.update.quantity') }}",
                method: 'POST',
                data: {
                    quantity : quantity,
                    rowId    : rowId,
                },
                success: function(data) {
                    console.log(data);
                    if( data.status === 'success' ){ 
                        let productId = '#' + rowId;
                        $(productId).text('$' + data.productTotal);
                        toastr.success(data.message);
                    }
                },
                error: function(err) {
                    console.log(err);
                },
            })
        })

        //__ Single product clear __//
        $(document).on('click', '.remove_product_cart', function(e) {
            e.preventDefault();
            let id = $(this).data('id');    
            // console.log(id); 

            $.ajax({
                url: "{{ url('/cart/remove-product') }}/" + id,
                method: 'GET',
                dataType: 'json',
                data: { id: id },
                success: function(data) {
                    // console.log(data);
                    if( data.status === 'success' ){ 
                        let singleProductRemove = '#remove-' +id;
                        $(singleProductRemove).remove();

                        // Check if the table is empty and display the message
                        const tableBody = $('#cart-table-body'); // Replace with the actual tbody ID or class
                        if (tableBody.children('tr.tf-cart-item').length === 0) {
                            tableBody.html(`
                                <tr>
                                    <td colspan="5">
                                        <div class="alert alert-danger text-center" role="alert">
                                            <p class="mb-3">There is no cart item</p>
                                            <a href="{{ route('checkout') }}" class="tf-btn btn-reset">Continue Shopping</a>
                                        </div>
                                    </td>
                                </tr>
                            `);
                        }
                        
                        getCartCount();
                        toastr.success(data.message);
                    }
                },
                error: function(err) {
                    console.log(err);
                },
            })
        })

        //__ Clear all Cart data __//
        $('#clear_cart').on('click', function(e){
            e.preventDefault();

            swal.fire({
                title: "Are you sure?",
                text: "This action will clear your cart!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            })
            .then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('clear.cart') }}",
                        method: 'GET',
                        success: function(data) {
                            // console.log(data);
                            if( data.status === 'success' ){ 
                                $('.tf-cart-item').remove();

                                // Check if the table is empty and display the message
                                const tableBody = $('#cart-table-body'); // Replace with the actual tbody ID or class
                                if (tableBody.children('tr.tf-cart-item').length === 0) {
                                    tableBody.html(`
                                        <tr>
                                            <td colspan="5">
                                                <div class="alert alert-danger text-center" role="alert">
                                                    <p class="mb-3">There is no cart item</p>
                                                    <a href="{{ route('checkout') }}" class="tf-btn btn-reset">Continue Shopping</a>
                                                </div>
                                            </td>
                                        </tr>
                                    `);
                                }
                                getCartCount();
                                toastr.success(data.message);
                            }
                            },
                            error: function(err) {
                                console.log(err);
                            },
                    })
                } 
                else {
                    swal.fire('Your cart data is safe');
                }
            })
        })

        //__ Cart Count __//
        function getCartCount(){
            $.ajax({
                method: 'GET',
                url: "{{ route('cart.count') }}",
                success: function(data) {
                    console.log(data);
                    if( data.status === 'success' ){
                       $('.count-box').text(data.cartCount);
                    }
                },
                error: function(data) {
                    // console.log('Error adding product to cart:', data);
                },
            });
        }
    })
</script>
@endpush