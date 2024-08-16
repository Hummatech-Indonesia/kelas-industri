<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\View\View;
use App\Models\MaterialExam;
use Illuminate\Http\Request;
use App\Services\MaterialService;
use App\Models\StudentMaterialExam;
use App\Repositories\QuestionBankRepository;
use App\Services\StudentMaterialExamService;
use App\Repositories\StudentMaterialExamRepository;
use App\Repositories\MaterialExamQuestionRepository;
use App\Repositories\StudentMaterialExamAnswerRepository;

use function PHPUnit\Framework\isNull;

class StudentMaterialExamController extends Controller
{
    private MaterialExamQuestionRepository $examQuestion;
    private StudentMaterialExamRepository $studentExam;
    private StudentMaterialExamService $service;
    private MaterialService $materialService;
    private QuestionBankRepository $questionBankRepository;
    private StudentMaterialExamAnswerRepository $studentExamAnswerRepository;

    public function __construct(
        MaterialExamQuestionRepository $examQuestion,
        StudentMaterialExamRepository $studentExam,
        StudentMaterialExamAnswerRepository $studentExamAnswerRepository,
        StudentMaterialExamService $service,
        MaterialService $materialService,
        QuestionBankRepository $questionBankRepository
    ) {
        $this->studentExamAnswerRepository = $studentExamAnswerRepository;
        $this->examQuestion = $examQuestion;
        $this->studentExam = $studentExam;
        $this->service = $service;
        $this->materialService = $materialService;
        $this->questionBankRepository = $questionBankRepository;
    }

    public function index(MaterialExam $materialExam, $type): mixed
    {
        if (count($materialExam->materialExamQuestions) == 0) return back()->with('error', "Belum Ada Soal Untuk Ujian");

        $examQuestionsMultipleChoice = $this->examQuestion->getRandomOrderByExamMultipleChoice($materialExam->id);
        $examQuestionsEssay = $this->examQuestion->getRandomOrderByExamEssay($materialExam->id);
        $studentExam = $this->studentExam->whereIn(['material_exam_id' => $materialExam->id], $type);
        if ($studentExam == null) {
            $this->service->store($materialExam, $examQuestionsMultipleChoice, $examQuestionsEssay, $type);
            $studentExam = $this->studentExam->whereIn(['material_exam_id' => $materialExam->id],  $type);
            $data['student_exam'] = $studentExam;
            $data['question_multiple_choice'] = $examQuestionsMultipleChoice;
            $data['question_essay'] = $examQuestionsEssay;
            $data['type'] = $type;
            return view('dashboard.user.pages.studentMaterialExam.exam', $data);
        } else {
            if ($type == 'post_test') {
                $this->service->store($materialExam, $examQuestionsMultipleChoice, $examQuestionsEssay, $type);
                $studentExam = $this->studentExam->whereIn(['material_exam_id' => $materialExam->id],  $type);
                $data['student_exam'] = $studentExam;
                $data['question_multiple_choice'] = $examQuestionsMultipleChoice;
                $data['question_essay'] = $examQuestionsEssay;
                $data['type'] = $type;
                return view('dashboard.user.pages.studentMaterialExam.exam', $data);
            }

            if(!is_null($studentExam->finished_exam)) {
                return back()->with('error', 'anda sudah mengerjakan');
            }

            $studentExam->update([
                'score' => null,
                // 'deadline' => now()->addMinutes($materialExam->time),
                'finished_exam' => null,
                'true_answer' => null,
                'answer' => null
            ]);

            // $studentExam->studentMaterialExamAnswers()->delete();

            // $orderQuestionMultipleChoice = $studentExam->order_of_question_multiple_choice;
            // $orderQuestionEssay = $studentExam->order_of_question_essay;

            // $examQuestionsMultipleChoice = $materialExam->total_multiple_choice > 0 ? $this->examQuestion->getWhereMultiple(['orderQuestionMultipleChoice' => $orderQuestionMultipleChoice, 'material_exam_id' => $materialExam->id]) : [];
            // $examQuestionsEssay = $materialExam->total_multiple_choice > 0 ? $this->examQuestion->getWhereEssay(['orderQuestionEssay' => $orderQuestionEssay, 'material_exam_id' => $materialExam->id]) : [];
            $data['student_exam'] = $studentExam;
            $data['question_multiple_choice'] = $examQuestionsMultipleChoice;
            $data['question_essay'] = $examQuestionsEssay;
            $data['type'] = $type;
            // dd($data);
            return view('dashboard.user.pages.studentMaterialExam.exam', $data);
        }
    }

    public function answer(Request $request, MaterialExam $materialExam, StudentMaterialExam $studentMaterialExam): mixed
    {
        $questions = $this->questionBankRepository->getByMaterialExam($materialExam->id);

        $questionAnswer = $this->questionBankRepository->getAnswerByQuestion(collect($questions)->pluck('id')->toArray());
        $answerKey = $this->materialService->sortDailyExamQuestion($questionAnswer);

        $data = $this->service->calculate($request, $answerKey, $materialExam, $studentMaterialExam);
        $data['finished_count'] = $studentMaterialExam->finished_count + 1;

        $this->studentExam->update($studentMaterialExam->id, $data);

        return response()->json($data, 200);
    }

    public function showFinish(MaterialExam $materialExam, StudentMaterialExam $studentMaterialExam): View
    {
        $data['materialExam'] = $materialExam;
        $data['studentMaterialExam'] = $studentMaterialExam;
        $data['essayGraded'] = $this->service->essay_graded($data['studentMaterialExam']);
        return view('dashboard.user.pages.studentExam.finishStudentMaterial', $data);
    }

    /**
     * studentExamScore
     *
     * @param  mixed $request
     * @return JsonResponse
     */
    public function studentMaterialExamEssayScore(Request $request, MaterialExam $materialExam): mixed
    {
        $essayValue = $materialExam->essay_value;
        $score = 0;
        $data = $request;
        $scoreByAnswerId = [];

        foreach ($data['student_material_exam_answer_id'] as $index => $answerId) {
            $scoreByAnswerId[$answerId] = isset($scoreByAnswerId[$answerId]) ? $scoreByAnswerId[$answerId] + $data['answer_value'][$index] : $data['answer_value'][$index];
        }

        foreach ($scoreByAnswerId as $answerId => $totalScore) {
            if ($totalScore > $essayValue) {
                return redirect()->back()->with('error', "Total nilai yang anda tambahkan untuk essay maksimal " . $essayValue . " sedangkan total nilai yang anda inputkan " . $totalScore);
            }
        }

        for ($i = 0; $i < count($data['student_material_exam_answer_id']); $i++) {
            $score += $data['answer_value'][$i];
            $this->service->handleUpdate($data['student_material_exam_answer_id'][$i], ['question_number' => $data['student_question_number'][$i]], ['score' => $data['answer_value'][$i]]);
            $this->studentExamAnswerRepository->updateValue($data['student_material_exam_answer_id'][$i], ['question_number' => $data['student_question_number'][$i]], ['answer_value' => $data['answer_value'][$i]]);
        }

        return redirect()->back()->with('success', "Berhasil melakukan penilaian");
    }

    public function openTab(StudentMaterialExam $materialExam)
    {
        $studentExam = $this->service->handleOpenTab($materialExam);
        return response()->json(['openTab' => $studentExam->open_tab], 200);
    }

    public function reset($materialExam)
    {
        $delete = $this->service->reset($materialExam);
        return response()->json([], 200);
    }
}
