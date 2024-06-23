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

    public function scoreAnswerValue(mixed $id, $question_number):mixed
    {
        return $this->model->query()
        ->where('student_submaterial_exam_id', $id)
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
        ->where('student_submaterial_exam_id', $id)
        ->where('student_question_number', $question_number)
        ->update($data);
    }
    
    public function get_graded_answer($studentSubMaterialExamId): mixed {
        return $this->model->query()
        ->whereRelation('studentSubmaterialExam', 'id', $studentSubMaterialExamId)
        ->whereNotNull('answer_value')
        ->count();
    }
}
