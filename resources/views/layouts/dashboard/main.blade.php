<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v4.2.1
* @link https://coreui.io
* Copyright (c) 2022 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="{{ config('abbas.app_name') }}">
    <meta name="author" content="{{ config('abbas.app_name') }}">
    <meta name="keyword" content="{{ config('abbas.app_name') }}">
    <title>{{ config('abbas.app_name') }}</title>
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon/logo.jpg') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon/logo.jpg') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon/logo.jpg') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/logo.jpg') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon/logo.jpg') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon/logo.jpg') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon/logo.jpg') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon/logo.jpg') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/logo.jpg') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon/logo.jpg') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/logo.jpg') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/logo.jpg') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/logo.jpg') }}">
    <link rel="manifest" href="{{ asset('favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{ asset('vendors/simplebar/css/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendors/simplebar.css') }}">
    <!-- Main styles for this application-->
    <link href="{{ asset('assets/css/coreui-style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/examples.min.css') }}" rel="stylesheet">
</head>
<body>
@if (auth()->check())
    @include('layouts.dashboard.partials.student-sidebar')
@endif

@if (auth('web_admins')->check())
    @include('layouts.dashboard.partials.admin-sidebar')
@endif

<div class="wrapper d-flex flex-column min-vh-100 bg-light">
    @if (auth()->check())
        @include('layouts.dashboard.partials.student-header')
    @endif

    @if (auth('web_admins')->check())
        @include('layouts.dashboard.partials.admin-header')
    @endif

    @yield('main-content')

    @include('layouts.dashboard.partials.footer')
</div>

<!-- CoreUI and necessary plugins-->
<script src="{{ asset('vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
<script src="{{ asset('vendors/simplebar/js/simplebar.min.js') }}"></script>
<script>
</script>

</body>
</html>
