<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TareaGrupoHerramienta extends Model
{
    use HasFactory;
    protected $table = 'ope_tarea_grupo_herramienta';

    //protected $keyType = 'string';
    //protected $primaryKey = ['id_tareas','id_tipo_eq'];
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = ['id_tarea', 'id_grupo_herramienta'];

}
