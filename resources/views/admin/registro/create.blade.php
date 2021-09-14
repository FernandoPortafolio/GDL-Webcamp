@extends('layouts.admin')

@section('titles')
    <h1>Registra a una persona</h1>
    <small>Llena el formulario para registrar a alguien</small>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Registra a una persona</h3>
        </div>
        <div class="card-body">
            <form
                class="form-horizontal"
                method="POST"
                action="{{ route('registrados.store') }}"
                id="form"
            >
                @csrf
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
                            value="{{ old('nombre') }}"
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
                            value="{{ old('apellido') }}"
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
                            value="{{ old('email') }}"
                        >
                        @error('email')
                            <p class="invalid-feedback d-block">{{ $message }}</p>
                        @enderror
                    </div>
                    <paquetes
                        :eventos="{{ json_encode($eventos) }}"
                        :regalos="{{ json_encode($regalos) }}"
                        :boletos_old="{{ json_encode(old('boletos')) }}"
                        :registro_old="{{ json_encode(old('registro')) }}"
                        :pedido_extra_old="{{ json_encode(old('pedido_extra')) }}"
                        regalo_old="{{ old('regalo') }}"
                    ></paquetes>
                </div>
            </form>
        </div>
    </div>
@endsection
