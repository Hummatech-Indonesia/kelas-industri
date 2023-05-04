<?php

namespace App\Repositories;

use App\Models\StudentClassroom;
use App\Models\Classroom;

class ClassroomRepository extends BaseRepository
{

    private StudentClassroom $studentClassroom;

    public function __construct(Classroom $model, StudentClassroom $studentClassroom)
    {
        $this->model = $model;
        $this->studentClassroom = $studentClassroom;
    }

    public function get_by_student(string $studentId)
    {
        return $this->studentClassroom->query()
        ->whereRelation('studentSchool', function($q) use ($studentId){
            $q->where('student_id', $studentId);
        })
        ->get();
    }

    /**
     * Handle the Get all data event from models.
     *
     *
     * @param string $schoolId
     * @param int $schoolYearId
     * @return mixed
     */

    public function get_by_school(string $schoolId, int $schoolYearId): mixed
    {
        return $this->model->query()
            ->where('school_id', $schoolId)
            ->whereRelation('generation', function ($q) use ($schoolYearId) {
                return $q->where('school_year_id', $schoolYearId);
            })
            ->get();
    }

    /**
     * get_paginate_by_school
     *
     * @param string $schoolId
     * @param int $limit
     * @return mixed
     */
    public function get_paginate_by_school(string $schoolId, int $limit): mixed
    {
        return $this->model->query()
            ->where('school_id', $schoolId)
            ->paginate($limit);
    }

    /**
     * get_paginate_by_school_search
     *
     * @param string $search
     * @param string $schoolId
     * @param int $limit
     * @return mixed
     */
    public function get_paginate_by_school_search(string $search, string $schoolId, int $limit): mixed
    {
        return $this->model->query()
            ->where('name', 'like', '%' . $search . '%')
            ->where('school_id', $schoolId)
            ->paginate($limit);
    }
}
