<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Assignment;
use App\Models\SubMaterial;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\PointService;
use App\Services\UserServices;
use App\Helpers\SchoolYearHelper;
use App\Services\AssignmentService;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AssignmentRequest;

class AssignmentController extends Controller
{
    private AssignmentService $service;
    private PointService $pointService;
    private UserServices $userService;

    public function __construct(AssignmentService $service, PointService $pointService, UserServices $userService)
    {
        $this->service = $service;
        $this->pointService = $pointService;
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param SubMaterial $submaterial
     * @return View
     */
    public function create(SubMaterial $submaterial): View
    {
        $data = [
            'submaterial' => $submaterial,
        ];
        return view('dashboard.admin.pages.assignment.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AssignmentRequest $request
     * @return RedirectResponse
     */
    public function store(AssignmentRequest $request): RedirectResponse
    {
        $this->service->handleCreate($request);
        return to_route('admin.submaterials.show', $request->sub_material_id)->with('success', trans('alert.add_success'));
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
     * @param Assignment $assignment
     * @return View
     */
    public function edit(Assignment $assignment): View
    {
        return view('dashboard.admin.pages.assignment.edit', compact('assignment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AssignmentRequest $request
     * @param Assignment $assignment
     * @return RedirectResponse
     */
    public function update(AssignmentRequest $request, Assignment $assignment): RedirectResponse
    {
        $this->service->handleUpdate($request, $assignment->id);

        return to_route('admin.submaterials.show', $request->sub_material_id)->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Assignment $assignment
     * @return RedirectResponse
     */
    public function destroy(Assignment $assignment): RedirectResponse
    {
        $data = $this->service->handleDelete($assignment->id);

        if (!$data) {
            return back()->with('error', trans('alert.delete_constrained'));
        }

        return back()->with('success', trans('alert.delete_success'));
    }

    public function storePoint(Request $request)
    {
        $nilai = $request->nilai;
        $id = $request->id;

        foreach ($id as $index => $item) {
            $student = $this->service->handleShowSubmitAssignment($item);
            if ($student->point == null) {
                $this->userService->handleCreatePoint(1, $student->student_id);
            }
            $this->service->storePoint($item, $nilai[$index]);
        }
        return response()->json($student);
    }
}
