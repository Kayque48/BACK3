<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoques - Confecção</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --color-dark-purple: #2d1b4e;
            --color-black-dark: #0a0014;
            --color-black-card: #0f0f1e;
            --color-purple-bright: #9d4edd;
            --color-purple-light: #c77dff;
            --color-pink-accent: #ff006e;
            --color-white: #ffffff;
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
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            gap: 1rem;
            animation: slideDown 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .header-left h1 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
        }

        .header-left p {
            color: rgba(199, 125, 255, 0.7);
            font-size: 1rem;
        }

        .header-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            font-size: 0.95rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--color-purple-bright) 0%, var(--color-pink-accent) 100%);
            color: var(--color-white);
        }

        .btn-primary:hover {
            box-shadow: 0 8px 24px rgba(157, 78, 221, 0.4);
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: rgba(157, 78, 221, 0.2);
            color: var(--color-purple-light);
            border: 2px solid var(--color-purple-bright);
        }

        .btn-secondary:hover {
            background: rgba(157, 78, 221, 0.3);
        }

        .glass-card {
            background: rgba(15, 15, 30, 0.7);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(157, 78, 221, 0.2);
            border-radius: 1rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            animation: fadeInUp 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: linear-gradient(135deg, rgba(157, 78, 221, 0.2) 0%, rgba(199, 125, 255, 0.1) 100%);
            border-bottom: 2px solid var(--color-purple-bright);
        }

        th {
            padding: 1.5rem;
            text-align: left;
            font-weight: 700;
            color: var(--color-purple-light);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        tbody tr {
            border-bottom: 1px solid rgba(157, 78, 221, 0.1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        tbody tr:hover {
            background: rgba(157, 78, 221, 0.1);
        }

        td {
            padding: 1.5rem;
            color: var(--color-white);
        }

        .quantity {
            color: var(--color-purple-light);
            font-weight: 700;
            font-size: 1.1rem;
        }

        .status-bar {
            display: inline-block;
            width: 150px;
            height: 8px;
            background: rgba(157, 78, 221, 0.2);
            border-radius: 10px;
            overflow: hidden;
        }

        .status-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--color-purple-bright) 0%, var(--color-pink-accent) 100%);
            transition: width 0.3s ease;
        }

        .badge {
            display: inline-block;
            padding: 0.35rem 0.85rem;
            border-radius: 999px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .badge-success {
            background: rgba(16, 185, 129, 0.2);
            color: #10b981;
        }

        .badge-warning {
            background: rgba(245, 158, 11, 0.2);
            color: #f59e0b;
        }

        .badge-danger {
            background: rgba(239, 68, 68, 0.2);
            color: #ef4444;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .stat-card {
            background: rgba(15, 15, 30, 0.7);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(157, 78, 221, 0.2);
            border-radius: 1rem;
            padding: 1.5rem;
            text-align: center;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            animation: fadeInUp 0.6s cubic-bezier(0.4, 0, 0.2, 1) 0.1s backwards;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            border-color: rgba(157, 78, 221, 0.4);
            box-shadow: 0 12px 48px rgba(157, 78, 221, 0.2);
        }

        .stat-card h3 {
            color: rgba(199, 125, 255, 0.7);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.5rem;
        }

        .stat-card .number {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--color-purple-bright) 0%, var(--color-pink-accent) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: rgba(199, 125, 255, 0.7);
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                align-items: flex-start;
            }

            .header-buttons {
                width: 100%;
            }

            .btn {
                flex: 1;
                justify-content: center;
            }

            th, td {
                padding: 1rem 0.5rem;
                font-size: 0.85rem;
            }

            h1 {
                font-size: 1.8rem;
            }

            .status-bar {
                width: 100px;
            }
        }
    </style>
</head>
<body>
    <div class="container-glass">
        <!-- Header -->
        <div class="header">
            <div class="header-left">
                <h1><i class="fas fa-boxes"></i> Estoques</h1>
                <p>Controle e gerencie seu estoque de produtos</p>
            </div>
            <div class="header-buttons">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                    <i class="fas fa-home"></i> Dashboard
                </a>
                <a href="{{ route('estoques.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Novo Estoque
                </a>
            </div>
        </div>

        <!-- Table Card -->
        <div class="glass-card">
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th><i class="fas fa-hashtag"></i> ID</th>
                            <th><i class="fas fa-shirt"></i> Produto</th>
                            <th><i class="fas fa-warehouse"></i> Quantidade</th>
                            <th><i class="fas fa-exclamation"></i> Mínimo</th>
                            <th><i class="fas fa-chart-bar"></i> Status</th>
                            <th><i class="fas fa-flag"></i> Condição</th>
                            <th><i class="fas fa-sync"></i> Atualizado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($estoques ?? [] as $estoque)
                            <tr>
                                <td><strong>#{{ $estoque->id }}</strong></td>
                                <td>{{ $estoque->produto_id ?? 'N/A' }}</td>
                                <td class="quantity">{{ $estoque->quantidade ?? 0 }}</td>
                                <td>{{ $estoque->quantidade_minima ?? 0 }}</td>
                                <td>
                                    <div class="status-bar">
                                        @php
                                            $percent = min(100, ($estoque->quantidade ?? 0) / max(1, ($estoque->quantidade_minima ?? 1)) * 100);
                                        @endphp
                                        <div class="status-fill" style="width: {{ $percent }}%"></div>
                                    </div>
                                </td>
                                <td>
                                    @php
                                        $condition = ($estoque->quantidade ?? 0) >= ($estoque->quantidade_minima ?? 0) ? 'success' : 'danger';
                                    @endphp
                                    <span class="badge badge-{{ $condition }}">
                                        {{ ($estoque->quantidade ?? 0) >= ($estoque->quantidade_minima ?? 0) ? 'Adequado' : 'Baixo' }}
                                    </span>
                                </td>
                                <td style="font-size: 0.9rem;">{{ $estoque->updated_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    <div class="empty-state">
                                        <i class="fas fa-inbox"></i>
                                        <p style="font-size: 1.1rem; margin-bottom: 0.5rem;"><strong>Nenhum estoque cadastrado</strong></p>
                                        <p>Crie um novo registro de estoque para começar</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Statistics -->
        <div class="stats">
            <div class="stat-card">
                <h3><i class="fas fa-boxes"></i> Total de Itens</h3>
                <div class="number">{{ $estoques->count() ?? 0 }}</div>
            </div>
            <div class="stat-card">
                <h3><i class="fas fa-check-circle"></i> Adequados</h3>
                <div class="number" style="color: #10b981;">{{ $estoques->where('quantidade', '>=', 'quantidade_minima')->count() ?? 0 }}</div>
            </div>
            <div class="stat-card">
                <h3><i class="fas fa-exclamation-triangle"></i> Baixo Estoque</h3>
                <div class="number" style="color: #ef4444;">{{ $estoques->where('quantidade', '<', 'quantidade_minima')->count() ?? 0 }}</div>
            </div>
            <div class="stat-card">
                <h3><i class="fas fa-cubes"></i> Quantidade Total</h3>
                <div class="number">{{ $estoques->sum('quantidade') ?? 0 }}</div>
            </div>
        </div>
    </div>
</body>
</html>