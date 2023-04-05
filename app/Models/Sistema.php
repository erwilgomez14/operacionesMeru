<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Sistema extends Model
{
    use HasFactory;

    protected $table = 'ope_sistema';

    protected $keyType = 'string';
    protected $primaryKey = 'id_sistema';
    public $timestamps = false;

  //  public function acueductos(): HasOne
  //  {
       // return $this->hasOne(Acueductos::class, 'id_acueducto', 'id_acueducto');
   // }
    /**
     * Get the post that owns the comment.
     */
    public function acueductos(): BelongsTo
    {
        return $this->belongsTo(Acueductos::class, 'id_acueducto', 'id_acueducto');
    }
    public function areas(): HasOne
    {
        return $this->hasOne(Area::class, 'id_area', 'id_area');
    }
    public function msistemas(): HasOne
    {
        return $this->hasOne(MaestroSistema::class, 'id_pardeftsi', 'id_pardeftsi');
    }
    public function ubicacionesPlantas(): HasOne
    {
        return $this->hasOne(UbicacionPlanta::class, 'id_ubicpl', 'id_ubicpl');
    }
}
