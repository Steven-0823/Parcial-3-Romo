    <?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ClienteController;
use App\Http\Controllers\api\HabitacionController;
use App\Http\Controllers\api\ReservaController;
use App\Http\Controllers\api\ReservaServiciosController;
use App\Http\Controllers\api\ServiciosController;

    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');

    Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
    Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
    Route::get('/clientes/{cliente}', [ClienteController::class, 'show'])->name('clientes.show');
    Route::put('/clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
    Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

    Route::get('/habitaciones', [HabitacionController::class, 'index'])->name('habitaciones.index');
    Route::post('/habitaciones', [HabitacionController::class, 'store'])->name('habitaciones.store');
    Route::get('/habitaciones/{habitacion}', [HabitacionController::class, 'show'])->name('habitaciones.show');
    Route::put('/habitaciones/{habitacion}', [HabitacionController::class, 'update'])->name('habitaciones.update');
    Route::delete('/habitaciones/{habitacion}', [HabitacionController::class, 'destroy'])->name('habitaciones.destroy');

    Route::get('/reservas', [ReservaController::class, 'index'])->name('reservas.index');
    Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store');
    Route::get('/reservas/{reserva}', [ReservaController::class, 'show'])->name('reservas.show');
    Route::put('/reservas/{reserva}', [ReservaController::class, 'update'])->name('reservas.update');
    Route::delete('/reservas/{reserva}', [ReservaController::class, 'destroy'])->name('reservas.destroy');

    Route::get('/reservas_servicios', [ReservaServiciosController::class, 'index'])->name('reserva_servicios.index');
    Route::post('/reservas_servicios', [ReservaServiciosController::class, 'store'])->name('reserva_servicios.store');
    Route::get('/reservas_servicios/{reserva_servicio}', [ReservaServiciosController::class, 'show'])->name('reserva_servicios.show');
    Route::put('/reservas_servicios/{reserva_servicio}', [ReservaServiciosController::class, 'update'])->name('reserva_servicios.update');
    Route::delete('/reservas_servicios/{reserva_servicio}', [ReservaServiciosController::class, 'destroy'])->name('reserva_servicios.destroy');

    Route::get('/servicios', [ServiciosController::class, 'index'])->name('servicios.index');
    Route::post('/servicios', [ServiciosController::class, 'store'])->name('servicios.store');
    Route::get('/servicios/{servicio}', [ServiciosController::class, 'show'])->name('servicios.show');
    Route::put('/servicios/{servicio}', [ServiciosController::class, 'update'])->name('servicios.update');
    Route::delete('/servicios/{servicio}', [ServiciosController::class, 'destroy'])->name('servicios.destroy');