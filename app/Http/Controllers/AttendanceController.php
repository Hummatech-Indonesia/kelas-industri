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
        if(auth()->user()->roles->pluck('name')[0] == 'mentor'){
            $attendances = $this->service->handleGetByMentor();
            return view('dashboard.user.pages.absent.index', compact('attendances'));
        }else
        $attendances = $this->service->handleGetByAdmin();
        return view('dashboard.admin.pages.absent.index', compact('attendances'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('dashboard.user.pages.absent.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AttendanceRequest $request
     * @return RedirectResponse
     */
    public function store(AttendanceRequest $request): RedirectResponse
    {
        $this->service->handleCreate($request);
        return to_route('mentor.attendance.index')->with('success', trans('alert.create_success'));
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
     * @param Attendance $attendance
     * @return RedirectResponse
     */
    public function update(Attendance $attendance): RedirectResponse
    {
        $this->service->changeStatus($attendance);
        return to_route('mentor.attendance.index')->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Attendance $attendance
     * @return RedirectResponse
     */
    public function destroy(Attendance $attendance): RedirectResponse
    {
        $this->service->handleDelete($attendance);
        return back()->with('success', trans('alert.delete_success'));
    }

    /**
     * submit absent.
     *
     * @param Classroom $classroom
     * @return RedirectResponse
     */
    public function submit(Attendance $attendance): view
    {
        $mentor = $this->service->handleShow($attendance);
        if($this->service->validate_student_mentor($mentor->created_by)) abort(404);
        if($this->service->validate_attendance_status($attendance)) return view('dashboard.user.pages.absent.status')->with(['status' => 'closed']);
        if($this->service->validate_student_submit_status($attendance)) return view('dashboard.user.pages.absent.status')->with(['status' => 'have_done']);

        $this->service->submitAttendance($attendance);
        return view('dashboard.user.pages.absent.status')->with(['status' => 'success']);

    }
}
