@extends('frontend.layout.master')

@push('add-meta')
    <title>Sazao || About-us Template</title>
@endpush

@push('add-css')
   
@endpush


@section('body-content')

    <!-- page-title -->
    <div class="page-title" style="background-image: url(
        @if( !empty(getSetting()->banner_breadcrumb_img) )
            {{ asset(getSetting()->banner_breadcrumb_img) }}
        @else
            {{ asset('public/frontend/images/section/page-title.jpg') }}
        @endif
        );">
        
        <div class="container-full">
            <div class="row">
                <div class="col-12">
                    <h3 class="heading text-center">Our Team</h3>
                    <ul class="breadcrumbs d-flex align-items-center justify-content-center">
                        <li>
                            <a class="link" href="index.html">Homepage</a>
                        </li>
                        <li>
                            <i class="icon-arrRight"></i>
                        </li>
                        <li>
                            <a class="link" href="#">Pages</a>
                        </li>
                        <li>
                            <i class="icon-arrRight"></i>
                        </li>
                        <li>
                            Our Team
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /page-title -->

    <!-- Our Teams -->
    <section class="flat-spacing">
        <div class="container">
            <div class="heading-section text-center wow fadeInUp">
                <h3 class="heading">Meet Our Teams</h3>
                <p class="subheading text-secondary-2">Discover exceptional experiences through testimonials from our satisfied customers.</p>
            </div>
            <div dir="ltr" class="swiper tf-sw-latest" data-preview="4" data-tablet="3" data-mobile="2" data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1" data-pagination-md="1" data-pagination-lg="1">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="team-item hover-image wow fadeInUp" data-wow-delay="0s">
                            <div class="image">
                                <img class="lazyload" data-src="{{ asset('public/frontend/images/team/team-1.jpg') }}" src="{{ asset('public/frontend/images/team/team-1.jpg') }}" alt="image-team">
                            </div>
                            <div class="content">
                                <div>
                                    <h6 class="name"><a class="link text-line-clamp-1" href="#">Annette Black</a></h6>
                                    <div class="infor text-caption-1 text-secondary-2">Founder/CEO</div>
                                </div>
                                <ul class="tf-social-icon">
                                    <li><a href="#" class="social-facebook"><i class="icon icon-fb"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="team-item hover-image wow fadeInUp" data-wow-delay="0.1s">
                            <div class="image">
                                <img class="lazyload" data-src="{{ asset('public/frontend/images/team/team-2.jpg') }}" src="{{ asset('public/frontend/images/team/team-2.jpg') }}" alt="image-team">
                            </div>
                            <div class="content">
                                <div>
                                    <h6 class="name"><a class="link text-line-clamp-1" href="#">Jane Cooper</a></h6>
                                    <div class="infor text-caption-1 text-secondary-2">Sales Director</div>
                                </div>
                                <ul class="tf-social-icon">
                                    <li><a href="#" class="social-facebook"><i class="icon icon-fb"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="team-item hover-image wow fadeInUp" data-wow-delay="0.2s">
                            <div class="image">
                                <img class="lazyload" data-src="{{ asset('public/frontend/images/team/team-3.jpg') }}" src="{{ asset('public/frontend/images/team/team-3.jpg') }}" alt="image-team">
                            </div>
                            <div class="content">
                                <div>
                                    <h6 class="name"><a class="link text-line-clamp-1" href="#">Brooklyn Simmons</a></h6>
                                    <div class="infor text-caption-1 text-secondary-2">Manager</div>
                                </div>
                                <ul class="tf-social-icon">
                                    <li><a href="#" class="social-facebook"><i class="icon icon-fb"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="team-item hover-image wow fadeInUp" data-wow-delay="0.3s">
                            <div class="image">
                                <img class="lazyload" data-src="{{ asset('public/frontend/images/team/team-4.jpg') }}" src="{{ asset('public/frontend/images/team/team-4.jpg') }}" alt="image-team">
                            </div>
                            <div class="content">
                                <div>
                                    <h6 class="name"><a class="link text-line-clamp-1" href="#">Theresa Webb</a></h6>
                                    <div class="infor text-caption-1 text-secondary-2">Product Manager</div>
                                </div>
                                <ul class="tf-social-icon">
                                    <li><a href="#" class="social-facebook"><i class="icon icon-fb"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sw-pagination-latest sw-dots type-circle justify-content-center"></div>
            </div>
        </div>
    </section>
    <!-- /Our Teams -->

@endsection

@push('add-js')


@endpush