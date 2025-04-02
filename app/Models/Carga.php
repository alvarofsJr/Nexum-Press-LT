<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Model;

class Carga extends Model
{
    protected $primaryKey = 'carga_id';
    protected $fillable = ['descricao', 'peso', 'data_embarque', 'motorista_id', 'veiculo_id'];

    public function motorista()
    {
        return $this->belongsTo(Motorista::class, 'motorista_id');
    }

    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class, 'veiculo_id');
    }
}
