<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $table = 'ope_equipo';


    protected $keyType = 'string';
    protected $primaryKey = 'id_equipo';

    public $timestamps = false;
}
