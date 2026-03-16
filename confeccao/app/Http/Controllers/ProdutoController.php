<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index() {
        $produto = Produto::all();
        return view('produtos.index', compact('produto'));
    }

    public function create() {
        return view('produtos.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nome'      => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco'     => 'required|numeric',
            'quantidade'=> 'required|integer',
            'reserva'   => 'nullable|boolean',
        ]);
        Produto::create($request->all());
        return redirect()->route('produtos.index')->with('success', 'Produto cadastrado com sucesso!');
    }

    public function edit(Produto $produtos) { // ← era "Produtos" (errado)
        return view('produtos.edit', compact('produtos'));
    }

    public function update(Request $request, Produto $produtos) { // ← era "Produtos"
        $request->validate([
            'nome'      => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco'     => 'required|numeric',
            'quantidade'=> 'required|integer',
            'reserva'   => 'nullable|boolean',
        ]);
        $produtos->update($request->all()); // ← era "$clientes" (errado!)
        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produtos) { // ← era "Produtos"
        $produtos->delete();
        return redirect()->route('produtos.index')->with('success', 'Produto excluído com sucesso!');
    }
}