<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $primaryKey = 'veiculo_id';

    protected $fillable = ['placa', 'modelo', 'marca', 'ano_fabricacao'];


}



