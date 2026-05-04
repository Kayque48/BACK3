<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokédex - Busca Avançada</title>
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

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Fredoka', sans-serif;
            image-rendering: pixelated;
        }

        .pokemon-title {
            font-family: 'Press Start 2P', serif;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        .pokedex-title {
            font-family: 'Press Start 2P', serif;
            font-size: clamp(1.5rem, 5vw, 3rem);
            text-shadow: 4px 4px 0px rgba(0, 0, 0, 0.5);
        }

        .type-normal { background-color: var(--type-normal); }
        .type-fire { background-color: var(--type-fire); }
        .type-water { background-color: var(--type-water); }
        .type-grass { background-color: var(--type-grass); }
        .type-electric { background-color: var(--type-electric); }
        .type-ice { background-color: var(--type-ice); }
        .type-fighting { background-color: var(--type-fighting); }
        .type-poison { background-color: var(--type-poison); }
        .type-ground { background-color: var(--type-ground); }
        .type-flying { background-color: var(--type-flying); }
        .type-psychic { background-color: var(--type-psychic); }
        .type-bug { background-color: var(--type-bug); }
        .type-rock { background-color: var(--type-rock); }
        .type-ghost { background-color: var(--type-ghost); }
        .type-dragon { background-color: var(--type-dragon); }
        .type-dark { background-color: var(--type-dark); }
        .type-steel { background-color: var(--type-steel); }
        .type-fairy { background-color: var(--type-fairy); }

        .stat-bar {
            background: linear-gradient(90deg, #e0e0e0 0%, #f5f5f5 100%);
            border: 2px solid #333;
            border-radius: 4px;
            overflow: hidden;
            height: 28px;
            display: flex;
            align-items: center;
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.1);
        }

        .stat-fill {
            height: 100%;
            background: linear-gradient(90deg, #4CAF50 0%, #8BC34A 100%);
            width: 0%;
            transition: width 0.5s ease;
            border-right: 2px solid #333;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 12px;
            color: white;
            text-shadow: 1px 1px 0 rgba(0,0,0,0.5);
        }

        .stat-hp { background: linear-gradient(90deg, #FF6B6B 0%, #FF8E8E 100%); }
        .stat-atk { background: linear-gradient(90deg, #FF7F50 0%, #FFA07A 100%); }
        .stat-def { background: linear-gradient(90deg, #F4D03F 0%, #F9E79F 100%); }
        .stat-spa { background: linear-gradient(90deg, #6890F0 0%, #98D8FF 100%); }
        .stat-spd { background: linear-gradient(90deg, #FF69B4 0%, #FFB6D9 100%); }
        .stat-spe { background: linear-gradient(90deg, #FFD700 0%, #FFED4E 100%); }

        .pokemon-card {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .pokemon-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }

        .pokedex-card {
            border: 4px solid #333;
            box-shadow: 0 8px 0 rgba(0,0,0,0.3), inset 0 -4px 0 rgba(0,0,0,0.1);
            background: white;
            border-radius: 8px;
        }

        .pokemon-display {
            position: relative;
            background: linear-gradient(135deg, rgba(255,255,255,0.9) 0%, rgba(240,240,240,0.9) 100%);
            border: 3px solid #333;
            border-radius: 8px;
            padding: 20px;
            min-height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .pokemon-image-container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 250px;
            position: relative;
            z-index: 1;
        }

        .pokemon-image-container img {
            image-rendering: pixelated;
            image-rendering: -moz-crisp-edges;
            image-rendering: crisp-edges;
            filter: drop-shadow(0 4px 8px rgba(0,0,0,0.2));
        }

        .shiny-toggle {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #ffd700 0%, #ffed4e 100%);
            padding: 8px 16px;
            border: 3px solid #333;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.2s;
        }

        .shiny-toggle:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(255, 215, 0, 0.4);
        }

        .shiny-toggle.active {
            background: linear-gradient(135deg, #ffff00 0%, #ffff99 100%);
            box-shadow: 0 0 20px rgba(255, 215, 0, 0.8);
        }

        .generation-badge {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 8px 16px;
            border: 2px solid #333;
            border-radius: 6px;
            font-weight: bold;
            font-size: 12px;
        }
    </style>
</head>
<body class="bg-gradient-to-b from-red-700 via-red-600 to-red-800 min-h-screen" style="background: linear-gradient(135deg, #E63946 0%, #A4161A 100%);">
    <div class="w-full max-w-6xl mx-auto px-4 py-8">
        <!-- Cabeçalho Pokémon Game -->
        <div class="text-center mb-12">
            <div style="display: flex; justify-content: center; gap: 10px; margin-bottom: 15px;">
                <a href="/" class="px-6 py-3 bg-blue-600 text-white font-bold rounded-lg border-4 border-gray-900 hover:bg-blue-700 transition uppercase" style="box-shadow: 0 4px 0 rgba(0,0,0,0.3); text-decoration: none; display: inline-block;">
                    <i class="fas fa-home mr-2"></i>Início
                </a>
                <a href="{{ route('pokemon.create') }}" class="px-6 py-3 bg-purple-600 text-white font-bold rounded-lg border-4 border-gray-900 hover:bg-purple-700 transition uppercase" style="box-shadow: 0 4px 0 rgba(0,0,0,0.3); text-decoration: none; display: inline-block;">
                    <i class="fas fa-plus-circle mr-2"></i>Novo Pokémon
                </a>
            </div>
            <h1 class="pokedex-title text-white mb-2" style="color: #FFD700; text-shadow: 4px 4px 0px #333;">
                <i class="fas fa-book text-red-400 mr-3"></i>POKÉDEX
            </h1>
            <p class="text-white text-lg font-bold" style="text-shadow: 2px 2px 0px rgba(0,0,0,0.5);">Gotta Catch 'Em All!</p>
        </div>

        <!-- Barra de Busca R -->
        <div class="mb-12">
            <form id="searchForm" class="flex gap-3 max-w-2xl mx-auto">
                <input 
                    type="text" 
                    id="pokemonInput" 
                    placeholder="Qual Pokémon?" 
                    class="flex-1 px-6 py-4 rounded-lg bg-white text-gray-900 placeholder-gray-500 font-bold border-4 border-gray-900 focus:outline-none transition uppercase"
                    style="background: linear-gradient(135deg, #fff 0%, #f5f5f5 100%);"
                >
                <button 
                    type="submit" 
                    class="px-8 py-4 bg-yellow-400 text-gray-900 font-bold rounded-lg border-4 border-gray-900 hover:bg-yellow-300 transition uppercase"
                    style="box-shadow: 0 4px 0 rgba(0,0,0,0.3);"
                >
                    <i class="fas fa-search mr-2"></i>Buscar
                </button>
            </form>
        </div>

        <!-- Pokémon Selecionado (Exibido quando houver busca) -->
        @if($pokemon)
        @php
            $primaryType = strtolower($pokemon['types'][0]['type']['name']);
            
            // Função para calcular geração
            $genByID = function($id) {
                if ($id <= 151) return 1;
                if ($id <= 251) return 2;
                if ($id <= 386) return 3;
                if ($id <= 493) return 4;
                if ($id <= 649) return 5;
                if ($id <= 721) return 6;
                if ($id <= 809) return 7;
                if ($id <= 905) return 8;
                if ($id <= 1025) return 9;
                return 0;
            };
            
            $generation = $genByID($pokemon['id']);
            $hasShiny = isset($pokemon['sprites']['other']['official-artwork']['front_shiny']) && 
                       $pokemon['sprites']['other']['official-artwork']['front_shiny'] !== null;
            
            $typeIcons = [
                'normal' => 'fa-circle',
                'fire' => 'fa-fire',
                'water' => 'fa-droplet',
                'grass' => 'fa-leaf',
                'electric' => 'fa-bolt',
                'ice' => 'fa-snowflake',
                'fighting' => 'fa-person-hiking',
                'poison' => 'fa-biohazard',
                'ground' => 'fa-mountain',
                'flying' => 'fa-feather',
                'psychic' => 'fa-brain',
                'bug' => 'fa-bug',
                'rock' => 'fa-rock',
                'ghost' => 'fa-ghost',
                'dragon' => 'fa-dragon',
                'dark' => 'fa-moon',
                'steel' => 'fa-shield',
                'fairy' => 'fa-wand-magic-sparkles',
            ];
        @endphp
        
        <div class="mb-12 max-w-5xl mx-auto">
            <div class="pokedex-card">
                <!-- Header do Pokémon -->
                <div class="type-{{ $primaryType }} text-white p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <div class="flex items-center gap-3 mb-2">
                                <span class="pokemon-title text-3xl">{{ strtoupper($pokemon['name']) }}</span>
                                <span class="generation-badge">GEN {{ $generation }}</span>
                            </div>
                            <p class="text-white/90 text-sm">#{{ str_pad($pokemon['id'], 3, '0', STR_PAD_LEFT) }}</p>
                        </div>
                        <div class="text-right">
                            @if($hasShiny)
                            <button onclick="toggleShiny()" class="shiny-toggle mb-3 text-lg">
                                <i class="fas fa-sparkles"></i> <span id="shinyText">Normal</span>
                            </button>
                            @endif
                            <div class="flex flex-wrap justify-end gap-2">
                                @foreach($pokemon['types'] as $type)
                                @php $typeName = strtolower($type['type']['name']); @endphp
                                <span class="px-3 py-1 bg-white/30 text-white text-xs font-bold rounded-full uppercase backdrop-blur">
                                    <i class="fas {{ $typeIcons[$typeName] ?? 'fa-star' }} mr-1"></i>{{ $type['type']['name'] }}
                                </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Conteúdo Principal -->
                <div class="p-8 bg-white">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <!-- Imagem do Pokémon -->
                        <div class="lg:col-span-1">
                            <div class="pokemon-display">
                                <div class="pokemon-image-container">
                                    <img 
                                        id="pokemonImg"
                                        src="{{ $pokemon['sprites']['other']['official-artwork']['front_default'] ?? $pokemon['sprites']['front_default'] }}" 
                                        alt="{{ $pokemon['name'] }}" 
                                        class="w-72 h-72 object-contain"
                                    >
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <p class="text-sm font-bold text-gray-600">Altura: {{ number_format($pokemon['height']/10, 2, ',', '.') }}m</p>
                                <p class="text-sm font-bold text-gray-600">Peso: {{ number_format($pokemon['weight']/10, 2, ',', '.') }}kg</p>
                            </div>
                        </div>

                        <!-- Stats e Informações -->
                        <div class="lg:col-span-2">
                            <!-- Stats -->
                            <div class="mb-8">
                                <h3 class="text-2xl font-bold mb-4 uppercase" style="color: var(--type-{{ $primaryType }});">
                                    <i class="fas fa-chart-bar mr-2"></i>Stats
                                </h3>
                                <div class="space-y-3">
                                    @php
                                        $statNames = [
                                            'hp' => 'HP',
                                            'attack' => 'Ataque',
                                            'defense' => 'Defesa',
                                            'sp_attack' => 'Ataque Esp.',
                                            'sp_defense' => 'Defesa Esp.',
                                            'speed' => 'Velocidade',
                                        ];
                                        $statColors = [
                                            'hp' => 'stat-hp',
                                            'attack' => 'stat-atk',
                                            'defense' => 'stat-def',
                                            'sp_attack' => 'stat-spa',
                                            'sp_defense' => 'stat-spd',
                                            'speed' => 'stat-spe',
                                        ];
                                    @endphp
                                    @foreach($pokemon['stats'] as $stat)
                                    @php
                                        $statKey = str_replace('-', '_', $stat['stat']['name']);
                                        $statLabel = $statNames[$statKey] ?? ucfirst($stat['stat']['name']);
                                        $colorClass = $statColors[$statKey] ?? 'stat-hp';
                                        $percentage = min(($stat['base_stat'] / 150) * 100, 100);
                                    @endphp
                                    <div>
                                        <div class="flex justify-between mb-1">
                                            <span class="font-bold text-sm uppercase">{{ $statLabel }}</span>
                                            <span class="font-bold text-sm">{{ $stat['base_stat'] }}</span>
                                        </div>
                                        <div class="stat-bar">
                                            <div class="stat-fill {{ $colorClass }}" style="width: {{ $percentage }}%;">
                                                @if($percentage > 15)
                                                <span>{{ intval($percentage) }}%</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Habilidades -->
                            <div class="mb-8">
                                <h3 class="text-2xl font-bold mb-4 uppercase" style="color: var(--type-{{ $primaryType }});">
                                    <i class="fas fa-wand-magic-sparkles mr-2"></i>Habilidades
                                </h3>
                                <div class="flex flex-wrap gap-2">
                                    @forelse($pokemon['abilities'] as $ability)
                                    <span class="px-4 py-2 bg-gray-100 text-gray-800 font-semibold rounded-lg border-2 border-gray-300 capitalize uppercase text-sm">
                                        {{ str_replace('-', ' ', $ability['ability']['name']) }}
                                        @if($ability['is_hidden'])
                                        <span class="ml-2 text-xs font-bold">(Oculta)</span>
                                        @endif
                                    </span>
                                    @empty
                                    <span class="text-gray-500">Nenhuma habilidade disponível</span>
                                    @endforelse
                                </div>
                            </div>

                            <!-- Experiência Base -->
                            <div>
                                <p class="text-sm font-bold text-gray-600">
                                    <i class="fas fa-star text-yellow-500 mr-2"></i>
                                    Experiência Base: <span class="text-lg font-bold text-gray-900">{{ $pokemon['base_experience'] ?? 'N/A' }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botões -->
                <div class="bg-gray-100 p-6 border-t-4 border-gray-300 flex flex-col sm:flex-row gap-3">
                    <a href="/" class="px-6 py-3 bg-blue-500 text-white font-bold rounded-lg border-3 border-gray-900 hover:bg-blue-600 transition uppercase text-center" style="box-shadow: 0 4px 0 rgba(0,0,0,0.3);">
                        <i class="fas fa-home mr-2"></i>Início
                    </a>
                    <button 
                        onclick="document.getElementById('pokemonInput').value=''; document.getElementById('searchForm').submit();" 
                        class="px-6 py-3 bg-green-500 text-white font-bold rounded-lg border-3 border-gray-900 hover:bg-green-600 transition uppercase"
                        style="box-shadow: 0 4px 0 rgba(0,0,0,0.3); flex: 1;"
                    >
                        <i class="fas fa-redo mr-2"></i>Buscar Outro
                    </button>
                    <a href="{{ route('pokemon.create') }}" class="px-6 py-3 bg-purple-600 text-white font-bold rounded-lg border-3 border-gray-900 hover:bg-purple-700 transition uppercase text-center" style="box-shadow: 0 4px 0 rgba(0,0,0,0.3);">
                        <i class="fas fa-plus-circle mr-2"></i>Novo Pokémon
                    </a>
                </div>
            </div>
        </div>
        @endif

        <!-- Grid de Pokémons Populares -->
        <div>
            <h2 class="pokedex-title text-white mb-8 text-center" style="color: #FFD700; text-shadow: 4px 4px 0px #333;">
                <i class="fas fa-star text-yellow-400 mr-2"></i>Pokémons Clássicos
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $popularPokemons = [
                        ['id' => 1, 'name' => 'Bulbasaur', 'type' => 'grass'],
                        ['id' => 4, 'name' => 'Charmander', 'type' => 'fire'],
                        ['id' => 7, 'name' => 'Squirtle', 'type' => 'water'],
                        ['id' => 25, 'name' => 'Pikachu', 'type' => 'electric'],
                        ['id' => 39, 'name' => 'Jigglypuff', 'type' => 'normal'],
                        ['id' => 58, 'name' => 'Growlithe', 'type' => 'fire'],
                        ['id' => 133, 'name' => 'Eevee', 'type' => 'normal'],
                        ['id' => 147, 'name' => 'Dratini', 'type' => 'dragon'],
                    ];
                    $typeEmojis = [
                        'normal' => '⚪', 'fire' => '🔥', 'water' => '💧', 'grass' => '🌿',
                        'electric' => '⚡', 'ice' => '❄️', 'fighting' => '👊', 'poison' => '☠️',
                        'ground' => '⛰️', 'flying' => '🕊️', 'psychic' => '🧠', 'bug' => '🐛',
                        'rock' => '🪨', 'ghost' => '👻', 'dragon' => '🐉', 'dark' => '🌑',
                        'steel' => '⚙️', 'fairy' => '✨'
                    ];
                @endphp
                @foreach($popularPokemons as $poke)
                <form method="GET" action="{{ route('pokemon.show') }}" class="pokemon-card">
                    <input type="hidden" name="name" value="{{ $poke['name'] }}">
                    <button type="submit" class="w-full">
                        <div class="pokedex-card">
                            <!-- Header -->
                            <div class="type-{{ $poke['type'] }} text-white p-4">
                                <div class="flex justify-between items-center mb-2">
                                    <h3 class="text-lg font-bold capitalize uppercase">{{ $poke['name'] }}</h3>
                                    <span class="text-2xl">{{ $typeEmojis[$poke['type']] }}</span>
                                </div>
                                <p class="text-white/80 text-xs uppercase tracking-wider font-bold">#{{ str_pad($poke['id'], 3, '0', STR_PAD_LEFT) }}</p>
                            </div>

                            <!-- Imagem -->
                            <div class="pokemon-display" style="min-height: 180px;">
                                <img 
                                    src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/{{ $poke['id'] }}.png" 
                                    alt="{{ $poke['name'] }}" 
                                    class="w-40 h-40 object-contain"
                                    onerror="this.src='https://via.placeholder.com/128?text={{ $poke['name'] }}'"
                                >
                            </div>

                            <!-- Footer -->
                            <div class="bg-gray-100 p-3 text-center border-t-2 border-gray-300">
                                <span class="inline-block px-3 py-1 type-{{ $poke['type'] }} text-white text-xs font-bold rounded uppercase">
                                    {{ $poke['type'] }}
                                </span>
                            </div>
                        </div>
                    </button>
                </form>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        let isShiny = false;
        const defaultImage = `{{ isset($pokemon) ? ($pokemon['sprites']['other']['official-artwork']['front_default'] ?? $pokemon['sprites']['front_default']) : '' }}`;
        const shinyImage = `{{ isset($pokemon) && isset($pokemon['sprites']['other']['official-artwork']['front_shiny']) ? $pokemon['sprites']['other']['official-artwork']['front_shiny'] : '' }}`;

        function toggleShiny() {
            if (isShiny) {
                document.getElementById('pokemonImg').src = defaultImage;
                document.getElementById('shinyText').textContent = 'Normal';
                document.querySelector('.shiny-toggle').classList.remove('active');
                isShiny = false;
            } else {
                document.getElementById('pokemonImg').src = shinyImage;
                document.getElementById('shinyText').textContent = 'Shiny ✨';
                document.querySelector('.shiny-toggle').classList.add('active');
                isShiny = true;
            }
        }

        document.getElementById('searchForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const pokemonName = document.getElementById('pokemonInput').value.trim().toLowerCase();
            if (pokemonName) {
                window.location.href = `/pokemon?name=${encodeURIComponent(pokemonName)}`;
            }
        });
    </script>
</body>
</html>