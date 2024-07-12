<?php

namespace App\Services;

use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;
use App\Enums\ExamStatusEnum;
use App\Enums\QuestionTypeEnum;
use App\Models\SubMaterialExam;
use App\Repositories\QuestionBankRepository;
use App\Http\Requests\SubmaterialExamQuestionRequest;
use App\Repositories\SubMaterialExamQuestionRepository;

use function PHPSTORM_META\type;

class SubMaterialExamQuestionService
{
    private SubMaterialExamQuestionRepository $repository;
    private QuestionBankRepository $questionBankRepository;

    public function __construct(SubMaterialExamQuestionRepository $repository, QuestionBankRepository $questionBankRepository)
    {
        $this->repository = $repository;
        $this->questionBankRepository = $questionBankRepository;
    }

    public function fillManual(SubMaterialExam $submaterialExam, Request $request): mixed
    {
        $missingQuestionMultipleChoice = $this->getMissingQuestionMultipleChoice($submaterialExam);
        $missingQuestionEssay = $this->getMissingQuestionEssay($submaterialExam);
        $totalExamQuestion = $this->getTotalQuestion($submaterialExam);

        if ($request->type == QuestionTypeEnum::MULTIPLECHOICE->value) {
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
        if ($submaterialExam->total_essay + $submaterialExam->total_multiple_choice == $totalExamQuestion + count($request->question_bank_id)) {
            $this->updateExamStatusToFull($submaterialExam);
        }
        $data = $this->insertMultipleChoice($submaterialExam, $request->question_bank_id, $this->repository->getLatestDataByExam($submaterialExam->id));
        return $data;
    }

    /**
     * getMissingQuestionMultipleChoice
     *
     * @param  mixed $exam
     * @return int
     */
    public function getMissingQuestionMultipleChoice(SubMaterialExam $submaterialExam): int
    {
        return $submaterialExam->total_multiple_choice - $submaterialExam->subMaterialExamQuestions()->whereHas('questionBank', function ($query) {
            $query->where('type', QuestionTypeEnum::MULTIPLECHOICE->value);
        })->count();
    }

    /**
     * getMissingQuestionEssay
     *
     * @param  mixed $exam
     * @return int
     */
    public function getMissingQuestionEssay(SubMaterialExam $submaterialExam): int
    {
        return $submaterialExam->total_essay - $submaterialExam->subMaterialExamQuestions()->whereHas('questionBank', function ($query) {
            $query->where('type', QuestionTypeEnum::ESSAY->value);
        })->count();
    }

    /**
     * getTotalQuestion
     *
     * @param  mixed $dailyExam
     * @return int
     */
    public function getTotalQuestion(SubMaterialExam $submaterialExam): int
    {
        return $submaterialExam->subMaterialExamQuestions()->count();
    }

    /**
     * insert
     *
     * @param  mixed $exam
     * @param  mixed $questions
     * @return array
     */
    public function insertMultipleChoice(SubMaterialExam $submaterialExam, array $questions, mixed $latestData): array
    {
        if ($latestData == null) {
            return array_map(function ($examId, $question, $index) {
                return [
                    'sub_material_exam_id' => $examId,
                    'question_bank_id' => $question,
                    'question_number' => $index + 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }, array_fill(0, count($questions), $submaterialExam->id), $questions, array_keys($questions));
        } else {
            $latestQuestionNumber = $latestData->question_number;

            return array_map(function ($examId, $question, $index) use ($latestQuestionNumber) {
                return [
                    'sub_material_exam_id' => $examId,
                    'question_bank_id' => $question,
                    'question_number' => $latestQuestionNumber + $index + 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }, array_fill(0, count($questions), $submaterialExam->id), $questions, array_keys($questions));
        }
    }

    /**
     * updateExamStatusToFull
     *
     * @param  mixed $submaterialExam
     * @return void
     */
    public function updateExamStatusToFull(SubMaterialExam $submaterialExam): void
    {
        $submaterialExam->update(['status' => ExamStatusEnum::FULL->value]);
    }

    /**
     * updateExamStatusToNotFull
     *
     * @param  mixed $submaterialExam
     * @return void
     */
    public function updateExamStatusToNotFull(SubMaterialExam $submaterialExam): void
    {
        $submaterialExam->update(['status' => ExamStatusEnum::NOTFULL->value]);
    }
}
