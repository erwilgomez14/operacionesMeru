<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suministro extends Model
{
    use HasFactory;

    protected $table = 'ope_suministros';

    // protected $keyType = 'string';
    protected $primaryKey = 'id';
    // public $timestamps = false;
}