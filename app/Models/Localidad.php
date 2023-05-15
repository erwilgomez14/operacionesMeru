<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    use HasFactory;
    protected $table = 'pardefubi';


    protected $keyType = 'string';
    protected $primaryKey = 'codubi';

    public $timestamps = false;
}
