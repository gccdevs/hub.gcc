<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = ['name','email','address', 'mobile','gender','first_time','path'];

    protected $table ='forms';

    public function confirmPayment($payRef)
    {
        $this->is_paid = true;
        $this->payment_ref = $payRef;
        $this->save();
    }

    public function setAgree()
    {
        $this->is_agreed = true;
        $this->save();
    }

}
