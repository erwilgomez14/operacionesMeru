<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;

    protected $table = 'pardefpai';

    protected $keyType = 'string';
    protected $primaryKey = 'codpai';
    public $timestamps = false;
}
