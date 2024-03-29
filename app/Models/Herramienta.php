<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Herramienta extends Model
{
    use HasFactory;

    protected $table = 'ope_herramientas';
    protected $primaryKey = 'id_herramienta';
    public $timestamps = false;

    protected $fillable = [
        'id_herramienta',
        'id_grupo_herramienta',
    ];

    public function grupos(): HasOne
    {
        return $this->hasOne(GrupoHerramienta::class, 'id_grupo_herramienta', 'id_grupo_herramienta');
    }
}
