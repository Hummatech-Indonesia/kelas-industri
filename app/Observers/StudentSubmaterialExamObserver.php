<?php

namespace App\Observers;

use Faker\Provider\Uuid;
use App\Models\StudentSubmaterialExam;

class StudentSubmaterialExamObserver
{
    /**
     * Handle the StudentSubmaterialExam "creating" event.
     *
     * @param  \App\Models\StudentSubmaterialExam  $studentSubmaterialExam
     * @return void
     */
    public function creating(StudentSubmaterialExam $studentSubmaterialExam)
    {
        $studentSubmaterialExam->id = Uuid::uuid();
    }
}
