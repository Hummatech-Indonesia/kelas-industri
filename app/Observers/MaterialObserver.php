<?php

namespace App\Observers;

use App\Models\Material;
use Faker\Provider\Uuid;

class MaterialObserver
{
    /**
     * Handle the Material "creating" event.
     *
     * @param  \App\Models\Material  $material
     * @return void
     */
    public function creating(Material $material)
    {
        $material->id = Uuid::uuid();
    }

    /**
     * Handle the Material "updated" event.
     *
     * @param  \App\Models\Material  $material
     * @return void
     */
    public function updated(Material $material)
    {
        //
    }

    /**
     * Handle the Material "deleted" event.
     *
     * @param  \App\Models\Material  $material
     * @return void
     */
    public function deleted(Material $material)
    {
        //
    }

    /**
     * Handle the Material "restored" event.
     *
     * @param  \App\Models\Material  $material
     * @return void
     */
    public function restored(Material $material)
    {
        //
    }

    /**
     * Handle the Material "force deleted" event.
     *
     * @param  \App\Models\Material  $material
     * @return void
     */
    public function forceDeleted(Material $material)
    {
        //
    }
}
