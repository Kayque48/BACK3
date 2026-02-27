<x-layouts::app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3" style='display'>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <h1 style='margin-top: 30px; margin-left: 20px; text-align: center; color: red;'>React</h1>
                <p style='text-align: center; margin-top: 35px'>React é um framework focado em desenvolvimento com javascript, utilizando uma sintaxe única que mistura elementos tanto do html tanto com o js.</p>
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <h1 style='margin-top: 30px; margin-left: 20px; text-align: center; color: red;'>Svelte</h1>
                <p style='text-align: center; margin-top: 35px'>Ele compila o código em JavaScript puro durante a build, assim sendo com as menores buidles e melhor performece na questão de execução, além de ter uma sintaxe simples</p>
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <h1 style='margin-top: 30px; margin-left: 20px; text-align: center; color: red;'>Vue</h1>
                <p style='text-align: center; margin-top: 35px'>Ele se destaca por sua documentação exemplar, assim sendo de alta flexibilidade para ser adotado gradualmente em projetos existentes sem grandes refatorações</p>
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <h1 style='margin-top: 30px; margin-left: 20px; text-align: center; color: red;'>Livewire</h1>
                <p style='text-align: center; margin-top: 35px'>Se descata por usar php puro, sendo tudo gerenciado pelo servidor PHP</p>
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
        </div>
    </div>
</x-layouts::app>
