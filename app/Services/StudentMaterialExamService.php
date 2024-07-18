<?php

namespace App\Services;

use App\Models\MaterialExam;
use Illuminate\Http\Request;
use App\Repositories\StudentMaterialExamRepository;
use App\Repositories\StudentMaterialExamAnswerRepository;

class StudentMaterialExamService
{
    private StudentMaterialExamRepository $repository;
    private StudentMaterialExamAnswerRepository $studentExamAnswerRepository;

    public function __construct(StudentMaterialExamRepository $repository, StudentMaterialExamAnswerRepository $studentExamAnswerRepository)
    {
        $this->studentExamAnswerRepository = $studentExamAnswerRepository;
        $this->repository = $repository;
    }

    public function store(MaterialExam $exam, $examQuestionsMultipleChoice, $examQuestionsEssay, $type)
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
            'material_exam_id' => $exam->id,
            'student_id' => auth()->user()->id,
            'type' => $type,
            'order_of_question_multiple_choice' => $combinedIndicesStringMultipleChoice,
            'order_of_question_essay' => $combinedIndicesStringEssay,
            'deadline' => now()->addMinutes($exam->time),
        ];
        // dd($type);
        $this->repository->store($data);
    }

    public function calculate(Request $request, mixed $answerKeys, MaterialExam $materialExam): mixed
    {
        if ($request->answer_essay) {
            $studentMaterialExam = $this->repository->getWhere([$materialExam->id]);
            for ($i = 0; $i < count($request->answer_essay); $i++) {
                $data['answer'] = $request->answer_essay[$i];
                if($data['answer']['answer'] == null)  {
                    $data['answer']['answer_value'] = 0;
                }
                $studentMaterialExam->studentMaterialExamAnswers()->create($data['answer']);
            }
        }

        $answers = $request->answer;
        $answerArr = [];
        $true = 0;
        foreach ($answers as $i => $answer) {
            $correctAnswers = $answerKeys[$i]->questionBankAnswers->pluck('answer')->toArray();
            array_push($answerArr, $answer['answer']);
            if (in_array($answer['answer'], $correctAnswers)) {
                $true++;
            }
        }

        return [
            'answer' => implode(';', $answerArr),
            'score' => ($materialExam->multiple_choice_value / count($answerKeys) * $true),
            'true_answer' => $true,
            'finished_exam' => now(),
        ];
    }
    public function handleOpenTab($subMaterialExam): mixed
    {
        return $this->repository->openTab($subMaterialExam);
    }

    public function  reset($id): mixed
    {
        return $this->repository->destroy($id);
    }

    public function handleUpdate(string $id,$question_number ,array $data): void
    {
        $scores = $this->repository->whereId($id);
        $scoreEssay = $this->studentExamAnswerRepository->scoreAnswerValue($id, $question_number)->answer_value;
        $currentScore = $scores->score - $scoreEssay;
        $totalScore = $data['score'] + $currentScore;
        $this->repository->update($id, ['score' => $totalScore]);
    }
}
