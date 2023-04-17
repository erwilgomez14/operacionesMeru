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

    protected $fillable = [
        'id_orden',
        'id_acueducto',
        'id_equipo',
        'id_tipo_ot',
        'id_sistema'
    ];

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
    public function prioridad(): hasOne
    {
        return $this->hasOne(PrioridadOrdenTrabajo::class, 'id_prioridad', 'id_prioridad');
    }

    public function obreros(): HasMany
    {
        return $this->HasMany(OdtUsuario::class, 'id_orden', 'id_orden');
    }
}
