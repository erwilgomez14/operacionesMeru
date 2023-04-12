<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Equipo extends Model
{
    use HasFactory;

    protected $table = 'ope_equipo';


    protected $keyType = 'string';
    protected $primaryKey = 'id_equipo';

    public $timestamps = false;

    public function sistemas(): HasOne
    {
        return $this->hasOne(Sistema::class, 'id_sistema', 'id_sistema');
    }
    public function subsistemas(): HasOne
    {
        return $this->hasOne(Subsistema::class, 'id_subsistema', 'id_subsistema');
    }
    public function tipoequipo(): HasOne
    {
        return $this->hasOne(TipoEquipo::class, 'id_tipo_eq', 'id_tipo_eq');
    }
    public function modelos(): HasOne
    {
        return $this->hasOne(Modelo::class, 'modelo', 'id_modelo');
    }
    public function marcas(): HasOne
    {
        return $this->hasOne(Marca::class, 'marca', 'id_marca');
    }
    public function tareas(): HasMany
    {
        return $this->HasMany(Tarea::class, 'id_tipo_eq', 'id_tipo_eq');
    }

}
