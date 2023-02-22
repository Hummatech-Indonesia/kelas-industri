<?php

namespace App\Repositories;

use App\Models\Generation;

class GenerationRepository extends BaseRepository
{
    public function __construct(Generation $model)
    {
        $this->model = $model;
    }

    /**
     * get paginate by school year
     *
     * @param int $schoolYear
     * @param int $limit
     * @return mixed
     */
    public function get_paginate_by_school_year(int $schoolYear, int $limit): mixed
    {
        return $this->model->query()
            ->where('school_year_id', $schoolYear)
            ->paginate($limit);
    }
}
