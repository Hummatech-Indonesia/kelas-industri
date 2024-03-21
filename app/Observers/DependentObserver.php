<?php

namespace App\Observers;

use App\Models\Dependent;
use App\Models\Payment;
use Faker\Provider\Uuid;

class DependentObserver
{
    //
    public function creating(Dependent $dependent)
    {
        $dependent->id = Uuid::uuid();
    }
}
