<?php

namespace App\Mail;

use App\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    private $contact_message;

    public function __construct(ContactMessage $contact_message)
    {
        $this->contact_message = $contact_message;
    }

    public function build()
    {
        return $this->to(config('mail.from.address'))
                    ->view('mails.contact')
                    ->with([
                        'contactMessageName' => $this->contact_message->name,
                        'contactMessageEmail' => $this->contact_message->email,
                        'contactMessageMessage' => $this->contact_message->message
                    ]);
    }
}
