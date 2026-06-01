<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Pedido;
use App\Observers\PedidoObserver;
use App\Mail\PedidoRecebidoMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Cliente;
use App\Filament\Widgets\InsumoChart;
use App\Filament\Widgets\StatsOverview;
use App\Filament\Widgets\ClienteChart;
use App\Filament\Widgets\FornecedorChart;
use App\Filament\Widgets\PedidoChart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Admin tem livre acesso
        Gate:: before(function ($user, $ability) {
            return $user->hasRole('admin') ? true : null;
        });

        // Vincula o Model ao Observer
        Pedido::observe(PedidoObserver::class);
    }
}
