@extends('layouts.site')

@section('styles')
    {{-- Ligthbox --}}
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css"
        integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
@endsection

@section('content')
    <section class="contenedor seccion">
        <h2 class="justify-center separador">La Mejor Conferencia de diseño web en español</h2>
        <p class="justify-center">
            Proident id fugiat aute reprehenderit dolore aliquip laborum consequat laboris. Sint laboris proident
            occaecat proident fugiat consectetur proident et sint velit ad aliquip veniam reprehenderit. Reprehenderit
            cillum ipsum irure qui laboris elit qui. Dolore cillum sit sit in elit. In do nulla sit eu in ex officia
            proident esse. Exercitation ex reprehenderit dolor dolor consequat in in non qui sit. Proident voluptate
            elit laboris ipsum quis minim labore dolore.
        </p>
    </section>

    <section class="seccion contenedor">
        <h2 class="separador justify-center">Galería de Fotos</h2>
        <div class="galeria">
            <a
                href="img/galeria/01.jpg"
                data-lightbox="galeria"
            >
                <img src="img/galeria/thumbs/01.jpg">
            </a>
            <a
                href="img/galeria/02.jpg"
                data-lightbox="galeria"
            >
                <img src="img/galeria/thumbs/02.jpg">
            </a>
            <a
                href="img/galeria/03.jpg"
                data-lightbox="galeria"
            >
                <img src="img/galeria/thumbs/03.jpg">
            </a>
            <a
                href="img/galeria/04.jpg"
                data-lightbox="galeria"
            >
                <img src="img/galeria/thumbs/04.jpg">
            </a>
            <a
                href="img/galeria/05.jpg"
                data-lightbox="galeria"
            >
                <img src="img/galeria/thumbs/05.jpg">
            </a>
            <a
                href="img/galeria/06.jpg"
                data-lightbox="galeria"
            >
                <img src="img/galeria/thumbs/06.jpg">
            </a>
            <a
                href="img/galeria/07.jpg"
                data-lightbox="galeria"
            >
                <img src="img/galeria/thumbs/07.jpg">
            </a>
            <a
                href="img/galeria/08.jpg"
                data-lightbox="galeria"
            >
                <img src="img/galeria/thumbs/08.jpg">
            </a>
            <a
                href="img/galeria/09.jpg"
                data-lightbox="galeria"
            >
                <img src="img/galeria/thumbs/09.jpg">
            </a>
            <a
                href="img/galeria/10.jpg"
                data-lightbox="galeria"
            >
                <img src="img/galeria/thumbs/10.jpg">
            </a>
        </div>
    </section>
@endsection

@section('scripts')
    {{-- Ligthbox --}}
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"
        integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
        defer
    ></script>

    <script defer>
        lightbox.option({
            'resizeDuration': 500,
            'wrapAround': true,
            'alwaysShowNavOnTouchDevices': true,
            'imageFadeDuration': 300,
        })
    </script>
@endsection
