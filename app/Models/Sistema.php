<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sistema extends Model
{
    use HasFactory;

    protected $table = 'ope_sistema';

    protected $keyType = 'string';
    protected $primaryKey = 'id_sistema';
    public $timestamps = false;
}
