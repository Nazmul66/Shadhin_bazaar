
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>
        @stack('meta-title')
    </title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/public/backend/assets/images/favicon.ico') }}">

    <!-- plugin css -->
    <link href="{{ asset('/public/backend/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />

    <!-- preloader css -->
    <link rel="stylesheet" href="{{ asset('/public/backend/assets/css/preloader.min.css') }}" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('/public/backend/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('/public/backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('/public/backend/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <!-- Custom Css-->
    <link href="{{ asset('/public/backend/assets/css/custom.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    
    @stack('style-css')
</head>