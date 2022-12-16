<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Produto;
class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Produto::all();
        if(request("busca")){
            $produtos = Produto::where('nome', 'like', '%'.request('busca').'%')->get();
        }
        return view('produtos.index',['produtos' => $produtos]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('produtos.create',['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Produto $Produto)
    {
        $Produto->fill($request->all());
        $Produto->imagem = $Produto::uploadImagem($request);
        $Produto->idCategoria = preg_replace("/[A-Za-z\-]+/","",$Produto->idCategoria);
        $Produto->save();
        return redirect()->route('produtos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Produto = Produto::findOrFail($id);
        return view('produtos.show', [
            'produto' => $Produto,
            'categoria' => Categoria::findOrFail($Produto->idCategoria),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('produtos.edit', [
            'produto' => Produto::findOrFail($id),
            'categorias' => Categoria::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $novoProduto = [
            "nome" => $request->nome,
            "descricao" => $request->descricao,
            "imagem" => Produto::uploadImagem($request),
            "preco" => $request->preco,
            "estoque" => $request->estoque,
            "idCategoria" => preg_replace("/[A-Za-z\-]+/","",$request->idCategoria) 
        ];
        Produto::findOrFail($id)->update($novoProduto);
        return redirect()->route('produtos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Produto = Produto::findOrFail($id)->delete();
        return redirect()->route('produtos.index');
    }

    public function dashboard() 
    {
        return view('produtos.dashboard',['Produtos' => Produto::all()]);
    } 
}
