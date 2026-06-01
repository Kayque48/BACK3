<?php

namespace App\Observers;

use App\Models\Pedido;
use App\Mail\PedidoRecebidoMail;
use Illuminate\Support\Facades\Mail;

class PedidoObserver
{
    /**
     * Gatilho disparado LOGO APÓS o pedido ser criado no banco de dados.
     */
    public function created(Pedido $pedido): void
    {
        // Certifique-se de carregar o relacionamento do cliente para evitar erros no envio
        $pedido->load('cliente');

        if ($pedido->cliente && $pedido->cliente->email) {
            // Dispara o e-mail para o endereço do cliente
            Mail::to($pedido->cliente->email)->send(new PedidoRecebidoMail($pedido));
        }
    }
}
