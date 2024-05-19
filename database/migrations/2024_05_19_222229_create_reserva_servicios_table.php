<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reserva_servicios', function (Blueprint $table) {
            $table->unsignedBigInteger('reserva_id');
            $table->unsignedBigInteger('servicio_id');
            $table->date('fecha');
            $table->integer('cantidad');
            $table->timestamps();

            $table->foreign('reserva_id')->references('id')->on('reservas');
            $table->foreign('servicio_id')->references('id')->on('servicios');

            $table->primary(['reserva_id', 'servicio_id', 'fecha']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserva_servicios');
    }
};
