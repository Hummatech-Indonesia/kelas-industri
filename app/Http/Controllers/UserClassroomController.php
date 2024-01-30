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
use App\Services\ChallengeService;
use App\Services\ClassroomService;
use App\Services\AssignmentService;
use App\Services\SubMaterialService;
use App\Services\SubmitChallengeService;
use App\Services\SubmitAssignmentService;

class UserClassroomController extends Controller
{
    use DataSidebar;
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

    public function index(Request $request): View
    {
        $data = $this->GetDataSidebar();
        $data['search'] = $request->search;
        $data['classrooms'] = $this->classroomService->handleGetClassroomByUser(auth()->user()->id, $request);
        return view('dashboard.user.pages.classroom.index', $data);
    }

    public function show(Classroom $classroom): View
    {
        if(auth()->user()->roles->pluck('name')[0] == 'admin'){
            $data = [
                'students' => $this->studentService->handleGetBySchool(auth()->user()->id),
                'classroom' => $classroom,
            ];
            return \view ('dashboard.admin.pages.classroom.show', $data);
        }else
        $data = $this->GetDataSidebar();
        $data['classroom'] = $classroom;
        $data['students'] = $this->studentService->handleGetBySchool(auth()->id());
        return \view ('dashboard.user.pages.classroom.detail', $data);
    }

    public function materials(Classroom $classroom, Request $request): View
    {
        $data = $this->GetDataSidebar();
        $data['classroom'] = $classroom;
        $data['materials'] =  $this->materialService->handleByClassroom($classroom->id, $request);
        $data['search'] = $request->search;
        return \view ('dashboard.user.pages.material.index', $data);
    }

    public function showMaterial(Classroom $classroom, Material $material, Request $request): View
    {
        $data = $this->GetDataSidebar();
        $data['classroom'] = $classroom;
        $data['material'] = $material;
        $data['subMaterials'] =  $this->subMaterialService->handleGetPaginate($material->id, $request);
        $data['search'] = $request->search;
        $data['parameters'] = [
            'material' => $material->id,
        ];
        return view('dashboard.user.pages.submaterial.index', $data);
    }

    public function showSubMaterial(Classroom $classroom, Material $material, SubMaterial $submaterial): View
    {
        $data = $this->GetDataSidebar();
        $data['classroom'] = $classroom;
        $data['material'] = $material;
        $data['subMaterial'] = $submaterial;
        return view('dashboard.user.pages.submaterial.detail', $data);
    }

    public function showDocument(SubMaterial $submaterial, string $role): View
    {
        $listSubMaterials = $this->subMaterialService->handleListSubMaterials($submaterial->created_at);
        return view('dashboard.user.pages.submaterial.view', compact('submaterial', 'role','listSubMaterials'));
    }

    public function showStudentDetail(User $student, Generation $generation) : View
    {

        $currentSchoolYear = SchoolYearHelper::get_current_school_year();
        $data = $this->GetDataSidebar();
        $data['student'] = $student;
        $data['point'] = $this->pointService->handleGetPointByStudent($student->id);
        $data['assignments'] = $this->submitAssignmentService->handleGetCountStudentByAssignment($student->id,$generation->id);
        $data['challenges'] = $this->submitChallengeService->handleGetCountStudentByChallenge($student->id, $generation->id);
        $data['rankings'] = $this->pointService->handleGetPoint();
        return view('dashboard.user.pages.classroom.show', $data);
    }
}
