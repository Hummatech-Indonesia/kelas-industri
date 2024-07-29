<?php

namespace App\Repositories;

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

    public function whereId(mixed $id, string $type): mixed
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
    public function getWhere(array $data): mixed
    {
        return $this->model->query()
            ->where('material_exam_id', $data[0])
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
        // dd($request->school_id);
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
}
