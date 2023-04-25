<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OdtUsuario extends Model
{
    use HasFactory;

    protected $table = 'ope_odt_usuario';

    protected $keyType = 'string';
    public $timestamps = false;

    public $incrementing = false;
    protected $fillable = ['cedula', 'id_orden'];


    public function obreros(): BelongsTo
    {
        return $this->BelongsTo(User::class,  'cedula', 'cedula');
    }
    public function ordenes(): BelongsTo
    {
        return $this->BelongsTo(OrdenTrabajo::class, 'id_orden', 'id_orden');
    }
}



