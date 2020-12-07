<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/vnd.microsoft.icon" href="http://gumac.vn/Content/Image/favicon.ico">
    <link rel="stylesheet" href="{{ asset('css/user/bootstrap/bootstrap-3.3.2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/bootstrap/bootstrap-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/fontAwesome/font-awesome-5.12.0.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owlcarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owlcarousel/assets/owl.theme.default.min.css') }}">
    @yield('stylesheet')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('css/user/style.css') }}">
    @yield('meta')
</head>
<body>
@include('page.layout.header')
@yield('body')
@include('page.layout.footer')
<script src="{{asset('owlcarousel/jquery.min.js')}}"></script>
<script src="{{ asset('owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/bootstrap/bootstrap-3.3.2.min.js') }}"></script>
{{--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>--}}
{{--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>--}}
<script src="{{ asset('js/lib.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/index.js') }}"></script>
@yield('script')
</body>
</html>
