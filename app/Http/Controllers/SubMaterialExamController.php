<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubMaterialExam;
use App\Repositories\MaterialRepository;
use App\Services\SubMaterialExamService;
use App\Http\Requests\SubMaterialExamRequest;
use App\Repositories\QuestionBankRepository;
use App\Repositories\SubMaterialExamRepository;
use App\Repositories\SubMaterialExamQuestionRepository;

class SubMaterialExamController extends Controller
{
    private MaterialRepository $materialRepository;
    private SubMaterialExamRepository $repository;
    private SubMaterialExamService $service;
    private QuestionBankRepository $questionBankRepository;
    private SubMaterialExamQuestionRepository $examQuestionRepository;

    public function __construct(MaterialRepository $materialRepository, SubMaterialExamService $service, SubMaterialExamRepository $repository, SubMaterialExamQuestionRepository $examQuestionRepository, QuestionBankRepository $questionBankRepository)
    {
        $this->materialRepository = $materialRepository;
        $this->service = $service;
        $this->repository = $repository;
        $this->examQuestionRepository = $examQuestionRepository;
        $this->questionBankRepository = $questionBankRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return $this->materialRepository->getAll();
        }
        $exams = $this->repository->getBeforeFinished();

        return view('dashboard.admin.pages.subMaterialExam.index', compact('exams'));
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubMaterialExamRequest $request)
    {
        $this->service->handleCreate($request);

        return redirect()->back()->with('success', trans('alert.add_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubMaterialExam  $subMaterialExam
     * @return \Illuminate\Http\Response
     */
    public function show(SubMaterialExam $subMaterialExam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubMaterialExam  $subMaterialExam
     * @return \Illuminate\Http\Response
     */
    public function edit(SubMaterialExam $subMaterialExam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubMaterialExam  $subMaterialExam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubMaterialExam $subMaterialExam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubMaterialExam  $subMaterialExam
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubMaterialExam $subMaterialExam)
    {
        $data = $this->service->handleDelete($subMaterialExam->id);

        if (!$data) {
            return back()->with('error', trans('alert.delete_constrained'));
        }

        return back()->with('success', trans('alert.delete_success'));
    }

    public function examQuestion(SubMaterialExam $subMaterialExam)
    {
        $examQuestions = $this->examQuestionRepository->getByExam($subMaterialExam->id, 10);
        return view('dashboard.admin.pages.subMaterialExam.question', compact('subMaterialExam','examQuestions'));
    }

    public function examQuestionManual(Request $request, $submaterialId, $submaterialExamId)
    {
        $submaterialExam = $this->repository->getExamById($submaterialExamId);
        $subMaterialQuestions = $this->questionBankRepository->paginateUnusedQuestion($request, $submaterialId, $submaterialExam->slug, 10);
        return view('dashboard.admin.pages.subMaterialExam.questionManual', compact('subMaterialQuestions', 'submaterialExam'));
    }

    public function examFinnaly()
    {
        $exams = $this->repository->getExamFinnaly(6);
        return view('dashboard.admin.pages.subMaterialExam.examFinnaly', compact('exams'));
    }

    public function examStatistic()
    {
        return view('dashboard.admin.pages.subMaterialExam.examStatistic');
    }

    public function examTakingPlace()
    {
        $exams = $this->repository->getExamTakingPlace(6);
        return view('dashboard.admin.pages.subMaterialExam.examTakingPlace', compact('exams'));
    }

    public function detailExamTakingPlace()
    {
        return view('dashboard.admin.pages.subMaterialExam.examDetailTakingPlace');
    }


}
