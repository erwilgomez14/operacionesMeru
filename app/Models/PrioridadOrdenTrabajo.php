<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrioridadOrdenTrabajo extends Model
{
    use HasFactory;

    protected $table = 'ope_prioridad';

    //protected $keyType = 'string';
    protected $primaryKey = 'id_prioridad';
    public $timestamps = false;
}
