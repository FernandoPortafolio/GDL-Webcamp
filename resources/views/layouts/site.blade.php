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
    <script
        src="{{ asset('js/app.js') }}"
        defer
    ></script>
    <!-- Lettering JS -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/lettering.js/0.6.1/jquery.lettering.min.js"
        integrity="sha512-VJ/iYbiu1eJ6yLimfTi65t2R9TFcG5D9X8ZCfbbEFhTfPnKJh8byoKXEawi5ScJZBYL1eiirL1+MczZDx0Tz9Q=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
        defer
    ></script>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Oswald:wght@300;400;700&family=PT+Sans:wght@400;700&display=swap"
        rel="stylesheet"
    >
    <script
        src="https://kit.fontawesome.com/149ef0981c.js"
        crossorigin="anonymous"
    ></script>

    {{-- Normalize --}}
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
        integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />

    <!-- Styles -->
    @yield('styles')
    <link
        href="{{ asset('css/app.css') }}"
        rel="stylesheet"
    >
</head>

<body class="{{ Route::currentRouteName() }}">
    <div id="app">
        <header class="site-header">
            <div class="contenedor contenido-header">
                <nav class="redes-sociales">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-pinterest"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </nav>
                <div class="informacion-evento">
                    <div class="info">
                        <p class="fecha"><i class="far fa-calendar-alt"></i>10-12 Dic</p>
                        <p class="ciudad"><i class="fas fa-map-marker-alt"></i>Guanajuato, MX</p>
                    </div>
                    <div class="nombre-sitio">
                        <a href="{{ Route('index') }}">
                            <h1 class="no-margin">GdlWebcamP</h1>
                        </a>
                        <p class="slogan">La mejor conferencia de <span>diseño web</span></p>
                    </div>
                </div>
            </div>
        </header>

        <div class="barra">
            <div class="contenedor contenido-barra">
                <div class="barra-logo">
                    <div class="imagen">
                        <a href="{{ Route('index') }}"><img
                                src="{{ asset('img/logo.svg') }}"
                                alt="Logo"
                            ></a>
                    </div>

                    <div class="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>

                <div class="navegacion">
                    <nav>
                        <a href="{{ Route('conferencia') }}">Conferencia</a>
                        <a href="{{ Route('calendario') }}">Calendario</a>
                        <a href="{{ Route('invitados') }}">Invitados</a>
                        <a href="{{ Route('reservaciones') }}">Reservaciones</a>
                    </nav>
                </div>
            </div>
        </div>

        <main>
            @yield('content')
        </main>

        <footer class="site-footer">
            <div class="contenedor contenido">
                <div class="footer-info">
                    <h3 class='footer-h3'>Sobre <span>GdlWebcamp</span></h3>
                    <p>Proident ipsum incididunt fugiat cillum Lorem adipisicing mollit magna occaecat laboris
                        dolor ipsum. Duis ut ullamco magna cillum. Nulla laboris nostrud pariatur adipisicing proident
                        officia excepteur quis tempor dolore quis labore eu. Reprehenderit cillum duis duis aliquip
                        irure
                        tempor tempor aliquip. </p>
                </div>
                <div class="ultimos-tweets">
                    <h3 class='footer-h3'>Últimos <span>Tweets</span></h3>
                    <p>Duis consequat proident <span>#aute</span> aliqua amet cillum.</p>
                    <p>Voluptate amet est <span>#ipsum</span> excepteur in consectetur velit irure in sit nulla.</p>
                    <p>Excepteur ut dolore aliqua duis laborum aute <span>#exercitation</span> ea mollit.</p>
                </div>
                <div class="menu">
                    <h3 class='footer-h3'>Redes <span>Sociales</span></h3>
                    <nav class="redes-sociales">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-pinterest"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </nav>
                </div>
            </div>
            <p class="copyrigth">Todos los Derechos Reservados <span>GdlWebcamp</span> 2020 &copy;</p>
        </footer>
    </div>

    @yield('scripts')

</body>

</html>
