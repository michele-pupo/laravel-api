<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
{
        return $this
            ->from(config('mail.from.address'), config('mail.from.name'))
            ->replyTo($this->data['address'])                             // L'email del visitatore
            ->subject('Nuovo messaggio dal sito!')
            ->view('emails.contact');
    }
}
