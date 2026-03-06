<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes - Confecção</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-gray-900">Lista de Produto</h1>
                <p class="text-gray-600 mt-2">Variáveis da tabela de produto</p>
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
                                    <td class="px-6 py-4 text-sm text-gray-600 font-mono">{{ $produto->descricao }}</td>
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
                                    <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                                        <p class="text-lg font-medium">Nenhum produto cadastrado</p>
                                        <p class="text-sm mt-1">Insira dados de teste no banco de dados</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
