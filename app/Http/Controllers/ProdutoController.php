<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Produto;
class ProdutoController extends Controller
{
    public function index(Request $request)
    {
        $produtos = Produto::where(['ativo'=>"Sim"])->get();
        if(request("busca")){
            $produtos = Produto::where('nome', 'like', '%'.request('busca').'%')->get();
        }
        return view('admin.produtos.index',compact('produtos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('admin.produtos.create',compact('categorias'));
    }

    public function store(Request $request, Produto $Produto)
    {
        $Produto->fill($request->all());
        $Produto->imagem = $Produto::uploadImagem($request);
        $Produto->idCategoria = preg_replace("/[A-Za-z\-]+/","",$Produto->idCategoria);
        $Produto->save();
        return redirect()->route('produtos.index');
    }

    public function show($id)
    {
        $Produto = Produto::findOrFail($id);
        return view('admin.produtos.show', [
            'Produto' => $Produto,
            'Categoria' => Categoria::findOrFail($Produto->idCategoria),
        ]);
    }

    public function edit($id)
    {
        return view('admin.produtos.edit', [
            'Produto' => Produto::findOrFail($id),
            'categorias' => Categoria::all(),
        ]);
    }

    public function update(Request $request, $id)
    {   
        $novoProduto = [
            "nome" => $request->nome,
            "descricao" => $request->descricao,
            "imagem" => Produto::uploadImagem($request),
            "preco" => $request->preco,
            'ativo' => $request->ativo,
            "estoque" => $request->estoque,
            "idCategoria" => preg_replace("/[A-Za-z\-]+/","",$request->idCategoria) 
        ];
        Produto::findOrFail($id)->update($novoProduto);
        return redirect()->route('produtos.index');
    }

    public function destroy($id)
    {
        $Produto = Produto::findOrFail($id)->delete();
        return redirect()->route('produtos.index');
    }

    public function dashboard() 
    {
        return view('admin.produtos.dashboard',['Produtos' => Produto::all()]);
    } 
}
