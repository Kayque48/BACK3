<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Fornecedor - Confecção</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto">

            <!-- Header -->
            <div class="mb-8 flex items-center justify-between">
                <div>
                    <h1 class="text-4xl font-bold text-gray-900">Novo Fornecedor</h1>
                    <p class="text-gray-600 mt-2">Preencha os dados para cadastrar um novo fornecedor</p>
                </div>
                <a href="{{ route('fornecedores.index') }}"
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
                    <h2 class="text-white font-semibold text-sm uppercase tracking-wider">Dados do Fornecedor</h2>
                </div>

                <form action="{{ route('fornecedores.store') }}" method="POST" class="p-6 md:p-8">
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
                                placeholder="Nome do fornecedor"
                                class="w-full px-4 py-2.5 rounded-lg border @error('nome') border-red-400 bg-red-50 @else border-gray-300 @enderror text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            >
                            @error('nome')
                                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-1.5">
                                E-mail <span class="text-red-500">*</span>
                            </label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="contato@fornecedor.com"
                                class="w-full px-4 py-2.5 rounded-lg border @error('email') border-red-400 bg-red-50 @else border-gray-300 @enderror text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            >
                            @error('email')
                                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Telefone -->
                        <div>
                            <label for="telefone" class="block text-sm font-semibold text-gray-700 mb-1.5">
                                Telefone <span class="text-red-500">*</span>
                            </label>
                            <input
                                type="text"
                                id="telefone"
                                name="telefone"
                                value="{{ old('telefone') }}"
                                placeholder="(00) 00000-0000"
                                maxlength="15"
                                class="w-full px-4 py-2.5 rounded-lg border @error('telefone') border-red-400 bg-red-50 @else border-gray-300 @enderror text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            >
                            @error('telefone')
                                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- CNPJ -->
                        <div>
                            <label for="cnpj" class="block text-sm font-semibold text-gray-700 mb-1.5">
                                CNPJ <span class="text-red-500">*</span>
                            </label>
                            <input
                                type="text"
                                id="cnpj"
                                name="cnpj"
                                value="{{ old('cnpj') }}"
                                placeholder="00.000.000/0000-00"
                                maxlength="18"
                                class="w-full px-4 py-2.5 rounded-lg border @error('cnpj') border-red-400 bg-red-50 @else border-gray-300 @enderror text-sm text-gray-900 font-mono placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            >
                            @error('cnpj')
                                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Endereço -->
                        <div class="md:col-span-2">
                            <label for="endereco" class="block text-sm font-semibold text-gray-700 mb-1.5">
                                Endereço <span class="text-red-500">*</span>
                            </label>
                            <input
                                type="text"
                                id="endereco"
                                name="endereco"
                                value="{{ old('endereco') }}"
                                placeholder="Rua, número, bairro, cidade - UF"
                                class="w-full px-4 py-2.5 rounded-lg border @error('endereco') border-red-400 bg-red-50 @else border-gray-300 @enderror text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            >
                            @error('endereco')
                                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <!-- Actions -->
                    <div class="flex items-center justify-end gap-3 mt-8 pt-6 border-t border-gray-100">
                        <a href="{{ route('fornecedores.index') }}"
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
                            Cadastrar Fornecedor
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
        // Máscara CNPJ
        document.getElementById('cnpj').addEventListener('input', function (e) {
            let v = e.target.value.replace(/\D/g, '').slice(0, 14);
            v = v.replace(/(\d{2})(\d)/, '$1.$2');
            v = v.replace(/(\d{3})(\d)/, '$1.$2');
            v = v.replace(/(\d{3})(\d)/, '$1/$2');
            v = v.replace(/(\d{4})(\d{1,2})$/, '$1-$2');
            e.target.value = v;
        });

        // Máscara Telefone
        document.getElementById('telefone').addEventListener('input', function (e) {
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