<?php

namespace App\Repositories;

use App\Models\ZoomSchedule;

class ZoomScheduleRepository extends BaseRepository
{
    public function __construct(ZoomSchedule $model)
    {
        $this->model = $model;
    }
}
