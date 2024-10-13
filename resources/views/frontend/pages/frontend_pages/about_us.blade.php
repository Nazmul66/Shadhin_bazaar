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
                        <h4>About us</h4>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><a href="#">About us</a></li>
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
        ABOUT US START
    ==============================-->
    <section id="wsus__about_us">
        <div class="container">
            <div class="wsus__about_accordian">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <h4>We Provide Kind Service for Customers</h4>
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Customer Service
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laudantium et
                                            delectus optio voluptate itaque vero dolorem autem, totam minima quo
                                            maiores facilis voluptas quis quisquam fugiat culpa qui dolore aliquid
                                            accusantium fugit tempora quidem quaerat perferendis. Quae voluptas
                                            vitae veritatis adipisci natus, aliquid doloribus veniam excepturi quasi
                                            id reiciendis delectus fugit illo. Laboriosam blanditiis iusto itaque
                                            possimus, aut cum quis maiores facilis voluptas quis quisquam fugiat
                                            culpa qui dolore aliquid accusantium fugit tempora quidem.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Online Consultation
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit quae
                                            repellendus quidem. Laboriosam perspiciatis architecto numquam?
                                            Eligendi, velit! Sequi magni fugiat dicta praesentium ea commodi
                                            inventore eveniet possimus facilis assumenda.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Sales Management
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit quae
                                            repellendus quidem. Laboriosam perspiciatis architecto numquam?
                                            Eligendi, velit! Sequi magni fugiat dicta praesentium ea commodi
                                            inventore eveniet possimus facilis assumenda.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <img src="{{ asset('public/frontend/images/about_2.jpg') }}" alt="img" class="img-fluid w-100">
                    </div>
                </div>
            </div>
        </div>
        <div class="wsus__about_counter_area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="wsus__about_counter_single">
                            <span class="counter">99,99</span>
                            <h2>product for sell</h2>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="wsus__about_counter_single">
                            <span class="counter">1,000</span>
                            <h2>community earnings</h2>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="wsus__about_counter_single">
                            <span class="counter">999</span>
                            <h2>growing buyers for sell</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wsus__why_shop">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <h3>Why Shop With Us?</h3>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-lg-3">
                        <div class="wsus__why_shop_single">
                            <i class="fal fa-box-full"></i>
                            <p>Complete buyer supply store</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-lg-3">
                        <div class="wsus__why_shop_single">
                            <i class="fal fa-box-usd"></i>
                            <p>Same day dispatch on all orders</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-lg-3">
                        <div class="wsus__why_shop_single">
                            <i class="fal fa-truck"></i>
                            <p>Free delivery on all orders</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-lg-3">
                        <div class="wsus__why_shop_single">
                            <i class="fas fa-user-headset"></i>
                            <p>Professional advice and great support </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wsus__about_award">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <h4>wining Awards</h4>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-lg-3">
                        <div class="wsus__about_award_single">
                            <img src="{{ asset('public/frontend/images/logo1.jpg') }}" alt="logo" class="img-fluid w-100">
                            <p>Winner Seo Master MAGT Smart Start Award 2018</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-lg-3">
                        <div class="wsus__about_award_single">
                            <img src="{{ asset('public/frontend/images/logo2.jpg') }}" alt="logo" class="img-fluid w-100">
                            <p>Winner Seo Master MAGT Smart Start Award 2018</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-lg-3">
                        <div class="wsus__about_award_single">
                            <img src="{{ asset('public/frontend/images/logo4.jpg') }}" alt="logo" class="img-fluid w-100">
                            <p>Winner Seo Master MAGT Smart Start Award 2018</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-lg-3">
                        <div class="wsus__about_award_single">
                            <img src="{{ asset('public/frontend/images/logo5.jpg') }}" alt="logo" class="img-fluid w-100">
                            <p>Winner Seo Master MAGT Smart Start Award 2018</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row team_slider">
                <div class="col-xl-4">
                    <div class="wsus__team_det_rev_single">
                        <img src="{{ asset('public/frontend/images/team_3.jpg') }}" alt="clients" class="img-fluid">
                        <h3>jinia sing</h3>
                        <h6>digital marketer</h6>
                        <span><i class="fal fa-quote-left"></i></span>
                        <p>Lorem ipsum, dolor sit amet consectetur elit. Recusandae aspernatur fugit ex unde eligendi
                            minima voluptatum numquam aliquam doloremque quod eos aperiam.</p>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="wsus__team_det_rev_single">
                        <img src="{{ asset('public/frontend/images/team_2.jpg') }}" alt="clients" class="img-fluid">
                        <h3>arun chandra</h3>
                        <h6>digital marketer</h6>
                        <span><i class="fal fa-quote-left"></i></span>
                        <p>Lorem ipsum, dolor sit amet consectetur elit. Recusandae aspernatur fugit ex unde eligendi
                            minima voluptatum numquam aliquam doloremque quod eos aperiam.</p>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="wsus__team_det_rev_single">
                        <img src="{{ asset('public/frontend/images/team_4.jpg') }}" alt="clients" class="img-fluid">
                        <h3>smith jhon</h3>
                        <h6>digital marketer</h6>
                        <span><i class="fal fa-quote-left"></i></span>
                        <p>Lorem ipsum, dolor sit amet consectetur elit. Recusandae aspernatur fugit ex unde eligendi
                            minima voluptatum numquam aliquam doloremque quod eos aperiam.</p>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="wsus__team_det_rev_single">
                        <img src="{{ asset('public/frontend/images/team_3.jpg') }}" alt="clients" class="img-fluid">
                        <h3>smith jhon</h3>
                        <h6>digital marketer</h6>
                        <span><i class="fal fa-quote-left"></i></span>
                        <p>Lorem ipsum, dolor sit amet consectetur elit. Recusandae aspernatur fugit ex unde eligendi
                            minima voluptatum numquam aliquam doloremque quod eos aperiam.</p>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="wsus__team_det_rev_single">
                        <img src="{{ asset('public/frontend/images/team_4.jpg') }}" alt="clients" class="img-fluid">
                        <h3>smith jhon</h3>
                        <h6>digital marketer</h6>
                        <span><i class="fal fa-quote-left"></i></span>
                        <p>Lorem ipsum, dolor sit amet consectetur elit. Recusandae aspernatur fugit ex unde eligendi
                            minima voluptatum numquam aliquam doloremque quod eos aperiam.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="wsus__about_team">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <h4>meet our team</h4>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-lg-3">
                        <div class="wsus__team_single">
                            <div class="wsus__team_img">
                                <img src="{{ asset('public/frontend/images/team_1.jpg') }}" alt="team" class="img-fluid w-100">
                                <a class="wsus__team_single_overlay" href="#"></a>
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                                </ul>
                            </div>
                            <div class="wsus__team_text">
                                <h5>allu arjun</h5>
                                <p>founder & ceo</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-lg-3">
                        <div class="wsus__team_single">
                            <div class="wsus__team_img">
                                <img src="{{ asset('public/frontend/images/team_2.jpg') }}" alt="team" class="img-fluid w-100">
                                <a class="wsus__team_single_overlay" href="#"></a>
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                                </ul>
                            </div>
                            <div class="wsus__team_text">
                                <h5>allu arjun</h5>
                                <p>Marketing</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-lg-3">
                        <div class="wsus__team_single">
                            <div class="wsus__team_img">
                                <img src="{{ asset('public/frontend/images/team_3.jpg') }}" alt="team" class="img-fluid w-100">
                                <a class="wsus__team_single_overlay" href="#"></a>
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                                </ul>
                            </div>
                            <div class="wsus__team_text">
                                <h5>allu arjun</h5>
                                <p>designer</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-lg-3">
                        <div class="wsus__team_single">
                            <div class="wsus__team_img">
                                <img src="{{ asset('public/frontend/images/team_2.jpg') }}" alt="team" class="img-fluid w-100">
                                <a class="wsus__team_single_overlay" href="#"></a>
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                                </ul>
                            </div>
                            <div class="wsus__team_text">
                                <h5>allu arjun</h5>
                                <p>developer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        ABOUT US END
    ==============================-->

@endsection

@push('add-js')

    <!-- simplyCountdown js-->
    <script src="{{ asset('public/frontend/js/simplyCountdown.js') }}"></script>

@endpush