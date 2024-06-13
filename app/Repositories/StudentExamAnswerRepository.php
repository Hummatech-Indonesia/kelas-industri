<?php

namespace App\Repositories;

use App\Models\StudentSubmaterialExamAnswer;
use App\Repositories\BaseRepository;

class StudentExamAnswerRepository extends BaseRepository
{
    public function __construct(StudentSubmaterialExamAnswer $model)
    {
        $this->model = $model;
    }
}
