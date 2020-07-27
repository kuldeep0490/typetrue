<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Get the best price on life insurance for type two diabetics."/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ mix('css/main.css') }}" rel="stylesheet">

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
    <div id="app" class="tw-min-h-screen">
        <div class="header-container tw-container tw-absolute tw-mx-auto tw-flex tw-justify-between tw-items-center tw-py-4 tw-px-4 md:tw-px-0">
            <a href="{{ url('/') }}" class="tw-w-1/4 tw-mb-4 sm:tw-mb-0 sm:tw-w-1/4">
                <img src="{{ url('images/logo.png') }}" alt="Type True">
            </a>

            <div class="tw-flex tw-items-center">
                <div class="tw-flex tw-flex-col tw-items-end tw-text-xs sm:tw-text-xl tw-font-semibold">
                    <span class="text-blue">PHONE: 1-877-TYPE-TRU</span>
                    <span class="text-blue">1-877-897-3878</span>
                </div>

                <div class="tw-ml-4 tw-z-20">
                    <burger-menu right noOverlay disableOutsideClick :closeOnNavigation="true">
                        <a id="home" href="{{ url('/') }}">
                            <span>Home</span>
                        </a>

                        <a id="home" href="{{ url('/') }}">
                            <span>Contact Us</span>
                        </a>

                        <a id="home" href="{{ url('/') }}">
                            <span>Privacy Policy</span>
                        </a>

                        <a id="home" href="{{ url('/') }}">
                            <span>Terms of Use</span>
                        </a>
                    </burger-menu>
                </div>
            </div>
        </div>

        @yield('banner')

        @yield('content')

        @yield('footer')
    </div>

    <script src="{{ mix('js/main.js') }}"></script>
</body>
</html>
