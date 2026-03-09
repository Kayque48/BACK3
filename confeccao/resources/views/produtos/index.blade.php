<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Confecção</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto">

            <!-- Header -->
            <div class="mb-8 flex items-center justify-between">
                <div>
                    <h1 class="text-4xl font-bold text-gray-900">Lista de Produtos</h1>
                    <p class="text-gray-600 mt-2">Variáveis da tabela de produto</p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('dashboard') }}"
                       class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 shadow-sm transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Dashboard
                    </a>
                    <a href="{{ route('produtos.create') }}"
                       class="inline-flex items-center gap-2 px-6 py-2.5 rounded-lg bg-blue-600 text-white text-sm font-semibold hover:bg-blue-700 shadow-sm transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Novo Produto
                    </a>
                </div>
            </div>

            <!-- Table Card -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-blue-600 text-white">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold">ID</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold">Nome</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold">Descrição</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold">Quantidade</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold">Preço</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold">Reserva</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold">Criado em</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold">Atualizado em</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($produto ?? [] as $produto)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $produto->id }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $produto->nome }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $produto->descricao }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $produto->quantidade }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                                    <td class="px-6 py-4 text-sm">
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold @if($produto->reserva) bg-green-100 text-green-800 @else bg-red-100 text-red-800 @endif">
                                            {{ $produto->reserva ? 'Sim' : 'Não' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $produto->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $produto->updated_at->format('d/m/Y H:i') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                                        <p class="text-lg font-medium">Nenhum produto cadastrado</p>
                                        <p class="text-sm mt-1">Insira dados de teste no banco de dados</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-gray-600 text-sm font-semibold uppercase">Total de Produtos</h3>
                    <p class="text-3xl font-bold text-blue-600 mt-2">{{ $produto->count() ?? 0 }}</p>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-gray-600 text-sm font-semibold uppercase">Reservados</h3>
                    <p class="text-3xl font-bold text-green-600 mt-2">{{ $produto->where('reserva', 1)->count() ?? 0 }}</p>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-gray-600 text-sm font-semibold uppercase">Disponíveis</h3>
                    <p class="text-3xl font-bold text-orange-600 mt-2">{{ $produto->where('reserva', 0)->count() ?? 0 }}</p>
                </div>
            </div>

        </div>
    </div>
</body>
</html>