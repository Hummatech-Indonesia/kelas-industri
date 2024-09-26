<?php

namespace App\Helpers;

use App\Models\Assignment;
use App\Models\SubmitAssignment;
use App\Models\StudentSubmaterialExam;

class CheckComplementionSubmaterial
{
    public static function checkComplemention($user, $submaterial)
    {
        $studentAssignment = SubmitAssignment::whereRelation('student', 'id', $user->id)->whereHas('assignment', function ($query) use ($submaterial) {
            $query->whereRelation('submaterial', 'id', $submaterial->id);
        })->count();

        $assignment = Assignment::whereRelation('submaterial', 'id', $submaterial->id)->count();

        $completeQuiz = StudentSubmaterialExam::whereHas('subMaterialExam', function ($query) use ($submaterial) {
            $query->whereRelation('subMaterial', 'id', $submaterial->id);
        })
            ->where('higest_score', '>=', 75)
            ->whereRelation('student', 'id', $user->id)
            ->first();

        $completeAssignment = $assignment >= $studentAssignment;
        if (is_null($submaterial)) return true;
        return $completeAssignment && $completeQuiz;
    }
}
