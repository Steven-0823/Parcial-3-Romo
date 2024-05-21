<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Habitaciones; // Asegúrate de importar el modelo correcto

class HabitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $habitaciones = Habitaciones::all();
        return json_encode(['habitaciones' => $habitaciones]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'precio_noche' => 'required|numeric',
            'estado' => 'required|string|max:20',
        ]);

        $habitacion = new Habitaciones();
        $habitacion->numero = $request->numero;
        $habitacion->tipo = $request->tipo;
        $habitacion->precio_noche = $request->precio_noche;
        $habitacion->estado = $request->estado;

        $habitacion->save();

        return json_encode(['habitacion' => $habitacion], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $habitacion = Habitaciones::find($id);
        return json_encode(['habitacion' => $habitacion], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $habitacion = Habitaciones::find($id);
        $habitacion->numero = $request->numero;
        $habitacion->tipo = $request->tipo;
        $habitacion->precio_noche = $request->precio_noche;
        $habitacion->estado = $request->estado;

        $habitacion->save();

        return json_encode(['habitacion' => $habitacion], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $habitacion = Habitaciones::find($id);
        $habitacion->delete();

        return json_encode(['mensaje' => 'Habitación eliminada correctamente'], 200);
    }
}
