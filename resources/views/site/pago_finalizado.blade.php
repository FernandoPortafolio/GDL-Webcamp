@extends('layouts.site')

@section('content')
    <div class="seccion contenedor">
        <h2 class="separador justify-center">Pago Finalizado</h2>

        <div class="resultado {{ session('estado') }}">
            <p>{{ session('message') }}</p>
            @if (session('payment_id'))
                <p>El ID del pago es: {{ session('payment_id') }}</p>
            @endif
        </div>
    </div>
@endsection
