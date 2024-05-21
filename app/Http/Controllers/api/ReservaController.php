<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Reservas;
use App\Models\Clientes;
use App\Models\Habitaciones;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservas = DB::table('reservas')
            ->join('clientes', 'reservas.cliente_id', '=', 'clientes.id')
            ->join('habitaciones', 'reservas.habitacion_id', '=', 'habitaciones.id')
            ->select('reservas.*', 'clientes.nombre as cliente_nombre', 'habitaciones.numero as habitacion_numero')
            ->get();

        return json_encode(['reservas' => $reservas], 200);
    }

    public function store(Request $request)
    {
        $reserva = new Reservas();
        $reserva->cliente_id = $request->cliente_id;
        $reserva->habitacion_id = $request->habitacion_id;
        $reserva->fecha_entrada = $request->fecha_entrada;
        $reserva->fecha_salida = $request->fecha_salida;
        $reserva->estado = $request->estado;
        $reserva->save();

        return json_encode(['reserva' => $reserva], 201);
    }

    public function show($id)
    {
        $reserva = Reservas::find($id);
        return json_encode(['reserva' => $reserva], 200);
    }

    public function update(Request $request, $id)
    {
        $reserva = Reservas::find($id);
        $reserva->cliente_id = $request->cliente_id;
        $reserva->habitacion_id = $request->habitacion_id;
        $reserva->fecha_entrada = $request->fecha_entrada;
        $reserva->fecha_salida = $request->fecha_salida;
        $reserva->estado = $request->estado;
        $reserva->save();

        return json_encode(['reserva' => $reserva], 200);
    }

    public function destroy($id)
    {
        $reserva = Reservas::find($id);
        $reserva->delete();

        return json_encode(['mensaje' => 'Reserva eliminada correctamente'], 200);
    }
}
