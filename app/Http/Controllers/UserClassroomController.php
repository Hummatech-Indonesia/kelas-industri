<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Material;
use App\Models\Classroom;
use Illuminate\View\View;
use App\Models\Generation;
use App\Models\SubMaterial;
use App\Traits\DataSidebar;
use Illuminate\Http\Request;
use App\Services\PointService;
use App\Services\StudentService;
use App\Helpers\SchoolYearHelper;
use App\Services\MaterialService;
use App\Services\ClassroomService;
use App\Services\AssignmentService;
use App\Services\SubMaterialService;
use App\Enums\SubMaterialExamTypeEnum;
use App\Services\SubmitChallengeService;
use App\Services\SubmitAssignmentService;
use App\Repositories\SubMaterialExamRepository;
use App\Services\StudentSubMaterialExamService;
use App\Services\StudentSubmaterialExamAnswerService;
use App\Repositories\StudentSubmaterialExamRepository;

class UserClassroomController extends Controller
{
    use DataSidebar;
    private ClassroomService $classroomService;
    private StudentService $studentService;
    private MaterialService $materialService;
    private SubMaterialService $subMaterialService;
    private AssignmentService $assignmentService;
    private PointService $pointService;
    private SubmitChallengeService $submitChallengeService;
    private SubmitAssignmentService $submitAssignmentService;
    private StudentSubmaterialExamRepository $studentSubmaterialExamRepository;
    private SubMaterialExamRepository $submaterialExamRepository;
    private StudentSubMaterialExamService $studentSubmaterialExamService;
    private StudentSubmaterialExamAnswerService $studentSubmaterialExamAnswerService;

    public function __construct(
        ClassroomService $classroomService,
        StudentService $studentService,
        MaterialService $materialService,
        SubMaterialService $subMaterialService,
        PointService $pointService,
        SubmitChallengeService $submitChallengeService,
        SubmitAssignmentService $submitAssignmentService,
        AssignmentService $assignmentService,
        StudentSubmaterialExamRepository $studentSubmaterialExamRepository,
        StudentSubMaterialExamService $studentSubmaterialExamService,
        SubMaterialExamRepository $submaterialExamRepository,
        StudentSubmaterialExamAnswerService $studentSubmaterialExamAnswerService
    ) {
        $this->classroomService = $classroomService;
        $this->studentService = $studentService;
        $this->materialService = $materialService;
        $this->subMaterialService = $subMaterialService;
        $this->pointService = $pointService;
        $this->submitChallengeService = $submitChallengeService;
        $this->submitAssignmentService = $submitAssignmentService;
        $this->assignmentService = $assignmentService;
        $this->studentSubmaterialExamRepository = $studentSubmaterialExamRepository;
        $this->studentSubmaterialExamService = $studentSubmaterialExamService;
        $this->submaterialExamRepository = $submaterialExamRepository;
        $this->studentSubmaterialExamAnswerService = $studentSubmaterialExamAnswerService;
    }

    public function index(Request $request): View
    {
        $data = $this->GetDataSidebar();
        $data['search'] = $request->search;
        $data['classrooms'] = $this->classroomService->handleGetClassroomByUser(auth()->user()->id, $request);
        return view('dashboard.user.pages.classroom.index', $data);
    }

    public function show(Classroom $classroom): View
    {
        $students = $this->studentService->handleGetByClassroom($classroom->id);
        if (auth()->user()->roles->pluck('name')[0] == 'admin') {
            $data = [
                'students' => $students,
                'classroom' => $classroom,
            ];
            return view('dashboard.admin.pages.classroom.show', $data);
        } else {
            $data = $this->GetDataSidebar();
        }

        $data['classroom'] = $classroom;
        $data['students'] = $students;
        return view('dashboard.user.pages.classroom.detail', $data);
    }

    public function materials(Classroom $classroom, Request $request): View
    {
        $data = $this->GetDataSidebar();
        $data['classroom'] = $classroom;
        $data['materials'] = $this->materialService->handleByClassroom($classroom, $request);
        if (auth()->user()->roles->pluck('name')[0] == 'student') {
            $data['materialInfos'] = $this->materialService->handleOrderMaterials($data['materials']);
        }
        $data['search'] = $request->search;
        // dd($data);
        return view('dashboard.user.pages.material.index', $data);
    }

