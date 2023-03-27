<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\TenerRolesPermisos;

class Usuario extends Authenticatable
{
    use HasFactory, TenerRolesPermisos;

    protected $table = 'ope_usuario';
    protected $primaryKey = 'cedula';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'usuario',
        'cedula',
        'cargo'
    ];


}
