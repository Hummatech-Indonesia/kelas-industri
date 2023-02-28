<?php

namespace App\Observers;

use App\Models\Assignment;
use Faker\Provider\Uuid;

class AssignmentObserver
{
    /**
     * Handle the Assignment "creating" event.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return void
     */
    public function creating(Assignment $assignment)
    {
        $assignment->id = Uuid::uuid();
    }

    /**
     * Handle the Assignment "updated" event.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return void
     */
    public function updated(Assignment $assignment)
    {
        //
    }

    /**
     * Handle the Assignment "deleted" event.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return void
     */
    public function deleted(Assignment $assignment)
    {
        //
    }

    /**
     * Handle the Assignment "restored" event.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return void
     */
    public function restored(Assignment $assignment)
    {
        //
    }

    /**
     * Handle the Assignment "force deleted" event.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return void
     */
    public function forceDeleted(Assignment $assignment)
    {
        //
    }
}
