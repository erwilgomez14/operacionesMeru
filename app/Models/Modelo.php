<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;
    protected $table = 'ope_modelo';

    protected $keyType = 'string';
    protected $primaryKey = 'id_modelo';
    public $timestamps = false;
}
