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
     * update
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return mixed
     */
    public function update(mixed $id, array $data): mixed
    {
        $studentExam = $this->model->query()->findOrFail($id);
        if ($studentExam->exam->total_essay != 0) {
            $orderOfQuestionEssay = explode(",", $studentExam->order_of_question_essay);
            $studentExam->update($data);
            for ($i = 0; $i < count($orderOfQuestionEssay); $i++) {
                $data['answer'] = $data['answer_essay'][$i];
                $data['student_question_number'] = $orderOfQuestionEssay[$i];
                $studentExam->studentExamAnswers()->create($data);
            }
        } else {
            $studentExam->update($data);
        }
        return $studentExam;
    }
}
