<?php

namespace App\Services;

use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;
use App\Enums\ExamStatusEnum;
use App\Enums\QuestionTypeEnum;
use App\Models\SubMaterialExam;
use App\Repositories\QuestionBankRepository;
use App\Repositories\MaterialExamQuestionRepository;
use App\Http\Requests\SubmaterialExamQuestionRequest;
use App\Models\MaterialExam;
use App\Repositories\SubMaterialExamQuestionRepository;

class MaterialExamQuestionService
{
    private MaterialExamQuestionRepository $repository;
    private QuestionBankRepository $questionBankRepository;

    public function __construct(MaterialExamQuestionRepository $repository, QuestionBankRepository $questionBankRepository)
    {
        $this->repository = $repository;
        $this->questionBankRepository = $questionBankRepository;
    }

    public function fillManual(MaterialExam $materialExam, $request): mixed
    {
        $missingQuestionMultipleChoice = $this->getMissingQuestionMultipleChoice($materialExam);
        $missingQuestionEssay = $this->getMissingQuestionEssay($materialExam);
        $totalExamQuestion = $this->getTotalQuestion($materialExam);
        
        if ($request->type == 'multiplechoice') {
            if ($missingQuestionMultipleChoice == 0) {
                return redirect()->back()->with('error', 'Anda tidak bisa menambah soal pilihan ganda lagi karena soal sudah mencapai maksimal');
            } else if (count($request->question_bank_id) > $missingQuestionMultipleChoice) {
                return redirect()->back()->with('error', 'Anda hanya bisa memilih maksimal ' . $missingQuestionMultipleChoice . ' soal! pilihan ganda');
            }
        } else {
            if ($missingQuestionEssay == 0) {
                return redirect()->back()->with('error', 'Anda tidak bisa menambah soal essay lagi karena soal sudah mencapai maksimal');
            } elseif (count($request->question_bank_id) > $missingQuestionEssay) {
                return redirect()->back()->with('error', 'Anda hanya bisa memilih maksimal ' . $missingQuestionEssay . ' soal! essay');
            }
        }
        if ($materialExam->total_essay + $materialExam->total_multiple_choice == $totalExamQuestion + count($request->question_bank_id)) {
            $this->updateExamStatusToFull($materialExam);
        }
        $data = $this->insertMultipleChoice($materialExam, $request->question_bank_id, $this->repository->getLatestDataByExam($materialExam->id));
        return $data;
    }

    /**
     * getMissingQuestionMultipleChoice
     *
     * @param  mixed $exam
     * @return int
     */
    public function getMissingQuestionMultipleChoice(MaterialExam $materialExam): int
    {
        // dd($materialExam->materialExamQuestions);
        return $materialExam->total_multiple_choice - $materialExam->materialExamQuestions()->whereHas('questionBank', function ($query) {
            $query->where('type', QuestionTypeEnum::MULTIPLECHOICE->value);
        })->count();
    }

    /**
     * getMissingQuestionEssay
     *
     * @param  mixed $exam
     * @return int
     */
    public function getMissingQuestionEssay(MaterialExam $materialExam): int
    {
        return $materialExam->total_essay - $materialExam->materialExamQuestions()->whereHas('questionBank', function ($query) {
            $query->where('type', QuestionTypeEnum::ESSAY->value);
        })->count();
    }

    /**
     * getTotalQuestion
     *
     * @param  mixed $dailyExam
     * @return int
     */
    public function getTotalQuestion(MaterialExam $materialExam): int
    {
        return $materialExam->materialExamQuestions()->count();
    }

    /**
     * insert
     *
     * @param  mixed $exam
     * @param  mixed $questions
     * @return array
     */
    public function insertMultipleChoice(MaterialExam $materialExam, array $questions, mixed $latestData): array
    {
        if ($latestData == null) {
            return array_map(function ($examId, $question, $index) {
                return [
                    'material_exam_id' => $examId,
                    'question_bank_id' => $question,
                    'question_number' => $index + 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }, array_fill(0, count($questions), $materialExam->id), $questions, array_keys($questions));
        } else {
            $latestQuestionNumber = $latestData->question_number;

            return array_map(function ($examId, $question, $index) use ($latestQuestionNumber) {
                return [
                    'material_exam_id' => $examId,
                    'question_bank_id' => $question,
                    'question_number' => $latestQuestionNumber + $index + 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }, array_fill(0, count($questions), $materialExam->id), $questions, array_keys($questions));
        }
    }

    /**
     * updateExamStatusToFull
     *
     * @param  mixed $materialExam
     * @return void
     */
    public function updateExamStatusToFull(MaterialExam $materialExam): void
    {
        $materialExam->update(['status' => ExamStatusEnum::FULL->value]);
    }

    /**
     * updateExamStatusToNotFull
     *
     * @param  mixed $materialExam
     * @return void
     */
    public function updateExamStatusToNotFull(MaterialExam $materialExam): void
    {
        $materialExam->update(['status' => ExamStatusEnum::NOTFULL->value]);
    }
}
