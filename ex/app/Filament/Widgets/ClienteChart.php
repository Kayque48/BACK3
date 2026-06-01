<?php

namespace App\Filament\Widgets;

use App\Models\Cliente;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class ClienteChart extends ChartWidget
{
    protected ?string $heading = 'Novos Clientes por Mês';
    protected static ?int $sort = 2;
    protected string $color = 'primary';

    protected function getData(): array
    {
        $data = collect(range(5, 0))->map(function ($monthsAgo) {
            $date = Carbon::now()->subMonths($monthsAgo);
            return Cliente::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();
        });

        $labels = collect(range(5, 0))->map(
            fn ($m) => Carbon::now()->subMonths($m)->translatedFormat('M/Y')
        );

        return [
            'datasets' => [
                [
                    'label' => 'Clientes',
                    'data' => $data->values()->toArray(),
                    'borderColor' => '#6366f1',
                    'backgroundColor' => 'rgba(99, 102, 241, 0.1)',
                    'fill' => true,
                    'tension' => 0.4,
                ],
            ],
            'labels' => $labels->values()->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}