<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        'razao_social',
        'cnpj',
        'cep',
        'rua',
        'bairro',
        'cidade',
        'uf',
        'numero',
        'status'
    ];
}
