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
                    <h3 class="heading text-center">{{ $data->title }}</h3>
                    <ul class="breadcrumbs d-flex align-items-center justify-content-center">
                        <li>
                            <a class="link" href="{{ route('home') }}">Homepage</a>
                        </li>
                        <li>
                            <i class='bx bx-chevron-right'></i>
                        </li>
                        <li>
                            <a class="link" href="javascript:void();">Pages</a>
                        </li>
                        <li>
                            <i class='bx bx-chevron-right'></i>
                        </li>
                        <li>
                            {{ $data->title }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /page-title -->

    <!-- Terms of use -->
    <section class="flat-spacing">
        <div class="container">
            <div class="col-lg-10 offset-lg-1">
                <div class="terms-of-use-wrap">
                    <div class="right terms-of-use-item ">

                        {!! $data->content !!}

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Terms of use -->

@endsection


@push('add-js')
    @include('frontend.include.full_ajax_cart')
@endpush