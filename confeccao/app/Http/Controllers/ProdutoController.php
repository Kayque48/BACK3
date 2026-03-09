<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index() {

        $produto = \App\Models\Produto::all();
        return view('produtos.index', compact('produto'));
        
    }

    public function create() {
        return view('produtos.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric',
            'quantidade' => 'required|integer',
            'reserva' => 'required|boolean',
        ]);

        \App\Models\Produto::create($request->all());

        return redirect()->route('produtos.index')->with('success', 'Produto cadastrado com sucesso!');
    }
}
