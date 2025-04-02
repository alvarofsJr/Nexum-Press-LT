<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motorista extends Model
{

    protected $primaryKey = 'motorista_id';

    public $incrementing = false;

    protected $fillable = ['nome', 'cnh', 'data_nascimento', 'telefone'];

    public function cargas()
    {
        return $this->hasMany(Carga::class, 'motorista_id');
    }
}
