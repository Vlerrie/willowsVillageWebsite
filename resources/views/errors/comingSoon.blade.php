<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Willows Village') }} - @yield('title')</title>

    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    {{--    <noscript><link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css"></noscript>--}}

    <script defer src="/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script defer src="/js/autocomplete.js"></script>

    <link rel="preload" href="/custom.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="/custom.css"></noscript>

    <link rel="preload" href="/fontawesome/css/fontawesome.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="/fontawesome/css/fontawesome.min.css"></noscript>

    <link rel="preload" href="/fontawesome/css/solid.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="/fontawesome/css/solid.min.css"></noscript>

    <script defer src="https://www.googletagmanager.com/gtag/js?id=G-JNQJ469P10"></script>
    <script defer>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-JNQJ469P10');
    </script>
</head>
<body>
<div class="container-fluid px-0 pt-5 bg-light min-vh-100" style="border: solid #007F3A 15px">
    <div class="row m-0 justify-content-center">
        <div class="col-lg-3 col-md-4 pt-5 pb-5">
            @include('layouts.logo')
        </div>
    </div>
    <div class="row m-0 justify-content-center">
        <div class="col-12 mt-5">
            <h1 class="display-1 text-center">Coming Soon!</h1>
        </div>
    </div>
</div>

</body>
</html>
