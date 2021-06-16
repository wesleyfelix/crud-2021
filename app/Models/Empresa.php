<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Empresa extends Model
{
    const STATUS_ATIVO = 'Ativo';
    const STATUS_INATIVO = 'Inativo';
    const STATUS_TESTE = 'Teste';

    public static $status = [
        self::STATUS_ATIVO => 'Ativo',
        self::STATUS_INATIVO => 'Inativo',
        self::STATUS_TESTE => 'Teste',
    ];

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

    /**
     * @param $status
     * @return mixed
     */
    public static function getTotal($status){
        return self::select('id')
            ->where('status', $status)
            ->count();
    }
}
