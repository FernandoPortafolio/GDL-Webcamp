@extends('layouts.site')

@section('content')
    <div class="seccion contenedor">
        <h2 class="separador justify-center">Calendario de Eventos</h2>

        <div class="calendario">
            @foreach ($calendario as $fecha => $eventos)
                <h3>
                    <i class="fa fa-calendar"></i> {{ strftime('%A %d, de %B del %Y', strtotime($fecha)) }}
                </h3>
                <div class="flex-resp space-unset">
                    @foreach ($eventos as $evento)
                        <div class="dia justify-center">
                            <p class="titulo">{{ $evento->evento }}</p>
                            <p class="hora">
                                <i
                                    class="fa fa-clock-o"
                                    aria-hidden="true"
                                ></i>
                                {{ $evento->fecha }} {{ $evento->hora }}
                            </p>
                            <p>
                                <i
                                    class="fa {{ $evento->categoria->icono }}"
                                    aria-hidden="true"
                                ></i>
                                {{ $evento->categoria->categoria }}
                            </p>
                            <p class="hora">
                                <i
                                    class="fa fa-user"
                                    aria-hidden="true"
                                ></i>
                                {{ $evento->invitado->nombre }} {{ $evento->invitado->apellido }}
                            </p>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endsection
