<?php

namespace App\Observers;

use App\Models\Exam;
use Faker\Provider\Uuid;

class ExamObserver
{
    /**
     * Handle the Exam "creating" event.
     *
     * @param  \App\Models\Exam  $exam
     * @return void
     */
    public function creating(Exam $exam)
    {
        $exam->id = Uuid::uuid();
    }

    /**
     * Handle the Exam "updated" event.
     *
     * @param  \App\Models\Exam  $exam
     * @return void
     */
    public function updated(Exam $exam)
    {
        //
    }

    /**
     * Handle the Exam "deleted" event.
     *
     * @param  \App\Models\Exam  $exam
     * @return void
     */
    public function deleted(Exam $exam)
    {
        //
    }

    /**
     * Handle the Exam "restored" event.
     *
     * @param  \App\Models\Exam  $exam
     * @return void
     */
    public function restored(Exam $exam)
    {
        //
    }

    /**
     * Handle the Exam "force deleted" event.
     *
     * @param  \App\Models\Exam  $exam
     * @return void
     */
    public function forceDeleted(Exam $exam)
    {
        //
    }
}
