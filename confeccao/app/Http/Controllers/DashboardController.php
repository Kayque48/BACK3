<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Produto;
use App\Models\Pedidos;
use App\Models\Fornecedores;
use App\Models\Estoques;

class DashboardController extends Controller
{
    public function index()
    {
        // Contagens gerais
        $totalClientes    = Clientes::count();
        $totalProdutos    = Produto::count();
        $totalFornecedores = Fornecedores::count();
        $totalPedidos     = Pedidos::count();

        // Pedidos por status
        $pedidosPendentes  = Pedidos::where('status', 'pendente')->count();
        $pedidosAprovados  = Pedidos::where('status', 'aprovado')->count();
        $pedidosEntregues  = Pedidos::where('status', 'entregue')->count();
        $pedidosCancelados = Pedidos::where('status', 'cancelado')->count();

        // Estoque
        $totalEstoque      = Estoques::sum('quantidade');
        $semEstoque        = Estoques::where('quantidade', 0)->count();

        // Pedidos recentes (últimos 5)
        $pedidosRecentes = Pedidos::with(['cliente', 'produto'])
            ->latest()
            ->take(5)
            ->get();

        // Pedidos por mês (últimos 6 meses) para o gráfico
        $pedidosPorMes = collect(range(5, 0))->map(function ($i) {
            $mes = now()->subMonths($i);
            return [
                'label' => $mes->translatedFormat('M'),
                'total' => Pedidos::whereYear('created_at', $mes->year)
                                  ->whereMonth('created_at', $mes->month)
                                  ->count(),
            ];
        });

        // Clientes por mês (últimos 6 meses)
        $clientesPorMes = collect(range(5, 0))->map(function ($i) {
            $mes = now()->subMonths($i);
            return [
                'label' => $mes->translatedFormat('M'),
                'total' => Clientes::whereYear('created_at', $mes->year)
                                   ->whereMonth('created_at', $mes->month)
                                   ->count(),
            ];
        });

        return view('dashboard', compact(
            'totalClientes',
            'totalProdutos',
            'totalFornecedores',
            'totalPedidos',
            'pedidosPendentes',
            'pedidosAprovados',
            'pedidosEntregues',
            'pedidosCancelados',
            'totalEstoque',
            'semEstoque',
            'pedidosRecentes',
            'pedidosPorMes',
            'clientesPorMes',
        ));
    }
}