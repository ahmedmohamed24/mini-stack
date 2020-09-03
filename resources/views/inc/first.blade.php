<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- google sign in --}}
        <meta name="google-signin-client_id" content="{{ env('GOOGLE_CLIENT_ID') }}">
        <title>@yield('title')</title>
        {{--for checking the adblock--}}
        <script>let isAdBlockActive = true;</script>
        <script src="{{  asset('assets/js/prebid-ads.js') }}"></script>
        <script>
            if (isAdBlockActive) {
                window.stop();
                alert("Please Stop your adblock to continue browsing ");
            }
        </script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('assets/css/tailwind.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
        @livewireStyles
        @livewireScripts
        @yield('styles')
        <script src="{{ asset('assets/js/app.js') }}"></script>

    </head>
    <body>
