@extends('layouts.admin')

@section('titles')
    <h1>Actualiza un Evento</h1>
    <small>Cambia los datos que necesites del evento</small>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Actualizar Evento</h3>
                </div>
                <div class="card-body">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Datos del evento</h3>
                        </div>
                        <!-- form start -->
                        <form
                            class="form-horizontal"
                            method="POST"
                            action="{{ route('evento.update', ['evento' => $evento->id]) }}"
                            novalidate
                        >
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label
                                        for="inputEvento"
                                        class="col-form-label"
                                    >Evento: </label>
                                    <input
                                        required
                                        type="text"
                                        class="form-control @error('evento') is-invalid @enderror"
                                        id="inputEvento"
                                        placeholder="Título del Evento"
                                        name="evento"
                                        value="{{ $evento->evento }}"
                                        autofocus
                                    >
                                    @error('evento')
                                        <p class="invalid-feedback d-block">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Date Picker -->
                                <div class="form-group row">
                                    <label
                                        for="datePicker"
                                        class="col-form-label col-sm-12"
                                    >Fecha: </label>
                                    <input
                                        type="date"
                                        class="form-control datetimepicker-input @error('fecha') is-invalid @enderror"
                                        data-target="#reservationdate"
                                        id="datePicker"
                                        name="fecha"
                                        value="{{ $evento->fecha }}"
                                    />
                                    @error('fecha')
                                        <p class="invalid-feedback d-block">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Time Picker -->
                                <div class="bootstrap-timepicker">
                                    <div class="form-group row">
                                        <label
                                            for="time"
                                            class="col-form-label col-sm-12"
                                        >Hora: </label>

                                        <input
                                            type="time"
                                            class="form-control datetimepicker-input @error('hora') is-invalid @enderror"
                                            data-target="#timepicker"
                                            id="time"
                                            name="hora"
                                            value="{{ date('H:i', strtotime($evento->hora)) }}"
                                        />
                                        @error('hora')
                                            <p class="invalid-feedback d-block">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Categorias --}}
                                <div class="form-group row">
                                    <label
                                        for="categoria"
                                        class="col-form-label col-sm-12"
                                    >Categoria: </label>
                                    <select
                                        id="categoria"
                                        class="form-control select2 @error('categoria') is-invalid @enderror"
                                        name="categoria"
                                    >
                                        <option
                                            selected
                                            disabled
                                        >--Seleccione--</option>
                                        @foreach ($categorias as $categoria)
                                            <option
                                                value="{{ $categoria->id }}"
                                                {{ $categoria->id == $evento->categoria_id ? 'selected' : '' }}
                                            >{{ $categoria->categoria }}</option>
                                        @endforeach
                                    </select>
                                    @error('categoria')
                                        <p class="invalid-feedback d-block">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Invitados -->
                                <div class="form-group row">
                                    <label
                                        for="invitado"
                                        class="col-form-label col-sm-12"
                                    >Invitado: </label>
                                    <select
                                        id="invitado"
                                        class="form-control select2 col-sm-12 @error('invitado') is-invalid @enderror"
                                        name="invitado"
                                    >
                                        <option
                                            selected
                                            disabled
                                        >--Seleccione--</option>
                                        @foreach ($invitados as $invitado)
                                            <option
                                                value="{{ $invitado->id }}"
                                                {{ $invitado->id == $evento->invitado_id ? 'selected' : '' }}
                                            >{{ $invitado->nombre }}
                                                {{ $invitado->apellido }}</option>
                                        @endforeach
                                    </select>
                                    @error('invitado')
                                        <p class="invalid-feedback d-block">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button
                                    type="submit"
                                    class="btn btn-info"
                                    id='guardar'
                                >Guardar</button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
