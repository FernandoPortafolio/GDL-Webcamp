@extends('layouts.admin')

@section('titles')
    <h1>Dashboard</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Información sobre el evento</h3>
        </div>

        <div class="card-body">
            <div class="row">
                <x-card-info
                    :number="$registrados"
                    text="Personas Registradas"
                    icon="fas fa-user"
                    color="info"
                ></x-card-info>
                <x-card-info
                    :number="$pagados"
                    text="Total Pagados"
                    icon="fas fa-users"
                    color="yellow"
                ></x-card-info>
                <x-card-info
                    :number="$deudores"
                    text="No Pagados"
                    icon="fas fa-user-times"
                    color="red"
                ></x-card-info>
                <x-card-info
                    :number="$ganancias"
                    text="Ganancias Totales"
                    icon="fa fa-usd"
                    color="green"
                ></x-card-info>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Regalos</h3>
        </div>

        <div class="card-body">
            <div class="row">
                <x-card-info
                    :number="$plumas"
                    text="Plumas"
                    icon="fas fa-gift"
                    color="teal"
                ></x-card-info>
                <x-card-info
                    :number="$etiquetas"
                    text="Etiquetas"
                    icon="fas fa-gift"
                    color="purple"
                ></x-card-info>
                <x-card-info
                    :number="$pulseras"
                    text="Pulseras"
                    icon="fas fa-gift"
                    color="pink"
                ></x-card-info>
            </div>
        </div>
    </div>
@endsection

