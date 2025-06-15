<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('Jauna ziņa no kontaktformas')
                    ->view('emails.contact-form')
                    ->with(['data' => $this->data]);
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Jauna ziņa no kontaktformas',
        );
    }
}