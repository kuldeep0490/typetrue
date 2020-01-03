<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Get the best price on life insurance for type two diabetics."/>
    <link rel="manifest" href="/manifest.json">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    @yield('header')
    
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window,document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '626263161104702'); 
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" src="https://www.facebook.com/tr?id=626263161104702&ev=PageView&noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->
</head>
<body>
    <div id="app">
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <a href="{{ url('/') }}">@include('assets.logo_v2')</a>
                    </div>
                </div>
            </div>
        </div>

        @yield('content')

        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center footer-logo">
                        <a href="{{ url('/') }}">@include('assets.logoWhite')</a>
                    </div>

                    <div class="col-6 col-sm-2 footer-social d-none">
                        <a href="">@include('assets.facebook')</a>
                        <a href="">@include('assets.twitter')</a>
                        <a href="">@include('assets.linkedin')</a>
                    </div>

                    <div class="col-6 col-sm-5 footer-contact text-left d-none">
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
