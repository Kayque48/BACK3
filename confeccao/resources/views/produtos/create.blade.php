<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Produto - Confecção</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto">

            <!-- Header -->
            <div class="mb-8 flex items-center justify-between">
                <div>
                    <h1 class="text-4xl font-bold text-gray-900">Novo Produto</h1>
                    <p class="text-gray-600 mt-2">Preencha os dados para cadastrar um novo produto</p>
                </div>
                <a href="{{ route('produtos.index') }}"
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
                    <h2 class="text-white font-semibold text-sm uppercase tracking-wider">Dados do Produto</h2>
                </div>

                <form action="{{ route('produtos.store') }}" method="POST" class="p-6 md:p-8">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Nome -->
                        <div class="md:col-span-2">
                            <label for="nome" class="block text-sm font-semibold text-gray-700 mb-1.5">
                                Nome <span class="text-red-500">*</span>
                            </label>
                            <input
                                type="text"
                                id="nome"
                                name="nome"
                                value="{{ old('nome') }}"
                                placeholder="Nome do produto"
                                class="w-full px-4 py-2.5 rounded-lg border @error('nome') border-red-400 bg-red-50 @else border-gray-300 @enderror text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            >
                            @error('nome')
                                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Descrição -->
                        <div class="md:col-span-2">
                            <label for="descricao" class="block text-sm font-semibold text-gray-700 mb-1.5">
                                Descrição
                            </label>
                            <textarea
                                id="descricao"
                                name="descricao"
                                rows="4"
                                placeholder="Descreva o produto..."
                                class="w-full px-4 py-2.5 rounded-lg border @error('descricao') border-red-400 bg-red-50 @else border-gray-300 @enderror text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition resize-none"
                            >{{ old('descricao') }}</textarea>
                            @error('descricao')
                                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Quantidade e Preço -->
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

                        <div>
                            <label for="preco" class="block text-sm font-semibold text-gray-700 mb-1.5">
                                Preço <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-sm text-gray-500 font-medium">R$</span>
                                <input
                                    type="number"
                                    id="preco"
                                    name="preco"
                                    value="{{ old('preco') }}"
                                    placeholder="0,00"
                                    min="0"
                                    step="0.01"
                                    class="w-full pl-10 pr-4 py-2.5 rounded-lg border @error('preco') border-red-400 bg-red-50 @else border-gray-300 @enderror text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                                >
                            </div>
                            @error('preco')
                                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Reserva -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Reserva</label>
                            <div class="flex items-center gap-3 mt-1">
                                <button
                                    type="button"
                                    id="toggle-reserva"
                                    onclick="toggleReserva()"
                                    class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 bg-gray-300"
                                    role="switch"
                                    aria-checked="false"
                                >
                                    <span id="toggle-knob" class="inline-block h-4 w-4 transform rounded-full bg-white shadow transition-transform duration-200 translate-x-1"></span>
                                </button>
                                <span id="toggle-label" class="text-sm text-gray-600">Não reservado</span>
                                <input type="hidden" name="reserva" id="reserva-input" value="0">
                            </div>
                        </div>

                    </div>

                    <!-- Actions -->
                    <div class="flex items-center justify-end gap-3 mt-8 pt-6 border-t border-gray-100">
                        <a href="{{ route('produtos.index') }}"
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
                            Cadastrar Produto
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

    <script>
        function toggleReserva() {
            const btn = document.getElementById('toggle-reserva');
            const knob = document.getElementById('toggle-knob');
            const label = document.getElementById('toggle-label');
            const input = document.getElementById('reserva-input');

            const isActive = btn.getAttribute('aria-checked') === 'true';

            if (isActive) {
                btn.setAttribute('aria-checked', 'false');
                btn.classList.replace('bg-blue-600', 'bg-gray-300');
                knob.classList.replace('translate-x-6', 'translate-x-1');
                label.textContent = 'Não reservado';
                input.value = '0';
            } else {
                btn.setAttribute('aria-checked', 'true');
                btn.classList.replace('bg-gray-300', 'bg-blue-600');
                knob.classList.replace('translate-x-1', 'translate-x-6');
                label.textContent = 'Reservado';
                input.value = '1';
            }
        }
    </script>
</body>
</html>