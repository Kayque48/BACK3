<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PedidoRecebidoMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public $numeroPedido // Passando dados para o e-mail se necessário
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Seu Pedido de Confecção foi Recebido! 🧵',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.pedido-recebido', // Caminho da view do e-mail
        );
    }
}