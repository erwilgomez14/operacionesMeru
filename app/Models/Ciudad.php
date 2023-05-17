<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;

    protected $table = 'pardefloc';

    protected $keyType = 'string';
    protected $primaryKey = 'codloc';
    public $timestamps = false;
}
