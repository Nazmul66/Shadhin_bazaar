@extends('frontend.layout.master')

@push('add-meta')
    <title>Sazao || About-us Template</title>
@endpush

@push('add-css')

@endpush


@section('body-content')

<!-- order track -->
<section class="flat-spacing">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-4">
                <div class="tracking-wrap ">
                    <div class="left">
                        <div class="heading mb-5 text-center">
                            <h4 class="mb-1" style="font-size: 30px;">Order Tracking</h4>
                            <p>Tracking Your Order Status</p>
                        </div>
                        <form action="#" class="form-login">
                            <div class="wrap">
                                <fieldset class="text-start">
                                    <label for="" class="mb-2" style="font-weight: 500;">Tracking Number*</label>
                                    <input type="text" placeholder="E.X: TRK98220020">
                                </fieldset>

                                <fieldset class="text-start">
                                    <label for="" class="mb-2" style="font-weight: 500;">Order Id*</label>
                                    <input type="text" placeholder="E.X: 158287801">  
                                </fieldset>
                            </div>
                            <div class="button-submit">
                                <button class="tf-btn btn-fill" type="submit">
                                    <span class="text">Tracking Orders</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-sm-6 col-lg-3">
                <div class="wsus__track_header_single">
                    <h5>estimated delivery time:</h5>
                    <p>20 nov 2021</p>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-lg-3">
                <div class="wsus__track_header_single">
                    <h5>shopping by:</h5>
                    <p>one shop</p>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-lg-3">
                <div class="wsus__track_header_single">
                    <h5>status:</h5>
                    <p>order Processing</p>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-lg-3">
                <div class="wsus__track_header_single border_none">
                    <h5>tracking:</h5>
                    <p>BD096547155HGU</p>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <ul class="progtrckr" data-progtrckr-steps="4">
                <li class="progtrckr_done icon_one check_mark">Order pending</li>
                <li class="progtrckr_done icon_two ">order Processing</li>
                <li class="icon_three">on the way</li>
                <li class="icon_four red_mark">ready for delivery</li>
            </ul>
        </div>

        <div class="col-xl-12 mt-5">
            <a href="#" class="tf-btn btn-fill">
                <i class="fas fa-chevron-left" aria-hidden="true"></i> 
                <span class="text">back to order</span>
            </a>
        </div>
    </div>
</section>
<!-- /login -->

@endsection

@push('add-js')
    
@endpush