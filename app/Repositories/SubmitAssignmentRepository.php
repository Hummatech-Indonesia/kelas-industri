<?php

namespace App\Repositories;

use App\Models\Generation;
use App\Models\SubmitAssignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubmitAssignmentRepository extends BaseRepository
{
    private Generation $generation;
    public function __construct(SubmitAssignment $model, Generation $generation)
    {
        $this->model = $model;
        $this->generation = $generation;
    }

    public function get_count_student_assignment(string $studentId): mixed
    {
        return $this->model->query()
            ->where('student_id', $studentId)
            ->whereNotNull('point')
            ->get();
    }

    public function getTotalPoint(Request $search)
    {
        return $this->model->query()
            ->when($search->school_id, function ($query) use ($search) {
                return $query->whereRelation('student', function ($q) use ($search) {
                    $q->whereRelation('studentSchool', function ($q) use ($search) {
                        $q->where('school_id', $search->school_id);
                    });
                });
            })
            ->when($search->classroom_id, function ($query) use ($search) {
                return $query->whereRelation('student.studentSchool.studentClassroom', function ($q) use ($search) {
                    $q->where('classroom_id', $search->classroom_id);
                });
            })
            ->when($search->school_year, function ($query) use ($search) {
                return $query->whereRelation('student.studentSchool.studentClassroom.classroom.generation.schoolYear', function ($q) use ($search) {
                    $q->where('id', $search->school_year);
                });
            })
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
