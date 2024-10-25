<script>
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
</script>