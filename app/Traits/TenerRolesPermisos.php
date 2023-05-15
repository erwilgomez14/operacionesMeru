<?php
namespace App\Traits;

use App\Models\Rol;
use App\Models\Permiso;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait TenerRolesPermisos
{
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Rol::class, 'usuario_rol','cedula', 'rol_id');
    }
    public function permisos(): BelongsToMany
    {
        return $this->belongsToMany(Permiso::class, 'usuario_permiso', 'cedula', 'permiso_id');
    }

    public function tenerRol($role){
        if ($this->roles->contains('slug', $role)){
            return true;
        }

        return false;
    }
}


