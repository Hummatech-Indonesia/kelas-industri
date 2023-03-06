<?php

namespace App\Repositories;

use App\Models\Classroom;

class ClassroomRepository extends BaseRepository
{
    public function __construct(Classroom $model)
    {
        $this->model = $model;
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
}
