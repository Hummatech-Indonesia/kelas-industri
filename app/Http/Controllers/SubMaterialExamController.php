<?php

namespace App\Http\Controllers;

use App\Traits\DataSidebar;
use Illuminate\Http\Request;
use App\Services\UserServices;
use App\Models\SubMaterialExam;
use App\Services\MentorService;
use App\Services\SchoolService;
use App\Services\RegisterExamService;
use App\Repositories\StudentRepository;
use App\Repositories\MaterialRepository;
use App\Services\SubMaterialExamService;
use App\Http\Requests\RegisterExamRequest;
use App\Repositories\QuestionBankRepository;
use App\Http\Requests\SubMaterialExamRequest;
use PhpOffice\PhpSpreadsheet\Chart\DataSeries;
use App\Repositories\SubMaterialExamRepository;
use App\Services\StudentSubMaterialExamService;
use App\Http\Requests\SubMaterialExamUpdateRequest;
use App\Models\User;
use App\Repositories\StudentSubmaterialExamRepository;
use App\Repositories\SubMaterialExamQuestionRepository;
use App\Repositories\StudentSubMaterialExamAnswerRepository;
use Illuminate\Contracts\View\View;

class SubMaterialExamController extends Controller
{
    use DataSidebar;
    private MaterialRepository $materialRepository;
    private SubMaterialExamRepository $repository;
    private SubMaterialExamService $service;
    private RegisterExamService $registerExamService;
    private QuestionBankRepository $questionBankRepository;
    private SubMaterialExamQuestionRepository $examQuestionRepository;
    private StudentSubMaterialExamService $studentSubMaterialExamService;
    private UserServices $userServices;
    private SchoolService $schoolService;
    private MentorService $mentorService;
    private StudentRepository $studentRepository;
    private StudentSubMaterialExamAnswerRepository $studentExamAnswerRepository;
    private StudentSubmaterialExamRepository $studentExamRepository;

    public function __construct(
        MaterialRepository $materialRepository,
        SubMaterialExamService $service,
        RegisterExamService $registerExamService,
        SubMaterialExamRepository $repository,
        SubMaterialExamQuestionRepository $examQuestionRepository,
        QuestionBankRepository $questionBankRepository,
        StudentSubMaterialExamService $studentSubMaterialExamService,
        UserServices $userServices,
        MentorService $mentorService,
        StudentRepository $studentRepository,
        StudentSubMaterialExamAnswerRepository $studentExamAnswerRepository,
        StudentSubmaterialExamRepository $studentExamRepository,
        SchoolService $schoolService
    ) {
        $this->materialRepository = $materialRepository;
        $this->service = $service;
        $this->registerExamService = $registerExamService;
        $this->repository = $repository;
        $this->examQuestionRepository = $examQuestionRepository;
        $this->questionBankRepository = $questionBankRepository;
        $this->studentSubMaterialExamService = $studentSubMaterialExamService;
        $this->userServices = $userServices;
        $this->mentorService = $mentorService;
        $this->studentRepository = $studentRepository;
        $this->studentExamAnswerRepository = $studentExamAnswerRepository;
        $this->studentExamRepository = $studentExamRepository;
        $this->schoolService = $schoolService;
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

    public function registrationExam()
    {
        $exams = $this->repository->getRegisterExam();
        $schools = $this->userServices->handleGetAllSchool();
        return view('dashboard.admin.pages.registrationExam.index', compact('exams', 'schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function examMentorDetail(SubMaterialExam $subMaterialExam)
    {
        $data = $this->GetDataSidebar();
        $data['students'] = $this->studentExamRepository->getAllStudent($subMaterialExam->id);
        $data['lowValue'] = $this->studentExamRepository->getMinValue($subMaterialExam->id);
        $data['highValue'] = $this->studentExamRepository->getMaxValue($subMaterialExam->id);
        $data['averageValue'] = $this->studentExamRepository->getAvgValue($subMaterialExam->id);
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
        $data['students'] = $this->studentExamRepository->getByClassroomArray($subMaterialExam->id, $classroomId, $request, 10);
        $data['answers'] = $this->studentExamAnswerRepository->getAnswerBySubMaterial($subMaterialExam->id);
        $data['subMaterialExam'] = $subMaterialExam;
        $data['studentAnswers'] = $data['answers']->groupBy('studentSubmaterialExam.id');
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
    public function examTeacher()
    {
        $data = $this->GetDataSidebar();
        $generation = $this->service->generationTeacherClassroom();
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registerExamStore(RegisterExamRequest $request)
    {
        $this->registerExamService->handleCreate($request);

        return redirect()->back()->with('success', trans('alert.add_success'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubMaterialExam  $subMaterialExam
     * @return \Illuminate\Http\Response
     */
    public function registerExamupdate(Request $request, SubMaterialExam $subMaterialExam)
    {
        $school = User::find($subMaterialExam->school_id);
        $this->registerExamService->handleUpdate($request, $school, $subMaterialExam->id);
        return redirect()->route('admin.exam-registration')->with('success', trans('alert.update_success'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubMaterialExam  $subMaterialExam
     * @return \Illuminate\Http\Response
     */
    public function update(SubMaterialExamUpdateRequest $request, SubMaterialExam $subMaterialExam)
    {
        $this->service->handleUpdate($request, $subMaterialExam->id);
        return redirect()->back()->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubMaterialExam  $subMaterialExam
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubMaterialExam $subMaterialExam)
    {
        $this->schoolService->handleDeleteRegristationExamStudent($subMaterialExam->school);
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

    public function registrationExamResult(SubMaterialExam $subMaterialExam)
    {
        $exam = $subMaterialExam;
        $studentExams = $this->studentExamRepository->getTesterExamREsult($exam->id);
        return view('dashboard.admin.pages.registrationExam.resultExam', compact('exam', 'studentExams'));
    }
}
