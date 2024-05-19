<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservaServicios extends Model
{
    use HasFactory;
    protected $table = "reserva_servicios";
    protected $primaryKey = "id";
    public $timestamps = false;
}
