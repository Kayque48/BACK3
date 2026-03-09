<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Confecção') }}</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Confecção - Glassmorphism Theme (Purple & Black) */
        
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
            --radius-md: 1rem;
            --radius-lg: 1.5rem;
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

        .navbar {
            background: rgba(15, 15, 30, 0.8);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(157, 78, 221, 0.2);
            padding: var(--spacing-md) var(--spacing-lg);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .navbar-brand {
            font-size: 1.4rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--color-purple-bright) 0%, var(--color-pink-accent) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: var(--spacing-lg);
            align-items: center;
        }

        .nav-link {
            color: var(--color-white);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            font-size: 0.95rem;
        }

        .nav-link:after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(135deg, var(--color-purple-bright) 0%, var(--color-pink-accent) 100%);
            transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .nav-link:hover:after {
            width: 100%;
        }

        .nav-link:hover {
            color: var(--color-purple-light);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: var(--spacing-sm) var(--spacing-lg);
            border: none;
            border-radius: var(--radius-md);
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            font-size: 0.95rem;
            font-family: inherit;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--color-purple-bright) 0%, var(--color-pink-accent) 100%);
            color: var(--color-white);
            border: 2px solid transparent;
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
            border-radius: var(--radius-md);
            padding: var(--spacing-md);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .glass-card:hover {
            background: rgba(15, 15, 30, 0.85);
            border-color: rgba(157, 78, 221, 0.4);
            box-shadow: 0 12px 48px rgba(157, 78, 221, 0.2);
            transform: translateY(-4px);
        }

        .container-glass {
            max-width: 1200px;
            margin: 0 auto;
            padding: var(--spacing-lg);
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: var(--spacing-sm);
            background: rgba(157, 78, 221, 0.1);
            border: 2px solid rgba(157, 78, 221, 0.2);
            border-radius: var(--radius-md);
            color: var(--color-white);
            font-family: inherit;
            font-size: 0.95rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            background: rgba(157, 78, 221, 0.15);
            border-color: var(--color-purple-bright);
            box-shadow: 0 0 20px rgba(157, 78, 221, 0.3);
        }

        input::placeholder {
            color: rgba(199, 125, 255, 0.5);
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--color-purple-light);
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-slide { animation: slideDown 0.4s cubic-bezier(0.4, 0, 0.2, 1); }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar animate-slide">
        <div class="container-glass" style="display: flex; justify-content: space-between; align-items: center; padding: 0;">
            <a href="{{ route('dashboard') }}" class="navbar-brand">
                <i class="fas fa-scissors"></i> Confecção
            </a>

            <div class="nav-links">
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home"></i> Dashboard
                </a>
                <a href="{{ route('clientes.index') }}" class="nav-link {{ request()->routeIs('clientes.*') ? 'active' : '' }}">
                    <i class="fas fa-users"></i> Clientes
                </a>
                <a href="{{ route('produtos.index') }}" class="nav-link {{ request()->routeIs('produtos.*') ? 'active' : '' }}">
                    <i class="fas fa-shirt"></i> Produtos
                </a>
                <a href="{{ route('fornecedores.index') }}" class="nav-link {{ request()->routeIs('fornecedores.*') ? 'active' : '' }}">
                    <i class="fas fa-truck"></i> Fornecedores
                </a>
                <a href="{{ route('pedidos.index') }}" class="nav-link {{ request()->routeIs('pedidos.*') ? 'active' : '' }}">
                    <i class="fas fa-shopping-cart"></i> Pedidos
                </a>
                <a href="{{ route('estoques.index') }}" class="nav-link {{ request()->routeIs('estoques.*') ? 'active' : '' }}">
                    <i class="fas fa-boxes"></i> Estoque
                </a>

                <!-- User Dropdown -->
                <div style="border-left: 1px solid rgba(157, 78, 221, 0.2); padding-left: var(--spacing-lg);">
                    <div style="position: relative;">
                        <button onclick="toggleDropdown()" style="background: none; border: none; color: var(--color-white); cursor: pointer; font-size: 1rem;">
                            <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                        </button>
                        <div id="userDropdown" style="display: none; position: absolute; top: 100%; right: 0; background: rgba(15, 15, 30, 0.95); backdrop-filter: blur(20px); border: 1px solid rgba(157, 78, 221, 0.2); border-radius: var(--radius-md); min-width: 200px; z-index: 1000; box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);">
                            <a href="{{ route('profile.edit') }}" style="display: block; padding: var(--spacing-sm); color: var(--color-white); text-decoration: none; border-bottom: 1px solid rgba(157, 78, 221, 0.2);">
                                <i class="fas fa-cog"></i> Perfil
                            </a>
                            <form method="POST" action="{{ route('logout') }}" style="display: block;">
                                @csrf
                                <button type="submit" style="width: 100%; padding: var(--spacing-sm); background: none; border: none; color: var(--color-white); cursor: pointer; text-align: left;">
                                    <i class="fas fa-sign-out-alt"></i> Sair
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main class="container-glass">
        {{ $slot }}
    </main>

    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('userDropdown');
            dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('userDropdown');
            if (!event.target.closest('button') && dropdown) {
                dropdown.style.display = 'none';
            }
        });
    </script>
</body>
</html>