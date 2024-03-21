<?php

namespace App\Repositories;

use App\Models\Dependent;

class DependentRepository extends BaseRepository
{

    public function __construct(Dependent $model)
    {
        $this->model = $model;
    }
}
