<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pedido;
use App\Models\PedidoProduto;
use App\Models\Produto;
class CarrinhoController extends Controller
{
    //
    function __construct()
    {
        // obriga o usuário a estar logado
        $this->middleware('auth');
    }

    public function index() 
    {
        $pedidos = Pedido::where([
            'status' => 'RE',
            'user_id' => Auth::id()
        ])->get();
        return view('carrinho.index', compact('pedidos'));
    }

    public function adicionar(Request $request)
    {
        $this->middleware('VerifyCsrfToken');
        $idProduto = $request->id;
        $Produto = Produto::findOrFail($idProduto);

        if(empty($Produto->id)){  
            //caso o produto não exista
            return redirect()->route('carrinho.index');
        }

        $idUsuario = Auth::id();
        $idPedido = Pedido::consultaPedido([
            'user_id' => $idUsuario,
            'status' => 'RE' //reservado
        ]);

        if(empty($idPedido)) {
            // caso o id de um pedido não exista mais, cria-se outro
            $PedidoNovo = Pedido::create([
                'user_id' =>$idUsuario,
                'status' => 'RE'
            ]);
            $idPedido = $PedidoNovo->id;
        }

        PedidoProduto::create([
            'pedido_id' => $idPedido,
            'produto_id' => $idProduto,
            'valor' => $Produto->preco,
            'status' => 'RE'
        ]);

        return redirect()->route('carrinho.index');
    }
}
