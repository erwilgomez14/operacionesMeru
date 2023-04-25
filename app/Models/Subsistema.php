<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsistema extends Model
{
    use HasFactory;

    protected $table = 'ope_subsistema';

    protected $keyType = 'string';
    protected $primaryKey = 'id_subsistema';
    public $timestamps = false;

    protected $fillable = ['id_subsistema'];
}
