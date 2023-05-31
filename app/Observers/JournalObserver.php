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
     * @param  \App\Models\Journal  $Journlas
     * @return void
     */
    public function updated(Journal $Journal)
    {
        //
    }

    /**
     * Handle the Journlas "deleted" event.
     *
     * @param  \App\Models\Journlas  $Journlas
     * @return void
     */
    public function deleted(Journal $Journal)
    {
        //
    }

    /**
     * Handle the Journlas "restored" event.
     *
     * @param  Journlas  $Journlas
     * @return void
     */
    public function restored(Journlas $Journlas)
    {
        //
    }

    /**
     * Handle the Journlas "force deleted" event.
     *
     * @param  \App\Models\Journlas  $Journlas
     * @return void
     */
    public function forceDeleted(Journlas $Journlas)
    {
        //
    }
}
