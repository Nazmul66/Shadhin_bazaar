@extends('frontend.layout.master')

@push('add-meta')
    <title>Sazao || About-us Template</title>
@endpush

@push('add-css')

@endpush


@section('body-content')

<!--============================
        BREADCRUMB START
    ==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>cart View</h4>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><a href="#">peoduct</a></li>
                            <li><a href="#">cart view</a></li>
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
        CART VIEW PAGE START
    ==============================-->
    <section id="wsus__cart_view">
        <div class="container">
            <div class="row">
                <div class="col-xl-9">
                    <div class="wsus__cart_list">
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr class="d-flex">
                                        <th class="wsus__pro_img">
                                            product item
                                        </th>

                                        <th class="wsus__pro_status">
                                            status
                                        </th>

                                        <th class="wsus__pro_select">
                                            quantity
                                        </th>

                                        <th class="wsus__pro_name">
                                            Price
                                        </th>

                                        <th class="wsus__pro_tk">
                                           Total price
                                        </th>

                                        <th class="wsus__pro_icon">
                                            <a href="javascript:void();" class="common_btn clear_cart">clear cart</a>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody id="cart_data_update">
                                    @if ( $all_carts->count() > 0 )
                                        @foreach ($all_carts as $cart)
                                            <tr class="d-flex" id="cart-item-{{ $cart->id }}">
                                                <td class="wsus__pro_img">
                                                    <img src="{{ asset($cart->thumb_image) }}" alt="product" class="img-fluid w-100">
                                                </td>
                                    
                                                <td class="wsus__pro_name">
                                                    <p class="mb-1">{{ $cart->name }}</p>
                                                    <span class="variant_item mb-2">  
                                                        <strong>Product Price : </strong> ${{ $cart->price }}
                                                    </span>
                                                    @if ( !empty($cart->color_name) )
                                                        <span class="variant_item mb-2"> <strong>Color:</strong> 
                                                            <span class="color_content" style="background: {{ $cart->color_name }}"></span> 
                                                            (${{ $cart->color_price }})
                                                        </span>
                                                    @endif
                                                    @if ( !empty($cart->size_name))
                                                        <span class="variant_item"> <strong>Size: </strong>
                                                            <span class="size_content">{{ $cart->size_name }}</span> 
                                                            (${{ $cart->size_price }})
                                                        </span>
                                                    @endif
                                                </td>
                                    
                                                <td class="wsus__pro_select">
                                                    <div class="select_number">
                                                        <span class="increment" data-cart-id="{{ $cart->id }}" data-prdt-id="{{ $cart->product_id }}">-</span>
                                                        <input type="number" class="qty_field" name="qty" min="1" max="20" data-cart-id="{{ $cart->id }}" value="{{ $cart->qty }}">
                                                        <span class="decrement" data-cart-id="{{ $cart->id }}" data-prdt-id="{{ $cart->product_id }}">+</span>
                                                    </div>
                                                </td>
                                    
                                                <td class="wsus__pro_status">
                                                    <h6 id="item-price-{{ $cart->id }}">
                                                        @if (!empty($cart->offer_price))
                                                            ${{ number_format($cart->qty * $cart->offer_price, 2) }}
                                                        @else
                                                            ${{ number_format($cart->qty * $cart->color_price, 2) }}
                                                        @endif
                                                    </h6>
                                                </td>
                                    
                                                <td class="wsus__pro_tk">
                                                    <h6 id="main-price-{{ $cart->id }}">
                                                        @if (!empty($cart->offer_price))
                                                            ${{ number_format($cart->qty * ( $cart->offer_price + $cart->color_price + $cart->size_price ), 2) }}
                                                        @else
                                                            ${{ number_format($cart->qty * ( $cart->color_price + $cart->size_price + $cart->price ), 2) }}
                                                        @endif
                                                    </h6>
                                                </td>
                                    
                                                <td class="wsus__pro_icon">
                                                    <a type="button" class="delete_cart_item" data-cart-id="{{ $cart->id }}" data-prdt-id="{{ $cart->product_id }}">
                                                        <i class="far fa-times"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                       <tr>
                                          <td colspan="6">
                                            <a class="common_btn mt-3 mb-3 text-center " href=""><i class="fab fa-shopify" aria-hidden="true"></i> go shop</a>
                                          </td>
                                       </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="wsus__cart_list_footer_button" id="sticky_sidebar">
                        <h6>total cart</h6>
                        <p>subtotal: <span id="subtotal">${{ number_format($subTotal, 2) ?? 0 }}</span></p>
                        <p>Coupon (-): <span id="discount">
                                @if(Session::has('coupon'))
                                    ${{ number_format(Session::get('coupon')['discount'], 2) }}
                                @else
                                    $0.00
                                @endif
                            </span>
                        </p>

                        @php
                            if ( session()->has('coupon') ) {
                              $coupons = session()->get('coupon')['discount'];
                            }
                            else{
                                $coupons = 0;
                            }
                        @endphp

                        <p class="total"><span>total:</span> <span id="total_price">${{ number_format($subTotal - $coupons, 2) }} </span></p>

                        <form id="apply_coupon" method="GET">
                            @csrf

                            <input type="text" id="coupon_code" name="coupon_code" value="{{ session()->has('coupon') ? session()->get('coupon')['coupon_name'] : ""}}" placeholder="Coupon Code">
                            <button type="submit" class="common_btn">apply</button>
                        </form>
                        <a class="common_btn mt-4 w-100 text-center" href="{{ route('checkout') }}">checkout</a>
                        <a class="common_btn mt-1 w-100 text-center" href=""><i class="fab fa-shopify"></i> go shop</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="wsus__single_banner">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="wsus__single_banner_content">
                        <div class="wsus__single_banner_img">
                            <img src="{{ asset('public/frontend/images/single_banner_2.jpg') }}" alt="banner" class="img-fluid w-100">
                        </div>
                        <div class="wsus__single_banner_text">
                            <h6>sell on <span>35% off</span></h6>
                            <h3>smart watch</h3>
                            <a class="shop_btn" href="#">shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="wsus__single_banner_content single_banner_2">
                        <div class="wsus__single_banner_img">
                            <img src="{{ asset('public/frontend/images/single_banner_3.jpg') }}" alt="banner" class="img-fluid w-100">
                        </div>
                        <div class="wsus__single_banner_text">
                            <h6>New Collection</h6>
                            <h3>Cosmetics</h3>
                            <a class="shop_btn" href="#">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
          CART VIEW PAGE END
    ==============================-->

