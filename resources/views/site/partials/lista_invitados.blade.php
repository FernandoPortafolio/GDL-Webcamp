<section class="seccion invitados contenedor">
    <h2 class="justify-center separador">Nuestros Invitados</h2>

    <ul class="lista-invitados">
        @foreach ($invitados as $invitado)
            <li class="invitado">
                <!-- La etiqueta a debe tener la misma clase que el popup con el html 
                para que colorbox haga la relacion al activar el plugin con jquery -->
                <a
                    href="#invitado{{ $invitado->id }}"
                    class="descripcion"
                >
                    <img
                        src="{{ asset("storage/$invitado->url_foto") }}"
                        alt="{{ $invitado->nombre }}"
                    >
                </a>
                <p>{{ $invitado->nombre }} {{ $invitado->apellido }}</p>
            </li>

            <div class="display-none">
                <div
                    class="descripcion"
                    id="invitado{{ $invitado->id }}"
                >
                    <h2>Invitado {{ $invitado->nombre }} {{ $invitado->apellido }}</h2>
                    <img
                        src="{{ asset("img/invitados/$invitado->url_foto") }}"
                        alt="{{ $invitado->nombre }}"
                    >
                    <p>{{ $invitado->descripcion }}</p>
                    <nav class="redes-sociales">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </nav>
                </div>
            </div>
        @endforeach
    </ul>

</section>
