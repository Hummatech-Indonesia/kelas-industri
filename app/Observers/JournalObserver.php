<?php

namespace App\Observers;

use App\Models\Journal;
use Faker\Provider\Uuid;

class JournalObserver
{
    /**
     * Handle the Attendance "created" event.
     *
     * @param  \App\Models\Journal  $Journal
     * @return void
     */
    public function creating(Journal $Journal)
    {
        $Journal->id = Uuid::uuid();
    }

    /**
     * Handle the Attendance "updated" event.
     *
     * @param  \App\Models\Attendance  $Attendance
     * @return void
     */
    public function updated(Attendance $Attendance)
    {
        //
    }

    /**
     * Handle the Attendance "deleted" event.
     *
     * @param  \App\Models\Attendance  $Attendance
     * @return void
     */
    public function deleted(Attendance $Attendance)
    {
        //
    }

    /**
     * Handle the Attendance "restored" event.
     *
     * @param  \App\Models\Attendance  $Attendance
     * @return void
     */
    public function restored(Attendance $Attendance)
    {
        //
    }

    /**
     * Handle the Attendance "force deleted" event.
     *
     * @param  \App\Models\Attendance  $Attendance
     * @return void
     */
    public function forceDeleted(Attendance $Attendance)
    {
        //
    }
}
