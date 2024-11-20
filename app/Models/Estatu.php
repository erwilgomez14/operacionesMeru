<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estatu extends Model
{
    use HasFactory;

    protected $table = 'estatus';

    protected $keyType = 'string';
    protected $primaryKey = 'id_estatus';
    public $timestamps = false;
}
