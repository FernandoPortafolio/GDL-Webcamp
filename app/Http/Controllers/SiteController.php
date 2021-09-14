<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Evento;
use App\Models\Invitado;
use App\Models\Regalo;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        $invitados = Invitado::all();
        $eventos = [];
        foreach ($categorias as $categoria) {
            $evento = Evento::where('categoria_id', $categoria->id)->with('invitado')->take(2)->get();
            $eventos[$categoria->categoria] = $evento;
        }

        return view('site.index', compact('categorias', 'eventos', 'invitados'));
    }

    public function invitados()
    {
        $invitados = Invitado::all();
        return view('site.invitados', compact('invitados'));
    }

    public function conferencia()
    {
        return view('site.conferencia');
    }

    public function calendario()
    {
        $eventos = Evento::orderBy('fecha')->get();
        $calendario = [];
        foreach ($eventos as $evento) {
            $fecha = $evento->fecha;
            $calendario[$fecha][] = $evento;
        }
        return view('site.calendario', compact('calendario'));
    }

    public function reservaciones()
    {
        $talleres = Evento::with(['categoria', 'invitado'])
            ->orderBy('fecha')
            ->orderBy('categoria_id')
            ->orderBy('hora')
            ->get();
        $regalos = Regalo::all();
        $eventos = [];
        foreach ($talleres as $evento) {
            $dia_semana = strftime('%A', strtotime($evento->fecha));
            $categoria = $evento->categoria->categoria;
            $eventos[$dia_semana][$categoria][] = $evento;
        }
        return view('site.reservaciones', compact('eventos', 'regalos'));
    }

    public function pago_finalizado()
    {
        if (!session('estado') || !session('message'))
            return redirect()->route('index');
        return view('site.pago_finalizado');
    }
}
