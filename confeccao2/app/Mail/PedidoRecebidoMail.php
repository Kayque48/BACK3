<?php

namespace App\Mail;

use App\Models\Pedido;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PedidoRecebidoMail extends Mailable
{
    use Queueable, SerializesModels;

    // O Laravel aceita o Model diretamente aqui e o disponibiliza na View
    public function __construct(
        public Pedido $pedido 
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Atualização do seu Pedido #{$this->pedido->id} 🧵",
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.pedido-recebido',
        );
    }
}