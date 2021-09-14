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

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700"
        rel="stylesheet"
    >

    <!-- Styles -->
    @yield('styles')
    {{-- Admin LTE Styles --}}
    <link
        href="{{ asset('plugins/adminlte/adminlte.min.css') }}"
        rel="stylesheet"
    >
    <link
        rel="stylesheet"
        href="{{ asset('css/admin.css') }}"
    >

    <!-- Scripts -->
    <script
        src="{{ asset('/js/admin.js') }}"
        defer
    ></script>
    {{-- Font Awesome --}}
    <script
        src="https://kit.fontawesome.com/149ef0981c.js"
        crossorigin="anonymous"
        async
    ></script>
    {{-- Admin LTE --}}
    <script
        src="{{ asset('/plugins/adminlte/adminlte.min.js') }}"
        defer
    ></script>
    {{-- SweetAlert2 --}}
    <script
        src="//cdn.jsdelivr.net/npm/sweetalert2@11"
        defer
    ></script>
    {{-- Datatables --}}
    <script
        src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"
        defer
    ></script>
    <script
        src="{{ asset('plugins/datatables/dataTables.bootstrap4.min.js') }}"
        defer
    ></script>
    <script
        src="{{ asset('plugins/datatables/dataTables.responsive.min.js') }}"
        defer
    ></script>
    <script
        src="{{ asset('plugins/datatables/responsive.bootstrap4.min.js') }}"
        defer
    ></script>
    <link
        rel="stylesheet"
        href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css') }}"
    >
    <link
        rel="stylesheet"
        href="{{ asset('plugins/datatables/responsive.bootstrap4.min.css') }}"
    >
    @yield('scripts')

</head>

<body class="hold-transition sidebar-mini">
    <div id="app">
        <!-- Site wrapper -->
        <div class="wrapper">
            @include('layouts.partials.navbar')
            @include('layouts.partials.drawer')

            <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                @yield('titles')
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content">
                    @yield('content')
                </section>
            </div>

            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>Version</b> 3.0.5
                </div>
                <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
                Todos los Derechos Reservados.
            </footer>
        </div>
    </div>
</body>
