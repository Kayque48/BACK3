<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;

class ClienteController extends Controller
{
    // Lista clientes
    public function index() {
        $clientes = \App\Models\Clientes::all(); // Busca todos os clientes
        return view('clientes.index', compact('clientes'));
    }

    // Exibe o formulário de cadastro
    public function create() {
        return view('clientes.create');
    }

    // Recebe os dados do formulário e salva no banco de dados
    public function store(Request $request) {
        // 1. Validação simples para evitar dados vazios ou duplicados
        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|unique:clientes',
            'email' => 'required|email|unique:clientes',
            'telefone' => 'required|string',
            // 'endereco' => 'nullable|string',
        ]);

        // 2. Salva o novo cliente
       \App\Models\Clientes::create($request->all());

        // 3. Redireciona de volta para a lista com uma mensagem de sucesso
        return redirect()->route('clientes.index')->with('success', 'Cliente cadastrado com sucesso!');

    }

    // Exibe o formulário de cadastro
    public function edit(Clientes $clientes) {
        return view('clientes.edit', compact('clientes'));
    }

    // Recebe os dados do formulário e salva no banco de dados
    public function update(Request $request, Clientes $clientes) {
        // 1. Validação simples para evitar dados vazios ou duplicados
        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|unique:clientes,cpf,' . $clientes->id,
            'email' => 'required|email|unique:clientes,email,' . $clientes->id,
            'telefone' => 'required|string',
            // 'endereco' => 'nullable|string',
        ]);

        // 2. Salva o novo cliente
       $clientes->update($request->all());

        // 3. Redireciona de volta para a lista com uma mensagem de sucesso
        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso!');

    }

    public function destroy(Clientes $clientes) {
        $clientes->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente excluído com sucessso!');
    }
}


