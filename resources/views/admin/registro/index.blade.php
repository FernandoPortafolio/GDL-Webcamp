@extends('layouts.admin')

@section('titles')
    <h1>Lista de Personas Registradas</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Administra los registros desde este panel</h3>
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
                                <th>Fecha</th>
                                <th>Articulos</th>
                                <th>Talleres</th>
                                <th>Regalo</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($registrados as $registrado)
                                <tr id="tr-{{ $registrado->id }}">
                                    <td>{{ $registrado->nombre }} {{ $registrado->apellido }}</td>
                                    <td>{{ $registrado->email }}</td>
                                    <td>{{ date('Y-m-d', strtotime($registrado->created_at)) }}</td>
                                    <td>
                                        <ul>
                                            @if ($registrado->pedido->camisas)
                                                <li>{{ $registrado->pedido->camisas }} Camisas</li>
                                            @endif
                                            @if ($registrado->pedido->etiquetas)
                                                <li>{{ $registrado->pedido->etiquetas }} Etiquetas</li>
                                            @endif
                                            @if ($registrado->pedido->boletos_un_dia)
                                                <li>{{ $registrado->pedido->boletos_un_dia }} Boletos x 1 día</li>
                                            @endif
                                            @if ($registrado->pedido->boletos_dos_dias)
                                                <li>{{ $registrado->pedido->boletos_dos_dias }} Boletos x 2 días</li>
                                            @endif
                                            @if ($registrado->pedido->boletos_completo)
                                                <li>{{ $registrado->pedido->boletos_completo }} Boletos completos</li>
                                            @endif
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            @foreach ($registrado->eventos as $evento)
                                                <li>{{ $evento->evento }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>{{ $registrado->pedido->regalo->descripcion }}</td>
                                    <td>${{ number_format($registrado->total, 2) }}</td>
                                    <td>
                                        <span class="badge badge-{{ $registrado->pagado ? 'success' : 'danger' }}">
                                            {{ $registrado->pagado ? 'Pagado' : 'No Pagado' }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a
                                            href="{{ route('registrados.edit', ['registro' => $registrado->id]) }}"
                                            class="btn btn-sm bg-orange btn-flat m-lg-2"
                                        >
                                            <i class="fa fa-pen text-white"></i>
                                        </a>
                                        @if (!$registrado->pagado)
                                            <eliminar-registrado :registrado-id="{{ $registrado->id }}">
                                            </eliminar-registrado>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Fecha</th>
                                <th>Articulos</th>
                                <th>Talleres</th>
                                <th>Regalo</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
