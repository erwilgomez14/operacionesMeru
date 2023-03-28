<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\TenerRolesPermisos;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, TenerRolesPermisos;

    protected $connection = 'pgsql_rrhh';

    protected $table = 'acceso.usuarios';
    protected $primaryKey = 'idusuario';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'uid',
        'clave',
        'correo'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        /*   'password',
           'remember_token',*/
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [/*
        'email_verified_at' => 'datetime',*/
    ];



}