    public function showMaterial(Classroom $classroom, Material $material, Request $request): View
    {
        $data = $this->GetDataSidebar();
        $data['classroom'] = $classroom;
        $data['material'] = $material;
        $data['subMaterials'] = $this->subMaterialService->handleGetPaginate($material->id, $request);
        $data['search'] = $request->search;
        $data['parameters'] = [
            'material' => $material->id,
        ];

        if (auth()->user()->roles->pluck('name')[0] == 'student') {

            $subMaterialsInfo = [];
            $data['countAllSubMaterialQuiz'] = $this->submaterialExamRepository->countAllSubMaterialQuiz($material->id);
            $data['countAllStudentSubMaterialQuiz'] = $this->studentSubmaterialExamRepository->countAllStudentSubMaterialQuiz($material->id);
            foreach ($data['subMaterials'] as $subMaterial) {
                $order = $subMaterial->order;

                $previousOrder = $order - 1;

                $previousSubMaterial = $this->subMaterialService->handlePreviousSubMaterial($subMaterial->material->id, $previousOrder);

                if ($previousSubMaterial) {
                    $countAssignment = $this->assignmentService->countAssignments($previousSubMaterial->id, $previousOrder);
                    $countStudentAssignment = $this->assignmentService->countStudentAssignments($previousSubMaterial->id, $previousOrder);
                    $studentExam = $this->studentSubmaterialExamRepository->getPreviousStudentExam($previousSubMaterial->id, $previousOrder);
                } else {
                    $countAssignment = 0;
                    $countStudentAssignment = 0;
                    $studentExam = 0;
                }

                $isFirst = $order == 1;
                $subMaterialsInfo[] = [
                    'subMaterial' => $subMaterial,
                    'isFirst' => $isFirst,
                    'countAssignment' => $countAssignment,
                    'countStudentAssignment' => $countStudentAssignment,
                    'studentExam' => $studentExam,
                ];
            }
            $data['subMaterialsInfo'] = $subMaterialsInfo;
        }

        return view('dashboard.user.pages.submaterial.index', $data);
    }

    public function showSubMaterial(Classroom $classroom, Material $material, SubMaterial $submaterial)
    {
        $data = $this->GetDataSidebar();
        $data['classroom'] = $classroom;
        $data['material'] = $material;
        $data['subMaterial'] = $submaterial;
        if ($submaterial->exam->where('slug', $submaterial->exam->slug)->first()) {
            $data['studentSubmaterialExam'] = $this->studentSubmaterialExamRepository->get_user_submaterial_exam($submaterial->exam->id);
            if ($data['studentSubmaterialExam']) {
                $data['essayGraded'] = $this->studentSubmaterialExamAnswerService->essay_graded($data['studentSubmaterialExam']);
                if ($data['essayGraded']) {
                    $data['isRemedial'] = $this->studentSubmaterialExamService->checkRemedial($submaterial->exam->id);
                }
            }
        } else {
            $data['studentSubmaterialExam'] = null;
        }
        return view('dashboard.user.pages.submaterial.detail', $data);
    }

