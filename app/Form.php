<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'coupon',
        'mobile',
        'gender',
        'first_time',
        'path',
        'is_agreed',
        'can_apply_double_portion'
    ];

    protected $table ='forms';

    public function confirmPayment($payRef)
    {
        $this->payment_ref = $payRef;
    }

    public function saveAmount($amount, $coupon)
    {
        $this->amount = $amount;
        $this->coupon = $coupon;
    }

}
