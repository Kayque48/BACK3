<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Pokémon</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=Orbitron:wght@400;700;900&family=Fredoka:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --type-normal: #A8A878;
            --type-fire: #F08030;
            --type-water: #6890F0;
            --type-grass: #78C850;
            --type-electric: #F8D030;
            --type-ice: #98D8D8;
            --type-fighting: #C03028;
            --type-poison: #A040A0;
            --type-ground: #E0C068;
            --type-flying: #A890F0;
            --type-psychic: #F85888;
            --type-bug: #A8B820;
            --type-rock: #B8A038;
            --type-ghost: #705898;
            --type-dragon: #7038F8;
            --type-dark: #705848;
            --type-steel: #B8B8D0;
            --type-fairy: #EE99AC;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Fredoka', sans-serif;
            background: linear-gradient(135deg, #E63946 0%, #A4161A 100%);
            min-height: 100vh;
        }

        .pokedex-title {
            font-family: 'Press Start 2P', serif;
            font-size: clamp(1rem, 4vw, 2rem);
            text-shadow: 4px 4px 0px rgba(0, 0, 0, 0.5);
        }

        .pokemon-title {
            font-family: 'Press Start 2P', serif;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .pokedex-card {
            border: 4px solid #333;
            box-shadow: 0 8px 0 rgba(0,0,0,0.3), inset 0 -4px 0 rgba(0,0,0,0.1);
            background: white;
            border-radius: 8px;
        }

        .pixel-input {
            border: 3px solid #333;
            border-radius: 4px;
            padding: 10px 14px;
            font-family: 'Fredoka', sans-serif;
            font-size: 1rem;
            font-weight: 500;
            width: 100%;
            background: #f9f9f9;
            transition: all 0.2s;
            outline: none;
            color: #222;
        }

        .pixel-input:focus {
            border-color: #E63946;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(230, 57, 70, 0.15);
        }

        .pixel-input.error {
            border-color: #C03028;
            background: #fff5f5;
        }

        .pixel-label {
            font-family: 'Press Start 2P', serif;
            font-size: 0.55rem;
            color: #444;
            display: block;
            margin-bottom: 6px;
            letter-spacing: 1px;
        }

        .btn-cadastrar {
            font-family: 'Press Start 2P', serif;
            font-size: 0.7rem;
            background: linear-gradient(135deg, #E63946 0%, #A4161A 100%);
            color: #FFD700;
            border: 4px solid #333;
            border-radius: 6px;
            padding: 14px 32px;
            cursor: pointer;
            letter-spacing: 2px;
            box-shadow: 0 6px 0 rgba(0,0,0,0.3);
            transition: all 0.15s;
            width: 100%;
        }

        .btn-cadastrar:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 0 rgba(0,0,0,0.3);
            filter: brightness(1.1);
        }

        .btn-cadastrar:active {
            transform: translateY(3px);
            box-shadow: 0 2px 0 rgba(0,0,0,0.3);
        }

        .btn-voltar {
            font-family: 'Press Start 2P', serif;
            font-size: 0.55rem;
            background: white;
            color: #333;
            border: 3px solid #333;
            border-radius: 6px;
            padding: 10px 20px;
            cursor: pointer;
            letter-spacing: 1px;
            box-shadow: 0 4px 0 rgba(0,0,0,0.2);
            transition: all 0.15s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-voltar:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 0 rgba(0,0,0,0.2);
        }

        .section-divider {
            border: none;
            border-top: 3px dashed #ddd;
            margin: 24px 0;
        }

        .section-title {
            font-family: 'Press Start 2P', serif;
            font-size: 0.6rem;
            color: #E63946;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 16px;
        }

        .type-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border: 2px solid #333;
            border-radius: 20px;
            font-family: 'Fredoka', sans-serif;
            font-weight: 600;
            font-size: 0.85rem;
            color: white;
            cursor: pointer;
            transition: all 0.2s;
            user-select: none;
        }

        .type-badge:hover { transform: scale(1.05); }
        .type-badge.selected { box-shadow: 0 0 0 3px #333, 0 0 0 5px gold; }

        .type-normal   { background-color: var(--type-normal); }
        .type-fire     { background-color: var(--type-fire); }
        .type-water    { background-color: var(--type-water); }
        .type-grass    { background-color: var(--type-grass); }
        .type-electric { background-color: var(--type-electric); color: #333; }
        .type-ice      { background-color: var(--type-ice); color: #333; }
        .type-fighting { background-color: var(--type-fighting); }
        .type-poison   { background-color: var(--type-poison); }
        .type-ground   { background-color: var(--type-ground); color: #333; }
        .type-flying   { background-color: var(--type-flying); }
        .type-psychic  { background-color: var(--type-psychic); }
        .type-bug      { background-color: var(--type-bug); }
        .type-rock     { background-color: var(--type-rock); }
        .type-ghost    { background-color: var(--type-ghost); }
        .type-dragon   { background-color: var(--type-dragon); }
        .type-dark     { background-color: var(--type-dark); }
        .type-steel    { background-color: var(--type-steel); color: #333; }
        .type-fairy    { background-color: var(--type-fairy); }

        .stat-preview-bar {
            background: #eee;
            border: 2px solid #333;
            border-radius: 4px;
            height: 20px;
            overflow: hidden;
        }

        .stat-preview-fill {
            height: 100%;
            transition: width 0.4s ease;
            border-radius: 2px;
        }

        .alert-success {
            background: linear-gradient(135deg, #d4edda, #c3e6cb);
            border: 3px solid #28a745;
            border-radius: 6px;
            padding: 14px 18px;
            font-family: 'Press Start 2P', serif;
            font-size: 0.55rem;
            color: #155724;
            letter-spacing: 1px;
        }

        .alert-error {
            background: linear-gradient(135deg, #f8d7da, #f5c6cb);
            border: 3px solid #C03028;
            border-radius: 6px;
            padding: 14px 18px;
            font-family: 'Fredoka', sans-serif;
            font-size: 0.95rem;
            color: #721c24;
        }

        .pokeball-deco {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: radial-gradient(circle at 35% 35%, #ff6b6b, #E63946);
            border: 2px solid #333;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="w-full max-w-3xl mx-auto px-4 py-8">

        {{-- Cabeçalho --}}
        <div class="text-center mb-10">
            <div style="display: flex; justify-content: center; gap: 10px; margin-bottom: 15px; flex-wrap: wrap;">
                <a href="/" class="px-5 py-2 bg-blue-600 text-white font-bold rounded-lg border-3 border-gray-900 hover:bg-blue-700 transition uppercase" style="box-shadow: 0 3px 0 rgba(0,0,0,0.3); text-decoration: none; font-size: 0.7rem;">
                    <i class="fas fa-home mr-1"></i>Início
                </a>
                <a href="{{ route('pokemon.index') }}" class="px-5 py-2 bg-green-600 text-white font-bold rounded-lg border-3 border-gray-900 hover:bg-green-700 transition uppercase" style="box-shadow: 0 3px 0 rgba(0,0,0,0.3); text-decoration: none; font-size: 0.7rem;">
                    <i class="fas fa-search mr-1"></i>Buscar
                </a>
            </div>
            <h1 class="pokedex-title mb-3" style="color: #FFD700; text-shadow: 4px 4px 0px #333;">
                <i class="fas fa-plus-circle mr-3" style="color: #FFD700;"></i>NOVO POKÉMON
            </h1>
            <p class="text-white text-lg font-semibold" style="text-shadow: 2px 2px 0px rgba(0,0,0,0.4);">
                Registre um novo Pokémon na Pokédex!
            </p>
        </div>

        {{-- Alertas --}}
        @if(session('sucesso'))
            <div class="alert-success mb-6">
                <i class="fas fa-check-circle mr-2"></i> {{ session('sucesso') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert-error mb-6">
                <p class="font-bold mb-2"><i class="fas fa-exclamation-triangle mr-1"></i> Corrija os erros abaixo:</p>
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Card principal --}}
        <div class="pokedex-card p-6 md:p-8">

            <form action="{{ route('pokemon.store') }}" method="POST">
                @csrf

                {{-- SEÇÃO 1: Informações Básicas --}}
                <p class="section-title"><span class="pokeball-deco mr-2"></span>Informações Básicas</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-4">
                    {{-- Nome --}}
                    <div>
                        <label class="pixel-label" for="name">Nome do Pokémon</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="pixel-input {{ $errors->has('name') ? 'error' : '' }}"
                            value="{{ old('name') }}"
                            placeholder="Ex: Charizard"
                            maxlength="100"
                        >
                        @error('name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Geração --}}
                    <div>
                        <label class="pixel-label" for="generation">Geração</label>
                        <select id="generation" name="generation" class="pixel-input {{ $errors->has('generation') ? 'error' : '' }}">
                            <option value="">-- Selecione --</option>
                            @foreach(['generation-i','generation-ii','generation-iii','generation-iv','generation-v','generation-vi','generation-vii','generation-viii','generation-ix'] as $gen)
                                <option value="{{ $gen }}" {{ old('generation') == $gen ? 'selected' : '' }}>
                                    {{ strtoupper(str_replace('-', ' ', $gen)) }}
                                </option>
                            @endforeach
                        </select>
                        @error('generation')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Altura --}}
                    <div>
                        <label class="pixel-label" for="height">Altura (dm)</label>
                        <input
                            type="number"
                            id="height"
                            name="height"
                            class="pixel-input {{ $errors->has('height') ? 'error' : '' }}"
                            value="{{ old('height') }}"
                            placeholder="Ex: 17"
                            min="1"
                        >
                        @error('height')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Peso --}}
                    <div>
                        <label class="pixel-label" for="weight">Peso (hg)</label>
                        <input
                            type="number"
                            id="weight"
                            name="weight"
                            class="pixel-input {{ $errors->has('weight') ? 'error' : '' }}"
                            value="{{ old('weight') }}"
                            placeholder="Ex: 905"
                            min="1"
                        >
                        @error('weight')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Experiência Base --}}
                    <div>
                        <label class="pixel-label" for="base_experience">Exp. Base</label>
                        <input
                            type="number"
                            id="base_experience"
                            name="base_experience"
                            class="pixel-input {{ $errors->has('base_experience') ? 'error' : '' }}"
                            value="{{ old('base_experience') }}"
                            placeholder="Ex: 240"
                            min="0"
                        >
                        @error('base_experience')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Sprite URL --}}
                    <div>
                        <label class="pixel-label" for="sprite">URL do Sprite</label>
                        <input
                            type="url"
                            id="sprite"
                            name="sprite"
                            class="pixel-input {{ $errors->has('sprite') ? 'error' : '' }}"
                            value="{{ old('sprite') }}"
                            placeholder="https://..."
                        >
                        @error('sprite')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Tipos --}}
                <div class="mb-4">
                    <label class="pixel-label">Tipos (selecione até 2)</label>
                    <div class="flex flex-wrap gap-2" id="tipos-container">
                        @php
                            $tipos = ['normal','fire','water','grass','electric','ice','fighting','poison','ground','flying','psychic','bug','rock','ghost','dragon','dark','steel','fairy'];
                            $tiposIcons = ['normal'=>'⬜','fire'=>'🔥','water'=>'💧','grass'=>'🌿','electric'=>'⚡','ice'=>'❄️','fighting'=>'🥊','poison'=>'☠️','ground'=>'🌍','flying'=>'🦅','psychic'=>'🔮','bug'=>'🐛','rock'=>'🪨','ghost'=>'👻','dragon'=>'🐉','dark'=>'🌑','steel'=>'⚙️','fairy'=>'✨'];
                        @endphp
                        @foreach($tipos as $tipo)
                            <label class="type-badge type-{{ $tipo }} {{ in_array($tipo, (array) old('types', [])) ? 'selected' : '' }}" id="badge-{{ $tipo }}">
                                <input
                                    type="checkbox"
                                    name="types[]"
                                    value="{{ $tipo }}"
                                    class="hidden tipo-check"
                                    {{ in_array($tipo, (array) old('types', [])) ? 'checked' : '' }}
                                >
                                {{ $tiposIcons[$tipo] }} {{ ucfirst($tipo) }}
                            </label>
                        @endforeach
                    </div>
                    @error('types')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Habilidades --}}
                <div class="mb-2">
                    <label class="pixel-label" for="abilities">Habilidades (separadas por vírgula)</label>
                    <input
                        type="text"
                        id="abilities"
                        name="abilities"
                        class="pixel-input {{ $errors->has('abilities') ? 'error' : '' }}"
                        value="{{ old('abilities') }}"
                        placeholder="Ex: blaze, solar-power"
                    >
                    @error('abilities')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <hr class="section-divider">

                {{-- SEÇÃO 2: Status --}}
                <p class="section-title"><span class="pokeball-deco mr-2"></span>Status Base</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    @php
                        $stats = [
                            'hp'               => ['label' => 'HP',              'color' => '#FF6B6B', 'icon' => '❤️'],
                            'attack'           => ['label' => 'Ataque',          'color' => '#FF7F50', 'icon' => '⚔️'],
                            'defense'          => ['label' => 'Defesa',          'color' => '#F4D03F', 'icon' => '🛡️'],
                            'special_attack'   => ['label' => 'Atq. Especial',   'color' => '#6890F0', 'icon' => '✨'],
                            'special_defense'  => ['label' => 'Def. Especial',   'color' => '#FF69B4', 'icon' => '💎'],
                            'speed'            => ['label' => 'Velocidade',      'color' => '#FFD700', 'icon' => '💨'],
                        ];
                    @endphp

                    @foreach($stats as $campo => $info)
                        <div>
                            <label class="pixel-label" for="{{ $campo }}">
                                {{ $info['icon'] }} {{ $info['label'] }}
                            </label>
                            <input
                                type="number"
                                id="{{ $campo }}"
                                name="{{ $campo }}"
                                class="pixel-input stat-input {{ $errors->has($campo) ? 'error' : '' }}"
                                value="{{ old($campo) }}"
                                placeholder="0 – 255"
                                min="0"
                                max="255"
                                data-color="{{ $info['color'] }}"
                            >
                            <div class="stat-preview-bar mt-1">
                                <div
                                    class="stat-preview-fill"
                                    id="bar-{{ $campo }}"
                                    style="width: {{ old($campo) ? min(old($campo)/255*100, 100) : 0 }}%; background: {{ $info['color'] }};"
                                ></div>
                            </div>
                            @error($campo)
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    @endforeach
                </div>

                <hr class="section-divider">

                {{-- Botões --}}
                <div class="flex flex-col md:flex-row gap-4 items-center">
                    <a href="{{ route('pokemon.index') }}" class="btn-voltar">
                        <i class="fas fa-arrow-left mr-1"></i> BUSCAR
                    </a>
                    <a href="/" class="btn-voltar" style="background: #4CAF50; color: white; border-color: #333;">
                        <i class="fas fa-home mr-1"></i> INÍCIO
                    </a>
                    <button type="submit" class="btn-cadastrar">
                        <i class="fas fa-plus mr-2"></i> CADASTRAR POKÉMON
                    </button>
                </div>

            </form>
        </div>

        {{-- Rodapé --}}
        <p class="text-center mt-6 text-white text-sm font-semibold opacity-70">
            Pokédex © {{ date('Y') }} &mdash; Gotta Catch 'Em All!
        </p>
    </div>

    <script>
        // Barras de preview dos stats
        document.querySelectorAll('.stat-input').forEach(input => {
            input.addEventListener('input', function () {
                const val = Math.min(Math.max(parseInt(this.value) || 0, 0), 255);
                const bar = document.getElementById('bar-' + this.id);
                if (bar) {
                    bar.style.width = (val / 255 * 100) + '%';
                }
            });
        });

        // Seleção de tipos (máximo 2)
        document.querySelectorAll('.tipo-check').forEach(check => {
            check.addEventListener('change', function () {
                const checked = document.querySelectorAll('.tipo-check:checked');
                if (checked.length > 2) {
                    this.checked = false;
                }
                // Atualiza visual de selecionado
                document.querySelectorAll('.type-badge').forEach(badge => {
                    const cb = badge.querySelector('.tipo-check');
                    badge.classList.toggle('selected', cb && cb.checked);
                });
            });
        });
    </script>
</body>
</html>