@extends('layouts.admin')

@section('titles')
    <h1>Editar Categoria</h1>
    <small>Cambia los datos que necesites</small>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">Editar Categoria</h3>
                </div>

                <div class="card-body">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Datos de la categoria</h3>
                        </div>
                        <form
                            class="form-horizontal"
                            method="POST"
                            action="{{ route('categorias.update', ['categoria' => $categoria->id]) }}"
                            novalidate
                        >
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group row">
                                    <label
                                        for="inputCategoria"
                                        class="col-sm-2 col-form-label"
                                    >Nombre:</label>
                                    <div class="col-sm-10 pl-0">
                                        <input
                                            required
                                            type="text"
                                            class="form-control @error('categoria') is-invalid @enderror"
                                            placeholder="Categoria"
                                            name="categoria"
                                            value="{{ $categoria->categoria }}"
                                        >
                                        @error('categoria')
                                            <p class="invalid-feedback d-block">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        for="icono"
                                        class="col-sm-2 col-form-label"
                                    >Icono:</label>
                                    <div class="col-sm-10 pl-0">
                                        <button
                                            class="btn btn-info"
                                            role="iconpicker"
                                            name="icono"
                                            id="icono"
                                            role="iconpicker"
                                            data-icon="{{ $categoria->icono }}"
                                            data-search-text="fas fa-address-book"
                                            data-footer="false"
                                            data-rows="4"
                                            data-cols="6"
                                            data-placement="right"
                                            data-selected-class="btn-danger"
                                            data-unselected-class="btn-info"
                                        ></button>
                                        @error('icono')
                                            <p class="invalid-feedback d-block">{{ $message }}</p>
                                        @enderror
                                    </div>
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
                </div>
            </div>
        </div>
    </div>
@endsection


@section('styles')
    <!-- Bootstrap-Iconpicker -->
    <link
        rel="stylesheet"
        href="/plugins/iconpicker/bootstrap-iconpicker.min.css"
    />
@endsection

@section('scripts')
    <!-- Bootstrap-Iconpicker Bundle -->
    <script
        src="/plugins/iconpicker/bootstrap-iconpicker.bundle.min.js"
        type="text/javascript"
        defer
    ></script>
@endsection
