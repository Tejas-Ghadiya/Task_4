<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class E_mail extends Mailable
{
    use Queueable, SerializesModels;

    public $msg;
    public $sub;
    public $pdfPath; // Add PDF path as a property

    /**
     * Create a new message instance.
     */
    public function __construct($msg, $subject, $pdfPath)
    {
        $this->msg = $msg;
        $this->sub = $subject;
        $this->pdfPath = $pdfPath;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->sub,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'test_mail_send', // View for the email body
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            // Attach the PDF file
            \Illuminate\Mail\Mailables\Attachment::fromPath($this->pdfPath)
        ];
    }
}
