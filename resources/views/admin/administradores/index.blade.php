@extends('layouts.admin')

@section('titles')
    <h1>Lista de Administradores</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Administra los usuarios desde este panel</h3>
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
                                <th>Email</th>
                                <th>Imagen</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $admin)
                                <tr id="tr-{{ $admin->id }}">
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>
                                        <img
                                            src="/storage/{{ $admin->image }}"
                                            alt="Imagen del usuario"
                                            width="100"
                                        >
                                    </td>
                                    <td>
                                        <a
                                            href="{{ route('administradores.edit', ['admin' => $admin->id]) }}"
                                            class="btn bg-orange btn-flat m-lg-2"
                                        >
                                            <i class="fa fa-pen text-white"></i>
                                        </a>
                                        <eliminar-admin :admin-id="{{ $admin->id }}"></eliminar-admin>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Usuario</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col -->
    </div>
@endsection
