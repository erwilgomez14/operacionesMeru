<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'rol';
    public $timestamps = false;

    public function permisos(): BelongsToMany
    {
        return $this->belongsToMany(Permiso::class, 'rol_permiso');
    }
    public function usuario(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'usuario_rol','cedula', 'rol_id');
    }

}
