<?php

namespace App\Repositories;

use App\Models\TeacherSchool;

class TeacherRepository extends BaseRepository
{
    public function __construct(TeacherSchool $model)
    {
        $this->model = $model;
    }

    /**
     * @param string $schoolId
     * @return mixed
     */
    public function get_teacher_by_school(string $schoolId): mixed
    {
        return $this->model->query()
            ->with('teacher')
            ->where('school_id', $schoolId)
            ->get();
    }

    public function get_angkatan(string | null $schoolId): mixed
    {
        return $this->model->query()
            ->with('teacher')
            ->where('school_id', 'like', '%' . $schoolId . '%')
            ->get();
    }
}
