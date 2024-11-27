<?php

namespace App\Mail;

use App\Models\OrderDetail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InformarCanceladoMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public OrderDetail $order,
        public string $message,
    )
    {
        //
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Informar Cancelado Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.informar-cancelado',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
