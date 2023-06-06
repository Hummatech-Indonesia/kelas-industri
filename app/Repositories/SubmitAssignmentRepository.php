<?php

namespace App\Repositories;

use App\Models\Generation;
use App\Models\SubmitAssignment;
use Illuminate\Support\Facades\DB;

class SubmitAssignmentRepository extends BaseRepository
{
    private Generation $generation;
    public function __construct(SubmitAssignment $model, Generation $generation)
    {
        $this->model = $model;
        $this->generation = $generation;
    }

    public function get_count_student_assignment(string $studentId) :mixed
    {
        return $this->model->query()
        ->where('student_id', $studentId)
        ->whereNotNull('point')
        ->get();
    }

    public function getTotalPoint()
    {
        return $this->model->query()
        ->groupBy('student_id')
        ->selectRaw('student_id, sum(point) as point')
        ->get();
    }

    public function getTotalAssignment()
    {
        return $this->generation->query()
        ->leftJoin('materials', 'generations.id', '=', 'materials.generation_id')
        ->leftJoin('sub_materials', 'materials.id', '=', 'sub_materials.material_id')
        ->leftJoin('assignments', 'sub_materials.id', '=', 'assignments.sub_material_id')
        ->select('generations.id', DB::raw('COUNT(assignments.id) as total_assignments'))
        ->groupBy('generations.id')
        ->get();
    }
}
