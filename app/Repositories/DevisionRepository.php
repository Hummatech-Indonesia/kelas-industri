<?php

namespace App\Repositories;

use App\Models\Devision;

class DevisionRepository extends BaseRepository
{
    private Devision $devision;

    public function __construct(Devision $devision)
    {
        $this->model= $devision;
    }
}
