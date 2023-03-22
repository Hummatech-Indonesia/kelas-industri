<?php

namespace App\Repositories;

use App\Models\TeacherClassroom;

class TeacherRepository extends BaseRepository
{
    public function __construct(TeacherClassroom $model)
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
            ->whereRelation('classroom', function ($q) use ($schoolId) {
                return $q->where('school_id', $schoolId);
            })
            ->get();
    }
}
