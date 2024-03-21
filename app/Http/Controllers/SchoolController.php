<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use App\Traits\YajraTable;
use Illuminate\Http\Request;
use App\Services\UserServices;
use App\Services\SchoolService;
use App\Services\StudentService;
use App\Services\GenerationService;
use App\Services\SchoolYearService;
use App\Http\Requests\SchoolRequest;
use Illuminate\Http\RedirectResponse;

class SchoolController extends Controller
{
    use YajraTable;

    private SchoolService $service;
    private UserServices $userService;
    private GenerationService $generationService;
    private SchoolYearService $schoolYearService;
    private StudentService $studentService;

    public function __construct(SchoolService $service, UserServices $userService, GenerationService $generationService, SchoolYearService $schoolYearService, StudentService $studentService)
    {
        $this->service = $service;
        $this->userService = $userService;
        $this->generationService = $generationService;
        $this->schoolYearService = $schoolYearService;
        $this->studentService = $studentService;
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
        $this->service->handleCreate($request);

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

        if ($classrooms->isEmpty()) {
            $countStudents = [];
        } else {
            foreach ($classrooms as $classroom) {
                $classroomId = $classroom->id;
                $countStudentClassroom = $this->service->handleCountStudentClassroom($classroomId, $schools);
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
}
