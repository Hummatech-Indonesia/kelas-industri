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
}
