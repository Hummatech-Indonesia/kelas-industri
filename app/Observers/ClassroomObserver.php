<?php

namespace App\Observers;

use App\Models\Classroom;
use Faker\Provider\Uuid;

class ClassroomObserver
{
    /**
     * Handle the Classroom "creating" event.
     *
     * @param Classroom $classroom
     * @return void
     */
    public function creating(Classroom $classroom)
    {
        $classroom->id = Uuid::uuid();
        $classroom->school_id = auth()->id();
    }

    /**
     * Handle the Classroom "updated" event.
     *
     * @param Classroom $classroom
     * @return void
     */
    public function updated(Classroom $classroom)
    {
        //
    }

    /**
     * Handle the Classroom "deleted" event.
     *
     * @param Classroom $classroom
     * @return void
     */
    public function deleted(Classroom $classroom)
    {
        //
    }

    /**
     * Handle the Classroom "restored" event.
     *
     * @param Classroom $classroom
     * @return void
     */
    public function restored(Classroom $classroom)
    {
        //
    }

    /**
     * Handle the Classroom "force deleted" event.
     *
     * @param Classroom $classroom
     * @return void
     */
    public function forceDeleted(Classroom $classroom)
    {
        //
    }
}
