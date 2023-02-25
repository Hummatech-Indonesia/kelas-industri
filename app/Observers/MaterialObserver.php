<?php

namespace App\Observers;

use App\Models\Materials;
use Faker\Provider\Uuid;

class MaterialObserver
{
    /**
     * Handle the Materials "creating" event.
     *
     * @param  \App\Models\Materials  $materials
     * @return void
     */
    public function creating(Materials $materials)
    {
        $materials->id = Uuid::uuid();
    }

    /**
     * Handle the Materials "updated" event.
     *
     * @param  \App\Models\Materials  $materials
     * @return void
     */
    public function updated(Materials $materials)
    {
        //
    }

    /**
     * Handle the Materials "deleted" event.
     *
     * @param  \App\Models\Materials  $materials
     * @return void
     */
    public function deleted(Materials $materials)
    {
        //
    }

    /**
     * Handle the Materials "restored" event.
     *
     * @param  \App\Models\Materials  $materials
     * @return void
     */
    public function restored(Materials $materials)
    {
        //
    }

    /**
     * Handle the Materials "force deleted" event.
     *
     * @param  \App\Models\Materials  $materials
     * @return void
     */
    public function forceDeleted(Materials $materials)
    {
        //
    }
}
