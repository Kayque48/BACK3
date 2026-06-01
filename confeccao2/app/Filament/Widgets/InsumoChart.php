<?php

namespace App\Filament\Widgets;

use App\Models\Insumo;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class InsumoChart extends ChartWidget
{
    protected ?string $heading = 'Insumos Cadastrados por Mês';
    protected static ?int $sort = 5;
    protected string $color = 'warning';

    protected function getData(): array
    {
        $data = collect(range(5, 0))->map(function ($monthsAgo) {
            $date = Carbon::now()->subMonths($monthsAgo);
            return Insumo::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();
        });

        $labels = collect(range(5, 0))->map(
            fn ($m) => Carbon::now()->subMonths($m)->translatedFormat('M/Y')
        );

        return [
            'datasets' => [
                [
                    'label' => 'Insumos',
                    'data' => $data->values()->toArray(),
                    'backgroundColor' => 'rgba(245, 158, 11, 0.8)',
                    'borderColor' => '#d97706',
                    'borderRadius' => 6,
                ],
            ],
            'labels' => $labels->values()->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}