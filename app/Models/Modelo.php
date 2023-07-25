<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Modelo extends Model
{
    use HasFactory;
    protected $table = 'ope_modelo';

    //protected $keyType = 'string';
    protected $primaryKey = 'id_modelo';
    public $timestamps = false;


    public function marca(): HasOne
    {
        return $this->hasOne(Marca::class, 'id_marca', 'id_marca');
    }
}
