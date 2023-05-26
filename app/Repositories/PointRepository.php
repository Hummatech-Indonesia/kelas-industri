<?php

namespace App\Repositories;

use App\Models\Point;

class PointRepository extends BaseRepository
{
    public function __construct(Point $point)
    {
        $this->model = $point;
    }

    public function get_point_stundet()
    {
        return $this->model->query()
        ->groupBy('student_id')
        ->selectRaw('student_id, sum(point) as point')
        ->orderBy('point', 'desc')
        ->get();

    }

}
