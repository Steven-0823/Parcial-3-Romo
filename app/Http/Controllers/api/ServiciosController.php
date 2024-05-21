<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Servicios;

class ServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicios = Servicios::all();
        return response()->json(['servicios' => $servicios]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $servicio = new Servicio();
        $servicio->id = $request->id;
        $servicio->nombre = $request->nombre;
        $servicio->descripcion = $request->descripcion;
        $servicio->costo = $request->costo;

        $servicio->save();

        return  json_encode(['servicio' => $servicio]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $servicio = Servicio::find($id);
        return  json_encode(['servicio' => $servicio]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $servicio = Servicio::find($id);
        $servicio->id = $request->id;
        $servicio->nombre = $request->nombre;
        $servicio->descripcion = $request->descripcion;
        $servicio->costo = $request->costo;
        $servicio->save();

        return  json_encode(['servicio' => $servicio]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $servicio = Servicio::find($id);
        $servicio->delete();
        $servicios = DB::table('servicios')
        ->orderBy('nombre')
        ->get();

        return  json_encode(['servicio' => $servicio]);
    }
}
