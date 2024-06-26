<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\QuestionTypeEnum;
use App\Models\SubMaterialExam;
use App\Models\SubMaterialExamQuestion;
use App\Repositories\QuestionBankRepository;
use App\Services\SubMaterialExamQuestionService;
use App\Http\Requests\SubmaterialExamQuestionRequest;
use App\Repositories\SubMaterialExamQuestionRepository;

class SubMaterialExamQuestionController extends Controller
{
    private SubMaterialExamQuestionService $service;
    private SubMaterialExamQuestionRepository $repository;
    private QuestionBankRepository $questionBankRepository;

    public function __construct(SubMaterialExamQuestionService $service, SubMaterialExamQuestionRepository $repository, QuestionBankRepository $questionBankRepository)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->questionBankRepository = $questionBankRepository;
    }

    /**
     * auto
     *
     * @param  SubMaterialExam $exam
     * @return JsonResponse
     */
    public function auto(Request $request, SubMaterialExam $submaterialExam)
    {
        $missingQuestionsMultipleChoice = $this->service->getMissingQuestionMultipleChoice($submaterialExam);
        $missingQuestionsEssay = $this->service->getMissingQuestionEssay($submaterialExam);

        $usedQuestions = $submaterialExam->subMaterialExamQuestions()->pluck('question_bank_id')->toArray();
        $questionMultipleChoice = $this->questionBankRepository->getRandomOrder($request, $submaterialExam->sub_material_id, $missingQuestionsMultipleChoice, $usedQuestions, QuestionTypeEnum::MULTIPLECHOICE->value)->pluck('id')->toArray();
        $questionEssay = $this->questionBankRepository->getRandomOrder($request, $submaterialExam->sub_material_id, $missingQuestionsEssay, $usedQuestions, QuestionTypeEnum::ESSAY->value)->pluck('id')->toArray();
        $dataMultipleChoice = $this->service->insertMultipleChoice($submaterialExam, $questionMultipleChoice, $this->repository->getLatestDataByExam($submaterialExam->id));
        $dataEssay = $this->service->insertMultipleChoice($submaterialExam, $questionEssay, $this->repository->getLatestDataByExam($submaterialExam->id));
        if (count($dataMultipleChoice) + count($dataEssay) == $submaterialExam->total_multiple_choice + $submaterialExam->total_essay) {
            $this->service->updateExamStatusToFull($submaterialExam);
        }
        $this->repository->insert($dataMultipleChoice);
        $this->repository->insert($dataEssay);
        return redirect()->back()->with('success', 'Berhasil Mengisi ' . count($questionMultipleChoice) . ' Soal Pilhan Ganda dan ' . count($questionEssay) . ' Soal Essay!');
    }

   /**
     * manual
     *
     * @param  SubmaterialExamQuestionRequest $request
     * @param  Exam $exam
     * @return JsonResponse
     */
    public function manual(SubMaterialExam $submaterialExam, Request $request): mixed
    {
        $data = $this->service->fillManual($submaterialExam, $request);
        if (gettype($data) == 'array') {
            $this->repository->insert($data);
            return redirect()->back()->with('success', 'Berhasil Mengisi ' . count($request->question_bank_id) . ' Soal!');
        }
        return $data;
    }


    /**
     * destroy
     *
     * @param  SubMaterialExamQuestion subMaterialExamQuestion
     * @return mixed
     */
    public function destroy(SubMaterialExamQuestion $submaterialExamQuestion): mixed
    {
        $getDataQuestionNumber = $this->repository->getDataQuestionNumber($submaterialExamQuestion->sub_material_exam_id, $submaterialExamQuestion->question_number);
        foreach ($getDataQuestionNumber as $value) {
            $this->repository->update($value->id, ['question_number' => $value->question_number - 1]);
        }
        $this->service->updateExamStatusToNotFull($submaterialExamQuestion->subMaterialExam);
        $this->repository->destroy($submaterialExamQuestion->id);
        return redirect()->back()->with('success', trans('alert.delete_success'));
    }

}
