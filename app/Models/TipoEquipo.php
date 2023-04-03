<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEquipo extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 'ope_tipo_eq';

    protected $keyType = 'string';
    protected $primaryKey = 'id_tipo_eq';
    public $timestamps = false;
}
