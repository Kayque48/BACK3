<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PedidosController extends Controller
{
    public function index() {
        $pedidos = \App\Models\Pedidos::all();
        return view('pedidos.index', compact('pedidos'));
    }

    public function create() {
        $clientes = \App\Models\Clientes::all();
        $produtos  = \App\Models\Produto::all();
        return view('pedidos.create', compact('clientes', 'produtos')); // ← faltava isso
    }

    public function store(Request $request) { // ← "Reques" estava com typo
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
            'status'     => 'required|string|max:255',
        ]);

        \App\Models\Pedidos::create($request->all());

        return redirect()->route('pedidos.index')->with('success', 'Pedido cadastrado com sucesso!');
    }
}
