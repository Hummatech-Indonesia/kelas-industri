<?php

namespace App\Observers;

use App\Models\StudentMaterialExam;
use Faker\Provider\Uuid;

class StudentMaterialExamObserver
{
    /**
     * Handle the StudentMaterialExam "created" event.
     *
     * @param  \App\Models\StudentMaterialExam  $studentMaterialExam
     * @return void
     */
    public function creating(StudentMaterialExam $studentMaterialExam)
    {
        $studentMaterialExam->id = Uuid::uuid();
    }

    /**
     * Handle the StudentMaterialExam "updated" event.
     *
     * @param  \App\Models\StudentMaterialExam  $studentMaterialExam
     * @return void
     */
    public function updated(StudentMaterialExam $studentMaterialExam)
    {
        //
    }

    /**
     * Handle the StudentMaterialExam "deleted" event.
     *
     * @param  \App\Models\StudentMaterialExam  $studentMaterialExam
     * @return void
     */
    public function deleted(StudentMaterialExam $studentMaterialExam)
    {
        //
    }

    /**
     * Handle the StudentMaterialExam "restored" event.
     *
     * @param  \App\Models\StudentMaterialExam  $studentMaterialExam
     * @return void
     */
    public function restored(StudentMaterialExam $studentMaterialExam)
    {
        //
    }

    /**
     * Handle the StudentMaterialExam "force deleted" event.
     *
     * @param  \App\Models\StudentMaterialExam  $studentMaterialExam
     * @return void
     */
    public function forceDeleted(StudentMaterialExam $studentMaterialExam)
    {
        //
    }
}
