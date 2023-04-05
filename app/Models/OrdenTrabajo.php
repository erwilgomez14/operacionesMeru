<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrdenTrabajo extends Model
{
    use HasFactory;

    protected $table = 'ope_orden_trabajo';

    //protected $keyType = 'string';
    protected $primaryKey = 'id_orden';
    public $timestamps = false;


    public function acueductos(): HasMany
    {
        return $this->HasMany(Acueductos::class, 'id_acueducto', 'id_acueducto');
    }

    public function equipos(): HasOne
    {
        return $this->hasOne(Equipo::class, 'id_equipo', 'id_equipo');
    }
    public function sistemas(): BelongsTo
    {
        return $this->BelongsTo(Sistema::class, 'id_sistema', 'id_sistema');
    }
    public function prioridad(): HasOne
    {
        return $this->hasOne(Acueductos::class, 'id_acueducto', 'id_acueducto');
    }
}
