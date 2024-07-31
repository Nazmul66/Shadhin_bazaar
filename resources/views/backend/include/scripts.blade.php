 <!-- JAVASCRIPT -->
 <script src="{{ asset('/public/backend/assets/libs/jquery/jquery.min.js') }}"></script>
 <script src="{{ asset('/public/backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 <script src="{{ asset('/public/backend/assets/libs/metismenu/metisMenu.min.js') }}"></script>
 <script src="{{ asset('/public/backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
 <script src="{{ asset('/public/backend/assets/libs/node-waves/waves.min.js') }}"></script>
 <script src="{{ asset('/public/backend/assets/libs/feather-icons/feather.min.js') }}"></script>
 <!-- pace js -->
 <script src="{{ asset('/public/backend/assets/libs/pace-js/pace.min.js') }}"></script>

 {{-- <!-- apexcharts -->
 <script src="{{ asset('/public/backend/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

 <!-- Plugins js-->
 <script src="{{ asset('/public/backend/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
 <script src="{{ asset('/public/backend/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}"></script>
 <!-- dashboard init -->
 <script src="{{ asset('/public/backend/assets/js/pages/dashboard.init.js') }}"></script> --}}

 <script src="{{ asset('/public/backend/assets/js/app.js') }}"></script>

@stack('add-script')

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>