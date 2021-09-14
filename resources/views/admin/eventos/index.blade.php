@extends('layouts.admin')


@section('titles')
    <h1>Lista de Eventos</h1>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Administra los eventos desde este panel</h3>
                    </div>

                    <div class="card-body">
                        <table
                            id="tabla"
                            class="table table-bordered table-striped"
                        >
                            <thead>
                                <tr>
                                    <th>Evento</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Categoria</th>
                                    <th>Invitado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($eventos as $evento)
                                    <tr id="tr-{{ $evento->id }}">
                                        <td>{{ $evento->evento }}</td>
                                        <td>{{ $evento->fecha }}</td>
                                        <td>{{ $evento->hora }}</td>
                                        <td>{{ $evento->categoria->categoria }}</td>
                                        <td class="text-center">
                                            <p class="m-0 p-0">
                                                {{ $evento->invitado->nombre }}
                                                {{ $evento->invitado->apellido }}</p>
                                            <img
                                                src="/storage/{{ $evento->invitado->url_foto }}"
                                                class="img-thumbnail"
                                                width="130"
                                            >
                                        </td>
                                        <td class="text-center">
                                            <a
                                                href="{{ route('evento.edit', ['evento' => $evento->id]) }}"
                                                class="btn bg-orange btn-flat m-lg-2"
                                            >
                                                <i class="fa fa-pen text-white"></i>
                                            </a>
                                            <eliminar-evento :evento-id="{{ $evento->id }}"></eliminar-evento>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>Evento</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Categoria</th>
                                    <th>Invitado</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
