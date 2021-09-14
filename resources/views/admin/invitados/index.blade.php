@extends('layouts.admin')

@section('titles')
    <h1>Lista de Invitados</h1>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Administra los invitados desde este panel</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table
                            id="tabla"
                            class="table table-bordered table-striped"
                        >
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Foto</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invitados as $invitado)
                                    <tr
                                        class="text-center"
                                        id="tr-{{ $invitado->id }}"
                                    >
                                        <td>{{ $invitado->nombre }} {{ $invitado->apellido }}</td>
                                        <td>{{ $invitado->descripcion }}</td>
                                        <td><img
                                                src="/storage/{{ $invitado->url_foto }}"
                                                alt="{{ $invitado->url_foto }}"
                                                width="150"
                                            ></td>
                                        <td>
                                            <a
                                                href="{{ route('invitados.edit', ['invitado' => $invitado->id]) }}"
                                                class="btn bg-orange btn-flat m-lg-2"
                                            >
                                                <i class="fa fa-pen text-white"></i>
                                            </a>
                                            <eliminar-invitado :invitado-id="{{ $invitado->id }}"></eliminar-invitado>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Foto</th>
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