@endsection

@push('add-js')
<script>

    $(document).ready(function() {

        //__ Function to update cart sidebar UI __//
        function refreshSidebarCart() {
            $.ajax({
                url: '{{ route("get.sidebar.cart") }}', // Your route to fetch sidebar cart data
                type: 'GET',
                success: function(res) {
                    var cartItemsHtml = '';
    
                     // Check if the cart has items
                    if (res.carts.length > 0) {
                        // Loop through each cart item and update the cart
                        $.each(res.carts, function(index, item) {
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

                        // Update cart items in the mini-cart
                        $('#cart-items').html(cartItemsHtml);

                        // Update subtotal in the mini-cart
                        $('#cart-subtotal').text(`$${res.subtotal.toFixed(2)}`);
                    } else {
                        window.location.reload();
                        // If no items are in the cart, display a message
                        $('#cart-items').html('<a class="common_btn mt-4 mb-3 text-center " href="#"><i class="fab fa-shopify" aria-hidden="true"></i> go shop</a>');
                        $('#cart-subtotal').text('$0.00');
                    }
                
                },
                error: function (err){
                    console.log('error', err)
                }
           });
        }

        // Function to refresh the main cart table
        function refreshMainCartData() {
            $.ajax({
                url: '{{ route("get.main.cart") }}', // Make sure this route is correct
                type: 'GET',
                success: function(res) {
                    if (res.status === 'success') {
                        let cartDataHtml = '';

                        // Loop through each cart item to build HTML rows
                        $.each(res.carts, function(index, cart) {
                            cartDataHtml += `
                                <tr class="d-flex" id="cart-item-${cart.id}">
                                    <td class="wsus__pro_img">
                                        <img src="${cart.thumb_image}" alt="product" class="img-fluid w-100">
                                    </td>
                                    <td class="wsus__pro_name">
                                        <p>${cart.name}</p>
                                        ${cart.color_name ? `
                                            <span class="variant_item mb-2"> Color: 
                                                <span class="color_content" style="background: ${cart.color_name}"></span> 
                                                ($${cart.color_price})
                                            </span>` : ''}
                                        ${cart.size_name ? `
                                            <span class="variant_item"> Size: 
                                                <span class="size_content">${cart.size_name}</span> 
                                                ($${cart.size_price})
                                            </span>` : ''}
                                    </td>
                                    <td class="wsus__pro_select">
                                        <div class="select_number">
                                            <span class="increment" data-cart-id="${cart.id}" data-prdt-id="${cart.pdt_id}">-</span>
                                            <input type="number" class="qty_field" name="qty" min="1" max="20" data-cart-id="${cart.id}" value="${cart.qty}">
                                            <span class="decrement" data-cart-id="${cart.id}" data-prdt-id="${cart.pdt_id}">+</span>
                                        </div>
                                    </td>
                                    <td class="wsus__pro_status">
                                        <h6 id="item-price-${cart.id}">
                                            $${(cart.offer_price || cart.price) * cart.qty}
                                        </h6>
                                    </td>
                                    <td class="wsus__pro_tk">
                                        <h6 id="main-price-${cart.id}">
                                            $${(cart.offer_price + cart.color_price + cart.size_price) * cart.qty}
                                        </h6>
                                    </td>
                                    <td class="wsus__pro_icon">
                                        <a type="button" class="delete_cart_item" data-cart-id="${cart.id}" data-prdt-id="${cart.pdt_id}">
                                            <i class="far fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                            `;
                        });

                        // If cart is empty, display "go shop" button
                        if (res.carts.length === 0) {
                            cartDataHtml = `
                                <tr>
                                    <td colspan="6">
                                        <a class="common_btn mt-3 mb-3 text-center " href="#"><i class="fab fa-shopify" aria-hidden="true"></i> go shop</a>
                                    </td>
                                </tr>
                            `;
                        }

                        // Update main cart table and subtotal
                        $('#cart_data_update').html(cartDataHtml);
                        $('#cart_count').text(`${res.total_count}`);
                        $('#cart-subtotal').text(`$${res.subtotal.toFixed(2)}`);
                        $('#subtotal').text(`$${res.subtotal.toFixed(2)}`);
                    }
                },
                error: function(error) {
                    console.log('Error refreshing main cart:', error);
                }
            });
        }

        // Handle Increment button click (for increasing the quantity)
        $(document).on('click', '.decrement', function() {
            // Find the input field next to the clicked button
            var qtyInput = $(this).siblings('.qty_field');
            var currentQty = parseInt(qtyInput.val());
            var maxQty = parseInt(qtyInput.attr('max'));
            var cartId = $(this).data('cart-id');
            var productId = $(this).data('prdt-id');

            // Increase the quantity
            if (currentQty < maxQty) {
                qtyInput.val(currentQty + 1);
                updateCartQuantity(cartId, productId, currentQty + 1);  // Call the update function
            }
        });

         // Handle Decrement button click (for decreasing the quantity)
        $(document).on('click', '.increment', function() {
            // Find the input field next to the clicked button
            var qtyInput = $(this).siblings('.qty_field');
            var currentQty = parseInt(qtyInput.val());
            var minQty = parseInt(qtyInput.attr('min'));
            var cartId = $(this).data('cart-id');
            var productId = $(this).data('prdt-id');

            // Decrease the quantity but not below the minimum allowed value
            if (currentQty > minQty) {
                qtyInput.val(currentQty - 1);
                updateCartQuantity(cartId, productId, currentQty - 1);  // Call the update function
            }
        });

        // Function to update cart quantity
        function updateCartQuantity(cartId, productId, newQty) {
            // console.log("Updating cart with cartId:", cartId, "productId:", productId, "newQty:", newQty); // 

            $.ajax({
                url: `{{ route('update.cart.quantity') }}`,
                type: 'POST',
                data: {
                    cart_id: cartId,
                    product_id: productId,
                    qty: newQty,
                    _token: "{{ csrf_token() }}" // Include CSRF token
                },
                success: function(res) {

                    var total = res.subtotal - {{ session()->has('coupon') ? session()->get('coupon')['discount'] : 0 }}
                    $('#total_price').text(`$${total.toFixed(2)}`);

                     // Refresh the sidebar cart data
                    refreshSidebarCart();

                    // update the discount amount
                    calculateCouponDiscount()

                    if (res.status === 'success') {
                        // Update the item price
                        $('#item-price-' + cartId).text('$' + res.price.toFixed(2));

                        // Update the main price
                        $('#main-price-' + cartId).text('$' + res.mainPrice.toFixed(2));

                        // Update the subtotal
                        $('#subtotal').text('$' + res.subtotal.toFixed(2));
                        $('#cart-subtotal').text('$' + res.subtotal.toFixed(2));
                    }
                },
                error: function(error) {
                    console.error('AJAX Error:', error); // Log AJAX errors
                }
            });
        }


        // Delete cart item on click
        $(document).on('click', '.delete_cart_item', function(e) {
            // e.preventDefault();
            
            let cartId = $(this).data('cart-id');
            let prdtId = $(this).data('prdt-id');
            let row = $('#cart-item-' + cartId); // Get the row to remove it later

            $.ajax({
                url: '{{ route("delete.cart.item") }}', // Update with the correct route
                type: 'POST',
                data: {
                    cart_id: cartId,
                    prdtId: prdtId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(res) {
                    if (res.status === 'success') {
                         // Calculate the new total after discount
                        let totalAfterDiscount = res.subtotal - res.discount;
                        $('#total_price').text(`$${totalAfterDiscount.toFixed(2)}`);

                        // Refresh the sidebar cart data
                        refreshSidebarCart();

                        // Remove the row from the DOM
                        row.remove();

                        // Update the subtotal
                        $('#subtotal').text('$' + res.subtotal.toFixed(2));

                        $('#cart_count').text(`${res.total?.length}`);

                        // Check if the cart is empty
                        if (res.total?.length === 0) {
                            window.location.reload();
                            
                            // Display the "Go to Shop" button when cart is empty
                            $('#cart_data_update').html(`
                                <tr>
                                    <td colspan="6" class="text-center">
                                        <a class="common_btn mt-3 mb-3 text-center " href="#">
                                            <i class="fab fa-shopify" aria-hidden="true"></i> Go to Shop
                                        </a>
                                    </td>
                                </tr>
                            `);
                        }
                    }
                },
                error: function(error) {
                    console.error('AJAX Error:', error);
                }
            });
        });


        // Clear cart button click event
        $(document).on('click', '.clear_cart', function(e) {
            e.preventDefault(); // Prevent default action

            $.ajax({
                url: '{{ route("clear.cart") }}', // Route to clear cart
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}' // Include CSRF token
                },
                success: function(response) {
                    if (response.status === 'success') {
                        refreshMainCartData();
                        refreshSidebarCart()

                        // Clear the cart items from the DOM
                        $('#cart_data_update').html(`
                            <tr>
                                <td colspan="6" class="text-center">
                                    <a class="common_btn mt-3 mb-3 text-center" href="#">
                                        <i class="fab fa-shopify" aria-hidden="true"></i> Go to Shop
                                    </a>
                                </td>
                            </tr>
                        `);

                        // Update the subtotal to zero
                        $('#subtotal').text('$0.00');
                        $('#cart_count').text('0');
                    }
                },
                error: function(error) {
                    console.error('AJAX Error:', error);
                }
            });
        });


        //__ Remove cart items [ sidebar ] __// 
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
                        
                        var total = res.subtotal - {{ session()->has('coupon') ? session()->get('coupon')['discount'] : 0 }}
                        $('#total_price').text(`$${total.toFixed(2)}`);

                        // Refresh the cart data after deletion
                        refreshMainCartData();

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

        //__ Coupon Apply __//
        $('#apply_coupon').on('submit', function(e){
            e.preventDefault();

            let formData = $(this).serialize();

            $.ajax({
                url: `{{ route('apply.coupon') }}`,
                type: 'POST',
                data: formData,
                success: function(res) {
                    // console.log(res.message);
                    calculateCouponDiscount()
                },
                error: function(error) {
                    console.error('AJAX Error:', error);
                }
            });
        })


        function calculateCouponDiscount()
        {
            $.ajax({
                url: `{{ route('coupon.calculation') }}`,
                type: 'GET',
                success: function(res) {
                    // console.log(res);
                    $('#discount').text(`$${res.discount.toFixed(2)}`);
                    $('#total_price').text(`$${res.cart_total.toFixed(2)}`);
                },
                error: function(error) {
                    console.error('AJAX Error:', error);
                }
            });
        }
    });

</script>
@endpush