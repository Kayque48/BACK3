<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedores;

class FornecedoresControllers extends Controller
{
    public function index() {

        $fornecedores = \App\Models\Fornecedores::all();
        return view('fornecedores.index', compact('fornecedores'));
        
    }

    public function create() {
        return view('fornecedores.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefone' => 'required|string|max:20',
            'endereco' => 'required|string|max:255',
            'cnpj' => 'required|string|max:20|unique:fornecedores',
        ]);

        \App\Models\Fornecedores::create($request->all());

        return redirect()->route('fornecedores.index')->with('success', 'Fornecedor cadastrado com sucesso!');
    }

    public function edit(Fornecedores $fornecedores) { // ← era "Produtos" (errado)
        return view('fornecedores.edit', compact('fornecedores'));
    }

    public function update(Request $request, Fornecedores $fornecedores) { // ← era "Produtos"
        $request->validate([
            'nome'      => 'required|string|max:255',
           'email' => 'required|email|max:255',
            'telefone' => 'required|string|max:20',
            'endereco' => 'required|string|max:255',
            'cnpj' => 'required|string|max:20|unique:fornecedores',
        ]);
        $fornecedores->update($request->all()); // ← era "$clientes" (errado!)
        return redirect()->route('fornecedores.index')->with('success', 'Fornecedor atualizado com sucesso!');
    }

    public function destroy(Fornecedores $fornecedores) { // ← era "Produtos"
        $fornecedores->delete();
        return redirect()->route('fornecedores.index')->with('success', 'Fornecedor excluído com sucesso!');
    }
}
