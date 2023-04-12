<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    protected $table = 'tareas_equipos';

    //protected $keyType = 'string';
    protected $primaryKey = 'id_tareas';
    public $timestamps = false;
}
