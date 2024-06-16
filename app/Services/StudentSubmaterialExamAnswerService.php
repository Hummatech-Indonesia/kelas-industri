<?php

namespace App\Services;

use App\Models\StudentSubmaterialExam;
use App\Repositories\StudentSubmaterialExamAnswerRepository;


class StudentSubmaterialExamAnswerService
{
    private StudentSubmaterialExamAnswerRepository $repository;
    public function __construct(StudentSubmaterialExamAnswerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function essay_graded(StudentSubmaterialExam $studentSubmaterialExam): mixed
    {
        $essayAnswers = $this->repository->get_graded_answer($studentSubmaterialExam->id);
        if (count($essayAnswers) < $studentSubmaterialExam->subMaterialExam->total_essay) {
            return false;
        } else {
            return true;
        }
    }
}
