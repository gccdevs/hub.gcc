<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = ['last_name','first_name','email','address', 'mobile','gender'];

    protected $table ='forms';

    public function confirmPayment($payRef)
    {
        $this->is_paid = true;
        $this->payment_ref = $payRef;
        $this->save();
    }
}
