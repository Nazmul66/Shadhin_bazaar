<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">

@stack('add-meta')

<link rel="icon" type="image/png" href="images/favicon.png">


<link rel="stylesheet" href="{{ asset('public/frontend/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/slick.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/jquery.nice-number.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/jquery.calendar.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/add_row_custon.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/mobile_menu.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/jquery.exzoom.css') }}">
<!--Toaster Notification Css-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('public/frontend/css/multiple-image-video.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/ranger_style.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/jquery.classycountdown.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/venobox.min.css') }}">

<link rel="stylesheet" href="{{ asset('public/frontend/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/responsive.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('public/frontend/css/rtl.css') }}">  --}}

@stack('add-css')

{!! getSetting()->facebook_pixel ?? "" !!}