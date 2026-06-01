<x-mail::message>
# Olá, tudo bem?

O seu pedido **#{{ $numeroPedido }}** já foi registrado no nosso sistema de confecção e entrou para a fila de produção!

<x-mail::button :url="url('/admin')">
Acompanhar no Painel
</x-mail::button>

Obrigado,<br>
{{ config('app.name') }}
</x-mail::message>