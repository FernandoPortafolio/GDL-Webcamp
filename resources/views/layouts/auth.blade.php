<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >
    <!-- CSRF Token -->
    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- Font Awesome --}}
    <script
        src="https://kit.fontawesome.com/149ef0981c.js"
        crossorigin="anonymous"
    ></script>
    @yield('scripts')

    <!-- Fonts -->
    {{-- Google Font --}}
    <link
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700"
        rel="stylesheet"
    >

    <!-- Styles -->
    {{-- Admin LTE Styles --}}
    <link
        href="{{ asset('plugins/adminlte/adminlte.min.css') }}"
        rel="stylesheet"
    >
    @yield('styles')

</head>

<body class="@yield('body-class')">
    <div id="app">
        @yield('content')
    </div>
</body>
