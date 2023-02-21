<?php

namespace App\Repositories;

use App\Models\SchoolYear;

class SchoolYearRepository extends BaseRepository
{
    public function __construct(SchoolYear $model)
    {
        $this->model = $model;
    }
}
