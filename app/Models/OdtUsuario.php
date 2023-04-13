<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OdtUsuario extends Model
{
    use HasFactory;

    protected $table = 'ope_odt_usuario';

    //protected $keyType = 'string';
    public $timestamps = false;
}
