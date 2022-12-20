<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','status'];
    
    public function pedido_produtos()
    {
        return $this->hasMany(PedidoProduto::class)
        ->select(\DB::raw('produto_id,sum(desconto) as descontos,sum(valor) as valores, count(1) as qtd'))
        ->groupby('produto_id')
        ->orderby('produto_id','desc');
    }

    public static function consultaPedido($array)
    {
        $pedido = self::where($array)->first(['id']);
        return !empty($pedido->id)? $pedido->id: null;
    }
}
