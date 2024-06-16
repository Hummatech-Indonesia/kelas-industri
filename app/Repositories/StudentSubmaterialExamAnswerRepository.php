<?php

namespace App\Repositories;

use App\Models\StudentSubmaterialExamAnswer;


class StudentSubmaterialExamAnswerRepository extends BaseRepository
{
    public function __construct(StudentSubmaterialExamAnswer $model)
    {
        $this->model = $model;
    }

    public function get_graded_answer($studentSubmaterialExam): mixed
    {
        return $this->model->query()
            ->where('student_submaterial_exam_id', $studentSubmaterialExam)
            ->whereNotNull('answer_value')
            ->get();
    }
}
