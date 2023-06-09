<?php

namespace App\Http\Controllers;

use App\Helpers\SchoolYearHelper;
use App\Http\Requests\ZoomScheduleRequest;
use App\Models\ZoomSchedule;
use App\Services\ClassroomService;
use App\Services\UserServices;
use App\Services\ZoomScheduleService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use function request;

class ZoomScheduleController extends Controller
{
    private ZoomScheduleService $service;
    private ClassroomService $classroomService;
    private UserServices $userServices;

    public function __construct(ZoomScheduleService $service, ClassroomService $classroomService, UserServices $userServices)
    {
        $this->service = $service;
        $this->classroomService = $classroomService;
        $this->userServices = $userServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(): mixed
    {
        if (request()->ajax()) return $this->service->handleGetAll();

        return view('dashboard.admin.pages.zoomSchedule.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): mixed
    {
        $currentSchoolYear = SchoolYearHelper::get_current_school_year();

        if (request()->ajax()) return $this->classroomService->handleGetBySchool(request()->school_id, $currentSchoolYear);

        $data = [
            'schools' => $this->userServices->handleGetAllSchool(),
            'mentors' => $this->userServices->handleGetAllMentor()
        ];

        return view('dashboard.admin.pages.zoomSchedule.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ZoomScheduleRequest $request
     * @return RedirectResponse
     */
    public function store(ZoomScheduleRequest $request): RedirectResponse
    {
        $this->service->handleCreate($request);

        return to_route('admin.zoomSchedules.index')->with('success', trans('alert.add_success'));
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
     * @param ZoomSchedule $zoomSchedule
     * @return View
     */
    public function edit(ZoomSchedule $zoomSchedule): View
    {
        $data = [
            'schools' => $this->userServices->handleGetAllSchool(),
            'mentors' => $this->userServices->handleGetAllMentor(),
            'zoomSchedule' => $zoomSchedule
        ];

        return \view('dashboard.admin.pages.zoomSchedule.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ZoomScheduleRequest $request
     * @param ZoomSchedule $zoomSchedule
     * @return RedirectResponse
     */
    public function update(ZoomScheduleRequest $request, ZoomSchedule $zoomSchedule): RedirectResponse
    {
        $this->service->handleUpdate($request, $zoomSchedule->id);

        return to_route('admin.zoomSchedules.index')->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ZoomSchedule $zoomSchedule
     * @return RedirectResponse
     */
    public function destroy(ZoomSchedule $zoomSchedule): RedirectResponse
    {
        $data = $this->service->handleDelete($zoomSchedule->id);

        if (!$data) return back()->with('error', trans('alert.delete_constrained'));

        return back()->with('success', trans('alert.delete_success'));
    }
}
