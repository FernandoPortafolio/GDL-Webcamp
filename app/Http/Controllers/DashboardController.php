<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Registro;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $registrados = Registro::count();
        $pagados = Registro::where(['pagado' => true])->count();
        $deudores = Registro::where(['pagado' => false])->count();
        $ganancias = Registro::where(['pagado' => true])->sum('total');
        $plumas = Pedido::where(['regalo_id' => 3])->count();
        $etiquetas = Pedido::where(['regalo_id' => 2])->count();
        $pulseras = Pedido::where(['regalo_id' => 1])->count();
        return view('admin.dashboard.index', compact('registrados', 'pagados', 'deudores', 'ganancias', 'plumas', 'etiquetas', 'pulseras'));
    }
}
