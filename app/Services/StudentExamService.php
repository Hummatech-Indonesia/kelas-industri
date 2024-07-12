<?php

namespace App\Services;

use App\Models\SubMaterialExam;
use App\Repositories\StudentExamRepository;
use App\Http\Requests\AnswerSubmaterialExamRequest;
use App\Models\StudentSubmaterialExam;
use App\Models\SubMaterialExamQuestion;
use App\Repositories\StudentSubMaterialExamAnswerRepository;

class StudentExamService
{
    private StudentExamRepository $repository;
    private StudentSubMaterialExamAnswerRepository $studentExamAnswerRepository;

    public function __construct(StudentExamRepository $repository, StudentSubMaterialExamAnswerRepository $studentExamAnswerRepository)
    {
        $this->studentExamAnswerRepository = $studentExamAnswerRepository;
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

    public function calculate(AnswerSubmaterialExamRequest $request, mixed $answerKeys, SubMaterialExam $subMaterialExam): mixed
    {
        // dd($request);
        if ($request->answer_essay) {
            $studentSubMaterialExam = $this->repository->getWhere([$subMaterialExam->id]);
            for ($i = 0; $i < count($request->answer_essay); $i++) {
                $data['answer'] = $request->answer_essay[$i];
                if ($data['answer']['answer'] == null) {
                    $data['answer']['answer_value'] = 0;
                }
                $studentSubMaterialExam->studentSubMaterialExamAnswers()->create($data['answer']);
            }
        }

        $answers = $request->answer;

        $answerArr = [];
        $true = 0;
        foreach ($answers as $i => $answer) {

            $question = SubMaterialExamQuestion::with('questionBank')->where('sub_material_exam_id', $subMaterialExam->id)->where('question_number', $answer['student_question_number'])->first();

            array_push($answerArr, $answer['answer']);
            if (in_array($answer['answer'], $question->questionBank->questionBankAnswers->pluck('answer')->toArray())) {
                $true++;
            }
        }

        return [
            'answer' => implode(';', $answerArr),
            'score' => ($subMaterialExam->multiple_choice_value / count($answerKeys) * $true),
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

    public function handleUpdate(string $id, $question_number, array $data): void
    {
        $scores = $this->repository->whereId($id);
        $scoreEssay = $this->studentExamAnswerRepository->scoreAnswerValue($id, $question_number)->answer_value;
        $currentScore = $scores->score - $scoreEssay;
        $totalScore = $data['score'] + $currentScore;
        $this->repository->update($id, ['score' => $totalScore]);
    }
}
