<?php

namespace App\Helpers;

use App\Models\Assignment;
use App\Models\SubmitAssignment;

class CheckStudentAsiggmentHelper
{
    /**
     * FunctionName
     *
     * @return bool
     */
    public static function studentAssigment(mixed $sub_material_id): bool
    {
        $assignments = Assignment::query()->where('sub_material_id', $sub_material_id)->get();

        foreach ($assignments as $assignment) {
            $submitAssigment = SubmitAssignment::query()->where('student_id', auth()->user()->id)->where('assignment_id', $assignment->id)->first();
            if ($submitAssigment == null) {
                return false;
            }
        }
        return true;
    }
}
