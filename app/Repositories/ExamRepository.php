<?php

namespace App\Repositories;

use App\Models\Exam;

class ExamRepository extends BaseRepository
{
    public function __construct(Exam $model)
    {
        $this->model = $model;
    }

}
