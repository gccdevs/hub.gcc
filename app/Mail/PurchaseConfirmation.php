<?php

namespace App\Mail;

use App\Form;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PurchaseConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $form;
    public $price;

    public function __construct(Form $form, $price)
    {
        $this->form = $form;
        $this->price = $price;
    }

    public function build()
    {
        return $this->markdown('emails.purchase.confirmation')->subject('Purchase Confirmation - GCC 2018 Summit');
    }
}
