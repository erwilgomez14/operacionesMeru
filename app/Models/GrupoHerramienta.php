<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoHerramienta extends Model
{
    use HasFactory;

    protected $table = 'ope_grupo_herramienta';
    protected $primaryKey = 'id_grupo_herramienta';
    public $timestamps = false;

    protected $fillable = [
        'id_grupo_herramienta',
        'nombre_grupo',
    ];

}
