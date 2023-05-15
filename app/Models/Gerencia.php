<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gerencia extends Model
{
    use HasFactory;
    protected $table = 'ope_gerencia';

    protected $keyType = 'string';
    protected $primaryKey = 'id_gerencia';
    public $timestamps = false;
}
