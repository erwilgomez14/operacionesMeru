<?php

namespace App\Policies;

use App\Models\Equipo;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EquipoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Equipo $equipo): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }
    public function show(User $user): bool
    {
        if($user->roles->contains('slug', 'gerente') && $user->permisos->contains('slug', 'ver')){
            return true;
        } //elseif ($user->roles->contains('slug', 'super-usuario') && $user->permisos->contains('slug', 'all')){
            //return true;
        //}
        return false;
    }
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Equipo $equipo): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Equipo $equipo): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Equipo $equipo): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Equipo $equipo): bool
    {
        //
    }
}
