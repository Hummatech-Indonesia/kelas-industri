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

        return $result->paginate($paginate);
    }

    public function getAllStudent(string $subMaterialExamId): mixed
    {
        return $this->model->query()
            ->with(['student.studentSchool.studentClassroom.classroom', 'subMaterialExam', 'studentSubMaterialExamAnswers'])
            ->where('sub_material_exam_id', $subMaterialExamId)
            ->whereRelation('student', 'status', 'active')
            ->get();
    }

    public function getMinValue(string $subMaterialExamId): mixed
    {
        return $this->model->query()
            ->where('sub_material_exam_id', $subMaterialExamId)
            ->min('score');
    }

    public function getMaxValue(string $subMaterialExamId): mixed
    {
        return $this->model->query()
            ->where('sub_material_exam_id', $subMaterialExamId)
            ->max('score');
    }

    public function getAvgValue(string $subMaterialExamId): mixed
    {
        if (RoleHelper::get_role() == 'mentor') {
            $classroomArry = auth()->user()->mentorClassrooms->pluck('classroom_id')->toArray();
        }else{
            $classroomArry = auth()->user()->teacherSchool->teacherClassrooms->pluck('classroom_id')->toArray();
        }

        return $this->model->query()
            ->whereRelation('student.studentSchool.studentClassroom', function ($query) use ($classroomArry) {
                $query->whereIn('classroom_id', $classroomArry);
            })
            ->where('sub_material_exam_id', $subMaterialExamId)
            ->avg('score');
    }

    public function getByClassroomArray(string $subMaterialExamId, mixed $classroomId, Request $request, int $limit): mixed
    {
        return $this->model->query()
            ->where('sub_material_exam_id', $subMaterialExamId)
            ->with('student.studentSchool.studentClassroom.classroom')
            ->whereHas('student.studentSchool.studentClassroom', function ($query) use ($classroomId) {
                $query->whereIn('classroom_id', $classroomId);
            })
            ->when($request->classroom_id, function ($q) use ($request) {
                $q->whereRelation('student.studentSchool.studentClassroom', 'classroom_id', $request->classroom_id);
            })
            ->whereRelation('student', 'status', 'active')
            ->paginate($limit);
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
}
