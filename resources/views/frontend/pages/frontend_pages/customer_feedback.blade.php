@extends('frontend.layout.master')

@push('add-meta')
    <title>Sazao || About-us Template</title>
@endpush

@push('add-css')
   
@endpush


@section('body-content')

 <!-- page-title -->
 <div class="page-title" style="background-image: url({{ asset('public/frontend/images/section/page-title.jpg') }});">
    <div class="container-full">
        <div class="row">
            <div class="col-12">
                <h3 class="heading text-center">Customer Feedbacks</h3>
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
                        Customer Feedbacks
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /page-title -->

<!-- Customer Feedbacks -->
<section class="flat-spacing">
    <div class="container">
        <div class="tf-grid-layout md-col-3 mb_30">
            <div class="testimonial-item style-4 wow fadeInUp" data-wow-delay="0s">
                <div class="content-top">
                    <div class="box-icon">
                        <i class="icon icon-quote"></i>
                    </div>
                    <div class="text-title">Variety of Styles!</div>
                    <p class="text-secondary">"Fantastic shop! Great selection, fair prices, and friendly staff. Highly recommended. The quality of the products is exceptional, and the prices are very reasonable!"</p>
                    <div class="box-rate-author">
                        <div class="box-author">
                            <div class="text-title author">Sybil Sharp</div>
                        </div>
                        <div class="list-star-default color-primary">
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item style-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="content-top">
                    <div class="box-icon">
                        <i class="icon icon-quote"></i>
                    </div>
                    <div class="text-title">Quality of Clothing!</div>
                    <p class="text-secondary">"I absolutely love this shop! The products are high-quality and the customer service is excellent. I always leave with exactly what I need and a smile on my face."</p>
                    <div class="box-rate-author">
                        <div class="box-author">
                            <div class="text-title author">Mark G.</div>
                        </div>
                        <div class="list-star-default color-primary">
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item style-4 wow fadeInUp" data-wow-delay="0.2s">
                <div class="content-top">
                    <div class="box-icon">
                        <i class="icon icon-quote"></i>
                    </div>
                    <div class="text-title">Customer Service!</div>
                    <p class="text-secondary">"I love this shop! The products are always top-quality, and the staff is incredibly friendly and helpful. They go out of their way to make sure that I'm satisfied with my purchase.”</p>
                    <div class="box-rate-author">
                        <div class="box-author">
                            <div class="text-title author">Emily S.</div>
                        </div>
                        <div class="list-star-default color-primary">
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item style-4 wow fadeInUp" data-wow-delay="0s">
                <div class="content-top">
                    <div class="box-icon">
                        <i class="icon icon-quote"></i>
                    </div>
                    <div class="text-title">Variety of Styles!</div>
                    <p class="text-secondary">"Fantastic shop! Great selection, fair prices, and friendly staff. Highly recommended. The quality of the products is exceptional, and the prices are very reasonable!"</p>
                    <div class="box-rate-author">
                        <div class="box-author">
                            <div class="text-title author">Sybil Sharp</div>
                        </div>
                        <div class="list-star-default color-primary">
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item style-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="content-top">
                    <div class="box-icon">
                        <i class="icon icon-quote"></i>
                    </div>
                    <div class="text-title">Variety of Styles!</div>
                    <p class="text-secondary">"Fantastic shop! Great selection, fair prices, and friendly staff. Highly recommended. The quality of the products is exceptional, and the prices are very reasonable!"</p>
                    <div class="box-rate-author">
                        <div class="box-author">
                            <div class="text-title author">Sybil Sharp</div>
                        </div>
                        <div class="list-star-default color-primary">
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item style-4 wow fadeInUp" data-wow-delay="0.2s">
                <div class="content-top">
                    <div class="box-icon">
                        <i class="icon icon-quote"></i>
                    </div>
                    <div class="text-title">Quality of Clothing!</div>
                    <p class="text-secondary">"I absolutely love this shop! The products are high-quality and the customer service is excellent. I always leave with exactly what I need and a smile on my face."</p>
                    <div class="box-rate-author">
                        <div class="box-author">
                            <div class="text-title author">Mark G.</div>
                        </div>
                        <div class="list-star-default color-primary">
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item style-4 wow fadeInUp" data-wow-delay="0s">
                <div class="content-top">
                    <div class="box-icon">
                        <i class="icon icon-quote"></i>
                    </div>
                    <div class="text-title">Customer Service!</div>
                    <p class="text-secondary">"I love this shop! The products are always top-quality, and the staff is incredibly friendly and helpful. They go out of their way to make sure that I'm satisfied with my purchase.”</p>
                    <div class="box-rate-author">
                        <div class="box-author">
                            <div class="text-title author">Emily S.</div>
                        </div>
                        <div class="list-star-default color-primary">
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item style-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="content-top">
                    <div class="box-icon">
                        <i class="icon icon-quote"></i>
                    </div>
                    <div class="text-title">Variety of Styles!</div>
                    <p class="text-secondary">"Fantastic shop! Great selection, fair prices, and friendly staff. Highly recommended. The quality of the products is exceptional, and the prices are very reasonable!"</p>
                    <div class="box-rate-author">
                        <div class="box-author">
                            <div class="text-title author">Sybil Sharp</div>
                        </div>
                        <div class="list-star-default color-primary">
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item style-4 wow fadeInUp" data-wow-delay="0.2s">
                <div class="content-top">
                    <div class="box-icon">
                        <i class="icon icon-quote"></i>
                    </div>
                    <div class="text-title">Variety of Styles!</div>
                    <p class="text-secondary">"Fantastic shop! Great selection, fair prices, and friendly staff. Highly recommended. The quality of the products is exceptional, and the prices are very reasonable!"</p>
                    <div class="box-rate-author">
                        <div class="box-author">
                            <div class="text-title author">Sybil Sharp</div>
                        </div>
                        <div class="list-star-default color-primary">
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <ul class="wg-pagination justify-content-center">
            <li>
                <a href="#" class="pagination-item text-button">1</a>
            </li>
            <li class="active">
                <div class="pagination-item text-button">2</div>
            </li>
            <li>
                <a href="#" class="pagination-item text-button">3</a>
            </li>
            <li>
                <a href="#" class="pagination-item text-button"><i class="icon-arrRight"></i></a>
            </li>
        </ul>
    </div>
</section>
<!-- /Customer Feedbacks -->

@endsection


@push('add-js')
   
@endpush