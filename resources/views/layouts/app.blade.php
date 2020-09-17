<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Get the best price on life insurance for type two diabetics."/>

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
</head>
<body>
<div id="app" class="tw-min-h-screen tw-flex tw-flex-col">
    <div class="tw-flex-1">
        <div class="tw-w-full tw-absolute">
            <div class="tw-container tw-mx-auto tw-flex tw-justify-between tw-items-center tw-p-4">
                <a href="{{ url('/') }}" class="tw-w-1/4 tw-mb-4 sm:tw-mb-0 sm:tw-w-1/4">
                    <img src="{{ url('images/logo.png') }}" alt="Type True">
                </a>
            </div>
        </div>

        @yield('banner')

        @yield('content')
    </div>
</div>

<script src="{{ mix('js/main.js') }}"></script>
</body>
</html>
