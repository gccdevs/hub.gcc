<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InviterPurchaseConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $form;

    public function __construct($email, $form)
    {
        $this->email = $email;
        $this->form = $form;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.purchase.inviterConfirmation')->subject('Purchase Confirmation - GCC 2018 Summit');
    }
}
