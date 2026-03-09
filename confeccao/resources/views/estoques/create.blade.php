<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Registro de Estoque - Confecção</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto">

            <!-- Header -->
            <div class="mb-8 flex items-center justify-between">
                <div>
                    <h1 class="text-4xl font-bold text-gray-900">Novo Registro de Estoque</h1>
                    <p class="text-gray-600 mt-2">Preencha os dados para registrar um item no estoque</p>
                </div>
                <a href="{{ route('estoques.index') }}"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 shadow-sm transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Voltar
                </a>
            </div>

            <!-- Alerts -->
            @if($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200 rounded-lg p-4">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-red-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div>
                            <p class="text-sm font-semibold text-red-800 mb-1">Corrija os erros abaixo:</p>
                            <ul class="list-disc list-inside space-y-1">
                                @foreach($errors->all() as $error)
                                    <li class="text-sm text-red-700">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Form Card -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="bg-blue-600 px-6 py-4">
                    <h2 class="text-white font-semibold text-sm uppercase tracking-wider">Dados do Estoque</h2>
                </div>

                <form action="{{ route('estoques.store') }}" method="POST" class="p-6 md:p-8">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Produto -->
                        <div class="md:col-span-2">
                            <label for="produto_id" class="block text-sm font-semibold text-gray-700 mb-1.5">
                                Produto <span class="text-red-500">*</span>
                            </label>
                            <select
                                id="produto_id"
                                name="produto_id"
                                class="w-full px-4 py-2.5 rounded-lg border @error('produto_id') border-red-400 bg-red-50 @else border-gray-300 @enderror text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white"
                            >
                                <option value="">Selecione um produto</option>
                                @foreach($produtos as $produto)
                                    <option value="{{ $produto->id }}" {{ old('produto_id') == $produto->id ? 'selected' : '' }}>
                                        {{ $produto->nome }}
                                    </option>
                                @endforeach
                            </select>
                            @error('produto_id')
                                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Quantidade -->
                        <div>
                            <label for="quantidade" class="block text-sm font-semibold text-gray-700 mb-1.5">
                                Quantidade <span class="text-red-500">*</span>
                            </label>
                            <input
                                type="number"
                                id="quantidade"
                                name="quantidade"
                                value="{{ old('quantidade') }}"
                                placeholder="0"
                                min="0"
                                class="w-full px-4 py-2.5 rounded-lg border @error('quantidade') border-red-400 bg-red-50 @else border-gray-300 @enderror text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            >
                            @error('quantidade')
                                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Localização -->
                        <div>
                            <label for="localizacao" class="block text-sm font-semibold text-gray-700 mb-1.5">
                                Localização <span class="text-red-500">*</span>
                            </label>
                            <input
                                type="text"
                                id="localizacao"
                                name="localizacao"
                                value="{{ old('localizacao') }}"
                                placeholder="Ex: Prateleira A1, Depósito 2..."
                                class="w-full px-4 py-2.5 rounded-lg border @error('localizacao') border-red-400 bg-red-50 @else border-gray-300 @enderror text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            >
                            @error('localizacao')
                                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <!-- Actions -->
                    <div class="flex items-center justify-end gap-3 mt-8 pt-6 border-t border-gray-100">
                        <a href="{{ route('estoques.index') }}"
                           class="px-5 py-2.5 rounded-lg border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 shadow-sm transition">
                            Cancelar
                        </a>
                        <button
                            type="submit"
                            class="inline-flex items-center gap-2 px-6 py-2.5 rounded-lg bg-blue-600 text-white text-sm font-semibold hover:bg-blue-700 shadow-sm transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Registrar Estoque
                        </button>
                    </div>
                </form>
            </div>

            <!-- Info card -->
            <div class="mt-6 bg-blue-50 border border-blue-100 rounded-lg p-4 flex items-start gap-3">
                <svg class="w-5 h-5 text-blue-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <p class="text-sm text-blue-700">Campos marcados com <span class="text-red-500 font-bold">*</span> são obrigatórios.</p>
            </div>

        </div>
    </div>
</body>
</html>