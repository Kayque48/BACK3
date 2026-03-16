<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes - Confecção</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* ================================
           VARIABLES
        ================================= */

        :root {
            --color-dark-purple: #2d1b4e;
            --color-black-dark: #0a0014;
            --color-black-card: #0f0f1e;

            --color-purple-bright: #9d4edd;
            --color-purple-light: #c77dff;

            --color-pink-accent: #ff006e;
            --color-white: #ffffff;

            --spacing-sm: 1rem;
            --spacing-md: 1.5rem;
            --spacing-lg: 2rem;
        }

        /* ================================
           GLOBAL
        ================================= */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg,
                    var(--color-dark-purple) 0%,
                    var(--color-black-dark) 100%);
            color: var(--color-white);
            min-height: 100vh;
        }

        .container-glass {
            max-width: 1200px;
            margin: auto;
            padding: var(--spacing-lg);
            animation: fadeIn 0.5s ease;
        }

        /* ================================
           HEADER
        ================================= */

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;

            margin-bottom: var(--spacing-lg);
            gap: 1rem;
        }

        .page-header h1 {
            font-size: 2.2rem;
            font-weight: 800;
            display: flex;
            align-items: center;
            gap: .8rem;
        }

        .page-header p {
            color: rgba(199, 125, 255, 0.7);
            font-size: .95rem;
        }

        /* ================================
           CARD
        ================================= */

        .glass-card {
            background: rgba(15, 15, 30, 0.7);
            backdrop-filter: blur(20px);

            border: 1px solid rgba(157, 78, 221, 0.2);
            border-radius: 1rem;

            padding: var(--spacing-lg);

            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .card-header {
            background: linear-gradient(135deg,
                    rgba(157, 78, 221, 0.2),
                    rgba(199, 125, 255, 0.1));

            border-bottom: 2px solid var(--color-purple-bright);

            padding: var(--spacing-md);

            margin: -2rem -2rem 2rem -2rem;

            border-radius: 1rem 1rem 0 0;

            font-weight: 700;
            letter-spacing: .5px;
            text-transform: uppercase;

            color: var(--color-purple-light);
        }

        /* ================================
           TABLE
        ================================= */

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: rgba(157, 78, 221, 0.2);
        }

        th,
        td {
            padding: 1rem;
            text-align: left;
            font-size: .9rem;
        }

        th {
            color: var(--color-purple-light);
            font-weight: 600;
        }

        tbody tr {
            border-top: 1px solid rgba(157, 78, 221, 0.1);
            transition: .2s;
        }

        tbody tr:hover {
            background: rgba(157, 78, 221, 0.08);
        }

        /* ================================
           BADGES
        ================================= */

        .badge {
            padding: .3rem .8rem;
            border-radius: 999px;
            font-size: .75rem;
            font-weight: 600;
        }

        .badge-success {
            background: rgba(34, 197, 94, 0.15);
            color: #4ade80;
        }

        .badge-danger {
            background: rgba(239, 68, 68, 0.15);
            color: #f87171;
        }

        /* ================================
           BUTTONS
        ================================= */

        .btn {
            display: inline-flex;
            align-items: center;
            gap: .5rem;

            padding: .6rem 1.2rem;

            border-radius: .5rem;

            font-size: .9rem;
            font-weight: 600;

            text-decoration: none;
            cursor: pointer;

            transition: .25s;
        }

        .btn-primary {
            background: linear-gradient(135deg,
                    var(--color-purple-bright),
                    var(--color-pink-accent));
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(157, 78, 221, .4);
        }

        .btn-secondary {
            border: 2px solid var(--color-purple-bright);
            color: var(--color-purple-light);
        }

        .btn-secondary:hover {
            background: rgba(157, 78, 221, 0.1);
        }

        /* ================================
           STATS
        ================================= */

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));

            gap: 1rem;
            margin-top: 2rem;
        }

        .stat-card {
            background: rgba(15, 15, 30, 0.7);

            border: 1px solid rgba(157, 78, 221, 0.2);

            padding: 1.5rem;
            border-radius: 1rem;
        }

        .stat-card h3 {
            font-size: .8rem;
            text-transform: uppercase;

            color: var(--color-purple-light);
        }

        .stat-card p {
            font-size: 2rem;
            font-weight: 700;
            margin-top: .5rem;
        }

        /* ================================
           ANIMATION
        ================================= */

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body>

    <div class="container-glass">

        <!-- HEADER -->
        <div class="page-header">

            <div>
                <h1>
                    <i class="fas fa-users"></i>
                    Clientes
                </h1>

                <p>Lista de clientes cadastrados</p>
            </div>

            <div style="display:flex; gap:10px;">

                <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                    <i class="fas fa-home"></i>
                    Dashboard
                </a>

                <a href="{{ route('clientes.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    Novo Cliente
                </a>

            </div>
        </div>

        <!-- TABLE -->
        <div class="glass-card">

            <div class="card-header">
                <i class="fas fa-table"></i>
                Tabela de Clientes
            </div>

            <table>

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Reserva</th>
                        <th>Criado</th>
                        <th>Atualizado</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($clientes ?? [] as $cliente)

                        <tr>

                            <td>{{ $cliente->id }}</td>

                            <td>{{ $cliente->nome }}</td>

                            <td style="font-family:monospace">
                                {{ $cliente->cpf }}
                            </td>

                            <td>{{ $cliente->telefone }}</td>

                            <td>{{ $cliente->email }}</td>

                            <td>
                                <span
                                    class="badge {{ $cliente->reserva ? 'badge-success' : 'badge-danger' }}">
                                    {{ $cliente->reserva ? 'Sim' : 'Não' }}
                                </span>
                            </td>

                            <td>
                                {{ $cliente->created_at->format('d/m/Y H:i') }}
                            </td>

                            <td>
                                {{ $cliente->updated_at->format('d/m/Y H:i') }}
                            </td>

                           <td style="display: flex; gap: 0.5rem; align-items: center;">
                                <a href="{{ route('clientes.edit', ['clientes' => $cliente->id]) }}" class="btn btn-secondary" style="padding: .4rem .9rem; font-size: .8rem;">
                                    <i class="fas fa-pen"></i>
                                    Editar
                                </a>

                                <form action="{{ route('clientes.destroy', ['clientes' => $cliente->id]) }}" method="POST"
                                    onsubmit="return confirm('Tem certeza que deseja excluir este cliente?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn" style="padding: .4rem .9rem; font-size: .8rem; background: rgba(239,68,68,0.15); color: #f87171; border: 2px solid #ef4444;">
                                        <i class="fas fa-trash"></i>
                                        Excluir
                                    </button>
                                </form>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="9"
                                style="text-align:center;padding:2rem;color:#aaa;">
                                Nenhum cliente cadastrado
                            </td>
                        </tr>

                    @endforelse
                    
                </tbody>

            </table>

        </div>

        <!-- STATS -->
        <div class="stats">

            <div class="stat-card">
                <h3>Total de Clientes</h3>
                <p>{{ $clientes->count() ?? 0 }}</p>
            </div>

            <div class="stat-card">
                <h3>Reservados</h3>
                <p>{{ $clientes->where('reserva', 1)->count() ?? 0 }}</p>
            </div>

            <div class="stat-card">
                <h3>Disponíveis</h3>
                <p>{{ $clientes->where('reserva', 0)->count() ?? 0 }}</p>
            </div>

        </div>

    </div>

</body>

</html>