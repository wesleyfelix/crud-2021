<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersProdutos extends Model
{
    protected $fillable = [
        'user_id',
        'produto_id'
    ];
}
