<?php

namespace App\Repositories;
use App\Repositories\BaseRepository;
use App\Models\StudentSubmaterialExam;

class StudentSubmaterialExamRepository extends BaseRepository {
    public function __construct(StudentSubmaterialExam $model) {
        $this->model = $model;
    }

    public function get_user_submaterial_exam($submaterialExamId) {
        return $this->model->query()
        ->where('student_id', auth()->user()->id)
        ->where('sub_material_exam_id', $submaterialExamId)
        ->latest()
        ->get();
    }
}
