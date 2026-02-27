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
                <h1 class="text-4xl font-bold text-gray-900">Lista de Clientes</h1>
                <p class="text-gray-600 mt-2">Variáveis da tabela de clientes</p>
            </div>

            <!-- Table Card -->
              <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-blue-600 text-white">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold">ID</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold">Nome</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold">CPF</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold">Telefone</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold">Reserva</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold">Criado em</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold">Atualizado em</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($clientes ?? [] as $cliente)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $cliente->id }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $cliente->nome }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600 font-mono">{{ $cliente->cpf }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $cliente->telefone }}</td>
                                    <td class="px-6 py-4 text-sm">
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold @if($cliente->reserva) bg-green-100 text-green-800 @else bg-red-100 text-red-800 @endif">
                                            {{ $cliente->reserva ? 'Sim' : 'Não' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $cliente->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $cliente->updated_at->format('d/m/Y H:i') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                                        <p class="text-lg font-medium">Nenhum cliente cadastrado</p>
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
                    <h3 class="text-gray-600 text-sm font-semibold uppercase">Total de Clientes</h3>
                    <p class="text-3xl font-bold text-blue-600 mt-2">{{ $clientes->count() ?? 0 }}</p>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-gray-600 text-sm font-semibold uppercase">Reservados</h3>
                    <p class="text-3xl font-bold text-green-600 mt-2">{{ $clientes->where('reserva', 1)->count() ?? 0 }}</p>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-gray-600 text-sm font-semibold uppercase">Disponíveis</h3>
                    <p class="text-3xl font-bold text-orange-600 mt-2">{{ $clientes->where('reserva', 0)->count() ?? 0 }}</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
