<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CatalogRequestAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $attachment;

    public function __construct($data, $attachment = null)
    {
        $this->data = $data;
        $this->attachment = $attachment;
    }

    public function build()
    {
        $email = $this->subject('New Catalog Request Received')
            ->view('emails.catalog_admin')
            ->with(['data' => $this->data]);

        if ($this->attachment) {
            $email->attach($this->attachment->getRealPath(), [
                'as' => $this->attachment->getClientOriginalName(),
                'mime' => $this->attachment->getClientMimeType(),
            ]);
        }

        return $email;
    }
}
