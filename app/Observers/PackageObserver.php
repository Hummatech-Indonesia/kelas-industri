<?php

namespace App\Observers;

use App\Models\Packages;
use Faker\Provider\Uuid;

class PackageObserver
{
    //
    /**
     * Handle the User "creating" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function creating(Packages $package)
    {
        $package->id = Uuid::uuid();
    }
}
