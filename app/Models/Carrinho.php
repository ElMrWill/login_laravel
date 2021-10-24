<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class Carrinho extends Model
{

    protected $primaryKey = 'user_id';

    protected $table = 'carrinhos';

    protected $fillable = ['produto_id', 'quantidade', 'detalhes', 'user_id'];


    public function produto()
    {
        return $this->hasOne(Produto::class, 'id', 'produto_id');
    }
}
