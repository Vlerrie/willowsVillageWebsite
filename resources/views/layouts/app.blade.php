<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Willows Village') }}</title>
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/js/autocomplete.js"></script>
    <link href="/custom.css" rel="stylesheet">
    <link href="/fontawesome/css/fontawesome.css" rel="stylesheet">
    {{--    <link href="/fontawesome/css/brands.css" rel="stylesheet">--}}
    <link href="/fontawesome/css/solid.css" rel="stylesheet">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-JNQJ469P10"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-JNQJ469P10');
    </script>
</head>
<body>
@include('layouts.navigation')
@include('layouts.toasts')

<div class="container-fluid px-0 pt-5">
    @yield('content')
</div>

<div class="container-fluid col-12 px-4 bg-dark mt-0 py-5" id="footer">
    <div class="row justify-content-center mb-5">
        <div class="col-md-6 text-center">
            <a class="link-light mx-2" href="/privacy-policy">Privacy Policy</a>
            <a class="link-light mx-2" href="/terms">Terms and Conditions</a>
            {{-- <a class="link-light mx-2" href="/constitution">Constitution</a> --}}
        </div>
    </div>
    <div class="row align-items-center">
        <div class="col-12 text-center">
            <p class="text-center text-muted my-0">Copyright Willows Security Village, All rights reserved</p>
        </div>
    </div>
</div>
</div>
@yield('scripts')

</body>
</html>
