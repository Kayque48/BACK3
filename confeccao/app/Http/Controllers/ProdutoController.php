<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index() {

        $produto = \App\Models\ProdutoControllers::all();
        return view('produto.index', compact('produto'));
        
    }
}
