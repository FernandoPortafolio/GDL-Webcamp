@extends('layouts.site')

@section('content')
    <section class="seccion contenedor">
        <h2 class="separador justify-center">Registro de Usuarios</h2>
        <form
            class="registro"
            action="{{ Route('paypal.pay') }}"
            method="POST"
            novalidate
            id="form"
        >
            @csrf
            <div class="registro caja flex-resp">
                <div class="campo">
                    <label for="nombre">Nombre</label>
                    <input
                        type="text"
                        id="nombre"
                        name="nombre"
                        placeholder="Tu Nombre:"
                        required
                        class="@error('nombre') is-invalid @enderror"
                        value="{{ old('nombre') }}"
                    >
                </div>
                <div class="campo">
                    <label for="apellido">Apellido</label>
                    <input
                        type="text"
                        id="apellido"
                        name="apellido"
                        placeholder="Tu Apellido:"
                        required
                        class="@error('apellido') is-invalid @enderror"
                        value="{{ old('apellido') }}"
                    >
                </div>
                <div class="campo">
                    <label for="email">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Tu Email:"
                        required
                        class="@error('email') is-invalid @enderror"
                        value="{{ old('email') }}"
                    >
                </div>
                @error('nombre')
                    <div id="error">{{ $message }}</div>
                @enderror
                @error('apellido')
                    <div id="error">{{ $message }}</div>
                @enderror
                @error('email')
                    <div id="error">{{ $message }}</div>
                @enderror
            </div>

            <paquetes
                :eventos="{{ json_encode($eventos) }}"
                :regalos="{{ json_encode($regalos) }}"
            ></paquetes>
        </form>
    </section>
@endsection
