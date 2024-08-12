<?php

namespace App\Repositories;

use App\Helpers\RoleHelper;
use Illuminate\Http\Request;
use App\Models\StudentMaterialExam;
use App\Repositories\BaseRepository;

class StudentMaterialExamRepository extends BaseRepository
{

    public function __construct(StudentMaterialExam $model)
    {
        $this->model = $model;
    }

    /**
     * whereIn
     *
     * @param  mixed $data
     * @return mixed
     */
    public function whereIn(array $data, string $type): mixed
    {
        return $this->model->query()
            ->where('type', $type)
            ->where(['material_exam_id' => $data['material_exam_id'], 'student_id' => auth()->user()->id])->first();
    }

    public function whereId(mixed $id): mixed
    {
        return $this->model->query()
            ->where('id', $id)
            ->select('score')
            ->first();
    }

    /**
     * getWhere
     *
     * @param  mixed $data
     * @return mixed
     */
    public function getWhere(array $data, string $type): mixed
    {
        return $this->model->query()
            ->where('material_exam_id', $data[0])
            ->where('type', $type)
            ->whereRelation('student', 'id', auth()->user()->id)
            ->first();
    }

    public function openTab($subMaterialExam): mixed
    {
        $subMaterialExam->open_tab += 1;
        $subMaterialExam->save();
        return $subMaterialExam;
    }

    public function update(mixed $id, array $data): mixed
    {
        return $this->show($id)->update($data);
    }

    public function getByMaterialExam(Request $request, $submaterialExamId, $paginate): mixed
    {
        $result = $this->model->query()
            ->where('material_exam_id', $submaterialExamId)
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

    public function handleComplateExamPreTest(mixed $previousMaterial): mixed
    {
        // dd($previousMaterial);
        return $this->model->query()
            ->where('material_exam_id', $previousMaterial->materialExam->id)
            ->whereRelation('student', 'id', auth()->user()->id)
            ->where('type', 'pre_test')
            ->first();
    }

    public function handleComplateExamPosTest(mixed $previousMaterial): mixed
    {
        return $this->model->query()
            ->where('material_exam_id', $previousMaterial->materialExam->id)
            ->whereRelation('student', 'id', auth()->user()->id)
            ->where('type', 'post_test')
            ->first();
    }

    public function getAllStudentSubmit($materialExamId): mixed
    {
        return $this->model->query()
            ->where('material_exam_id', $materialExamId)
            ->with('student.studentSchool.studentClassroom.classroom')
            ->get();
    }


    public function getAllStudent(string $materialExamId, $request): mixed
    {
        return $this->model->query()
            ->with(['student.studentSchool.studentClassroom.classroom', 'materialExam', 'studentMaterialExamAnswers'])
            ->where('material_exam_id', $materialExamId)
            ->whereRelation('student', 'status', 'active')
            ->when($request->has('type'), function ($query) use ($request) {
                $query->where('type', $request->type);
            }, function ($query) {
                $query->where('type', 'pre_test');
            })
            ->when($request->classroom_id, function ($q) use ($request) {
                $q->whereRelation('student.studentSchool.studentClassroom', 'classroom_id', $request->classroom_id);
            })
            ->get();
    }

    public function getMinValue(string $materialExamId, $request): mixed
    {
        return $this->model->query()
            ->where('material_exam_id', $materialExamId)
            ->when($request->has('type'), function ($query) use ($request) {
                $query->where('type', $request->type);
            }, function ($query) {
                $query->where('type', 'pre_test');
            })
            ->when($request->classroom_id, function ($q) use ($request) {
                $q->whereRelation('student.studentSchool.studentClassroom', 'classroom_id', $request->classroom_id);
            })
            ->min('score');
    }

    public function getMaxValue(string $materialExamId, $request): mixed
    {
        return $this->model->query()
            ->where('material_exam_id', $materialExamId)
            ->when($request->has('type'), function ($query) use ($request) {
                $query->where('type', $request->type);
            }, function ($query) {
                $query->where('type', 'pre_test');
            })
            ->when($request->classroom_id, function ($q) use ($request) {
                $q->whereRelation('student.studentSchool.studentClassroom', 'classroom_id', $request->classroom_id);
            })
            ->max('score');
    }

    public function getAvgValue(string $materialExamId, $request): mixed
    {
        if (RoleHelper::get_role() == 'mentor') {
            $classroomArry = auth()->user()->mentorClassrooms->pluck('classroom_id')->toArray();
        } else {
            $classroomArry = auth()->user()->teacherSchool->teacherClassrooms->pluck('classroom_id')->toArray();
        }


        return $this->model->query()
            ->whereRelation('student.studentSchool.studentClassroom', function ($query) use ($classroomArry) {
                $query->whereIn('classroom_id', $classroomArry);
            })
            ->when($request->has('type'), function ($query) use ($request) {
                $query->where('type', $request->type);
            }, function ($query) {
                $query->where('type', 'pre_test');
            })
            ->when($request->answer_value == 'null', function ($query) {
                $query->whereRelation('studentMaterialExamAnswers', 'answer_value', null);
            })
            ->when($request->answer_value == 'not_null', function ($query) {
                $query->whereRelation('studentMaterialExamAnswers', 'answer_value', '!=', null);
            })
            ->when($request->classroom_id, function ($q) use ($request) {
                $q->whereRelation('student.studentSchool.studentClassroom', 'classroom_id', $request->classroom_id);
            })
            ->where('material_exam_id', $materialExamId)
            ->avg('score');
    }

    public function getByClassroomArray(string $materialExamId, mixed $classroomId, Request $request, int $limit): mixed
    {
        return $this->model->query()
            ->where('material_exam_id', $materialExamId)
            ->with('student.studentSchool.studentClassroom.classroom')
            ->whereHas('student.studentSchool.studentClassroom', function ($query) use ($classroomId) {
                $query->whereIn('classroom_id', $classroomId);
            })
            ->when($request->has('type'), function ($query) use ($request) {
                $query->where('type', $request->type);
            }, function ($query) {
                $query->where('type', 'pre_test');
            })
            ->when($request->answer_value == 'null', function ($query) {
                $query->whereRelation('studentMaterialExamAnswers', 'answer_value', null);
            })
            ->when($request->answer_value == 'not_null', function ($query) {
                $query->whereRelation('studentMaterialExamAnswers', 'answer_value', '!=', null);
            })
            ->when($request->classroom_id, function ($q) use ($request) {
                $q->whereRelation('student.studentSchool.studentClassroom', 'classroom_id', $request->classroom_id);
            })
            ->whereRelation('student', 'status', 'active')
            ->paginate($limit);
    }
}
