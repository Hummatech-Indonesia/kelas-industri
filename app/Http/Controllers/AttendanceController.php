<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttendanceRequest;
use App\Models\Attendance;
use App\Services\AttendanceService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AttendanceController extends Controller
{
    private AttendanceService $service;

    public function __construct(AttendanceService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $attendances = $this->service->handleGetByMentor();
        return view('dashboard.user.pages.absent.index', compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ClassroomRequest $request
     * @return RedirectResponse
     */
    public function store(AttendanceRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $this->service->handleCreate($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param Classroom $classroom
     * @return View
     * @throws Exception
     */
    public function show(Attendance $classroom): View
    {
        return view('tes');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Classroom $classroom
     * @return View
     */
    public function edit(Attendance $classroom): View
    {
        return view();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ClassroomRequest $request
     * @param Classroom $classroom
     * @return RedirectResponse
     */
    public function update(Attendance $attendance): RedirectResponse
    {
        $this->service->changeStatus($attendance);
        return to_route('school.classrooms.index')->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Classroom $classroom
     * @return RedirectResponse
     */
    public function destroy(Attendance $attendance): RedirectResponse
    {
        return back()->with('success', trans('alert.delete_success'));
    }
}
