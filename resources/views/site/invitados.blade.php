@extends('layouts.site')

@section('content')
    {{-- Seccion de invitados --}}
    @include('site.partials.lista_invitados')
@endsection

@section('scripts')
    {{-- Jquery Colorbox --}}
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.6.4/jquery.colorbox-min.js"
        integrity="sha512-DAVSi/Ovew9ZRpBgHs6hJ+EMdj1fVKE+csL7mdf9v7tMbzM1i4c/jAvHE8AhcKYazlFl7M8guWuO3lDNzIA48A=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
        defer
    ></script>
@endsection
