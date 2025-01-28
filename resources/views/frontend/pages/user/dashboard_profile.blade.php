@extends('frontend.layout.master')

@push('add-meta')
    <title>Sazao || About-us Template</title>
@endpush

@push('add-css')
   
@endpush

@section('dashboard_profile', 'active')

@section('body-content')

    <!-- page-title -->
    <div class="page-title" style="background-image: url({{ asset('public/frontend/images/section/page-title.jpg') }});">
        <div class="container-full">
            <div class="row">
                <div class="col-12">
                    <h3 class="heading text-center">My Account</h3>
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
                            My Account
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /page-title -->

    <!-- my-account -->
    <section class="flat-spacing">
        <div class="container">
            <div class="my-account-wrap">

                @include('frontend.include.user_sidebar')

                <div class="my-account-content">
                    <div class="account-orders">
                        <div class="wrap-account-order">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="fw-6">Order</th>
                                        <th class="fw-6">Date</th>
                                        <th class="fw-6">Status</th>
                                        <th class="fw-6">Total</th>
                                        <th class="fw-6">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="tf-order-item">
                                        <td>
                                            #123
                                        </td>
                                        <td>
                                            August 1, 2024
                                        </td>
                                        <td>
                                            On hold
                                        </td>
                                        <td>
                                            $200.0 for 1 items
                                        </td>
                                        <td>
                                            <a href="my-account-orders-details.html" class="tf-btn btn-fill radius-4">
                                                <span class="text">View</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="tf-order-item">
                                        <td>
                                            #345
                                        </td>
                                        <td>
                                            August 2, 2024
                                        </td>
                                        <td>
                                            On hold
                                        </td>
                                        <td>
                                            $300.0 for 1 items
                                        </td>
                                        <td>
                                            <a href="my-account-orders-details.html" class="tf-btn btn-fill radius-4">
                                                <span class="text">View</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="tf-order-item">
                                        <td>
                                            #567
                                        </td>
                                        <td>
                                            August 3, 2024
                                        </td>
                                        <td>
                                            On hold
                                        </td>
                                        <td>
                                            $400.0 for 1 items
                                        </td>
                                        <td>
                                            <a href="my-account-orders-details.html" class="tf-btn btn-fill radius-4">
                                                <span class="text">View</span>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /my-account -->

@endsection

@push('add-js')

    @include('frontend.include.full_ajax_cart')

@endpush