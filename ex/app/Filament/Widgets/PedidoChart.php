<?php

namespace App\Filament\Widgets;

use App\Models\Pedido;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class PedidoChart extends ChartWidget
{
    protected ?string $heading = 'Pedidos por Status (últimos 6 meses)';
    protected static ?int $sort = 4;
    protected string $color = 'danger';

    protected function getData(): array
    {
        $labels = collect(range(5, 0))->map(
            fn ($m) => Carbon::now()->subMonths($m)->translatedFormat('M/Y')
        )->values()->toArray();

        $statuses = [
            'pendente'     => ['label' => 'Pendente',     'color' => '#f59e0b'],
            'em_producao'  => ['label' => 'Em Produção',  'color' => '#6366f1'],
            'finalizado'   => ['label' => 'Finalizado',   'color' => '#22c55e'],
        ];

        $datasets = collect($statuses)->map(function ($meta, $status) {
            $data = collect(range(5, 0))->map(function ($monthsAgo) use ($status) {
                $date = Carbon::now()->subMonths($monthsAgo);
                return Pedido::where('status', $status)
                    ->whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)
                    ->count();
            })->values()->toArray();

            return [
                'label' => $meta['label'],
                'data' => $data,
                'borderColor' => $meta['color'],
                'backgroundColor' => $meta['color'] . '33',
                'fill' => false,
                'tension' => 0.4,
            ];
        })->values()->toArray();

        return [
            'datasets' => $datasets,
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}