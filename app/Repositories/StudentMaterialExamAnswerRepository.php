<?php

namespace App\Repositories;
use App\Repositories\BaseRepository;
use App\Models\StudentMaterialExamAnswer;


class StudentMaterialExamAnswerRepository extends BaseRepository
{
    public function __construct(StudentMaterialExamAnswer $model)
    {
        $this->model = $model;
    }

    public function getAnswerBySubMaterial(string $materialExamId)
    {
        return $this->model->query()
        ->with('studentMaterialExam.student')
        ->whereRelation('studentMaterialExam', function ($query) use ($materialExamId){
            $query->where('material_exam_id', $materialExamId);
        })
        ->get();
    }

    public function scoreAnswerValue(mixed $id, $question_number):mixed
    {
        return $this->model->query()
        ->where('student_exam_id', $id)
        ->where('student_question_number', $question_number)
        ->first();
    }

    /**
     * update
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return mixed
     */
    public function updateValue(mixed $id, $question_number, array $data): mixed
    {
        return $this->model->query()
        ->where('student_exam_id', $id)
        ->where('student_question_number', $question_number)
        ->update($data);
    }

    public function get_graded_answer($studentMaterialExamId): mixed {
        return $this->model->query()
        ->whereRelation('studentMaterialExam', 'id', $studentMaterialExamId)
        ->whereNotNull('answer_value')
        ->count();
    }
}
