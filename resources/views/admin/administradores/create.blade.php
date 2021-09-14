@extends('layouts.admin')

@section('titles')
    <h1>Crear Administrador</h1>
    <small>Llena el formulario para crear un administrador</small>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Crear Admin</h3>
                </div>

                <div class="card-body">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Datos de la Cuenta</h3>
                        </div>
                        <form
                            class="form-horizontal"
                            method="POST"
                            action="{{ route('administradores.store') }}"
                            enctype="multipart/form-data"
                            novalidate
                        >
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label
                                        for="inputName"
                                        class="col-sm-2 col-form-label"
                                    >Tu Nombre:</label>
                                    <div class="col-sm-10">
                                        <input
                                            required
                                            type="text"
                                            class="form-control @error('name') is-invalid @enderror"
                                            id="inputName"
                                            placeholder="Nombre completo"
                                            name="name"
                                            value="{{ old('name') }}"
                                        >
                                        @error('name')
                                            <p class="invalid-feedback d-block">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        for="inputEmail"
                                        class="col-sm-2 col-form-label"
                                    >Email:</label>
                                    <div class="col-sm-10">
                                        <input
                                            required
                                            type="text"
                                            class="form-control @error('email') is-invalid @enderror"
                                            id="inputEmail"
                                            placeholder="Usuario"
                                            name="email"
                                            value="{{ old('email') }}"
                                        >
                                        @error('email')
                                            <p class="invalid-feedback d-block">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        for="inputPassword"
                                        class="col-sm-2 col-form-label"
                                    >Contraseña:</label>
                                    <div class="col-sm-10">
                                        <input
                                            required
                                            type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            id="inputPassword"
                                            placeholder="Password"
                                            name="password"
                                            value="{{ old('password') }}"
                                        >
                                        @error('password')
                                            <p class="invalid-feedback d-block">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        for="inputRepPassword"
                                        class="col-sm-2 col-form-label"
                                    >Repetir contraseña:</label>
                                    <div class="col-sm-10">
                                        <input
                                            required
                                            type="password"
                                            class="form-control @error('password_repeat') is-invalid @enderror"
                                            id="inputRepPassword"
                                            placeholder="Password"
                                            name="password_repeat"
                                        >
                                        @error('password_repeat')
                                            <p class="invalid-feedback d-block">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label
                                        for="image"
                                        class="col-form-label"
                                    >Imagen: </label>
                                    <input
                                        required
                                        type="file"
                                        id="image"
                                        name="image"
                                        class="form-control-file"
                                    >
                                    <p class="text-muted m-0"><small>Añada la fotografía del administrador aquí</small></p>
                                    @error('image')
                                        <p class="invalid-feedback d-block">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button
                                    type="submit"
                                    class="btn btn-info"
                                >Añadir</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
