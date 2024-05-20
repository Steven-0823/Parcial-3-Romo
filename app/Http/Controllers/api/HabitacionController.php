<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Habitaciones;

class HabitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $habitaciones = Habitaciones::all();
        return response()->json(['habitaciones' => $habitaciones]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $habitacion = new Habitacion();
        $habitacion->numero = $request->numero;
        $habitacion->tipo = $request->tipo;
        $habitacion->precio_noche = $request->precio_noche;
        $habitacion->estado = $request->estado;

        $habitacion->save();

        return  json_encode(['habitacion' => $habitacion]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $habitacion = Habitacion::find($id);
        return json_encode(['habitacion' => $habitacion]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $habitacion = Habitacion::find($id);
        $habitacion->numero = $request->numero;
        $habitacion->tipo = $request->tipo;
        $habitacion->precio_noche = $request->precio_noche;
        $habitacion->estado = $request->estado;

        $habitacion->save();

        return  json_encode(['cliente' => $cliente]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $habitacion = Habitacion::find($id);
        $habitacion->delete();

        $habitaciones = DB::table('habitaciones')
        ->orderBy('numero')
        ->get();

        return json_encode(['habitacion' => $habitacion]);
    }
}
