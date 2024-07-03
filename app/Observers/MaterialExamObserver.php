<?php

namespace App\Observers;

use Faker\Provider\Uuid;
use App\Models\MaterialExam;

class MaterialExamObserver
{
    /**
     * Handle the MaterialExam "created" event.
     *
     * @param  \App\Models\MaterialExam  $materialExam
     * @return void
     */
    public function creating(MaterialExam $materialExam)
    {
        $materialExam->id = Uuid::uuid();
    }

    /**
     * Handle the MaterialExam "updated" event.
     *
     * @param  \App\Models\MaterialExam  $materialExam
     * @return void
     */
    public function updated(MaterialExam $materialExam)
    {
        //
    }

    /**
     * Handle the MaterialExam "deleted" event.
     *
     * @param  \App\Models\MaterialExam  $materialExam
     * @return void
     */
    public function deleted(MaterialExam $materialExam)
    {
        //
    }

    /**
     * Handle the MaterialExam "restored" event.
     *
     * @param  \App\Models\MaterialExam  $materialExam
     * @return void
     */
    public function restored(MaterialExam $materialExam)
    {
        //
    }

    /**
     * Handle the MaterialExam "force deleted" event.
     *
     * @param  \App\Models\MaterialExam  $materialExam
     * @return void
     */
    public function forceDeleted(MaterialExam $materialExam)
    {
        //
    }
}
