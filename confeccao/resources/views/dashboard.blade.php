<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Confecção</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    
    <style>
        :root {
            --color-dark-purple: #2d1b4e;
            --color-black-dark: #0a0014;
            --color-black-card: #0f0f1e;
            --color-purple-bright: #9d4edd;
            --color-purple-light: #c77dff;
            --color-pink-accent: #ff006e;
            --color-white: #ffffff;
            --color-success: #10b981;
            --color-warning: #f59e0b;
            --color-danger: #ef4444;
            --color-info: #3b82f6;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--color-dark-purple) 0%, var(--color-black-dark) 100%);
            color: var(--color-white);
            min-height: 100vh;
        }

        .container-glass {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }

        .page-header {
            margin-bottom: 2rem;
            animation: slideDown 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .page-header h1 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .page-header p {
            color: rgba(199, 125, 255, 0.7);
            font-size: 1rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: rgba(15, 15, 30, 0.7);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(157, 78, 221, 0.2);
            border-radius: 1rem;
            padding: 1.5rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            animation: fadeInUp 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .stat-card:hover {
            transform: translateY(-8px);
            border-color: rgba(157, 78, 221, 0.4);
            box-shadow: 0 12px 48px rgba(157, 78, 221, 0.2);
        }

        .stat-card-icon {
            width: 50px;
            height: 50px;
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .stat-card-icon.success {
            background: rgba(16, 185, 129, 0.2);
            color: var(--color-success);
        }

        .stat-card-icon.warning {
            background: rgba(245, 158, 11, 0.2);
            color: var(--color-warning);
        }

        .stat-card-icon.danger {
            background: rgba(239, 68, 68, 0.2);
            color: var(--color-danger);
        }

        .stat-card-icon.info {
            background: rgba(59, 130, 246, 0.2);
            color: var(--color-info);
        }

        .stat-card h3 {
            color: rgba(199, 125, 255, 0.7);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .stat-card .number {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--color-purple-bright) 0%, var(--color-pink-accent) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stat-card .change {
            font-size: 0.85rem;
            margin-top: 0.75rem;
            padding-top: 0.75rem;
            border-top: 1px solid rgba(157, 78, 221, 0.2);
            color: rgba(199, 125, 255, 0.6);
        }

        .charts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .chart-card {
            background: rgba(15, 15, 30, 0.7);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(157, 78, 221, 0.2);
            border-radius: 1rem;
            padding: 1.5rem;
            animation: fadeInUp 0.6s cubic-bezier(0.4, 0, 0.2, 1) 0.1s backwards;
        }

        .chart-card h3 {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--color-purple-light);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .chart-container {
            position: relative;
            height: 300px;
        }

        .recent-activity {
            background: rgba(15, 15, 30, 0.7);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(157, 78, 221, 0.2);
            border-radius: 1rem;
            padding: 1.5rem;
            animation: fadeInUp 0.6s cubic-bezier(0.4, 0, 0.2, 1) 0.2s backwards;
        }

        .recent-activity h3 {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--color-purple-light);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .activity-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 0;
            border-bottom: 1px solid rgba(157, 78, 221, 0.1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .activity-item:hover {
            background: rgba(157, 78, 221, 0.1);
            padding-left: 0.5rem;
            border-radius: 0.5rem;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            flex-shrink: 0;
        }

        .activity-icon.success {
            background: rgba(16, 185, 129, 0.2);
            color: var(--color-success);
        }

        .activity-icon.warning {
            background: rgba(245, 158, 11, 0.2);
            color: var(--color-warning);
        }

        .activity-content {
            flex: 1;
        }

        .activity-content p {
            font-size: 0.95rem;
            margin-bottom: 0.25rem;
        }

        .activity-content time {
            font-size: 0.8rem;
            color: rgba(199, 125, 255, 0.5);
        }

        .badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .badge-success {
            background: rgba(16, 185, 129, 0.2);
            color: var(--color-success);
        }

        .badge-warning {
            background: rgba(245, 158, 11, 0.2);
            color: var(--color-warning);
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 1024px) {
            .charts-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .container-glass {
                padding: 1rem;
            }

            .page-header h1 {
                font-size: 1.8rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .charts-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container-glass">
        <!-- Page Header -->
        <div class="page-header">
            <h1><i class="fas fa-chart-line"></i> Dashboard</h1>
            <p>Visão geral do seu negócio de confecção</p>
        </div>

        <!-- Statistics Cards -->
        <div class="stats-grid">
            <!-- Total de Clientes -->
            <div class="stat-card">
                <div class="stat-card-icon info">
                    <i class="fas fa-users"></i>
                </div>
                <h3>Total de Clientes</h3>
                <div class="number">127</div>
                <div class="change">
                    <i class="fas fa-arrow-up"></i> +12 este mês
                </div>
            </div>

            <!-- Total de Produtos -->
            <div class="stat-card">
                <div class="stat-card-icon success">
                    <i class="fas fa-shirt"></i>
                </div>
                <h3>Total de Produtos</h3>
                <div class="number">45</div>
                <div class="change">
                    <i class="fas fa-arrow-up"></i> +3 este mês
                </div>
            </div>

            <!-- Pedidos Pendentes -->
            <div class="stat-card">
                <div class="stat-card-icon warning">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <h3>Pedidos Pendentes</h3>
                <div class="number">18</div>
                <div class="change">
                    <i class="fas fa-arrow-down"></i> -5 desde ontem
                </div>
            </div>

            <!-- Receita Mensal -->
            <div class="stat-card">
                <div class="stat-card-icon success">
                    <i class="fas fa-money-bill-wave"></i>
                </div>
                <h3>Receita do Mês</h3>
                <div class="number">R$ 28.5k</div>
                <div class="change">
                    <i class="fas fa-arrow-up"></i> +8% vs mês anterior
                </div>
            </div>
        </div>

        <!-- Charts Grid -->
        <div class="charts-grid">
            <!-- Sales by Month Chart -->
            <div class="chart-card">
                <h3><i class="fas fa-chart-bar"></i> Vendas por Mês</h3>
                <div class="chart-container">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>

            <!-- Orders Status Chart -->
            <div class="chart-card">
                <h3><i class="fas fa-pie-chart"></i> Status dos Pedidos</h3>
                <div class="chart-container">
                    <canvas id="ordersChart"></canvas>
                </div>
            </div>

            <!-- Products Stock Chart -->
            <div class="chart-card">
                <h3><i class="fas fa-boxes"></i> Produtos em Estoque</h3>
                <div class="chart-container">
                    <canvas id="stockChart"></canvas>
                </div>
            </div>

            <!-- Customers Growth Chart -->
            <div class="chart-card">
                <h3><i class="fas fa-users"></i> Crescimento de Clientes</h3>
                <div class="chart-container">
                    <canvas id="customersChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="recent-activity">
            <h3><i class="fas fa-history"></i> Atividade Recente</h3>

            <!-- Activity Items -->
            <div class="activity-item">
                <div class="activity-icon success">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="activity-content">
                    <p><strong>Novo pedido concluído</strong> - Pedido #1024 finalizado</p>
                    <time>Há 2 horas</time>
                </div>
                <div class="badge badge-success">Concluído</div>
            </div>

            <div class="activity-item">
                <div class="activity-icon warning">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="activity-content">
                    <p><strong>Novo cliente cadastrado</strong> - Maria Silva iniciou cadastro</p>
                    <time>Há 4 horas</time>
                </div>
                <div class="badge badge-warning">Novo</div>
            </div>

            <div class="activity-item">
                <div class="activity-icon success">
                    <i class="fas fa-plus-circle"></i>
                </div>
                <div class="activity-content">
                    <p><strong>Produto adicionado</strong> - Jaqueta de Denim adicionada ao catálogo</p>
                    <time>Há 6 horas</time>
                </div>
                <div class="badge badge-success">Adicionado</div>
            </div>

            <div class="activity-item">
                <div class="activity-icon success">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="activity-content">
                    <p><strong>Pedido aprovado</strong> - Pedido #1023 foi aprovado</p>
                    <time>Há 8 horas</time>
                </div>
                <div class="badge badge-success">Aprovado</div>
            </div>

            <div class="activity-item">
                <div class="activity-icon warning">
                    <i class="fas fa-exclamation-circle"></i>
                </div>
                <div class="activity-content">
                    <p><strong>Estoque baixo</strong> - 5 produtos com estoque abaixo do mínimo</p>
                    <time>Há 10 horas</time>
                </div>
                <div class="badge badge-warning">Atenção</div>
            </div>
        </div>
    </div>

    <script>
        // Chart Colors
        const chartColors = {
            primary: '#9d4edd',
            secondary: '#ff006e',
            success: '#10b981',
            warning: '#f59e0b',
            danger: '#ef4444',
            info: '#3b82f6',
            light: 'rgba(199, 125, 255, 0.2)',
            lightSecondary: 'rgba(255, 0, 110, 0.2)'
        };

        // Chart Options
        const chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    labels: {
                        color: '#c77dff',
                        font: { family: "'Poppins', sans-serif" }
                    }
                }
            },
            scales: {
                y: {
                    ticks: { color: '#c77dff' },
                    grid: { color: 'rgba(157, 78, 221, 0.1)' }
                },
                x: {
                    ticks: { color: '#c77dff' },
                    grid: { color: 'rgba(157, 78, 221, 0.1)' }
                }
            }
        };

        // Sales Chart
        new Chart(document.getElementById('salesChart'), {
            type: 'bar',
            data: {
                labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
                datasets: [{
                    label: 'Vendas (R$ mil)',
                    data: [12, 19, 3, 25, 20, 28.5],
                    backgroundColor: chartColors.primary,
                    borderColor: chartColors.secondary,
                    borderWidth: 2,
                    borderRadius: 6
                }]
            },
            options: chartOptions
        });

        // Orders Status Chart
        new Chart(document.getElementById('ordersChart'), {
            type: 'doughnut',
            data: {
                labels: ['Concluído', 'Pendente', 'Processando', 'Cancelado'],
                datasets: [{
                    data: [45, 18, 12, 5],
                    backgroundColor: [
                        chartColors.success,
                        chartColors.warning,
                        chartColors.info,
                        chartColors.danger
                    ],
                    borderColor: 'rgba(15, 15, 30, 0.7)',
                    borderWidth: 2
                }]
            },
            options: {
                ...chartOptions,
                plugins: {
                    ...chartOptions.plugins,
                    legend: {
                        ...chartOptions.plugins.legend,
                        position: 'bottom'
                    }
                }
            }
        });

        // Stock Chart
        new Chart(document.getElementById('stockChart'), {
            type: 'line',
            data: {
                labels: ['Sem 1', 'Sem 2', 'Sem 3', 'Sem 4', 'Sem 5', 'Sem 6'],
                datasets: [{
                    label: 'Itens em Estoque',
                    data: [120, 135, 128, 145, 140, 155],
                    borderColor: chartColors.primary,
                    backgroundColor: chartColors.light,
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: chartColors.secondary,
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 5
                }]
            },
            options: chartOptions
        });

        // Customers Chart
        new Chart(document.getElementById('customersChart'), {
            type: 'line',
            data: {
                labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
                datasets: [{
                    label: 'Novos Clientes',
                    data: [15, 22, 18, 28, 32, 45],
                    borderColor: chartColors.secondary,
                    backgroundColor: chartColors.lightSecondary,
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: chartColors.primary,
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 5
                }]
            },
            options: chartOptions
        });
    </script>
</body>
</html>

</x-app-layout>
