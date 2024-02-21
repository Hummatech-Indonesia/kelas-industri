<?php

namespace App\Http\Controllers;

use App\Helpers\SchoolYearHelper;
use App\Models\Classroom;
use App\Models\Generation;
use App\Models\Material;
use App\Models\SubMaterial;
use App\Models\User;
use App\Services\AssignmentService;
use App\Services\ClassroomService;
use App\Services\MaterialService;
use App\Services\PointService;
use App\Services\StudentService;
use App\Services\SubMaterialService;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Services\SubmitAssignmentService;
use App\Services\SubmitChallengeService;
use App\Traits\DataSidebar;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserClassroomController extends Controller
{
    use DataSidebar;
    private ClassroomService $classroomService;
    private StudentService $studentService;
    private MaterialService $materialService;
    private SubMaterialService $subMaterialService;
    private AssignmentService $assignmentService;

    public function __construct(ClassroomService $classroomService, StudentService $studentService, MaterialService $materialService, SubMaterialService $subMaterialService, PointService $pointService, SubmitChallengeService $submitChallengeService, SubmitAssignmentService $submitAssignmentService, AssignmentService $assignmentService)
    {
        $this->classroomService = $classroomService;
        $this->studentService = $studentService;
        $this->materialService = $materialService;
        $this->subMaterialService = $subMaterialService;
        $this->pointService = $pointService;
        $this->submitChallengeService = $submitChallengeService;
        $this->submitAssignmentService = $submitAssignmentService;
        $this->assignmentService = $assignmentService;
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
        $students = $this->studentService->handleGetBySchool($classroom->id);
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
        $data['materials'] = $this->materialService->handleByClassroom($classroom->id, $request);
        $data['search'] = $request->search;
        return \view('dashboard.user.pages.material.index', $data);
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
        return view('dashboard.user.pages.submaterial.index', $data);
    }

    public function showSubMaterial(Classroom $classroom, Material $material, SubMaterial $submaterial)
    {
        $data = $this->GetDataSidebar();
        $order = $submaterial->order;
        $data['classroom'] = $classroom;
        $data['material'] = $material;
        $data['subMaterial'] = $submaterial;

        if (auth()->user()->roles->pluck('name')[0] == 'teacher' || auth()->user()->roles->pluck('name')[0] == 'mentor') {
            return view('dashboard.user.pages.submaterial.detail', $data);
        }

        if ($order == 1) {
            return view('dashboard.user.pages.submaterial.detail', $data);
        }

        $previousOrder = $order - 1;

        $previousSubmaterial = $this->subMaterialService->handlePreviousSubmaterial($submaterial->material->id, $previousOrder);

        $countAssignmentByMaterial = $this->assignmentService->countAssignmentByMaterial($submaterial->id);

        if ($countAssignmentByMaterial == 0) {
            return view('dashboard.user.pages.submaterial.detail', $data);
        }

        $countAssignment = $this->assignmentService->countAssignments($previousSubmaterial->id, $previousOrder);

        $countStudentAssignment = $this->assignmentService->countStudentAssignments($previousSubmaterial->id, $previousOrder);

        if ($countAssignment == $countStudentAssignment) {
            return view('dashboard.user.pages.submaterial.detail', $data);
        }

        return redirect()->route('common.showMaterial', ['classroom' => $classroom->id, 'material' => $material->id])->with('error', 'Materi belum bisa diakses, anda belum menyelesaikan semua tugas dari materi sebelumnya');
    }

    public function showDocument(SubMaterial $submaterial, string $role)
    {
        if (auth()->check()) {
            $order = $submaterial->order;
            $listSubMaterials = $this->subMaterialService->handleListSubMaterials($submaterial->order, $submaterial->material->id);
            $prevSubMaterials = $this->subMaterialService->handlePrevSubmaterial($submaterial->order, $submaterial->material->id);

            if (auth()->user()->roles->pluck('name')[0] == 'teacher' || auth()->user()->roles->pluck('name')[0] == 'mentor') {
                return view('dashboard.user.pages.submaterial.view', compact('submaterial', 'role', 'listSubMaterials', 'prevSubMaterials'));
            }

            if ($order == 1) {
                return view('dashboard.user.pages.submaterial.view', compact('submaterial', 'role', 'listSubMaterials', 'prevSubMaterials'));
            }

            $previousOrder = $order - 1;

            $countAssignmentByMaterial = $this->assignmentService->countAssignmentByMaterial($submaterial->id);

            $previousSubmaterial = $this->subMaterialService->handlePreviousSubmaterial($submaterial->material->id, $previousOrder);

            if ($countAssignmentByMaterial == 0) {
                return view('dashboard.user.pages.submaterial.view', compact('submaterial', 'role', 'listSubMaterials', 'prevSubMaterials'));
            }

            $countAssignment = $this->assignmentService->countAssignments($previousSubmaterial->id, $previousOrder);

            $countStudentAssignment = $this->assignmentService->countStudentAssignments($previousSubmaterial->id, $previousOrder);

            if ($countAssignment == $countStudentAssignment) {
                return view('dashboard.user.pages.submaterial.view', compact('submaterial', 'role', 'listSubMaterials', 'prevSubMaterials'));
            }

            return redirect()->back()->with('error', 'Materi belum bisa diakses, anda belum menyelesaikan semua tugas dari materi sebelumnya');
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
