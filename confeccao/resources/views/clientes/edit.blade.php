<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente - Confecção</title>
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
            --spacing-sm: 1rem;
            --spacing-md: 1.5rem;
            --spacing-lg: 2rem;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--color-dark-purple) 0%, var(--color-black-dark) 100%);
            color: var(--color-white);
            min-height: 100vh;
        }

        .container-glass {
            max-width: 800px;
            margin: 0 auto;
            padding: var(--spacing-lg);
            animation: slideDown 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .page-header {
            margin-bottom: var(--spacing-lg);
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .page-header-text h1 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .page-header-text p {
            color: rgba(199, 125, 255, 0.7);
            font-size: 1rem;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.25rem;
            background: transparent;
            color: var(--color-purple-light);
            border: 2px solid var(--color-purple-bright);
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            font-size: 0.9rem;
            font-family: 'Poppins', sans-serif;
            white-space: nowrap;
        }

        .btn-back:hover {
            background: rgba(157, 78, 221, 0.1);
            box-shadow: 0 4px 12px rgba(157, 78, 221, 0.2);
        }

        .glass-card {
            background: rgba(15, 15, 30, 0.7);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(157, 78, 221, 0.2);
            border-radius: 1rem;
            padding: var(--spacing-lg);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            animation: fadeInUp 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-header {
            background: linear-gradient(135deg, rgba(157, 78, 221, 0.2) 0%, rgba(199, 125, 255, 0.1) 100%);
            border-bottom: 2px solid var(--color-purple-bright);
            padding: var(--spacing-md);
            margin: calc(-1 * var(--spacing-lg)) calc(-1 * var(--spacing-lg)) var(--spacing-lg) calc(-1 * var(--spacing-lg));
            border-radius: 1rem 1rem 0 0;
            font-weight: 700;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--color-purple-light);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .badge-id {
            background: rgba(157, 78, 221, 0.2);
            border: 1px solid rgba(157, 78, 221, 0.4);
            border-radius: 0.4rem;
            padding: 0.2rem 0.75rem;
            font-size: 0.8rem;
            color: var(--color-purple-light);
            font-weight: 600;
        }

        .form-group { margin-bottom: var(--spacing-md); }
        .form-group:last-child { margin-bottom: 0; }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--color-purple-light);
            font-size: 0.95rem;
        }

        label .required { color: var(--color-pink-accent); }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: var(--spacing-sm);
            background: rgba(157, 78, 221, 0.1);
            border: 2px solid rgba(157, 78, 221, 0.2);
            border-radius: 0.5rem;
            color: var(--color-white);
            font-family: 'Poppins', sans-serif;
            font-size: 0.95rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            background: rgba(157, 78, 221, 0.15);
            border-color: var(--color-purple-bright);
            box-shadow: 0 0 20px rgba(157, 78, 221, 0.3);
        }

        input::placeholder { color: rgba(199, 125, 255, 0.5); }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: var(--spacing-md);
        }

        .form-grid .form-group { margin-bottom: 0; }

        .toggle-switch {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: var(--spacing-md);
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

        .switch input { opacity: 0; width: 0; height: 0; }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0; left: 0; right: 0; bottom: 0;
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

        input:checked + .slider { background-color: var(--color-purple-bright); }
        input:checked + .slider:before { transform: translateX(22px); }

        .toggle-label {
            color: var(--color-purple-light);
            font-weight: 600;
            font-size: 0.95rem;
        }

        .form-actions {
            display: flex;
            gap: var(--spacing-sm);
            margin-top: var(--spacing-lg);
            padding-top: var(--spacing-lg);
            border-top: 1px solid rgba(157, 78, 221, 0.2);
            justify-content: flex-end;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: var(--spacing-sm) var(--spacing-lg);
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
            box-shadow: 0 4px 12px rgba(157, 78, 221, 0.2);
        }

        .alert {
            padding: var(--spacing-md);
            border-radius: 0.5rem;
            border-left: 4px solid;
            margin-bottom: var(--spacing-md);
            display: flex;
            gap: 1rem;
            align-items: flex-start;
        }

        .alert-error {
            background: rgba(239, 68, 68, 0.1);
            border-color: #ef4444;
            color: #fca5a5;
        }

        .alert-icon { font-size: 1.2rem; flex-shrink: 0; }

        .alert-content ul {
            list-style-position: inside;
            margin-top: 0.5rem;
        }

        .alert-content li { margin-bottom: 0.25rem; }

        .info-box {
            background: rgba(59, 130, 246, 0.1);
            border: 1px solid rgba(59, 130, 246, 0.3);
            border-radius: 0.5rem;
            padding: var(--spacing-md);
            margin-top: var(--spacing-lg);
            color: #93c5fd;
            display: flex;
            gap: 1rem;
            align-items: flex-start;
        }

        .info-icon { font-size: 1.2rem; flex-shrink: 0; margin-top: 0.25rem; }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 768px) {
            .container-glass { padding: var(--spacing-md); }
            .page-header-text h1 { font-size: 1.8rem; }
            .form-grid { grid-template-columns: 1fr; }
            .form-actions { flex-direction: column-reverse; }
            .btn { width: 100%; justify-content: center; }
        }
    </style>
