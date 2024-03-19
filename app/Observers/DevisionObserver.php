<?php

namespace App\Observers;

use App\Models\Devision;
use Faker\Provider\Uuid;

class DevisionObserver
{
    //
    /**
     * Handle the User "creating" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function creating(Devision $devision)
    {
        $devision->id = Uuid::uuid();
    }
}
