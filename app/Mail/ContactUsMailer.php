<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactUsMailer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Retrieve the message, title and who is send the envelope.
     *
     * @param Request|array $messageBag The content of email.
     * @author @cakadi190
     * @since 1.0.0
     */
    public $messageBag;

    /**
     * Create a new message instance.
     */
    public function __construct($messages)
    {
        $this->messageBag = $messages;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "[Pesan Baru] dari \"{$this->messageBag['name']}\"",
            from: $this->messageBag['email'],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.contact-us',
            with: $this->messageBag,
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
