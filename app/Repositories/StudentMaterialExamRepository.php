<?php

namespace App\Repositories;

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
}