    public function showDocument(SubMaterial $submaterial, string $role, null|string $classroom = null)
    {
        if (auth()->check()) {
            $schoolPayment = $this->SchoolPackageMockup();
            $isPaymentComplete = $this->MenuMockup();
            $order = $submaterial->order;
            $listSubMaterials = $this->subMaterialService->handleListSubMaterials($submaterial->order, $submaterial->material->id);
            $prevSubMaterials = $this->subMaterialService->handlePrevSubmaterial($submaterial->order, $submaterial->material->id);
            if (auth()->user()->roles->pluck('name')[0] != 'student') {
                $materials = $this->materialService->handleGetMaterialByDevision($submaterial->material->devision_id, $classroom);
            } else {
                $materials = $this->materialService->handleGetMaterialByDevision($submaterial->material->devision_id);
            }
            $subMaterialsInfo = [];

            if (auth()->user()->roles->pluck('name')[0] == 'student') {
                $materialInfos = $this->materialService->handleOrderMaterials($materials);
            }
            foreach ($materials as $material) {
                foreach ($material->subMaterials as $subMaterial) {
                    $order = $subMaterial->order;

                    $previousOrder = $order - 1;

                    $previousSubMaterial = $this->subMaterialService->handlePreviousSubMaterial($subMaterial->material->id, $previousOrder);

                    if ($previousSubMaterial && auth()->user()->roles->pluck('name')[0] == 'student') {
                        $countAssignment = $this->assignmentService->countAssignments($previousSubMaterial->id, $previousOrder);
                        $countStudentAssignment = $this->assignmentService->countStudentAssignments($previousSubMaterial->id, $previousOrder);
                        $studentExam = $this->studentSubmaterialExamRepository->getPreviousStudentExam($previousSubMaterial->id, $previousOrder);
                    } else {
                        $countAssignment = 0;
                        $countStudentAssignment = 0;
                        $studentExam = 0;
                    }

                    $isFirst = $order == 1;
                    $subMaterialsInfos[] = [
                        'subMaterial' => $subMaterial,
                        'isFirst' => $isFirst,
                        'countAssignment' => $countAssignment,
                        'countStudentAssignment' => $countStudentAssignment,
                        'studentExam' => $studentExam,
                    ];
                }

                $subMaterialsInfo = $subMaterialsInfos;
            }

            $previousOrder = $order - 1;

            $previousSubmaterial = $this->subMaterialService->handlePreviousSubMaterial($submaterial->material->id, $previousOrder);

            $countAssignmentByMaterial = $this->assignmentService->countAssignmentByMaterial($submaterial->id);

            if (auth()->user()->roles->pluck('name')[0] == 'teacher' || auth()->user()->roles->pluck('name')[0] == 'mentor') {
                return view('dashboard.user.pages.submaterial.view', compact('submaterial', 'role', 'listSubMaterials', 'prevSubMaterials', 'materials', 'subMaterialsInfo'));
            }

            if ($order == 1) {
                return view('dashboard.user.pages.submaterial.view', compact('materialInfos', 'submaterial', 'role', 'listSubMaterials', 'prevSubMaterials', 'materials', 'subMaterialsInfo', 'schoolPayment', 'isPaymentComplete'));
            }

            if ($countAssignmentByMaterial == 0) {
                return view('dashboard.user.pages.submaterial.view', compact('materialInfos', 'submaterial', 'role', 'listSubMaterials', 'prevSubMaterials', 'materials', 'subMaterialsInfo', 'schoolPayment', 'isPaymentComplete'));
            }

            $countAssignment = $this->assignmentService->countAssignments($previousSubmaterial->id, $previousOrder);

            $countStudentAssignment = $this->assignmentService->countStudentAssignments($previousSubmaterial->id, $previousOrder);

            if ($countAssignment == $countStudentAssignment) {
                return view('dashboard.user.pages.submaterial.view', compact('materialInfos', 'submaterial', 'role', 'listSubMaterials', 'prevSubMaterials', 'materials', 'subMaterialsInfo', 'schoolPayment', 'isPaymentComplete'));
            }

            return view('dashboard.user.pages.submaterial.view', compact('materialInfos', 'submaterial', 'role', 'listSubMaterials', 'prevSubMaterials', 'materials', 'subMaterialsInfo', 'schoolPayment', 'isPaymentComplete'));
        } else {
            auth()->logout();
            return view('auth.login');
        }
    }

    public function showStudentDetail(User $student, Generation $generation): View
    {

        $currentSchoolYear = SchoolYearHelper::get_current_school_year();
        $data = $this->GetDataSidebar();
        $data['student'] = $student;
        $data['point'] = $this->pointService->handleGetPointByStudent($student->id);
        $data['assignments'] = $this->submitAssignmentService->handleGetCountStudentByAssignment($student->id, $generation->id);
        $data['challenges'] = $this->submitChallengeService->handleGetCountStudentByChallenge($student->id, $generation->id);
        $data['rankings'] = $this->pointService->handleGetPoint();
        return view('dashboard.user.pages.classroom.show', $data);
    }
}
