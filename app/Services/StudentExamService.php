<?php

namespace App\Services;

use App\Models\SubMaterialExam;
use App\Repositories\StudentExamRepository;

class StudentExamService
{
    private StudentExamRepository $repository;

    public function __construct(StudentExamRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(SubMaterialExam $exam, $examQuestionsMultipleChoice, $examQuestionsEssay)
    {
        $indicesSequentialMultipleChoice = $examQuestionsMultipleChoice->pluck('question_number')->map(function ($index) {
            return strval($index);
        })->toArray();

        $combinedIndicesStringMultipleChoice = implode(',', $indicesSequentialMultipleChoice);

        $indicesSequentialEssay = $examQuestionsEssay->pluck('question_number')->map(function ($index) {
            return strval($index);
        })->toArray();

        $combinedIndicesStringEssay = implode(',', $indicesSequentialEssay);

        $data =  [
            'sub_material_exam_id' => $exam->id,
            'student_id' => auth()->user()->id,
            'order_of_question_multiple_choice' => $combinedIndicesStringMultipleChoice,
            'order_of_question_essay' => $combinedIndicesStringEssay,
            'deadline' => now()->addMinutes($exam->time)
        ];

        $this->repository->store($data);
    }
}
