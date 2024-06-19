<?php

namespace App\Repositories;
use App\Repositories\BaseRepository;
use App\Models\StudentSubmaterialExamAnswer;


class StudentSubMaterialExamAnswerRepository extends BaseRepository
{
    public function __construct(StudentSubmaterialExamAnswer $model)
    {
        $this->model = $model;
    }

    public function getAnswerBySubMaterial(string $subMaterialExamId)
    {
        return $this->model->query()
        ->with('studentSubmaterialExam.student')
        ->whereRelation('studentSubmaterialExam', function ($query) use ($subMaterialExamId){
            $query->where('sub_material_exam_id', $subMaterialExamId);
        })
        ->get();
    }

    /**
     * update
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return mixed
     */
    public function update(mixed $id, array $data): mixed
    {

        return $this->model->query()
            ->where('student_submaterial_exam_id', $id)->update($data);
    }
}
