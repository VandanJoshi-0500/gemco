<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormUserMail extends Mailable
{
   use Queueable, SerializesModels;

    public $inquiry;

    public function __construct($inquiry)
    {
        $this->inquiry = $inquiry;
    }

    public function build()
    {
        return $this->subject('Thank You for Contacting Us')
            ->view('emails.contact_user')
            ->with([
                'name' => $this->inquiry->name,
                'message_content' => $this->inquiry->message,
            ]);
    }
}
