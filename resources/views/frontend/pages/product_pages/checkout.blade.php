@extends('frontend.layout.master')

@push('add-meta')
    <title>Sazao || About-us Template</title>
@endpush

@push('add-css')
    <link rel="stylesheet" href="{{ asset('public/frontend/css/select2.min.css') }}">
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
                        <h4>check out</h4>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><a href="#">peoduct</a></li>
                            <li><a href="#">check out</a></li>
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
        CHECK OUT PAGE START
    ==============================-->
    <section id="wsus__cart_view">
        <div class="container">
            <form class="wsus__checkout_form" id="payment_data" method="POST">
                @csrf

                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="wsus__check_form">
                            {{-- <h5>Billing Details <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">add
                                    new address</a></h5> --}}

                            <div class="row">
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="wsus__check_single_form">
                                        <input type="text" name="first_name" placeholder="First Name" required>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="wsus__check_single_form">
                                        <input type="text" name="last_name" placeholder="Last Name" required>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="wsus__check_single_form">
                                        <select class="select_2" name="state" name="country" required>
                                            <option value="AL">Country / Region *</option>
                                            <option value="">dhaka</option>
                                            <option value="">barisal</option>
                                            <option value="">khulna</option>
                                            <option value="">rajshahi</option>
                                            <option value="">bogura</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="wsus__check_single_form">
                                        <input type="text" name="city" placeholder="Town / City *" required>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="wsus__check_single_form">
                                        <input type="email" name="email" placeholder="Email *" required>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="wsus__check_single_form">
                                        <input type="text" name="address_optional" placeholder="Apartment, suite, unit, etc. (optional)">
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="wsus__check_single_form">
                                        <input type="text" name="state" placeholder="State *" required>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="wsus__check_single_form">
                                        <input type="number" name="zip" placeholder="Zip *" required>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="wsus__check_single_form">
                                        <input type="text" name="phone" placeholder="Phone *" required>
                                    </div>
                                </div>

                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="wsus__check_single_form">
                                        <input type="text" name="address" placeholder="Street Address *" required>
                                    </div>
                                </div>

                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="wsus__check_single_form">
                                        <h5>Additional Information</h5>
                                        <textarea cols="3" rows="4" name="notes"
                                        
                                            placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-5">
                        <div class="wsus__order_details" id="sticky_sidebar">
                            <p class="wsus__product">shipping Methods</p>

                            @foreach ($shipping_rules as $row)
                                @if ( $row->type == 'min_cost' && cart_subTotal() >= $row->min_cost )
                                    <div class="form-check">
                                        <input class="form-check-input shipping_rules" type="radio" name="shipping" data-id="{{ $row->cost }}" value="{{ $row->id }}" required>
                                        <label class="form-check-label" for="exampleRadios2">
                                            {{ $row->name }}
                                            <span>cost: (${{ $row->cost }})</span>
                                        </label>
                                    </div>

                                @elseif ( $row->type === 'flat_cost' )
                                    <div class="form-check">
                                        <input class="form-check-input shipping_rules" type="radio" name="shipping" data-id="{{ $row->cost }}" value="{{ $row->id }}" required>
                                        <label class="form-check-label" for="exampleRadios2">
                                            {{ $row->name }}
                                            <span>cost: (${{ $row->cost }})</span>
                                        </label>
                                    </div>
                                @endif
                            @endforeach

                            @php
                                $coupons = session()->has('coupon') ? session()->get('coupon')['discount'] : 0.00;
                            @endphp

                            <div class="wsus__order_details_summery">
                                <p>subtotal: <span>${{ number_format(cart_subTotal(), 2) }}</span></p>
                                <p>shipping fee: <span id="shipping_fee">$0.00</span></p>
                                <p>Coupon(-): <span id="coupon_amount" data-id="{{ $coupons }}">${{ number_format($coupons, 2) }}</span></p>
                                <p><b>total:</b> <span ><b id="total_amount" data-id="{{ cart_subTotal() }}">${{ number_format(cart_subTotal() - $coupons, 2) }}</b></span></p>
                            </div>

                            <div class="">
                                <p class="wsus__product">Payment Methods</p>

                                <div class="form-check">
                                    <input class="form-check-input shipping_rules" id="payment_method" type="radio" name="payment_method" value="ssl_commercz" checked required>
                                    <label class="form-check-label" for="exampleRadios2">
                                        Ssl_commercz
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input shipping_rules" id="payment_method" type="radio" name="payment_method" value="stripe" required>
                                    <label class="form-check-label" for="exampleRadios2">
                                        Stripe
                                    </label>
                                </div>
                            </div>
                            
                            <div class="terms_area">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked3"
                                        checked>
                                    <label class="form-check-label" for="flexCheckChecked3">
                                        I have read and agree to the website <a href="#">terms and conditions *</a>
                                    </label>
                                </div>
                            </div>

                            {{-- <input type="hidden" name="shipping_method" id="shipping_method_id" value=""> --}}

                            <button type="submit" class="common_btn">Place Order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    {{-- <div class="wsus__popup_address">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">add new address</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="wsus__check_form p-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="Company Name (Optional)">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="wsus__check_single_form">
                                        <select class="select_2" name="state">
                                            <option value="AL">Country / Region *</option>
                                            <option value="">dhaka</option>
                                            <option value="">barisal</option>
                                            <option value="">khulna</option>
                                            <option value="">rajshahi</option>
                                            <option value="">bogura</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="Street Address *">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="Apartment, suite, unit, etc. (optional)">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="Town / City *">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="State *">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="Zip *">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="Phone *">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="wsus__check_single_form">
                                        <input type="email" placeholder="Email *">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="wsus__check_single_form">
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!--============================
        CHECK OUT PAGE END
    ==============================-->

@endsection

@push('add-js')
    <script src="{{ asset('public/frontend/js/select2.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#payment_data').on('submit', function(e) {
                e.preventDefault();

                // Serialize form data
                var formData = $(this).serializeArray();

                // Add additional data manually
                formData.push(
                    { name: 'shipping_fee', value: $('#shipping_fee').data('id') || 0 },
                    { name: 'coupon_amount', value: $('#coupon_amount').data('id') || 0 },
                    { name: 'total_amount', value: $('#total_amount').data('id') || 0 }
                );
                var paymentMethod = $('#payment_method').val();

                console.log(formData);
                // Now you can use formData for your AJAX request

                $.ajax({
                    type: 'POST',
                    url: `{{ url('/') }}/${paymentMethod}-pay`,
                    dataType: 'json',
                    data: formData,
                    success: function (data) {
                        console.log(data);
                    },
                    error: function (err){
                        console.log(err);
                    }
                })
            });
        });
    </script>

    <script>
        (function (window, document) {
            var loader = function () {
                var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
                script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
                tag.parentNode.insertBefore(script, tag);
            };
        
            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
        })(window, document);



        $(document).ready(function () {
            $('.select_2').select2();

            // select the shipping charges
            $('.shipping_rules').on('click', function () {
                $('#shipping_method_id').val($(this).val());
                $('#shipping_fee').text('$'+$(this).data('id').toFixed(2));
                var shipping_fee = $(this).data('id').toFixed(2);
                var coupon_amount = $('#coupon_amount').data('id');
                var total_amount = $('#total_amount').data('id');
                // console.log(coupon_amount, total_amount);
                $('#total_amount').text('$'+ (shipping_fee - coupon_amount + total_amount).toFixed(2));

                // toastr.success('Shipping method setup successful')
            })
        });
    </script>

@endpush