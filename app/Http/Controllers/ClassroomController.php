<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassroomRequest;
use App\Models\Classroom;
use App\Services\ClassroomService;
use App\Services\GenerationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ClassroomController extends Controller
{
    private ClassroomService $service;
    private GenerationService $generationService;

    public function __construct(ClassroomService $service, GenerationService $generationService)
    {
        $this->service = $service;
        $this->generationService = $generationService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $data = [
            'classrooms' => $this->service->handleGetPaginate(auth()->id()),
            'parameters' => []
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
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
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
}
