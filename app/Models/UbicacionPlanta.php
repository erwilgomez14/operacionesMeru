<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UbicacionPlanta extends Model
{
    use HasFactory;

    protected $table = 'ope_ubicacion_planta';


    protected $keyType = 'string';
    protected $primaryKey = 'id_equipo';

    public $timestamps = false;
}
