<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    protected $table = 'pardefmun';

    protected $keyType = 'string';
    protected $primaryKey = 'codmun';
    public $timestamps = false;
}
