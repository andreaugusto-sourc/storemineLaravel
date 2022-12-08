<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
class AdminController extends Controller
{
    //
    public function dashboard()
    {
        $Produtos = Produto::all();
        return redirect('admin.dashboard',["Produtos" => $Produtos]);
    }
}
