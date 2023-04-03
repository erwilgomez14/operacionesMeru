<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaestroSistema extends Model
{
    use HasFactory;

    protected $table = 'pardeftsi';


    protected $keyType = 'string';
    protected $primaryKey = 'id_pardeftsi';

    public $timestamps = false;
}
