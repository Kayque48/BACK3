<?php

namespace App\Filament\Widgets;

use App\Models\Fornecedor;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class FornecedorChart extends ChartWidget
{
    protected ?string $heading = 'Fornecedores Cadastrados por Mês';
    protected static ?int $sort = 3;
    protected string $color = 'success';

    protected function getData(): array
    {
        $data = collect(range(5, 0))->map(function ($monthsAgo) {
            $date = Carbon::now()->subMonths($monthsAgo);
            return Fornecedor::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();
        });

        $labels = collect(range(5, 0))->map(
            fn ($m) => Carbon::now()->subMonths($m)->translatedFormat('M/Y')
        );

        return [
            'datasets' => [
                [
                    'label' => 'Fornecedores',
                    'data' => $data->values()->toArray(),
                    'backgroundColor' => 'rgba(34, 197, 94, 0.8)',
                    'borderColor' => '#16a34a',
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