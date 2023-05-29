<?php

namespace App\Repositories;

use App\Models\SubmitAssignment;

class SubmitAssignmentRepository extends BaseRepository
{
    public function __construct(SubmitAssignment $model)
    {
        $this->model = $model;
    }

    public function get_count_student_assignment(string $studentId) :mixed
    {
        return $this->model->query()
        ->where('student_id', $studentId)
        ->whereNotNull('point')
        ->get();
    }

}
