<?php

namespace App\Observers;

use Faker\Provider\Uuid;
use App\Models\Attendance;

class AttendanceObserver
{
    /**
     * Handle the Attendance "created" event.
     *
     * @param  \App\Models\Attendance  $Attendance
     * @return void
     */
    public function creating(Attendance $Attendance)
    {
        $Attendance->id = Uuid::uuid();
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