</head>
<body>
    <div class="container-glass">

        <!-- Page Header -->
        <div class="page-header">
            <div class="page-header-text">
                <h1><i class="fas fa-user-pen"></i> Editar Cliente</h1>
                <p>Atualize os dados do cliente abaixo</p>
            </div>
            <a href="{{ route('clientes.index') }}" class="btn-back">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>
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
                <span><i class="fas fa-address-card"></i> Dados do Cliente</span>
                <span class="badge-id"># {{ $clientes->id }}</span>
            </div>

            <form action="{{ route('clientes.update', ['clientes' => $clientes->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Nome -->
                <div class="form-group">
                    <label for="nome">
                        Nome Completo <span class="required">*</span>
                    </label>
                    <input
                        type="text"
                        id="nome"
                        name="nome"
                        value="{{ old('nome', $clientes->nome) }}"
                        placeholder="Digite o nome completo"
                        required
                    >
                    @error('nome')
                        <small style="color: #ef4444; margin-top: 0.25rem; display: block;">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Grid para Email e CPF -->
                <div class="form-grid">
                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">
                            E-mail <span class="required">*</span>
                        </label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email', $clientes->email) }}"
                            placeholder="seu@email.com"
                            required
                        >
                        @error('email')
                            <small style="color: #ef4444; margin-top: 0.25rem; display: block;">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- CPF -->
                    <div class="form-group">
                        <label for="cpf">
                            CPF <span class="required">*</span>
                        </label>
                        <input
                            type="text"
                            id="cpf"
                            name="cpf"
                            value="{{ old('cpf', $clientes->cpf) }}"
                            placeholder="000.000.000-00"
                            maxlength="14"
                            style="font-family: 'Space Mono', monospace;"
                            required
                        >
                        @error('cpf')
                            <small style="color: #ef4444; margin-top: 0.25rem; display: block;">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Telefone -->
                <div class="form-group">
                    <label for="telefone">
                        Telefone <span class="required">*</span>
                    </label>
                    <input
                        type="tel"
                        id="telefone"
                        name="telefone"
                        value="{{ old('telefone', $clientes->telefone) }}"
                        placeholder="(00) 00000-0000"
                        maxlength="15"
                        required
                    >
                    @error('telefone')
                        <small style="color: #ef4444; margin-top: 0.25rem; display: block;">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Reserva Toggle -->
                <div class="form-group">
                    <label style="margin-bottom: var(--spacing-sm);">Reserva</label>
                    <div class="toggle-switch">
                        <label class="switch">
                            <input
                                type="checkbox"
                                id="reserva-toggle"
                                onchange="updateReserva()"
                                {{ old('reserva', $clientes->reserva) ? 'checked' : '' }}
                            >
                            <span class="slider"></span>
                        </label>
                        <input type="hidden" name="reserva" id="reserva-input" value="{{ old('reserva', $clientes->reserva) ? '1' : '0' }}">
                        <span class="toggle-label" id="reserva-label">
                            {{ old('reserva', $clientes->reserva) ? 'Reservado' : 'Não reservado' }}
                        </span>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-floppy-disk"></i> Salvar Alterações
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
                <p style="margin-top: 0.5rem;">Os campos marcados com <span style="color: var(--color-pink-accent);">*</span> são obrigatórios e precisam ser preenchidos para atualizar o cliente com sucesso.</p>
            </div>
        </div>

    </div>

    <script>
        // Toggle Reserva
        function updateReserva() {
            const toggle = document.getElementById('reserva-toggle');
            const input  = document.getElementById('reserva-input');
            const label  = document.getElementById('reserva-label');

            if (toggle.checked) {
                input.value = '1';
                label.textContent = 'Reservado';
            } else {
                input.value = '0';
                label.textContent = 'Não reservado';
            }
        }

        // CPF Mask
        document.getElementById('cpf').addEventListener('input', function(e) {
            let v = e.target.value.replace(/\D/g, '').slice(0, 11);
            v = v.replace(/(\d{3})(\d)/, '$1.$2');
            v = v.replace(/(\d{3})(\d)/, '$1.$2');
            v = v.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
            e.target.value = v;
        });

        // Telefone Mask
        document.getElementById('telefone').addEventListener('input', function(e) {
            let v = e.target.value.replace(/\D/g, '').slice(0, 11);
            if (v.length <= 10) {
                v = v.replace(/(\d{2})(\d)/, '($1) $2');
                v = v.replace(/(\d{4})(\d)/, '$1-$2');
            } else {
                v = v.replace(/(\d{2})(\d)/, '($1) $2');
                v = v.replace(/(\d{5})(\d)/, '$1-$2');
            }
            e.target.value = v;
        });
    </script>
</body>
</html>