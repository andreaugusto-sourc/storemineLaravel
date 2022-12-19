<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{

    public function create()
    {
        return view('admin.categorias.create');
    }

    public function store(Request $request,Categoria $Categoria)
    {
        $Categoria->fill($request->all());
        $Categoria->save();
        return redirect()->route('produtos.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $Categoria = Categoria::findOrFail($id);
        return view("admin.categorias.edit",compact('Categoria'));
    }

    public function update(Request $request, $id)
    {
        Categoria::findOrFail($id)->update($request->all());
        return redirect()->route("produtos.index");
    }

    public function destroy($id)
    {
        $Categoria = Categoria::findOrFail($id)->delete();
        return redirect()->route("produtos.index");
    }

    public function dashboard()
    {
        $Categorias = Categoria::all();
        return view('admin.categorias.dashboard',compact('Categorias'));
    }
}
