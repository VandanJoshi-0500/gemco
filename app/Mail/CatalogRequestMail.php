<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CatalogRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $requestData;
    public $attachment;

    public function __construct($requestData, $attachment = null)
    {
        $this->requestData = $requestData;
        $this->attachment = $attachment;
    }

    public function build()
    {
        $email = $this->view('frontend.emails.catalog-request')
                      ->subject('New Catalog Request')
                      ->with('data', $this->requestData);

        if ($this->attachment) {
            $email->attach($this->attachment->getRealPath(), [
                'as' => $this->attachment->getClientOriginalName(),
                'mime' => $this->attachment->getClientMimeType(),
            ]);
        }

        return $email;
    }
}
