<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassroomRequest;
use App\Models\Classroom;
use App\Services\ClassroomService;
use App\Services\GenerationService;
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

    public function __construct(ClassroomService $service, GenerationService $generationService, StudentService $studentService)
    {
        $this->service = $service;
        $this->generationService = $generationService;
        $this->studentService = $studentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $classrooms = $this->service->handleGetPaginate(auth()->id());
        $parameters = null;

        if (request()->has('search')) {
            $classrooms = $this->service->handleSearch(request()->search, auth()->id());
            $parameters = request()->query();
        }
        $data = [
            'classrooms' => $classrooms,
            'parameters' => $parameters
        ];
        return view('dashboard.admin.pages.classroom.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $data = [
            'generations' => $this->generationService->handleGetAll()
        ];
        return \view('dashboard.admin.pages.classroom.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ClassroomRequest $request
     * @return RedirectResponse
     */
    public function store(ClassroomRequest $request): RedirectResponse
    {
        $this->service->handleCreate($request);

        return to_route('school.classrooms.index')->with('success', trans('alert.add_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param Classroom $classroom
     * @return View
     * @throws Exception
     */
    public function show(Classroom $classroom): View
    {
        $data = [
            'classroom' => $classroom,
            'students' => $this->studentService->handleGetBySchool(auth()->id())
        ];
//        dd($data);
        return \view('dashboard.admin.pages.classroom.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Classroom $classroom
     * @return View
     */
    public function edit(Classroom $classroom): View
    {
        $data = [
            'classroom' => $classroom,
            'generations' => $this->generationService->handleGetAll()
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
    public function update(ClassroomRequest $request, Classroom $classroom): RedirectResponse
    {
        $this->service->handleUpdate($request, $classroom->id);

        return to_route('school.classrooms.index')->with('success', trans('alert.update_success'));
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

        if (!$data) return back()->with('error', trans('alert.delete_constrained'));

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
}
