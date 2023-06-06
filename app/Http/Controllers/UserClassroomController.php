<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Material;
use App\Models\Classroom;
use Illuminate\View\View;
use App\Models\SubMaterial;
use App\Services\PointService;
use App\Services\StudentService;
use App\Services\MaterialService;
use App\Services\ChallengeService;
use App\Services\ClassroomService;
use App\Services\AssignmentService;
use App\Services\SubMaterialService;
use App\Services\SubmitChallengeService;
use App\Services\SubmitAssignmentService;

class UserClassroomController extends Controller
{
    private ClassroomService $classroomService;
    private StudentService $studentService;
    private MaterialService $materialService;
    private SubMaterialService $subMaterialService;
    // private AssignmentService $assignmentService;

    public function __construct(ClassroomService $classroomService, StudentService $studentService, MaterialService $materialService, SubMaterialService $subMaterialService, PointService $pointService, SubmitChallengeService $submitChallengeService, SubmitAssignmentService $submitAssignmentService)
    {
        $this->classroomService = $classroomService;
        $this->studentService = $studentService;
        $this->materialService = $materialService;
        $this->subMaterialService = $subMaterialService;
        $this->pointService = $pointService;
        $this->submitChallengeService = $submitChallengeService;
        $this->submitAssignmentService = $submitAssignmentService;

    }

    public function index(): View
    {
        $data = [
            'classrooms' => $this->classroomService->handleGetClassroomByUser(auth()->id()),
        ];
        return view('dashboard.user.pages.classroom.index', $data);
    }

    public function show(Classroom $classroom): View
    {
        if(auth()->user()->roles->pluck('name')[0] == 'admin'){
            $data = [
                'classroom' => $classroom,
                'students' => $this->studentService->handleGetBySchool(auth()->id()),
            ];
    //        dd($data);
            return \view ('dashboard.admin.pages.classroom.show', $data);
        }else
        $data = [
            'classroom' => $classroom,
            'students' => $this->studentService->handleGetBySchool(auth()->id()),
        ];
//        dd($data);
        return \view ('dashboard.user.pages.classroom.detail', $data);
    }

    public function materials(Classroom $classroom): View
    {
        $data = [
            'classroom' => $classroom,
            'materials' => $this->materialService->handleByClassroom($classroom->id),
        ];

        return \view ('dashboard.user.pages.material.index', $data);
    }

    public function showMaterial(Classroom $classroom, Material $material): View
    {
        $data = [
            'classroom' => $classroom,
            'material' => $material,
            'subMaterials' => $this->subMaterialService->handleGetPaginate($material->id),
            'parameters' => [
                'material' => $material->id,
            ],
        ];
        return view('dashboard.user.pages.submaterial.index', $data);
    }

    public function showSubMaterial(Classroom $classroom, SubMaterial $submaterial): View
    {
        $data = [
            'classroom' => $classroom,
            'subMaterial' => $submaterial,
            // 'studentDone' => $this->assignmentService->handleGetStudentDoneSubmit($assignment),
        ];
        return view('dashboard.user.pages.submaterial.detail', $data);
    }

    public function showDocument(SubMaterial $submaterial, string $role): View
    {
        return view('dashboard.user.pages.submaterial.view', compact('submaterial', 'role'));
    }

    public function showStudentDetail(User $student) : View
    {
        $data = [
            'student' => $student,
            'point' => $this->pointService->handleGetPointByStudent($student->id),
            'challenges' => $this->submitChallengeService->handleGetCountStudentByChallenge($student->students[0]->id),
            'assignments' => $this->submitAssignmentService->handleGetCountStudentByAssignment($student->id),
            'rankings' => $this->pointService->handleGetPoint()
        ];
        return view('dashboard.user.pages.classroom.show', $data);
    }
}
