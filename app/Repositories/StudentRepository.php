<?php

namespace App\Repositories;

use App\Models\StudentSchool;

class StudentRepository extends BaseRepository
{
    public function __construct(StudentSchool $model)
    {
        $this->model = $model;
    }

    /**
     * get by classroom
     *
     * @param string $schoolId
     * @return mixed
     */
    public function get_by_school(string $schoolId): mixed
    {
        return $this->model->query()
            ->with('student')
            ->where('school_id', $schoolId)
            ->get();
    }
}
