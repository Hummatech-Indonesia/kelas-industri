<?php

namespace App\Repositories;

use App\Models\Dependent;

class DependentRepository extends BaseRepository
{

    public function __construct(Dependent $model)
    {
        $this->model = $model;
    }

    public function getAllByClassroom(string $classroom)
    {
        return $this->model->newQuery()
            ->where('classroom_id', $classroom)
            ->orderBy('semester', 'asc')
            ->get();
    }
}
