<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\StudentSubmaterialExam;

class StudentExamRepository extends BaseRepository
{

    public function __construct(StudentSubmaterialExam $model)
    {
        $this->model = $model;
    }

    /**
     * whereIn
     *
     * @param  mixed $data
     * @return mixed
     */
    public function whereIn(array $data): mixed
    {
        return $this->model->query()
            ->where(['sub_material_exam_id' => $data['sub_material_exam_id'], 'student_id' => auth()->user()->id])->first();
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
            ->where('sub_material_exam_id', $data[0])
            ->whereRelation('student', 'id', auth()->user()->id)
            ->first();
    }
    public function openTab($subMaterialExam): mixed
    {
        $subMaterialExam->open_tab += 1;
        $subMaterialExam->save();
        return $subMaterialExam;
    }
}
