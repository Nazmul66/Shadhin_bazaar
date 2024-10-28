    <!--============================
        SCROLL BUTTON START
    ==============================-->
    <div class="wsus__scroll_btn">
        <i class="fas fa-chevron-up"></i>
    </div>
    <!--============================
        SCROLL BUTTON  END
    ==============================-->


    <!--jquery library js-->
    <script src="{{ asset('public/frontend/js/jquery-3.6.0.min.js') }}"></script>
    <!--bootstrap js-->
    <script src="{{ asset('public/frontend/js/bootstrap.bundle.min.js') }}"></script>
    <!--font-awesome js-->
    <script src="{{ asset('public/frontend/js/Font-Awesome.js') }}"></script>
    <!--select2 js-->
    <script src="{{ asset('public/frontend/js/select2.min.js') }}"></script>
    <!--slick slider js-->
    <script src="{{ asset('public/frontend/js/slick.min.js') }}"></script>
    <!--simplyCountdown js-->
    <script src="{{ asset('public/frontend/js/simplyCountdown.js') }}"></script>
    <!--product zoomer js-->
    <script src="{{ asset('public/frontend/js/jquery.exzoom.js') }}"></script>
    <!--nice-number js-->
    <script src="{{ asset('public/frontend/js/jquery.nice-number.min.js') }}"></script>
    <!--counter js-->
    <script src="{{ asset('public/frontend/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery.countup.min.js') }}"></script>
    <!--add row js-->
    <script src="{{ asset('public/frontend/js/add_row_custon.js') }}"></script>
    <!--multiple-image-video js-->
    <script src="{{ asset('public/frontend/js/multiple-image-video.js') }}"></script>
    <!--sticky sidebar js-->
    <script src="{{ asset('public/frontend/js/sticky_sidebar.js') }}"></script>
    <!--Toaster Notification Js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!--price ranger js-->
    <script src="{{ asset('public/frontend/js/ranger_jquery-ui.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/ranger_slider.js') }}"></script>
    <!--isotope js-->
    <script src="{{ asset('public/frontend/js/isotope.pkgd.min.js') }}"></script>
    <!--venobox js-->
    <script src="{{ asset('public/frontend/js/venobox.min.js') }}"></script>
    <!--classycountdown js-->
    <script src="{{ asset('public/frontend/js/jquery.classycountdown.j') }}s"></script>

    <!--main/custom js-->
    <script src="{{ asset('public/frontend/js/main.js') }}"></script>


    @stack('add-js')

    // Toaster Notification
    {!! Toastr::message() !!}

    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                Toastr.error("{!! $error !!}");
            @endforeach
        @endif
    
        // Ajax Setup
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
