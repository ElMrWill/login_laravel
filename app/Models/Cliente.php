<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Cliente extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;

    protected $guard = 'clientes';

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

    protected $hidden = [
        'senha'
    ];
}
