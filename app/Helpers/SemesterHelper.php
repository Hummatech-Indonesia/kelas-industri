<?php

namespace App\Helpers;

use App\Models\Dependent;

class SemesterHelper
{
    public static function get_current_semester(String $classroomId): mixed
    {
        return Dependent::query()->where('classroom_id', $classroomId)->orderBy('semester', 'desc')->first();
    }
}
