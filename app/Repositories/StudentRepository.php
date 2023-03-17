<?php

namespace App\Repositories;

use App\Models\StudentClassroom;

class StudentRepository extends BaseRepository
{
    public function __construct(StudentClassroom $model)
    {
        $this->model = $model;
    }

    /**
     * get by classroom
     *
     * @param string $classroomId
     * @return mixed
     */
    public function get_by_classroom(string $classroomId): mixed
    {
        return $this->model->query()
            ->with('student')
            ->where('classroom_id', $classroomId)
            ->get();
    }
}
