<?php

namespace App\Http\Controllers;

use App\Traits\DataSidebar;
use Illuminate\Http\Request;
use App\Models\SubMaterialExam;
use App\Services\MentorService;
use App\Repositories\StudentRepository;
use App\Repositories\MaterialRepository;
use App\Services\SubMaterialExamService;
use App\Repositories\QuestionBankRepository;
use App\Http\Requests\SubMaterialExamRequest;
use PhpOffice\PhpSpreadsheet\Chart\DataSeries;
use App\Repositories\SubMaterialExamRepository;
use App\Services\StudentSubMaterialExamService;
use App\Repositories\SubMaterialExamQuestionRepository;
use App\Services\SchoolService;
use App\Services\UserServices;
use App\Repositories\StudentSubMaterialExamAnswerRepository;

class SubMaterialExamController extends Controller
{
    use DataSidebar;
    private MaterialRepository $materialRepository;
    private SubMaterialExamRepository $repository;
    private SubMaterialExamService $service;
    private QuestionBankRepository $questionBankRepository;
    private SubMaterialExamQuestionRepository $examQuestionRepository;
    private SubMaterialExamService $subMaterialExamService;
    private StudentSubMaterialExamService $studentSubMaterialExamService;
    private UserServices $userServices;
    private MentorService $mentorService;
    private StudentRepository $studentRepository;
    private StudentSubMaterialExamAnswerRepository $studentExamAnswerRepository;

    public function __construct(
        MaterialRepository $materialRepository,
        SubMaterialExamService $service,
        SubMaterialExamRepository $repository,
        SubMaterialExamQuestionRepository $examQuestionRepository,
        QuestionBankRepository $questionBankRepository,
        SubMaterialExamService $subMaterialExamService,
        StudentSubMaterialExamService $studentSubMaterialExamService,
        UserServices $userServices,
        MentorService $mentorService,
        StudentRepository $studentRepository,
        StudentSubMaterialExamAnswerRepository $studentExamAnswerRepository
    ) {
        $this->materialRepository = $materialRepository;
        $this->service = $service;
        $this->repository = $repository;
        $this->examQuestionRepository = $examQuestionRepository;
        $this->questionBankRepository = $questionBankRepository;
        $this->subMaterialExamService = $subMaterialExamService;
        $this->studentSubMaterialExamService = $studentSubMaterialExamService;
        $this->userServices = $userServices;
        $this->mentorService = $mentorService;
        $this->studentRepository = $studentRepository;
        $this->studentExamAnswerRepository = $studentExamAnswerRepository;
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
    public function examMentorDetail()
    {
        $data = $this->GetDataSidebar();

        return view('dashboard.user.pages.studentExam.examDetail', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function examMentorAssessment(SubMaterialExam $subMaterialExam, Request $request)
    {
        $data = $this->GetDataSidebar();
        $data['classrooms'] = $this->mentorService->handleGetMentorClassrooms(auth()->user()->id);
        $classroomId = $this->mentorService->handleArrClassroom($data['classrooms']);
        $data['students'] = $this->studentRepository->getByClassroomArray($classroomId, $request, 10);
        $data['answers'] = $this->studentExamAnswerRepository->getAnswerBySubMaterial($subMaterialExam->id);
        $data['subMaterialExam'] = $subMaterialExam;
        return view('dashboard.user.pages.studentExam.examAssessment', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function examMentor()
    {
        $data = $this->GetDataSidebar();
        $generation = $this->service->generationMentorClassroom();
        $data['exams'] = $this->repository->getBeforeFinishedByGeneration($generation);
        return view('dashboard.user.pages.studentExam.examMentor', $data);
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
        return view('dashboard.admin.pages.subMaterialExam.question', compact('subMaterialExam', 'examQuestions'));
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

    public function examStatistic($slug)
    {
        $data['submaterialExam'] = $this->service->handleGetBySlug($slug);
        $data['studentExams'] = $data['submaterialExam']->studentSubmaterialExams->sortByDesc('score')->take(5);
        $data['avgScoreClassrooms'] = $this->studentSubMaterialExamService->handleGetAllStudentSubmit($data['submaterialExam']->id);

        return view('dashboard.admin.pages.subMaterialExam.examStatistic', $data);
    }

    public function examDetailStudent(Request $request, $submaterialExam)
    {
        // dd($request);
        $data['search'] = $request->search;
        $data['schools'] = $this->userServices->handleGetAllSchool();
        $data['studentSubMaterialExams'] = $this->studentSubMaterialExamService->halndeGetBySubmaterialExam($request, $submaterialExam);
        return view('dashboard.admin.pages.subMaterialExam.examDetailStudent', $data);
    }

    public function examTakingPlace()
    {
        $exams = $this->repository->getExamTakingPlace(6);
        return view('dashboard.admin.pages.subMaterialExam.examTakingPlace', compact('exams'));
    }

    public function detailExamTakingPlace($slug)
    {
        $submaterialExam = $this->service->handleGetBySlug($slug);
        return view('dashboard.admin.pages.subMaterialExam.examDetailTakingPlace', compact('submaterialExam'));
    }
}
