@extends('layouts.admin')

@section('titles')
    <h1>Editar a un registro</h1>
    <small>Cambia los datos que necesites</small>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edita un registro</h3>
        </div>
        <div class="card-body">
            <form
                class="form-horizontal"
                method="POST"
                action="{{ route('registrados.update', ['registro' => $registro->id]) }}"
                id="form"
            >
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group">
                        <label
                            for="inputNombre"
                            class="col-form-label"
                        >Nombre:</label>
                        <input
                            required
                            type="text"
                            class="form-control @error('nombre') is-invalid @enderror"
                            id="inputNombre"
                            placeholder="Nombre"
                            name="nombre"
                            value="{{ $registro->nombre }}"
                        >
                        @error('nombre')
                            <p class="invalid-feedback d-block">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label
                            for="inputApellido"
                            class="col-form-label"
                        >Apellido:</label>
                        <input
                            required
                            type="text"
                            class="form-control @error('apellido') is-invalid @enderror"
                            id="inputApellido"
                            placeholder="Apellidos"
                            name="apellido"
                            value="{{ $registro->apellido }}"
                        >
                        @error('apellido')
                            <p class="invalid-feedback d-block">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label
                            for="inputEmail"
                            class="col-form-label"
                        >Email:</label>
                        <input
                            required
                            type="text"
                            class="form-control @error('email') is-invalid @enderror"
                            id="inputEmail"
                            placeholder="Email"
                            name="email"
                            value="{{ $registro->email }}"
                        >
                        @error('email')
                            <p class="invalid-feedback d-block">{{ $message }}</p>
                        @enderror
                    </div>
                    <paquetes
                        :eventos="{{ json_encode($eventos) }}"
                        :regalos="{{ json_encode($regalos) }}"
                        :boletos_old="{{ json_encode($boletos) }}"
                        :registro_old="{{ json_encode($eventos_registrados_ids) }}"
                        :pedido_extra_old="{{ json_encode($pedido_extra) }}"
                        regalo_old="{{ $registro->pedido->regalo_id }}"
                    ></paquetes>
                </div>
            </form>
        </div>
    </div>
@endsection
