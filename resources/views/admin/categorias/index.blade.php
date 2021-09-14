@extends('layouts.admin')

@section('titles')
    <h1>Lista de Categorias</h1>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Administra las categorias de eventos desde este panel</h3>
                    </div>
                    <div class="card-body">
                        <table
                            id="tabla"
                            class="table table-bordered table-striped"
                        >
                            <thead>
                                <tr>
                                    <th>Categoria</th>
                                    <th>Icono</th>
                                    <th>
                                        <!--Acciones-->
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($categorias as $categoria)
                                    <tr id="tr-{{ $categoria->id }}">
                                        <td>{{ $categoria->categoria }}</td>
                                        <td class="text-center icono"><i class="{{ $categoria->icono }}"></i></td>
                                        <td class="text-center">
                                            <a
                                                href="{{ route('categorias.edit', ['categoria' => $categoria->id]) }}"
                                                class="btn bg-orange btn-flat m-lg-2"
                                            >
                                                <i class="fa fa-pen text-white"></i>
                                            </a>
                                            <eliminar-categoria :categoria-id="{{ $categoria->id }}"></eliminar-categoria>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Categoria</th>
                                    <th>Icono</th>
                                    <th>
                                        <!--Acciones-->
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
