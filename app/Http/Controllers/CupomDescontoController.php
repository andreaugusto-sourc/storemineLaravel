<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CupomDesconto;
class CupomDescontoController extends Controller
{
    //
    public function create()
    {
        return view("admin.cupons.create");
    }

    public function store(Request $request, CupomDesconto $CupomDesconto)
    {
        $CupomDesconto->fill($request->all());
        $CupomDesconto->save();
        return redirect()->route('produtos.index');
    }

    public function show($id)
    {
        $CupomDesconto = CupomDesconto::findOrFail($id);
        return view('admin.cupons.show',compact('CupomDesconto'));
    }

    public function edit($id)
    {
        $CupomDesconto = CupomDesconto::findOrFail($id);
        return view('admin.cupons.edit',compact('CupomDesconto'));
    }
    
    public function update(Request $request, $id)
    {
        $CupomDesconto = CupomDesconto::findOrFail($id)->update($request->all());
        return redirect()->route('produtos.index');
    }

    public function destroy($id)
    {
        $CupomDesconto = CupomDesconto::findOrFail($id)->delete();
        return redirect()->route('produtos.index');
    }

    public function dashboard() 
    {
        return view('admin.cupons.dashboard',['CuponsDesconto' => CupomDesconto::all()]);
    } 

}
