<x-mail::message>
# Olá, {{ $pedido->cliente->name }}!

O seu pedido foi recebido com sucesso no nosso sistema de confecção. Veja os detalhes abaixo:

**Número do Pedido:** #{{ $pedido->id }}  
**Status Atual:** {{ ucfirst($pedido->status) }}  
**Data do Pedido:** {{ $pedido->created_at->format('d/m/Y H:i') }}

---

## Resumo do Pedido
Aqui está o status do que entrou para a nossa linha de produção. Você pode acompanhar o andamento em tempo real clicando no botão abaixo.

<x-mail::button :url="url('/admin')">
Acompanhar no Painel
</x-mail::button>

Se tiver qualquer dúvida sobre os insumos ou prazos, responda a este e-mail.

Obrigado,<br>
{{ config('app.name') }}
</x-mail::message>