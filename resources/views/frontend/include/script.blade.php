<script type="text/javascript" src="{{ asset('public/frontend/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/frontend/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/frontend/js/swiper-bundle.min.js') }}"></script>
<!--Toaster Notification Js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript" src="{{ asset('public/frontend/js/carousel.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/frontend/js/bootstrap-select.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/frontend/js/lazysize.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/frontend/js/count-down.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/frontend/js/wow.min.js') }}"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script type="text/javascript" src="{{ asset('public/frontend/js/multiple-modal.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/frontend/js/main.js') }}"></script>

<script defer src="https://sibforms.com/forms/end-form/build/main.js"></script>
    

    @stack('add-js')

    {{-- Toaster Notification --}}
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
