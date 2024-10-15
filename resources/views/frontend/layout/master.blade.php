
<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.include.css')
</head>

<body>


       @include('frontend.include.header')


             @yield('body-content')


       @include('frontend.include.footer')




    @include('frontend.include.script')


</body>

</html>