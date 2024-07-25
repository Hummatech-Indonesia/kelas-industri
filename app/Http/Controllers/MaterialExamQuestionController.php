<?php

namespace App\Http\Controllers;

use App\Models\MaterialExam;
use Illuminate\Http\Request;
use App\Enums\QuestionTypeEnum;
use App\Models\MaterialExamQuestion;
use App\Services\MaterialExamService;
use App\Repositories\QuestionBankRepository;
use App\Services\MaterialExamQuestionService;
use App\Repositories\MaterialExamQuestionRepository;

class MaterialExamQuestionController extends Controller
{

    protected MaterialExamQuestionService $service;
    protected QuestionBankRepository $questionBankRepository;
    protected MaterialExamQuestionRepository $repository;

    public function __construct(
        MaterialExamQuestionService $service,
        QuestionBankRepository $questionBankRepository,
        MaterialExamQuestionRepository $repository

    ) {
        $this->service = $service;
        $this->repository = $repository;
        $this->questionBankRepository = $questionBankRepository;
    }

    /**
     * manual
     *
     * @param  SubmaterialExamQuestionRequest $request
     * @param  Exam $exam
     * @return JsonResponse
     */
    public function manual(MaterialExam $materialExam, Request $request): mixed
    {
        $data = $this->service->fillManual($materialExam, $request);
        if (gettype($data) == 'array') {
            $this->repository->insert($data);
            return redirect()->back()->with('success', 'Berhasil Mengisi ' . count($request->question_bank_id) . ' Soal!');
        }
        return $data;
    }

    public function auto(Request $request, MaterialExam $materialExam)
    {
        $missingQuestionsMultipleChoice = $this->service->getMissingQuestionMultipleChoice($materialExam);
        $missingQuestionsEssay = $this->service->getMissingQuestionEssay($materialExam);

        $usedQuestions = $materialExam->materialExamQuestions()->pluck('question_bank_id')->toArray();
        $questionMultipleChoice = $this->questionBankRepository->getMaterialRandomOrder($request, $materialExam->material_id, $missingQuestionsMultipleChoice, $usedQuestions, QuestionTypeEnum::MULTIPLECHOICE->value)->pluck('id')->toArray();
        $questionEssay = $this->questionBankRepository->getMaterialRandomOrder($request, $materialExam->material_id, $missingQuestionsEssay, $usedQuestions, QuestionTypeEnum::ESSAY->value)->pluck('id')->toArray();
        $dataMultipleChoice = $this->service->insertMultipleChoice($materialExam, $questionMultipleChoice, $this->repository->getLatestDataByExam($materialExam->id));
        $dataEssay = $this->service->insertMultipleChoice($materialExam, $questionEssay, $this->repository->getLatestDataByExam($materialExam->id));
        if (count($dataMultipleChoice) + count($dataEssay) == $materialExam->total_multiple_choice + $materialExam->total_essay) {
            $this->service->updateExamStatusToFull($materialExam);
        }
        $this->repository->insert($dataMultipleChoice);
        $this->repository->insert($dataEssay);
        return redirect()->back()->with('success', 'Berhasil Mengisi ' . count($questionMultipleChoice) . ' Soal Pilhan Ganda dan ' . count($questionEssay) . ' Soal Essay!');
    }

    /**
     * destroy
     *
     * @param  MaterialExamQuestion MaterialExamQuestion
     * @return mixed
     */
    public function destroy(MaterialExamQuestion $materialExamQuestion): mixed
    {
        $getDataQuestionNumber = $this->repository->getDataQuestionNumber($materialExamQuestion->material_exam_id, $materialExamQuestion->question_number);
        foreach ($getDataQuestionNumber as $value) {
            $this->repository->update($value->id, ['question_number' => $value->question_number - 1]);
        }
        $this->service->updateExamStatusToNotFull($materialExamQuestion->MaterialExam);
        $this->repository->destroy($materialExamQuestion->id);
        return redirect()->back()->with('success', trans('alert.delete_success'));
    }
}
