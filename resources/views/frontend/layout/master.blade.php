

@include('frontend.include.css')

<body>

    <!--============================
                HEADER START
    ==============================-->
    @include('frontend.include.header')


       <!--============================
              BODY CONTENT START
       ==============================-->

                @yield('body-content')

        <!--============================
              BODY CONTENT END
       ==============================-->



    <!--============================
           FOOTER PART START
    ==============================-->
    @include('frontend.include.footer')


    <!--============================
        SCROLL BUTTON & SCRIPT TAG
    ==============================-->
    @include('frontend.include.script')


</body>

</html>