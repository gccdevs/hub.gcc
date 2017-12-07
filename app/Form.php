<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = ['name','email','address', 'mobile','gender','first_time'];

    protected $table ='forms';

    public function confirmPayment($payRef)
    {
        $this->is_paid = true;
        $this->payment_ref = $payRef;
        $this->save();
    }
}
