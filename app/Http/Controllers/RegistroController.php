<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Regalo;
use App\Models\Registro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registrados = Registro::with(['pedido', 'pedido.regalo', 'eventos'])->get();
        return view('admin.registro.index', compact('registrados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        return view('admin.registro.create', compact('eventos', 'regalos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:2',
            'apellido' => 'required|min:2',
            'email' => 'required|email',
            'regalo' => 'required'
        ]);

        $data = $request->all();
        //pedido
        $boletos = $data['boletos'];
        $camisas = $data['pedido_extra']['camisas']['cantidad'];
        $etiquetas = $data['pedido_extra']['etiquetas']['cantidad'];

        //Eventos seleccionados
        $registro = $data['registro'];

        try {
            DB::beginTransaction();
            $newRegistro = Registro::create([
                'nombre' => $data['nombre'],
                'apellido' => $data['apellido'],
                'email' => $data['email'],
                'total' => $data['total'],
                'pagado' => true,
            ]);
            $newRegistro->pedido()->create([
                'camisas' => $camisas,
                'etiquetas' => $etiquetas,
                'boletos_un_dia' => $boletos['un_dia']['cantidad'],
                'boletos_dos_dias' => $boletos['dos_dias']['cantidad'],
                'boletos_completo' => $boletos['completo']['cantidad'],
                'regalo_id' => $data['regalo'],
            ]);
            $newRegistro->eventos()->attach($registro);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }

        return redirect()->route('registrados.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function show(Registro $registro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function edit(Registro $registro)
    {
        $regalos = Regalo::all();
        $talleres = Evento::with(['categoria', 'invitado'])
            ->orderBy('fecha')
            ->orderBy('categoria_id')
            ->orderBy('hora')
            ->get();
        $eventos = [];
        foreach ($talleres as $evento) {
            $dia_semana = strftime('%A', strtotime($evento->fecha));
            $categoria = $evento->categoria->categoria;
            $eventos[$dia_semana][$categoria][] = $evento;
        }

        $pedido = $registro->pedido;
        $eventos_registrados = $registro->eventos;
        $boletos = [
            'un_dia' => ['cantidad' => $pedido->boletos_un_dia],
            'dos_dias' => ['cantidad' => $pedido->boletos_dos_dias],
            'completo' => ['cantidad' => $pedido->boletos_completo],
        ];
        $eventos_registrados_ids = [];
        foreach ($eventos_registrados as $evento) {
            $eventos_registrados_ids[] = (string)$evento->id;
        }

        $pedido_extra['camisas']['cantidad'] = $pedido->camisas;
        $pedido_extra['etiquetas']['cantidad'] = $pedido->etiquetas;

        return view('admin.registro.edit', compact('eventos', 'regalos', 'registro', 'boletos', 'eventos_registrados_ids', 'pedido_extra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registro $registro)
    {
        $request->validate([
            'nombre' => 'required|min:2',
            'apellido' => 'required|min:2',
            'email' => 'required|email',
            'regalo' => 'required'
        ]);

        $data = $request->all();
        //pedido
        $boletos = $data['boletos'];
        $camisas = $data['pedido_extra']['camisas']['cantidad'];
        $etiquetas = $data['pedido_extra']['etiquetas']['cantidad'];

        //Eventos seleccionados
        $eventos = $data['registro'];

        $registro->nombre = $data['nombre'];
        $registro->apellido = $data['apellido'];
        $registro->email = $data['email'];
        $registro->total = $data['total'];
        $registro->pagado = true;

        $registro->pedido->camisas = $camisas;
        $registro->pedido->etiquetas = $etiquetas;
        $registro->pedido->boletos_un_dia = $boletos['un_dia']['cantidad'];
        $registro->pedido->boletos_dos_dias = $boletos['dos_dias']['cantidad'];
        $registro->pedido->boletos_completo = $boletos['completo']['cantidad'];
        $registro->pedido->regalo_id = $data['regalo'];

        DB::transaction(function () use ($registro, $eventos) {
            $registro->save();
            $registro->pedido->save();
            $registro->eventos()->delete();
            $registro->eventos()->attach($eventos);
        });

        return redirect()->route('registrados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registro $registro)
    {
        if ($registro->pagado) {
            abort(400, 'No puedes eliminar un registro pagado');
        }
        $registro->delete();

        return "$registro->nombre eliminado satisfactoriamente";
    }
}
