<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Reserva;
use App\Models\Clientes;
use App\Models\Habitacion;
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

        return response()->json(['reservas' => $reservas], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reserva = new Reserva();
        $reserva->cliente_id = $request->cliente_id;
        $reserva->habitacion_id = $request->habitacion_id;
        $reserva->fecha_entrada = $request->fecha_entrada;
        $reserva->fecha_salida = $request->fecha_salida;
        $reserva->estado = $request->estado;
        $reserva->save();

        return response()->json(['reserva' => $reserva], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $reserva = Reserva::find($id);
        return response()->json(['reserva' => $reserva], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $reserva = Reserva::find($id);
        $reserva->cliente_id = $request->cliente_id;
        $reserva->habitacion_id = $request->habitacion_id;
        $reserva->fecha_entrada = $request->fecha_entrada;
        $reserva->fecha_salida = $request->fecha_salida;
        $reserva->estado = $request->estado;
        $reserva->save();

        return response()->json(['reserva' => $reserva], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $reserva = Reserva::find($id);
        $reserva->delete();

        return response()->json(['mensaje' => 'Reserva eliminada correctamente'], 200);
    }
}
