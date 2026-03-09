<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstoquesController extends Controller
{
    public function index() {
        $estoques = \App\Models\Estoques::all();
        return view('estoques.index', compact('estoques'));
    }

    public function create() {
        $produtos  = \App\Models\Produto::all();
        return view('estoques.create', compact('produtos'));
    }

    public function store(Request $request) {
        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer',
            'localizacao' => 'required|string|max:255',
        ]);

        \App\Models\Estoques::create($request->all());

        return redirect()->route('estoques.index')->with('success', 'Estoque cadastrado com sucesso!');
    }
}
