<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMailCCAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $admin;
    public $contact;

    public function __construct($contact, $admin)
    {
        $this->admin = $admin;
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.contact.ccAdminConfirmation')->subject('New contact story received - GCC');
    }
}
