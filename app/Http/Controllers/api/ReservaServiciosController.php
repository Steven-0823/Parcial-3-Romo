<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ReservaServicios;
use App\Models\Reservas;
use App\Models\Servicios;

class ReservaServiciosController extends Controller
{

    public function index()
    {
        $reserva_servicios = DB::table('reserva_servicios')
            ->join('reservas', 'reserva_servicios.reserva_id', '=', 'reservas.id')
            ->join('servicios', 'reserva_servicios.servicio_id', '=', 'servicios.id')
            ->select('reserva_servicios.*', 'reservas.fecha_entrada', 'reservas.fecha_salida', 'reservas.estado', 'servicios.nombre as servicio_nombre', 'servicios.descripcion as servicio_descripcion', 'servicios.costo as servicio_costo')
            ->get();

        return response()->json(['reserva_servicios' => $reserva_servicios], 200);
    }
    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
{
    try {
        // Validar que los datos necesarios estén presentes
        $request->validate([
            'reserva_id' => 'required|exists:reservas,id',
            'servicio_id' => 'required|exists:servicios,id',
            'fecha' => 'required|date',
            'cantidad' => 'required|integer',
        ]);

        // Crear un nuevo registro en reserva_servicios
        $reserva_servicio = new ReservaServicios();
        $reserva_servicio->reserva_id = $request->input('reserva_id');
        $reserva_servicio->servicio_id = $request->input('servicio_id');
        $reserva_servicio->fecha = $request->input('fecha');
        $reserva_servicio->cantidad = $request->input('cantidad');
        $reserva_servicio->save();

        return response()->json(['reserva_servicio' => $reserva_servicio], 200);
    } catch (\Illuminate\Database\QueryException $e) {
        return response()->json(['error' => $e->getMessage()], 400);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error processing request: ' . $e->getMessage()], 500);
    }
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reserva_servicio = ReservaServicios::find($id);
        return response()->json(['reserva_servicio' => $reserva_servicio], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $reserva_servicio = ReservaServicios::find($id);
        $reserva_servicio->reserva_id = $request->reserva_id;
        $reserva_servicio->servicio_id = $request->servicio_id;
        $reserva_servicio->fecha = $request->fecha;
        $reserva_servicio->cantidad = $request->cantidad;
        $reserva_servicio->save();

        return response()->json(['reserva_servicio' => $reserva_servicio], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reserva_servicio = ReservaServicios::find($id);
        $reserva_servicio->delete();

        return response()->json(['reserva_servicio' => $reserva_servicio], 200);
    }
}
