<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $messageData;

    /**
     * Create a new message instance.
     *
     * @param array $messageData
     * @return void
     */
    public function __construct(array $messageData)
    {
        $this->messageData = $messageData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact_message')
                    ->subject('New Contect Message');
    }
}
