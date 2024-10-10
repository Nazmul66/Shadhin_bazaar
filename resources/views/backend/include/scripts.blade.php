 <!-- JAVASCRIPT -->
 <script src="{{ asset('/public/backend/assets/libs/jquery/jquery.min.js') }}"></script>
 <script src="{{ asset('/public/backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

 <script src="{{ asset('/public/backend/assets/libs/metismenu/metisMenu.min.js') }}"></script>

 <script src="{{ asset('/public/backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
 <script src="{{ asset('/public/backend/assets/libs/node-waves/waves.min.js') }}"></script>
 <script src="{{ asset('/public/backend/assets/libs/feather-icons/feather.min.js') }}"></script>
 <!-- pace js -->
 {{-- <script src="{{ asset('/public/backend/assets/libs/pace-js/pace.min.js') }}"></script> --}}
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 {{-- <!-- apexcharts -->
 <script src="{{ asset('/public/backend/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

 <!-- Plugins js-->
 <script src="{{ asset('/public/backend/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>

 <script src="{{ asset('/public/backend/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}"></script>

 <!-- dashboard init -->
 <script src="{{ asset('/public/backend/assets/js/pages/dashboard.init.js') }}"></script> --}}

 <!-- toaster Js plugins  -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

 <script src="{{ asset('/public/backend/assets/js/app.js') }}"></script>

@stack('add-script')


<script type="text/javascript">
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
        }
</script>

<script type="text/javascript">
    @if ( Session::has('message') )

        var type = "{{ Session::get('alert-type') }}";

        switch(type){
            case "info":
               toastr.info("{{ Session::get('message') }}");
            break; 

            case "success":
               toastr.success("{{ Session::get('message') }}");
            break;
            
            case "warning":
               toastr.warning("{{ Session::get('message') }}");
            break;

            case "error":
               toastr.error("{{ Session::get('message') }}");
            break;
        }
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{!! $error !!}");
        @endforeach
    @endif
</script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
