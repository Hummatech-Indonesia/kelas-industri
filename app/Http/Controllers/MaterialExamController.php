<?php

namespace App\Http\Controllers;

use App\Helpers\RoleHelper;
use App\Traits\DataSidebar;
use App\Models\MaterialExam;
use Illuminate\Http\Request;
use App\Services\UserServices;
use App\Services\MentorService;
use App\Services\TeacherService;
use App\Enums\MaterialExamTypeEnum;
use App\Models\StudentMaterialExam;
use App\Services\MaterialExamService;
use function PHPUnit\Framework\returnSelf;
use App\Repositories\MaterialExamRepository;
use App\Repositories\QuestionBankRepository;
use App\Services\StudentMaterialExamService;
use App\Repositories\StudentMaterialExamRepository;
use App\Repositories\MaterialExamQuestionRepository;
use App\Repositories\StudentMaterialExamAnswerRepository;

class MaterialExamController extends Controller
{
    use DataSidebar;
    private MaterialExamRepository $repository;
    private QuestionBankRepository $questionBankRepository;
    private MaterialExamQuestionRepository $examQuestionRepository;
    private StudentMaterialExamService $studentMaterialExamService;
    private UserServices $userServices;
    private MaterialExamService $service;
    private StudentMaterialExamRepository $studentExamRepository;
    private MentorService $mentorService;
    private StudentMaterialExamAnswerRepository $studentExamAnswerRepository;
    private TeacherService $teacherService;

    public function __construct(
        MaterialExamRepository $repository,
        QuestionBankRepository $questionBankRepository,
        MaterialExamQuestionRepository $examQuestionRepository,
        StudentMaterialExamService $studentMaterialExamService,
        UserServices $userServices,
        MaterialExamService $service,
        StudentMaterialExamRepository $studentExamRepository,
        MentorService $mentorService,
        StudentMaterialExamAnswerRepository $studentExamAnswerRepository,
        TeacherService $teacherService
    ) {
        $this->repository = $repository;
        $this->questionBankRepository = $questionBankRepository;
        $this->examQuestionRepository = $examQuestionRepository;
        $this->studentMaterialExamService = $studentMaterialExamService;
        $this->userServices = $userServices;
        $this->service = $service;
        $this->studentExamRepository = $studentExamRepository;
        $this->mentorService = $mentorService;
        $this->studentExamAnswerRepository = $studentExamAnswerRepository;
        $this->teacherService = $teacherService;
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

    /**
     * materialExamStatistic
     *
     * @param  mixed $materialExam
     * @return void
     */
    public function materialExamStatistic(MaterialExam $materialExam)
    {
        $data['materialExam'] = $this->repository->getExamById($materialExam->id);
        $data['studentExams'] = $data['materialExam']->studentMaterialExams->where('type', MaterialExamTypeEnum::PRETEST->value)->sortByDesc('score')->take(5);
        $data['postExams'] = $data['materialExam']->studentMaterialExams->where('type', MaterialExamTypeEnum::POSTEST->value)->sortByDesc('score')->take(5);
        $data['avgScoreClassrooms'] = $this->studentMaterialExamService->handleGetAllStudentSubmit($data['materialExam']->id);
        $data['avgPostScoreClassrooms'] = $this->studentMaterialExamService->handleGetAllStudentPostSubmit($data['materialExam']->id);
        return view('dashboard.admin.pages.materialExam.examStatistic', $data);
    }

    /**
     * examDetailStudent
     *
     * @param  mixed $request
     * @param  mixed $materialExam
     * @param  mixed $type
     * @return void
     */
    public function examDetailStudent(Request $request, $materialExam, $type)
    {
        $data['materialExam'] = $materialExam;
        $data['search'] = $request->search;
        $data['type'] = $type;
        $data['schools'] = $this->userServices->handleGetAllSchool();
        $data['studentSubMaterialExams'] = $this->studentMaterialExamService->halndeGetByMaterialExam($request, $materialExam, $type);
        return view('dashboard.admin.pages.materialExam.examDetailStudent', $data);
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function examMentorDetail(MaterialExam $materialExam, Request $request)
    {
        $data = $this->GetDataSidebar();
        if (RoleHelper::get_role() == 'mentor') {
            $data['classrooms'] = $this->mentorService->handleGetMentorClassrooms(auth()->user()->id);
        } else {
            $data['classrooms'] = $this->teacherService->handleGetTeacherClassrooms(auth()->user()->teacherSchool->id);
        }
        $data['students'] = $this->studentExamRepository->getAllStudent($materialExam->id, $request);
        // dd($data['students']);
        $data['lowValue'] = $this->studentExamRepository->getMinValue($materialExam->id, $request);
        $data['highValue'] = $this->studentExamRepository->getMaxValue($materialExam->id, $request);
        $data['averageValue'] = $this->studentExamRepository->getAvgValue($materialExam->id, $request);
        return view('dashboard.user.pages.studentExam.examDetail', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function examMentorAssessment(MaterialExam $materialExam, Request $request)
    {
        $data = $this->GetDataSidebar();
        $data['classrooms'] = $this->mentorService->handleGetMentorClassrooms(auth()->user()->id);
        $classroomId = $this->mentorService->handleArrClassroom($data['classrooms']);
        $data['students'] = $this->studentExamRepository->getByClassroomArray($materialExam->id, $classroomId, $request, 10);
        $data['answers'] = $this->studentExamAnswerRepository->getAnswerBySubMaterial($materialExam->id, $request);
        $data['materialExam'] = $materialExam;
        $data['studentAnswers'] = $data['answers']->groupBy('studentMaterialExam.id');
        return view('dashboard.user.pages.studentExam.examAssessment', $data);
    }

    public function examTeacher()
    {
        $data = $this->GetDataSidebar();
        $generation = $this->service->generationTeacherClassroom();
        $data['exams'] = $this->repository->getBeforeFinishedByGeneration($generation);
        return view('dashboard.user.pages.studentExam.examMentor', $data);
    }

    public function reset(StudentMaterialExam $studentMaterialExam)
    {
        try {
            $studentMaterialExam->delete();
            return back()->with('success', 'berhasil mereset test');
        } catch (\Throwable $th) {
            return back()->withError($th->getMessage());
        }
    }
}
