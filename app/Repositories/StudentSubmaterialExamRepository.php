<?php

namespace App\Repositories;

use App\Enums\SubMaterialExamTypeEnum;
use App\Helpers\RoleHelper;
use Illuminate\Http\Request;
use App\Repositories\BaseRepository;
use App\Models\StudentSubmaterialExam;

class StudentSubmaterialExamRepository extends BaseRepository
{
    public function __construct(StudentSubmaterialExam $model)
    {
        $this->model = $model;
    }

    public function get_user_submaterial_exam($submaterialExamId)
    {
        return $this->model->query()
            ->where('student_id', auth()->user()->id)
            ->where('sub_material_exam_id', $submaterialExamId)
            ->latest()
            ->first();
    }

    public function getAllStudentSubmit($submaterialExamId): mixed
    {
        return $this->model->query()
            ->where('sub_material_exam_id', $submaterialExamId)
            ->with('student.studentSchool.studentClassroom.classroom')
            ->get();
    }

    public function getBySubmaterialExam(Request $request, $submaterialExamId, $paginate): mixed
    {
        // dd($request->school_id);
        $result = $this->model->query()
            ->where('sub_material_exam_id', $submaterialExamId)
            ->whereRelation('student', function ($q) use ($request) {
                return $q->where('name',  'LIKE', "%$request->search%");
            });

        if ($request->school_id && $request->classroom_id) {
            $result->whereRelation('student.studentSchool', function ($q) use ($request) {
                return $q->where('school_id', $request->school_id)
                    ->whereRelation('classrooms', 'classroom_id', $request->classroom_id);
            });
        } else if ($request->school_id) {
            $result->whereRelation('student.studentSchool', function ($q) use ($request) {
                return $q->where('school_id', $request->school_id);
            });
        }

        return $data = $result->paginate($paginate);
    }


    public function getTester($schoolId) : mixed {
        return $this->model->query()
        ->with('student')
        ->whereRelation('student.studentSchool.school', 'id', $schoolId)
        ->get();
    }
    public function getTesterExamREsult($examId) : mixed {
        return $this->model->query()
        ->with('student')
        ->whereRelation('subMaterialExam', 'id', $examId)
        ->orderBy('score', 'desc')
        ->get();
    }

    public function getPreviousStudentExam(string $previousSubMaterial, int $previousOrder): mixed
    {
        return $this->model->query()
        ->whereRelation('subMaterialExam.subMaterial', 'order', $previousOrder)
        ->whereRelation('subMaterialExam.subMaterial', 'sub_material_id', $previousSubMaterial)
        ->first();
    }

    public function countAllStudentSubMaterialQuiz(string $material): mixed
    {
        return $this->model->query()
        ->whereRelation('subMaterialExam.subMaterial.material', 'id', $material)
        ->whereRelation('subMaterialExam', 'type', SubMaterialExamTypeEnum::QUIZ->value)
        ->whereRelation('student', 'id', auth()->user()->id)
        ->count();
    }
}
