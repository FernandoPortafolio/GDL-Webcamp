@extends('layouts.site')

@section('styles')
    <link
        rel="stylesheet"
        href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
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

    {{-- Programa del evento --}}
    <section class="seccion programa">
        <div class="contenedor-video">
            <video
                autoplay
                loop
                poster="img/bg-talleres.jpg"
            >
                <source
                    src="video/video.mp4"
                    type="video/mp4"
                >
                <source
                    src="video/video.webm"
                    type="video/webm"
                >
                <source
                    src="video/video.ogv"
                    type="video/ogv"
                >
            </video>
        </div>

        <programa-evento
            :categorias="{{ json_encode($categorias) }}"
            :eventos="{{ json_encode($eventos) }}"
        />
    </section>

    {{-- Seccion de invitados --}}
    @include('site.partials.lista_invitados')

    {{-- Estadisticas --}}
    <section class="parallax contador center-content">
        <div class="contenedor">
            <ul class="resumen-evento">
                <li>
                    <p class="numero"></p>
                    <p>Invitados</p>
                </li>
                <li>
                    <p class="numero"></p>
                    <p>Talleres</p>
                </li>

                <li>
                    <p class="numero"></p>
                    <p>Días</p>
                </li>

                <li>
                    <p class="numero"></p>
                    <p>Conferencias</p>
                </li>
            </ul>
        </div>
    </section>

    {{-- Seccion de precios --}}
    <section class="precios seccion">
        <h2 class="justify-center separador">Precios</h2>
        <div class="contenedor">
            <ul class="lista-precios">
                <li class="tabla-precio">
                    <h3>Pase por día</h3>
                    <p class="numero">$30</p>
                    <ul>
                        <li>Bocadillos Gratis</li>
                        <li>Todas las conferencias</li>
                        <li>Todos los talleres</li>
                    </ul>
                    <a
                        href="#"
                        class="btn btn-primario hollow"
                    >Comprar</a>
                </li>

                <li class="tabla-precio">
                    <h3>Todos los días</h3>
                    <p class="numero">$50</p>
                    <ul>
                        <li>Bocadillos Gratis</li>
                        <li>Todas las conferencias</li>
                        <li>Todos los talleres</li>
                    </ul>
                    <a
                        href="#"
                        class="btn btn-primario"
                    >Comprar</a>
                </li>

                <li class="tabla-precio">
                    <h3>Pase por 2 días</h3>
                    <p class="numero">$45</p>
                    <ul>
                        <li>Bocadillos Gratis</li>
                        <li>Todas las conferencias</li>
                        <li>Todos los talleres</li>
                    </ul>
                    <a
                        href="#"
                        class="btn btn-primario hollow"
                    >Comprar</a>
                </li>
            </ul>
        </div>
    </section>

    {{-- Mapas --}}
    <div
        id="map"
        class="map"
    ></div>

    {{-- Testimoniales --}}
    <section class="seccion contenedor">
        <h2 class="justify-center separador">Testimoniales</h2>
        <div class="testimoniales">
            <blockquote class="testimonial">
                <p>Cupidatat eiusmod cillum reprehenderit exercitation qui anim aute. Laborum irure ipsum laborum id
                    ipsum nisi est eu reprehenderit anim. Voluptate ipsum anim dolore consectetur. Amet anim anim
                </p>
                <footer>
                    <img
                        src="img/testimonial.jpg"
                        alt="imagen Testimonial"
                    >
                    <cite>Oswaldo Aponte Escobedo<span>Diseñador en @prisma</span>
                    </cite>
                </footer>
            </blockquote>

            <blockquote class="testimonial">
                <p>Cupidatat eiusmod cillum reprehenderit exercitation qui anim aute. Laborum irure ipsum laborum id
                    ipsum nisi est eu reprehenderit anim. Voluptate ipsum anim dolore consectetur. Amet anim anim
                </p>
                <footer>
                    <img
                        src="img/testimonial.jpg"
                        alt="imagen Testimonial"
                    >
                    <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
                </footer>
            </blockquote>

            <blockquote class="testimonial">
                <p>Cupidatat eiusmod cillum reprehenderit exercitation qui anim aute. Laborum irure ipsum laborum id
                    ipsum nisi est eu reprehenderit anim. Voluptate ipsum anim dolore consectetur. Amet anim anim
                </p>
                <footer>
                    <img
                        src="img/testimonial.jpg"
                        alt="imagen Testimonial"
                    >
                    <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
                </footer>
            </blockquote>
        </div>
    </section>

    {{-- Call To Action --}}
    <div class="newsletter parallax seccion center-content">
        <div class="contenido contenedor">
            <p>Registrate al Newsletter</p>
            <h3>GdlWebcamp</h3>
            <a
                href="#mc_embed_signup"
                class="btn-newsletter btn btn-white btn-transparent"
            >Registro</a>
        </div>
    </div>

    {{-- Contador Regresivo --}}
    <div class="seccion">
        <div class="contenedor">
            <h2 class="justify-center separador">Faltan</h2>
            <ul class="cuenta-regresiva">
                <li>
                    <p
                        class="numero"
                        id="dias"
                    ></p>
                    <p>Días</p>
                </li>
                <li>
                    <p
                        class="numero"
                        id="horas"
                    ></p>
                    <p>horas</p>
                </li>

                <li>
                    <p
                        class="numero"
                        id="minutos"
                    ></p>
                    <p>Minutos</p>
                </li>

                <li>
                    <p
                        class="numero"
                        id="segundos"
                    ></p>
                    <p>Segundos</p>
                </li>
            </ul>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- Jquery Colorbox --}}
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.6.4/jquery.colorbox-min.js"
        integrity="sha512-DAVSi/Ovew9ZRpBgHs6hJ+EMdj1fVKE+csL7mdf9v7tMbzM1i4c/jAvHE8AhcKYazlFl7M8guWuO3lDNzIA48A=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
        defer
    ></script>
    {{-- JQuery Animate Number --}}
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery-animateNumber/0.0.14/jquery.animateNumber.min.js"
        integrity="sha512-WY7Piz2TwYjkLlgxw9DONwf5ixUOBnL3Go+FSdqRxhKlOqx9F+ee/JsablX84YBPLQzUPJsZvV88s8YOJ4S/UA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
        defer
    ></script>
    {{-- Leaflet --}}
    <script
        src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
        defer
    ></script>
    {{-- JQuery Countdown --}}
    <script
        src="https://cdn.jsdelivr.net/npm/jquery-countdown@2.2.0/dist/jquery.countdown.min.js"
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
        defer
    ></script>

@endsection
