<?php

namespace App\Http\Controllers;

use App\Models\MaterialExam;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnSelf;
use App\Repositories\MaterialExamRepository;
use App\Repositories\QuestionBankRepository;
use App\Services\StudentMaterialExamService;
use App\Repositories\MaterialExamQuestionRepository;

class MaterialExamController extends Controller
{
    private MaterialExamRepository $repository;
    private QuestionBankRepository $questionBankRepository;
    private MaterialExamQuestionRepository $examQuestionRepository;
    private StudentMaterialExamService $studentMaterialExamService;

    public function __construct(
        MaterialExamRepository $repository,
        QuestionBankRepository $questionBankRepository,
        MaterialExamQuestionRepository $examQuestionRepository,
        StudentMaterialExamService $studentMaterialExamService
    ) {
        $this->repository = $repository;
        $this->questionBankRepository = $questionBankRepository;
        $this->examQuestionRepository = $examQuestionRepository;
        $this->studentMaterialExamService = $studentMaterialExamService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = $this->repository->getPaginate(6);
        return view('dashboard.admin.pages.materialExam.index', compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MaterialExam  $materialExam
     * @return \Illuminate\Http\Response
     */
    public function show(MaterialExam $materialExam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MaterialExam  $materialExam
     * @return \Illuminate\Http\Response
     */
    public function edit(MaterialExam $materialExam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MaterialExam  $materialExam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $materialExam)
    {
        $this->repository->update($materialExam, $request->all());
        return back()->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MaterialExam  $materialExam
     * @return \Illuminate\Http\Response
     */
    public function destroy($materialExam)
    {
        $this->repository->destroy($materialExam);
        return back()->with('success', trans('alert.delete_success'));
    }

    public function examQuestion(MaterialExam $materialExam)
    {
        $examQuestions = $this->examQuestionRepository->getByExam($materialExam->id, 10);
        return view('dashboard.admin.pages.materialExam.question', compact('materialExam', 'examQuestions'));
    }

    public function examQuestionManual(Request $request, $materialId, $materialExamId)
    {
        $materialExam = $this->repository->getExamById($materialExamId);
        $materialQuestions = $this->questionBankRepository->paginateUnusedQuestionMaterial($request, $materialId, 10);

        return view('dashboard.admin.pages.materialExam.questionManual', compact('materialQuestions', 'materialExam'));
    }

    public function materialExamStatistic(MaterialExam $materialExam)
    {
        $data['materialExam'] = $this->repository->getExamById($materialExam->id);
        $data['studentExams'] = $data['materialExam']->studentMaterialExams->sortByDesc('score')->take(5);
        $data['avgScoreClassrooms'] = $this->studentMaterialExamService->handleGetAllStudentSubmit($data['materialExam']->id);
        return view('dashboard.admin.pages.MaterialExam.examStatistic', $data);
    }
}
