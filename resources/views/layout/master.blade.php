<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Get the best price on life insurance for type two diabetics."/>
    <link rel="manifest" href="/manifest.json">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    @yield('header')
    
</head>
<body>
    <div id="app">
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col">
                        @include('assets.logo')
                    </div>
                </div>
            </div>
        </div>

        @yield('content')

        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-5 footer-logo">
                        @include('assets.logoWhite')
                    </div>

                    <div class="col-6 col-sm-2 footer-social">
                        <a href="">@include('assets.facebook')</a>
                        <a href="">@include('assets.twitter')</a>
                        <a href="">@include('assets.linkedin')</a>
                    </div>

                    <div class="col-6 col-sm-5 footer-contact text-left">
                        <a href="">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TweenMax.min.js"></script> -->
    <script src="{{ mix('js/app.js') }}"></script>

    @yield('footer')
</body>
</html>
