<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fornecedores - Confecção</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto">

            <!-- Header -->
            <div class="mb-8 flex items-center justify-between">
                <div>
                    <h1 class="text-4xl font-bold text-gray-900">Lista de Fornecedores</h1>
                    <p class="text-gray-600 mt-2">Variáveis da tabela de fornecedores</p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('dashboard') }}"
                       class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 shadow-sm transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Dashboard
                    </a>
                    <a href="{{ route('fornecedores.create') }}"
                       class="inline-flex items-center gap-2 px-6 py-2.5 rounded-lg bg-blue-600 text-white text-sm font-semibold hover:bg-blue-700 shadow-sm transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Novo Fornecedor
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
                                <th class="px-6 py-4 text-left text-sm font-semibold">E-mail</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold">Telefone</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold">CNPJ</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold">Endereço</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold">Criado em</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($fornecedores ?? [] as $fornecedor)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $fornecedor->id }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $fornecedor->nome }}</td>
                                    <td class="px-6 py-4 text-sm text-blue-600">{{ $fornecedor->email }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $fornecedor->telefone }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600 font-mono">{{ $fornecedor->cnpj }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ Str::limit($fornecedor->endereco, 40) }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $fornecedor->created_at->format('d/m/Y H:i') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                                        <p class="text-lg font-medium">Nenhum fornecedor cadastrado</p>
                                        <p class="text-sm mt-1">Insira dados de teste no banco de dados</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-1 gap-6 mt-8">
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-gray-600 text-sm font-semibold uppercase">Total de Fornecedores</h3>
                    <p class="text-3xl font-bold text-blue-600 mt-2">{{ $fornecedores->count() ?? 0 }}</p>
                </div>
            </div>

        </div>
    </div>
</body>
</html>