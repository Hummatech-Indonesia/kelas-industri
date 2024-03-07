<?php

namespace App\Repositories;

use App\Models\User;

class SchoolRepository extends  BaseRepository
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * override get paginate
     *
     * @param int $limit
     * @param array|null $order
     * @return mixed
     */
    public function get_paginate(int $limit, array $order = null): mixed
    {
        return $this->model->query()->role('school')->paginate($limit);
    }

    /**
     * search paginate
     *
     * @param string|null $search
     * @param int $limit
     * @return mixed
     */
    public function search_paginate(string|null $search, int $limit): mixed
    {
        return $this->model->query()
            ->role('school')
            ->where('name', 'like', '%' . $search . '%')
            ->paginate($limit);
    }

    public function getCount()
    {
        return $this->model->query()
            ->role('school')
            ->count();
    }

    public function getCountStudent(string $id)
    {
        return $this->model->query()
            ->where('status', 'active')
            ->whereHas('studentSchool', function ($query) use ($id) {
                $query->where('school_id', $id);
            })
            ->get();
    }

    public function getCountStudentClassroom(string $classroom, string $school)
    {
        return $this->model->query()
            ->where('status', 'active')
            ->whereHas('studentSchool', function ($query) use ($school, $classroom) {
                $query->where('school_id', $school)
                    ->whereHas('classrooms', function ($query) use ($classroom) {
                        $query->where('classroom_id', $classroom);
                    });
            })
            ->get();
    }
}
