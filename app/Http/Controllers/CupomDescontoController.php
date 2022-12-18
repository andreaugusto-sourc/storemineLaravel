<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CupomDescontoController extends Controller
{
    //
    public function create()
    {
        return view("admin.cupons.create");
    }
}
