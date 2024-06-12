<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\SubMaterialExam;
use App\Services\StudentExamService;
use App\Repositories\StudentExamRepository;
use App\Repositories\SubMaterialExamQuestionRepository;

class StudentSubmaterialExamController extends Controller
{
    private SubMaterialExamQuestionRepository $examQuestion;
    private StudentExamRepository $studentExam;
    private StudentExamService $service;

    public function __construct(SubMaterialExamQuestionRepository $examQuestion, StudentExamRepository $studentExam, StudentExamService $service)
    {
        $this->examQuestion = $examQuestion;
        $this->studentExam = $studentExam;
        $this->service = $service;
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
}
