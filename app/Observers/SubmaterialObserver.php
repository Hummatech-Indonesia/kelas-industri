<?php

namespace App\Observers;

use App\Models\SubMaterial;
use Faker\Provider\Uuid;

class SubmaterialObserver
{
    /**
     * Handle the SubMaterial "creating" event.
     *
     * @param  \App\Models\SubMaterial  $subMaterial
     * @return void
     */
    public function creating(SubMaterial $subMaterial)
    {
        $subMaterial->id = Uuid::uuid();
    }

    /**
     * Handle the SubMaterial "updated" event.
     *
     * @param  \App\Models\SubMaterial  $subMaterial
     * @return void
     */
    public function updated(SubMaterial $subMaterial)
    {
        //
    }

    /**
     * Handle the SubMaterial "deleted" event.
     *
     * @param  \App\Models\SubMaterial  $subMaterial
     * @return void
     */
    public function deleted(SubMaterial $subMaterial)
    {
        //
    }

    /**
     * Handle the SubMaterial "restored" event.
     *
     * @param  \App\Models\SubMaterial  $subMaterial
     * @return void
     */
    public function restored(SubMaterial $subMaterial)
    {
        //
    }

    /**
     * Handle the SubMaterial "force deleted" event.
     *
     * @param  \App\Models\SubMaterial  $subMaterial
     * @return void
     */
    public function forceDeleted(SubMaterial $subMaterial)
    {
        //
    }
}
