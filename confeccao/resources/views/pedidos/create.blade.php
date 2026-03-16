<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Pedido - Confecção</title>
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
            max-width: 900px;
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
            margin-bottom: 2rem;
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
        input[type="date"],
        select,
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

        select {
            cursor: pointer;
        }

        select option {
            background: var(--color-black-dark);
            color: var(--color-white);
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            background: rgba(157, 78, 221, 0.15);
            border-color: var(--color-purple-bright);
            box-shadow: 0 0 20px rgba(157, 78, 221, 0.3);
        }

        input::placeholder {
            color: rgba(199, 125, 255, 0.5);
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .form-grid .form-group {
            margin-bottom: 0;
        }

        .form-actions {
            display: flex;
            gap: 1rem;
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
            <h1><i class="fas fa-plus-circle"></i> Novo Pedido</h1>
            <p>Preencha os dados abaixo para criar um novo pedido</p>
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

        <!-- Form Card - Pedido Info -->
        <div class="glass-card">
            <div class="card-header">
                <i class="fas fa-shopping-cart"></i> Informações do Pedido
            </div>

            <form action="{{ route('pedidos.store') }}" method="POST">
                @csrf

                <!-- Grid para Cliente ID e Data -->
                <div class="form-grid">
                    <!-- Cliente -->
                    <div class="form-group">
                        <label for="cliente_id">
                            Cliente <span class="required">*</span>
                        </label>
                        <select id="cliente_id" name="cliente_id" required>
                            <option value="">Selecione um cliente</option>
                            <!-- Adicione aqui os clientes disponíveis -->
                        </select>
                        @error('cliente_id')
                            <small style="color: #ef4444; margin-top: 0.25rem; display: block;">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- PRODUTO DO PEDIDO -->
                    <div class="form-group">
                        <label for="produto_id">
                            Produto do Pedido <span class="required">*</span>
                        </label>
                        <select id="produto_id" name="produto_id" required>
                            <option value="">Selecione um produto</option>
                            <!-- Adicione aqui os produtos disponíveis -->
                        </select>
                        @error('produto_id')
                            <small style="color: #ef4444; margin-top: 0.25rem; display: block;">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Data do Pedido -->
                    <div class="form-group">
                        <label for="data_pedido">
                            Data do Pedido <span class="required">*</span>
                        </label>
                        <input 
                            type="date" 
                            id="data_pedido" 
                            name="data_pedido" 
                            value="{{ old('data_pedido', date('Y-m-d')) }}"
                            required
                        >
                        @error('data_pedido')
                            <small style="color: #ef4444; margin-top: 0.25rem; display: block;">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Total -->
                <div class="form-group">
                    <label for="total">
                        Total (R$) <span class="required">*</span>
                    </label>
                    <input 
                        type="number" 
                        id="total" 
                        name="total" 
                        value="{{ old('total', 0) }}"
                        placeholder="0,00"
                        min="0"
                        step="0.01"
                        required
                    >
                    @error('total')
                        <small style="color: #ef4444; margin-top: 0.25rem; display: block;">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label for="status">
                        Status <span class="required">*</span>
                    </label>
                    <select id="status" name="status" required>
                        <option value="pendente" {{ old('status') == 'pendente' ? 'selected' : '' }}>Pendente</option>
                        <option value="processando" {{ old('status') == 'processando' ? 'selected' : '' }}>Processando</option>
                        <option value="concluído" {{ old('status') == 'concluído' ? 'selected' : '' }}>Concluído</option>
                        <option value="cancelado" {{ old('status') == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                    </select>
                    @error('status')
                        <small style="color: #ef4444; margin-top: 0.25rem; display: block;">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Observações -->
                <div class="form-group">
                    <label for="observacoes">Observações</label>
                    <textarea 
                        id="observacoes" 
                        name="observacoes" 
                        placeholder="Adicione informações adicionais sobre o pedido..."
                        style="min-height: 100px;"
                    >{{ old('observacoes') }}</textarea>
                    @error('observacoes')
                        <small style="color: #ef4444; margin-top: 0.25rem; display: block;">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <a href="/pedido" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-check"></i> Criar Pedido
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
                <strong>Informações importantes:</strong>
                <p style="margin-top: 0.5rem;">Os campos marcados com <span style="color: #ff006e;">*</span> são obrigatórios. Você pode adicionar observações para melhor rastreamento do pedido.</p>
            </div>
        </div>
    </div>
</body>
</html>