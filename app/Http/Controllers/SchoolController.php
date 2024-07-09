<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use App\Traits\YajraTable;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use App\Services\UserServices;
use App\Services\SchoolService;
use App\Services\StudentService;
use App\Services\GenerationService;
use App\Services\SchoolYearService;
use App\Http\Requests\SchoolRequest;
use App\Services\SubMaterialService;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\RedirectResponse;
use App\Services\SubMaterialExamService;
use App\Services\StudentSubMaterialExamService;

class SchoolController extends Controller
{
    use YajraTable;

    private SchoolService $service;
    private UserServices $userService;
    private GenerationService $generationService;
    private SchoolYearService $schoolYearService;
    private StudentService $studentService;
    private SubMaterialExamService $subMaterialExamService;
    private SubMaterialService $subMaterialService;
    private StudentSubMaterialExamService $studentSubMaterialExamService;

    public function __construct(SchoolService $service, UserServices $userService, GenerationService $generationService, SchoolYearService $schoolYearService, StudentService $studentService, SubMaterialExamService $subMaterialExamService, SubMaterialService $subMaterialService, StudentSubMaterialExamService $studentSubMaterialExamService)
    {
        $this->service = $service;
        $this->userService = $userService;
        $this->generationService = $generationService;
        $this->schoolYearService = $schoolYearService;
        $this->studentService = $studentService;
        $this->subMaterialExamService = $subMaterialExamService;
        $this->subMaterialService = $subMaterialService;
        $this->studentSubMaterialExamService = $studentSubMaterialExamService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $schools = $this->service->handleGetPaginate();
        $parameters = null;

        if (request()->has('search')) {
            $schools = $this->service->handleSearch(request()->search);
            $parameters = request()->query();
        }
        $countStudents = [];
        foreach ($schools as $school) {
            $schoolId = $school->id;
            $countStudent = $this->service->handleCountStudent($schoolId);
            $countStudents[$schoolId] = $countStudent->count();
        }
        $data = [
            'countStudents' => $countStudents,
            'schools' => $schools,
            'parameters' => $parameters,
        ];
        return view('dashboard.admin.pages.school.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('dashboard.admin.pages.school.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SchoolRequest $request
     * @return RedirectResponse
     */
    public function store(SchoolRequest $request): RedirectResponse
    {
        // dd($request);
        $school = $this->service->handleCreate($request);
        if (isset($request->regristation_exam)) {
            $this->studentService->handleCreateRegristationExamStudent($school, $request->total_student);
            $this->subMaterialExamService->handleCreateRegristationExam($request->validated(), $school);
        }

        return to_route('admin.schools.index')->with('success', trans('alert.add_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param User $school
     * @return View
     */
    public function show(User $school, Request $request): View
    {
        $classrooms = $school->classrooms;
        $schools = $this->service->handleGetAllClassroom($school, $request);
        $countAllStudentActive = $this->service->handleCountAllStudentActive($school->id);
        $generations = $this->generationService->handleGetAll();
        $schoolyears = $this->schoolYearService->handleGetAll();
        $studentExams = $this->studentSubMaterialExamService->handleGetTester($school->id);
        $hasExam = $school->regristationExam != null;

        if ($classrooms->isEmpty()) {
            $countStudents = [];
        } else {
            foreach ($classrooms as $classroom) {
                $classroomId = $classroom->id;
                $countStudentClassroom = $this->service->handleCountStudentClassroom($classroomId);
                $countStudents[$classroomId] = $countStudentClassroom->count();
            }
        }

        $data = [
            'countStudents' => $countStudents,
            'school' => $school,
            'schools' => $schools,
            'countAllStudent' => $countAllStudentActive,
            'generations' => $generations,
            'schoolyears' => $schoolyears,
            'classrooms' => $classrooms,
            'studentExams' => $studentExams,
            'hasExam' => $hasExam
        ];
        return view('dashboard.admin.pages.school.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $school
     * @return View
     */
    public function edit(User $school): View
    {

        return view('dashboard.admin.pages.school.edit', compact('school'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SchoolRequest $request
     * @param User $school
     * @return RedirectResponse
     */
    public function update(SchoolRequest $request, User $school): RedirectResponse
    {
        $this->service->handleUpdate($request, $school);
        return to_route('admin.schools.index')->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $school
     * @return RedirectResponse
     */
    public function destroy(User $school): RedirectResponse
    {
        $data = $this->service->handleDelete($school);

        if (!$data) {
            return back()->with('error', trans('alert.delete_constrained'));
        }

        return back()->with('success', trans('alert.delete_success'));
    }

    public function school()
    {
        if (request()->ajax()) {
            return $this->userService->handleGetAllSchool();
        }
    }

    public function students(User $school, Request $request)
    {
        if (request()->ajax()) {
            return $this->StudentMockup($this->studentService->handleGetBySchoolAjax($school->id, $request));
        }
    }

    public function exportStudent(User $school)
    {
        return Excel::download(new UsersExport($school), "$school->name-users.xlsx");
    }
    public function deleteRegristationExamStudent(User $school)
    {
        $this->service->handleDeleteRegristationExamStudent($school);
        return back()->with('success', trans('alert.delete_success'));
    }
}
