<?php

namespace App\Http\Controllers;

use App\Helpers\SchoolYearHelper;
use App\Http\Requests\ClassroomRequest;
use App\Models\Classroom;
use App\Models\User;
use App\Services\ClassroomService;
use App\Services\DevisionService;
use App\Services\GenerationService;
use App\Services\SchoolYearService;
use App\Services\StudentService;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClassroomController extends Controller
{
    private ClassroomService $service;
    private GenerationService $generationService;
    private StudentService $studentService;
    private SchoolYearService $schoolYearService;
    private DevisionService $devisionService;

    public function __construct(ClassroomService $service, GenerationService $generationService, StudentService $studentService, SchoolYearService $schoolYearService, DevisionService $devisionService)
    {
        $this->service = $service;
        $this->generationService = $generationService;
        $this->studentService = $studentService;
        $this->schoolYearService = $schoolYearService;
        $this->devisionService = $devisionService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Request $request): mixed
    {
        $schoolYear = SchoolYearHelper::get_current_school_year();
        $selectedSchoolYear = 0;
        if ($schoolYear) {
            $selectedSchoolYear = $schoolYear->id;
        }
        if ($request->filter) {
            $filter = $request->filter;
        } else {
            $filter = $selectedSchoolYear;
        }
        if (request()->ajax()) {
            return $this->generationService->handleGetBySchoolYear($request->school_year_id, $selectedSchoolYear);
        }

        $data = [
            'school_years' => $this->schoolYearService->handleGetAll(),
            'generations' => $this->generationService->handleGetAll(),
            'filter' => $filter,
            'search' => $request->search,
            'classrooms' => $this->service->handleSearch($request, auth()->id()),
        ];
        return view('dashboard.admin.pages.classroom.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(User $school): View
    {
        $data = [
            'school' => $school,
            'generations' => $this->generationService->handleGetAll(),
            'devisions' => $this->devisionService->handleGetAll(),
        ];
        return \view('dashboard.admin.pages.classroom.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ClassroomRequest $request
     * @return RedirectResponse
     */
    public function store(ClassroomRequest $request, User $school): RedirectResponse
    {
        $this->service->handleCreate($request, $school->id);

        return to_route('admin.schools.show', $school->id)->with('success', trans('alert.add_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param Classroom $classroom
     * @return View
     * @throws Exception
     */
    public function show(Classroom $classroom): View
    {;

        $data = [
            'studentClassroom' => $this->studentService->handleGetStudentByClassroom($classroom->school->id, $classroom->id),
            'classroom' => $classroom,
            'students' => $this->studentService->handleGetBySchool($classroom->school->id),
        ];
        return \view('dashboard.admin.pages.classroom.detail', $data, );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Classroom $classroom
     * @return View
     */
    public function edit(Classroom $classroom, User $school): View
    {
        $data = [
            'school' => $school,
            'classroom' => $classroom,
            'generations' => $this->generationService->handleGetAll(),
            'devisions' => $this->devisionService->handleGetAll(),
        ];
        return \view('dashboard.admin.pages.classroom.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ClassroomRequest $request
     * @param Classroom $classroom
     * @return RedirectResponse
     */
    public function update(ClassroomRequest $request, Classroom $classroom, User $school): RedirectResponse
    {
        $this->service->handleUpdate($request, $classroom->id);

        return to_route('admin.schools.show', $school->id)->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Classroom $classroom
     * @return RedirectResponse
     */
    public function destroy(Classroom $classroom): RedirectResponse
    {
        $data = $this->service->handleDelete($classroom->id);

        if (!$data) {
            return back()->with('error', trans('alert.delete_constrained'));
        }

        return back()->with('success', trans('alert.delete_success'));
    }

    /**
     * add students to classroom
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function addStudentClassroom(Request $request): RedirectResponse
    {
        $this->service->handleAddStudent($request);

        return back()->with('success', trans('alert.add_success'));
    }

    public function classroom(Request $request)
    {
        if (request()->ajax()) {
            return $this->service->handleGetBySchoolClassroom($request->schoolId);
        }
    }
}
