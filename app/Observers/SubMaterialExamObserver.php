<?php

namespace App\Observers;

use Faker\Provider\Uuid;
use Illuminate\Support\Str;
use App\Models\SubMaterialExam;

class SubMaterialExamObserver
{
    /**
     * Handle the SubMaterialExam "creating" event.
     *
     * @param  \App\Models\SubMaterialExam  $subMaterialExam
     * @return void
     */
    public function creating(SubMaterialExam $subMaterialExam)
    {
        $subMaterialExam->id = Uuid::uuid();
    }

    /**
     * Handle the Attendance "updated" event.
     *
     * @param  \App\Models\SubMaterialExam  $subMaterialExam
     * @return void
     */
    public function updating(SubMaterialExam $subMaterialExam)
    {
        if ($subMaterialExam->isDirty('title')) {
            $newSlug = Str::slug($subMaterialExam->title);

            $count = SubMaterialExam::where('slug', $newSlug)
                ->where('id', '!=', $subMaterialExam->id)
                ->count();

            if ($count > 0) {
                $newSlug .= '-' . ($count + 1);
            }

            $subMaterialExam->slug = $newSlug;
        }
    }
}
