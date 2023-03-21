<?php

namespace App\Repositories;

use App\Models\StudentClassroom;

class StudentClassroomRepository extends BaseRepository
{
    public function __construct(StudentClassroom $model)
    {
        $this->model = $model;
    }

    /**
     * delete student by classroom
     *
     * @param string $classroomId
     * @return void
     */
    public function delete_student_by_classroom(string $classroomId): void
    {
        $this->model->query()
            ->where('classroom_id', $classroomId)
            ->delete();
    }
}
