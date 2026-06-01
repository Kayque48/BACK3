<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget\StatListItem;
use Filament\Widgets\StatsOverviewWidget\StatsOverviewWidgetItem;
use Filament\Widgets\StatsOverviewWidget\StatsOverviewWidgetItemCollection;
use App\Models\Estoques;
use App\Models\Produto;
use App\Models\Pedido;
use App\Models\ItemPeido;
use App\Models\Cliente;
use App\Models\Fornecedor;
use App\Models\Insumo;

class StatsOverview extends StatsOverviewWidget
{

    // Atualiza a cada 5 segundos as metrícas do dashboard
    protected ?string $pollingInterval = '10s';

    protected function getStats(): array
    {
        return [
            Stat::make('Total de Clientes', Cliente::count())
                ->description('Clientes cadastrados')
                ->icon('heroicon-o-users')
                ->color('primary'),
            Stat::make('Total de Fornecedores', Fornecedor::count())
                ->description('Fornecedores cadastrados')
                ->icon('heroicon-o-truck')
                ->color('success'),
            Stat::make('Total de Insumos', Insumo::count())
                ->description('Insumos disponíveis')
                ->icon('heroicon-o-shopping-cart')
                ->color('warning'),
            Stat::make('Total de Pedidos', Pedido::count())
                ->description('Pedidos realizados')
                ->icon('heroicon-o-document-text')
                ->color('danger'),
            Stat::make('Total de Produtos', Produto::count())
                ->description('Produtos disponíveis')
                ->icon('heroicon-o-cube')
                ->color('info'),
             Stat::make('Total de Estoques', Estoques::count())
                ->description('Estoques cadastrados')
                ->icon('heroicon-o-archive-box')
                ->color('secondary'),
            Stat::make('Total de Itens de Pedido', ItemPeido::count())
                ->description('Itens de pedido cadastrados')
                ->icon('heroicon-o-clipboard-document-list')
                ->color('primary')
        ];
    }
}
