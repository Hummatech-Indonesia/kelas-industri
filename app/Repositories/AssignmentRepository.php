<?php

namespace App\Repositories;

use App\Models\Assignment;

class AssignmentRepository extends BaseRepository
{
    public function __construct(Assignment $assignment)
    {
        $this->model = $assignment;
    }

    public function get_by_submaterial(string $submaterialId)
    {
        return $this->model->query()
                ->where('sub_material_id', $submaterialId)
                ->get();
    }
}
