<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    const STATUS_ATIVO = 1;
    const STATUS_INATIVO = 0;

    public static $status = [
        self::STATUS_ATIVO => 'Ativo',
        self::STATUS_INATIVO => 'Inativo',
    ];

    protected $fillable = [
        'nome',
        'cpf',
        'idade',
        'cep',
        'rua',
        'bairro',
        'cidade',
        'uf',
        'numero',
        'cargo_id',
        'admissao',
        'status'
    ];
}
