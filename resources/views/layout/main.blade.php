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
        <div class="tw-w-full tw-absolute">
            <div class="tw-container tw-mx-auto tw-flex tw-justify-between tw-items-center tw-p-4">
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
                            <a id="home" href="{{ url('/homepage') }}">
                                <span>Home</span>
                            </a>

                            <a id="home" href="{{ url('/contact-us') }}">
                                <span>Contact Us</span>
                            </a>

                            <a id="home" href="{{ url('/privacy-policy') }}">
                                <span>Privacy Policy</span>
                            </a>

                            <a id="home" href="{{ url('/terms-of-use') }}">
                                <span>Terms of Use</span>
                            </a>
                        </burger-menu>
                    </div>
                </div>
            </div>
        </div>

        @yield('banner')

        @yield('content')

        <div class="footer bg-blue tw-py-6">
            <div class="tw-container tw-mx-auto tw-px-4">
                <div class="tw-text-center">
                    <h5 class="tw-text-center tw-text-white tw-text-2xl sm:tw-text-4xl tw-font-semibold tw-mb-4">Contact Us</h5>

                    <p class="tw-text-white tw-mb-4">Phone: 1-877-TYPE-TRU</p>

                    <address class="tw-text-white tw-mb-4">
                        Suite 706, 1 Concorde Gate<br>
                        North York, ON<br>
                        M3C3N6
                    </address>

                    <p class="tw-text-white"><a href="mailto:info@typetrue.ca">info@typetrue.ca</a></p>
                </div>
            </div>
        </div>

        <div class="footer bottom-footer bg-blue tw-py-6 tw-border-t ">
            <div class="tw-container tw-mx-auto tw-px-4">
                <div class="tw-text-center">
                    <p class="tw-text-white tw-mb-4">
                        <a href="{{ url('/privacy-policy') }}">Privacy Policy</a> | <a href="{{ url('/terms-of-use') }}">Terms of Use</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ mix('js/main.js') }}"></script>
</body>
</html>
