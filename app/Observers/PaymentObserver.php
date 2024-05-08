<?php

namespace App\Observers;

use App\Models\Payment;
use Faker\Provider\Uuid;

class PaymentObserver
{
    //
    public function creating(Payment $payment)
    {
        $payment->id = Uuid::uuid();
        $payment->user_id = auth()->user()->id;
    }
}
