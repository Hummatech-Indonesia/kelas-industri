<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\SubMaterialExam;
use App\Services\StudentExamService;
use App\Services\SubMaterialService;
use App\Models\StudentSubmaterialExam;
use App\Repositories\StudentExamRepository;
use App\Repositories\QuestionBankRepository;
use App\Http\Requests\AnswerSubmaterialExamRequest;
use App\Repositories\SubMaterialExamQuestionRepository;
use App\Http\Requests\StudentSubMaterialExamScoreRequest;

class StudentSubmaterialExamController extends Controller
{
    private SubMaterialExamQuestionRepository $examQuestion;
    private StudentExamRepository $studentExam;
    private StudentExamService $service;
    private SubMaterialService $subMaterialService;
    private QuestionBankRepository $questionBank;

    public function __construct(SubMaterialExamQuestionRepository $examQuestion, StudentExamRepository $studentExam, StudentExamService $service, QuestionBankRepository $questionBank, SubMaterialService $subMaterialService)
    {
        $this->examQuestion = $examQuestion;
        $this->studentExam = $studentExam;
        $this->service = $service;
        $this->questionBank = $questionBank;
        $this->subMaterialService = $subMaterialService;
    }
    /**
     * index
     *
     * @param  mixed $subMaterialExam
     * @return mixed
     */
    public function index(SubMaterialExam $subMaterialExam): mixed
    {
        $examQuestionsMultipleChoice = $this->examQuestion->getRandomOrderByExamMultipleChoice($subMaterialExam->id);
        $examQuestionsEssay = $this->examQuestion->getRandomOrderByExamEssay($subMaterialExam->id);
        $studentExam = $this->studentExam->whereIn(['sub_material_exam_id' => $subMaterialExam->id]);
        if ($studentExam == null) {
            $this->service->store($subMaterialExam, $examQuestionsMultipleChoice, $examQuestionsEssay);
            $data['question_multiple_choice'] = $examQuestionsMultipleChoice;
            $data['question_essay'] = $examQuestionsEssay;
            return view('dashboard.user.pages.studentExam.exam', $data);
        } else {
            if (now() < Carbon::parse($subMaterialExam->start_at)) {
                return redirect()->back()->with('error', 'Ujian Belum Dimulai..');
            }

            $orderQuestionMultipleChoice = $studentExam->order_of_question_multiple_choice;
            $orderQuestionEssay = $studentExam->order_of_question_essay;

            $examQuestionsMultipleChoice = $this->examQuestion->getWhereMultiple(['orderQuestionMultipleChoice' => $orderQuestionMultipleChoice, 'sub_material_exam_id' => $subMaterialExam->id]);
            $examQuestionsEssay = $this->examQuestion->getWhereEssay(['orderQuestionEssay' => $orderQuestionEssay, 'sub_material_exam_id' => $subMaterialExam->id]);
            $data['student_exam'] = $studentExam;
            $data['question_multiple_choice'] = $examQuestionsMultipleChoice;
            $data['question_essay'] = $examQuestionsEssay;
            return view('dashboard.user.pages.studentExam.exam', $data);
        }
    }

    /**
     * answer
     *
     * @param  mixed $request
     * @param  mixed $subMaterialExam
     * @return mixed
     */
    public function answer(AnswerSubmaterialExamRequest $request, SubMaterialExam $subMaterialExam, StudentSubmaterialExam $studentSubmaterialExam): mixed
    {
        $questions = $this->questionBank->getBySubmaterialExam($subMaterialExam->id);
        $sortedQuestionsMultipleChoice = $this->subMaterialService->sortDailyExamQuestion($questions);

        $answerKey = $this->questionBank->getAnswerByQuestion(collect($sortedQuestionsMultipleChoice)->pluck('id')->toArray());

        $data = $this->service->calculate($request, $answerKey, $subMaterialExam);

        $this->studentExam->update($studentSubmaterialExam->id, $data);
    }

    /**
     * studentExamScore
     *
     * @param  mixed $request
     * @return JsonResponse
     */
    public function studentDailyExamEssayScore(StudentSubMaterialExamScoreRequest $request, StudentSubmaterialExam $studentSubmaterialExam): mixed
    {
        $essayValue = $studentSubmaterialExam->subMaterialExam->essay_value;
        $score = 0;
        $data = $request->validated();
        for ($i = 0; $i < count($data['student_submaterial_exam_answer_id']); $i++) {
            $score += $data['answer_value'][$i];
            $this->studentSubMaterialExamAnswer->update($data['student_daily_exam_answer_id'][$i], ['answer_value' => $data['answer_value'][$i]]);
        }
        if ($score >= $essayValue) {
            return redirect()->back()->with('error', "Total nilai yang anda tambahkan untuk essay maksimal " . $essayValue . " sedangkan total nilai yang anda inputkan " . $score);
        }

        return redirect()->back()->with('success', "Berhasil melakukan penilaian");
    }
}
