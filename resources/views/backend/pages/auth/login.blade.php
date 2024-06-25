
<!doctype html>
<html lang="en">

<head>

        <meta charset="utf-8" />
        <title> {{ env('APP_NAME') }} | Admin Login </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('public/assets/images/favicon.ico') }}">

        <!-- preloader css -->
        <link rel="stylesheet" href="{{ asset('public/assets/css/preloader.min.css') }}" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="{{ asset('public/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('public/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('public/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
        <!-- Custom Css-->
        <link href="{{ asset('/public/assets/css/custom.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body>

    <!-- <body data-layout="horizontal"> -->
        <div class="auth-page">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-xxl-4 offset-xxl-4 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                        <div class="auth-full-page-content d-flex p-sm-5 p-4">
                            <div class="w-100">
                                <div class="d-flex flex-column h-100">
                                    <div class="auth-content my-auto">
                                        <a href="index.html" class="d-block text-center mb-5 auth-logo">
                                            <img src="{{ asset('public/assets/images/logo-sm.svg') }}" alt="" height="28"> <span class="logo-txt">Minia</span>
                                        </a>

                                        <div class="text-center">
                                            <h5 class="mb-0">Welcome Back !</h5>
                                            <p class="text-muted mt-2">Sign in to continue to {{ env("APP_NAME") }}.</p>
                                        </div>

                                        {{-- Login validation --}}
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        @if ( Session::get('error_message') )
                                           <div class="alert alert-danger text-center" role="alert">
                                                <strong>Error: </strong>Invalid Login Or Password
                                           </div>
                                        @endif

                                        <form class="mt-4 pt-2" method="post" action="{{ url('/admin/login') }}">
                                            @csrf

                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email Address</label>
                                                <input type="email" name="email" class="form-control" id="email" autocomplete="off" placeholder="Enter Email Address">
                                            </div>

                                            <div class="mb-3">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-grow-1">
                                                        <label for="password" class="form-label">Password</label>
                                                    </div>

                                                    <div class="flex-shrink-0">
                                                        <div class="">
                                                            <a href="auth-recoverpw.html" class="text-muted">Forgot password?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="input-group auth-pass-inputgroup">
                                                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">

                                                    <button class="btn btn-light shadow-none ms-0" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In</button>
                                            </div>
                                        </form>

                                        <div class="mt-4 pt-2 text-center">
                                            <div class="signin-other-title">
                                                <h5 class="font-size-14 mb-3 text-muted fw-medium">- Sign in with -</h5>
                                            </div>

                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript:void()"
                                                        class="social-list-item bg-primary text-white border-primary">
                                                        <i class="mdi mdi-facebook"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void()"
                                                        class="social-list-item bg-info text-white border-info">
                                                        <i class="mdi mdi-twitter"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void()"
                                                        class="social-list-item bg-danger text-white border-danger">
                                                        <i class="mdi mdi-google"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="mt-5 text-center">
                                            <p class="text-muted mb-0">Don't have an account ? <a href="auth-register.html"
                                                    class="text-primary fw-semibold"> Signup now </a> </p>
                                        </div>
                                    </div>

                                    <div class="mt-4 mt-md-5 text-center">
                                        <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Minia   . Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end auth full page content -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container fluid -->
        </div>


        <!-- JAVASCRIPT -->
        <script src="{{ asset("public/assets/libs/jquery/jquery.min.js") }}"></script>
        <script src="{{ asset("public/assets/libs/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
        <script src="{{ asset("public/assets/libs/metismenu/metisMenu.min.js") }}"></script>
        <script src="{{ asset("public/assets/libs/simplebar/simplebar.min.js") }}"></script>
        <script src="{{ asset("public/assets/libs/node-waves/waves.min.js") }}"></script>
        <script src="{{ asset("public/assets/libs/feather-icons/feather.min.js") }}"></script>
        <!-- pace js -->
        <script src="{{ asset("public/assets/libs/pace-js/pace.min.js") }}"></script>
        <!-- password addon init -->
        <script src="{{ asset("public/assets/js/pages/pass-addon.init.js") }}"></script>

    </body>


<!-- Mirrored from themesbrand.com/minia/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 27 Feb 2022 18:01:08 GMT -->
</html>