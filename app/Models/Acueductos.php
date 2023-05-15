<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Acueductos extends Model
{
    use HasFactory;

    protected $table = 'ope_acueducto';

    protected $keyType = 'string';

    protected $primaryKey = 'id_acueducto';
    public $timestamps = false;

    public function gerencias(): HasOne
    {
        return $this->hasOne(Gerencia::class, 'id_gerencia', 'id_gerencia');
    }
    public function sistemas(): HasMany
    {
        return $this->HasMany(Sistema::class, 'id_acueducto', 'id_acueducto');
    }
    public function localidades(): HasOne
    {
        return $this->hasOne(Localidad::class, 'codubi', 'cod_ubi');
    }
}














