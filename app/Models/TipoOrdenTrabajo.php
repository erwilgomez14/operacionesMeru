<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoOrdenTrabajo extends Model
{
    use HasFactory;
    protected $table = 'ope_tipo_orden';

    //protected $keyType = 'string';
    protected $primaryKey = 'id_tipo_orden';
    public $timestamps = false;
}
