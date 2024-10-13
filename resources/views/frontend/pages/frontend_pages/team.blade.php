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
                        <h4>Team</h4>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><a href="#">team</a></li>
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
        TEAM START
    ==============================-->
    <section id="wsus__team">
        <div class="container">
            <div class="wsus__about_team">
                <div class="row">
                    <div class="col-xl-12">
                        <h4>meet our team</h4>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-lg-4">
                        <div class="wsus__team_single">
                            <div class="wsus__team_img">
                                <img src="{{ asset('public/frontend/images/team_1.jpg') }}" alt="team" class="img-fluid w-100">
                                <a class="wsus__team_single_overlay" href="team_details.html"></a>
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
                    <div class="col-xl-3 col-sm-6 col-lg-4">
                        <div class="wsus__team_single">
                            <div class="wsus__team_img">
                                <img src="{{ asset('public/frontend/images/team_2.jpg') }}" alt="team" class="img-fluid w-100">
                                <a class="wsus__team_single_overlay" href="team_details.html"></a>
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
                    <div class="col-xl-3 col-sm-6 col-lg-4">
                        <div class="wsus__team_single">
                            <div class="wsus__team_img">
                                <img src="{{ asset('public/frontend/images/team_3.jpg') }}" alt="team" class="img-fluid w-100">
                                <a class="wsus__team_single_overlay" href="team_details.html"></a>
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
                    <div class="col-xl-3 col-sm-6 col-lg-4">
                        <div class="wsus__team_single">
                            <div class="wsus__team_img">
                                <img src="{{ asset('public/frontend/images/team_2.jpg') }}" alt="team" class="img-fluid w-100">
                                <a class="wsus__team_single_overlay" href="team_details.html"></a>
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
                    <div class="col-xl-3 col-sm-6 col-lg-4">
                        <div class="wsus__team_single">
                            <div class="wsus__team_img">
                                <img src="{{ asset('public/frontend/images/team_2.jpg') }}" alt="team" class="img-fluid w-100">
                                <a class="wsus__team_single_overlay" href="team_details.html"></a>
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
                    <div class="col-xl-3 col-sm-6 col-lg-4">
                        <div class="wsus__team_single">
                            <div class="wsus__team_img">
                                <img src="{{ asset('public/frontend/images/team_1.jpg') }}" alt="team" class="img-fluid w-100">
                                <a class="wsus__team_single_overlay" href="team_details.html"></a>
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
                    <div class="col-xl-3 col-sm-6 col-lg-4">
                        <div class="wsus__team_single">
                            <div class="wsus__team_img">
                                <img src="{{ asset('public/frontend/images/team_2.jpg') }}" alt="team" class="img-fluid w-100">
                                <a class="wsus__team_single_overlay" href="team_details.html"></a>
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
                    <div class="col-xl-3 col-sm-6 col-lg-4">
                        <div class="wsus__team_single">
                            <div class="wsus__team_img">
                                <img src="{{ asset('public/frontend/images/team_3.jpg') }}" alt="team" class="img-fluid w-100">
                                <a class="wsus__team_single_overlay" href="team_details.html"></a>
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
                </div>
            </div>
        </div>
    </section>
    <!--============================
        TEAM END
    ==============================-->

@endsection

@push('add-js')


@endpush