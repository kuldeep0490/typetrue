<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Get the best price on life insurance for type two diabetics."/>

    <link rel="canonical" href="https://typetrue.ca" />

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="60x60" href="{{ url('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ url('site.webmanifest"') }}>
    <link rel="mask-icon" href="{{ url('safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ mix('css/main.css') }}" rel="stylesheet">

    @yield('header')

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-MZBHRFP');</script>
    <!-- End Google Tag Manager -->
    
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
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MZBHRFP"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="app" class="tw-min-h-screen tw-flex tw-flex-col">
        <div class="tw-flex-1">
            <div class="tw-w-full tw-absolute">
                <div class="tw-container tw-mx-auto tw-flex tw-justify-between tw-items-center tw-p-4">
                    <a href="{{ url('/') }}" class="tw-w-1/4 tw-mb-4 sm:tw-mb-0 sm:tw-w-1/4">
                        <img src="{{ url('images/logo.png') }}" alt="Type True">
                    </a>

                    <div class="tw-flex tw-items-center">
                        <div class="tw-flex tw-flex-col">
                            <div class="tw-flex tw-text-xs sm:tw-text-xl tw-font-semibold">
                                <span>PHONE:</span>

                                <div class="tw-flex tw-flex-col tw-ml-2">
                                    <span class="text-blue"><a href="tel:+18778973878" class="hover:tw-underline">1-877-897-3878</a></span>
                                </div>
                            </div>

                            @unless (Request::is('contact-us'))
                                <a plain class="custom-button-blue btn-sm tw-hidden md:tw-inline-block tw-text-center" href="{{ url('/contact-us') }}">
                                    Request A Call Back
                                </a>
                            @endunless
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

                @unless (Request::is('contact-us'))
                    <div class="tw-text-right tw-container tw-mx-auto tw-px-4">
                        <a plain class="custom-button-blue btn-sm tw-inline-block md:tw-hidden tw-text-center" href="{{ url('/contact-us') }}">
                            Request A Call Back
                        </a>
                    </div>
                @endunless
            </div>

            @yield('banner')

            @yield('content')
        </div>

        <div>
            <div class="footer bg-blue tw-py-6">
                <div class="tw-container tw-mx-auto tw-px-4">
                    <div class="tw-text-center">
                        <h5 class="tw-text-center tw-text-white tw-text-2xl sm:tw-text-4xl tw-font-semibold tw-mb-4">
                            <a href="{{ url('/contact-us') }}" class="hover:tw-underline">Contact Us</a>
                        </h5>

                        <p class="tw-text-white tw-mb-4"><a href="tel:+18778973878" class="hover:tw-underline">Phone: 1-877-TYPE-TRU</a></p>

                        <address class="tw-text-white tw-mb-4">
                            Suite 706, 1 Concorde Gate<br>
                            North York, ON<br>
                            M3C3N6
                        </address>

                        <p class="tw-text-white"><a href="mailto:info@typetrue.ca" class="hover:tw-underline">info@typetrue.ca</a></p>
                    </div>
                </div>
            </div>

            <div class="footer bottom-footer bg-blue tw-py-6 tw-border-t ">
                <div class="tw-container tw-mx-auto tw-px-4">
                    <div class="tw-text-center">
                        <p class="tw-text-white tw-mb-4">
                            <a href="{{ url('/privacy-policy') }}" class="hover:tw-underline">Privacy Policy</a> | <a href="{{ url('/terms-of-use') }}" class="hover:tw-underline">Terms of Use</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ mix('js/main.js') }}"></script>
</body>
</html>
