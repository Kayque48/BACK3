<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Produto - Confecção</title>
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
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
            animation: slideDown 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .page-header {
            margin-bottom: 2rem;
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

        .glass-card {
            background: rgba(15, 15, 30, 0.7);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(157, 78, 221, 0.2);
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            animation: fadeInUp 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-header {
            background: linear-gradient(135deg, rgba(157, 78, 221, 0.2) 0%, rgba(199, 125, 255, 0.1) 100%);
            border-bottom: 2px solid var(--color-purple-bright);
            padding: 1.5rem;
            margin: -2rem -2rem 2rem -2rem;
            border-radius: 1rem 1rem 0 0;
            font-weight: 700;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--color-purple-light);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--color-purple-light);
            font-size: 0.95rem;
        }

        label .required {
            color: var(--color-pink-accent);
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 1rem;
            background: rgba(157, 78, 221, 0.1);
            border: 2px solid rgba(157, 78, 221, 0.2);
            border-radius: 0.5rem;
            color: var(--color-white);
            font-family: 'Poppins', sans-serif;
            font-size: 0.95rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        input:focus,
        textarea:focus {
            outline: none;
            background: rgba(157, 78, 221, 0.15);
            border-color: var(--color-purple-bright);
            box-shadow: 0 0 20px rgba(157, 78, 221, 0.3);
        }

        input::placeholder {
            color: rgba(199, 125, 255, 0.5);
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .form-grid .form-group {
            margin-bottom: 0;
        }

        .toggle-switch {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.5rem;
            background: rgba(157, 78, 221, 0.1);
            border: 2px solid rgba(157, 78, 221, 0.2);
            border-radius: 0.5rem;
            margin-top: 0.5rem;
        }

        .switch {
            position: relative;
            display: inline-flex;
            width: 50px;
            height: 28px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(157, 78, 221, 0.3);
            transition: 0.3s;
            border-radius: 28px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 22px;
            width: 22px;
            left: 3px;
            bottom: 3px;
            background-color: var(--color-white);
            transition: 0.3s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: var(--color-purple-bright);
        }

        input:checked + .slider:before {
            transform: translateX(22px);
        }

        .toggle-label {
            color: var(--color-purple-light);
            font-weight: 600;
            font-size: 0.95rem;
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(157, 78, 221, 0.2);
            justify-content: flex-end;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 1rem 1.5rem;
            border: none;
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            font-size: 0.95rem;
            font-family: 'Poppins', sans-serif;
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
            background: transparent;
            color: var(--color-purple-light);
            border: 2px solid var(--color-purple-bright);
        }

        .btn-secondary:hover {
            background: rgba(157, 78, 221, 0.1);
        }

        .alert {
            padding: 1.5rem;
            border-radius: 0.5rem;
            border-left: 4px solid;
            margin-bottom: 1.5rem;
            display: flex;
            gap: 1rem;
            align-items: flex-start;
        }

        .alert-error {
            background: rgba(239, 68, 68, 0.1);
            border-color: #ef4444;
            color: #fca5a5;
        }

        .alert-icon {
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .alert-content ul {
            list-style-position: inside;
            margin-top: 0.5rem;
        }

        .alert-content li {
            margin-bottom: 0.25rem;
        }

        .info-box {
            background: rgba(59, 130, 246, 0.1);
            border: 1px solid rgba(59, 130, 246, 0.3);
            border-radius: 0.5rem;
            padding: 1.5rem;
            margin-top: 2rem;
            color: #93c5fd;
            display: flex;
            gap: 1rem;
            align-items: flex-start;
        }

        .info-icon {
            font-size: 1.2rem;
            flex-shrink: 0;
            margin-top: 0.25rem;
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
            .container-glass {
                padding: 1rem;
            }

            .page-header h1 {
                font-size: 1.8rem;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-actions {
                flex-direction: column-reverse;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="container-glass">
        <!-- Page Header -->
        <div class="page-header">
            <h1><i class="fas fa-plus-circle"></i> Novo Produto</h1>
            <p>Preencha os dados abaixo para adicionar um novo produto ao catálogo</p>
        </div>

        <!-- Error Alerts -->
        @if($errors->any())
            <div class="alert alert-error">
                <div class="alert-icon">
                    <i class="fas fa-circle-exclamation"></i>
                </div>
                <div class="alert-content">
                    <strong>Corrija os erros abaixo:</strong>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <!-- Form Card -->
        <div class="glass-card">
            <div class="card-header">
                <i class="fas fa-shirt"></i> Informações do Produto
            </div>

            <form action="{{ route('produtos.store') }}" method="POST">
                @csrf

                <!-- Nome -->
                <div class="form-group">
                    <label for="nome">
                        Nome do Produto <span class="required">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="nome" 
                        name="nome" 
                        value="{{ old('nome') }}"
                        placeholder="Ex: Camiseta Básica Branca"
                        required
                    >
                    @error('nome')
                        <small style="color: #ef4444; margin-top: 0.25rem; display: block;">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Descrição -->
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea 
                        id="descricao" 
                        name="descricao" 
                        placeholder="Descreva o produto com detalhes..."
                    >{{ old('descricao') }}</textarea>
                    @error('descricao')
                        <small style="color: #ef4444; margin-top: 0.25rem; display: block;">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Grid para Quantidade e Preço -->
                <div class="form-grid">
                    <!-- Quantidade -->
                    <div class="form-group">
                        <label for="quantidade">
                            Quantidade <span class="required">*</span>
                        </label>
                        <input 
                            type="number" 
                            id="quantidade" 
                            name="quantidade" 
                            value="{{ old('quantidade', 0) }}"
                            placeholder="0"
                            min="0"
                            required
                        >
                        @error('quantidade')
                            <small style="color: #ef4444; margin-top: 0.25rem; display: block;">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Preço -->
                    <div class="form-group">
                        <label for="preco">
                            Preço (R$) <span class="required">*</span>
                        </label>
                        <input 
                            type="number" 
                            id="preco" 
                            name="preco" 
                            value="{{ old('preco', 0) }}"
                            placeholder="0,00"
                            min="0"
                            step="0.01"
                            required
                        >
                        @error('preco')
                            <small style="color: #ef4444; margin-top: 0.25rem; display: block;">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Reserva Toggle -->
                <div class="form-group">
                    <label style="margin-bottom: 1rem;">Reserva</label>
                    <div class="toggle-switch">
                        <label class="switch">
                            <input type="checkbox" id="reserva-toggle" onchange="updateReserva()">
                            <span class="slider"></span>
                        </label>
                        <input type="hidden" name="reserva" id="reserva-input" value="0">
                        <span class="toggle-label" id="reserva-label">Não reservado</span>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <a href="/produtos" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-check"></i> Adicionar Produto
                    </button>
                </div>
            </form>
        </div>

        <!-- Info Box -->
        <div class="info-box">
            <div class="info-icon">
                <i class="fas fa-info-circle"></i>
            </div>
            <div>
                <strong>Campos obrigatórios:</strong>
                <p style="margin-top: 0.5rem;">Os campos marcados com <span style="color: #ff006e;">*</span> são obrigatórios. A descrição é opcional mas recomendada para melhor apresentação do produto.</p>
            </div>
        </div>
    </div>

    <script>
        function updateReserva() {
            const toggle = document.getElementById('reserva-toggle');
            const input = document.getElementById('reserva-input');
            const label = document.getElementById('reserva-label');

            if (toggle.checked) {
                input.value = '1';
                label.textContent = 'Reservado';
            } else {
                input.value = '0';
                label.textContent = 'Não reservado';
            }
        }
    </script>
</body>
</html>