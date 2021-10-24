<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

    protected $primaryKey = 'user_id';

    protected $fillable = ['user_id', 'total', 'forma_payment', 'gateway', 'status_pedido', 'status_payment', 'nota_fiscal_code', 'transportation', 'obs'];
}
