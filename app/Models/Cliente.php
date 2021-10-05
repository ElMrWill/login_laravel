<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'senha',
        'tel',
        'rua',
        'numero',
        'bairro',
        'cidade',
        'cep',
        'cpf',
        'ultimaCompraId',
        'ultimoGasto',
        'mediaGasto'
    ];
}
