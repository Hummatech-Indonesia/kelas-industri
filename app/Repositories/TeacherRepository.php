<?php

namespace App\Repositories;

use App\Models\TeacherClassroom;

class TeacherRepository extends BaseRepository
{
    public function __construct(TeacherClassroom $model)
    {
        $this->model = $model;
    }

    public function get_teacher_by_classroom(string $classroomId): mixed
    {
        return $this->model->query()
            ->where('classroom_id', $classroomId)
            ->first();
    }
}
