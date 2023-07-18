<?php

namespace App\Repositories;

use App\Models\Exam;

class ExamRepository extends BaseRepository
{
    public function __construct(Exam $model)
    {
        $this->model = $model;
    }

    public function get_student_by_exam_uts(string $clasroomId)
    {
        return $this->model->query()
        ->where('exam_type', 'uts')
        ->whereRelation('studentClassroom', function ($q) use ($clasroomId){
            return $q->where('classroom_id', $clasroomId);
        })
        ->get();
    }

    public function get_student_by_exam_uas(string $clasroomId)
    {
        return $this->model->query()
        ->where('exam_type', 'uas')
        ->whereRelation('studentClassroom', function ($q) use ($clasroomId){
            return $q->where('classroom_id', $clasroomId);
        })
        ->get();
    }

}
