<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TareaGrupoHerramienta extends Model
{
    use HasFactory;
    protected $table = 'ope_tarea_grupo_herramienta';

    //protected $keyType = 'string';
    protected $primaryKey = ['id_tarea','id_grupo_herramienta'];
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = ['id_tarea', 'id_grupo_herramienta'];

    public function tareas(): BelongsTo
    {
        return $this->BelongsTo(Tarea::class,  'id_tarea', 'id_tarea');
    }
    public function grupos_herramientas(): BelongsTo
    {
        return $this->BelongsTo(GrupoHerramienta::class,  'id_grupo_herramienta', 'id_grupo_herramienta');
    }
}
