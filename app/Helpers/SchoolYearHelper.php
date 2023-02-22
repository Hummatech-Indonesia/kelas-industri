<?php

namespace App\Helpers;

use App\Models\SchoolYear;

class SchoolYearHelper
{
    public static function get_current_school_year(): mixed
    {
        return SchoolYear::query()->orderBy('school_year', 'desc')->first();
    }
}
