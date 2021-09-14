@extends('layouts.admin')

@section('titles')
    <h1>Actualizar Invitado</h1>
    <small>Edita los campos que necesites</small>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Actualizar Invitado</h3>
                </div>
                <div class="card-body">

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Datos del invitado</h3>
                        </div>

                        <form
                            class="form-horizontal"
                            method="POST"
                            action="{{ route('invitados.update', ['invitado' => $invitado->id]) }}"
                            enctype="multipart/form-data"
                            novalidate
                        >
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label
                                        for="inputNombre"
                                        class="col-form-label"
                                    >Nombre: </label>
                                    <input
                                        required
                                        type="text"
                                        class="form-control @error('nombre') is-invalid @enderror"
                                        id="inputNombre"
                                        placeholder="Nombre"
                                        name="nombre"
                                        value="{{ $invitado->nombre }}"
                                    >
                                    @error('nombre')
                                        <p class="invalid-feedback d-block">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label
                                        for="inputApellido"
                                        class="col-form-label"
                                    >Apellido: </label>
                                    <input
                                        required
                                        type="text"
                                        class="form-control @error('apellido') is-invalid @enderror"
                                        id="inputApellido"
                                        placeholder="Apellidos"
                                        name="apellido"
                                        value="{{ $invitado->apellido }}"
                                    >
                                    @error('apellido')
                                        <p class="invalid-feedback d-block">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label
                                        for="inputDescripcion"
                                        class="col-form-label"
                                    >Descripcion: </label>
                                    <textarea
                                        required
                                        type="text"
                                        rows="8"
                                        class="form-control @error('descripcion') is-invalid @enderror"
                                        id="inputDescripcion"
                                        placeholder="Descripción..."
                                        name="descripcion"
                                    >{{ $invitado->descripcion }}</textarea>
                                    @error('descripcion')
                                        <p class="invalid-feedback d-block">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label d-block">Imagen Actual</label>
                                    <img
                                        src="/storage/{{ $invitado->url_foto }}"
                                        alt="Imagen de {{ $invitado->nombre }}"
                                        width="200"
                                    >
                                </div>
                                <div class="form-group">
                                    <label
                                        for="imagen"
                                        class="col-form-label"
                                    >Imagen: </label>
                                    <input
                                        required
                                        type="file"
                                        id="imagen"
                                        name="imagen"
                                        class="form-control-file"
                                    >
                                    <p class="text-muted m-0"><small>Añada la imagen del invitado aquí</small></p>
                                    @error('imagen')
                                        <p class="invalid-feedback d-block">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>

                            <div class="card-footer">
                                <button
                                    type="submit"
                                    class="btn btn-info"
                                >Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
