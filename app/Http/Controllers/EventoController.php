<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Evento;
use App\Models\Invitado;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Evento::all();
        return view('admin.eventos.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        $invitados = Invitado::all();
        return view('admin.eventos.create', compact('categorias', 'invitados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'evento' => 'required',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'categoria' => 'required',
            'invitado' => 'required',
        ]);
        $clave = substr($data['evento'], 0, 5) . '_' . $data['invitado'] . '' . $data['categoria'];
        Evento::create([
            'evento' => $data['evento'],
            'fecha' => date('Y-m-d', strtotime($data['fecha'])),
            'hora' => $data['hora'],
            'clave' => $clave,
            'categoria_id' => $data['categoria'],
            'invitado_id' => $data['invitado'],
        ]);

        return redirect()->route('evento.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(Evento $evento)
    {

        $categorias = Categoria::all();
        $invitados = Invitado::all();
        return view('admin.eventos.edit', compact('categorias', 'invitados', 'evento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {
        $data = $request->validate([
            'evento' => 'required',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'categoria' => 'required',
            'invitado' => 'required',
        ]);
        $evento->evento = $data['evento'];
        $evento->fecha = date('Y-m-d', strtotime($data['fecha']));
        $evento->hora = $data['hora'];
        $evento->categoria_id = $data['categoria'];
        $evento->invitado_id = $data['invitado'];
        $evento->save();
        return redirect()->route('evento.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {
        $evento->delete();
        return "$evento->evento eliminado satisfactoriamente";
    }
}
