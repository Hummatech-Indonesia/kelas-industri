<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Models\MentorClassroom;
use App\Models\User;
use App\Services\TeacherService;
use App\Services\UserServices;
use App\Traits\YajraTable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class TeacherController extends Controller
{
    use YajraTable;

    private TeacherService $service;
    private UserServices $userServices;

    public function __construct(TeacherService $service, UserServices $userServices)
    {
        $this->service = $service;
        $this->userServices = $userServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): mixed
    {
        if (request()->ajax()) return $this->TeacherMockup($this->service->handleGetBySchool(auth()->id()));

        return view('dashboard.admin.pages.teacher.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     * @throws Exception
     */
    public function rollingTeacher(): mixed
    {
//        if (request()->ajax()) {
//            return $this->RollingMentorMockup($this->userService->handleGetMentor());
//        }

        return view('dashboard.admin.pages.mentor.rolling');
    }

    /**
     * Display a listing of the resource.
     *
     * @param User $mentor
     * @return mixed
     * @throws Exception
     */
    public function addRollingTeacher(User $mentor): mixed
    {
//        if (request()->ajax()) {
//            return $this->mentorService->handleGetMentorClassrooms($mentor->id);
//        }

        $data = [
            'schools' => $this->userService->handleGetAllSchool(),
            'mentor' => $mentor
        ];
        return view('dashboard.admin.pages.mentor.add-rolling', $data);
    }

    /**
     * action rolling mentor
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function actionRollingTeacher(Request $request): RedirectResponse
    {
//        $this->mentorService->handleStore($request);

        return back()->with('success', trans('alert.add_success'));
    }

    /**
     * delete mentor classroom
     *
     * @param MentorClassroom $mentorClassroom
     * @return RedirectResponse
     */
    public function deleteTeacherClassroom(MentorClassroom $mentorClassroom): RedirectResponse
    {
//        $this->mentorService->handleDelete($mentorClassroom->id);

        return back()->with('success', trans('alert.delete_success'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('dashboard.admin.pages.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TeacherRequest $request
     * @return RedirectResponse
     */
    public function store(TeacherRequest $request): RedirectResponse
    {
        $this->service->handleCreate($request);

        return to_route('school.teachers.index')->with('success', trans('alert.add_success'));
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
     * @param User $teacher
     * @return View
     */
    public function edit(User $teacher): View
    {
        return view('dashboard.admin.pages.teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TeacherRequest $request
     * @param User $teacher
     * @return RedirectResponse
     */
    public function update(TeacherRequest $request, User $teacher): RedirectResponse
    {
        $this->service->handleUpdate($request, $teacher);

        return to_route('school.teachers.index')->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $teacher
     * @return RedirectResponse
     */
    public function destroy(User $teacher): RedirectResponse
    {
        $data = $this->service->handleDelete($teacher);

        if (!$data) return back()->with('error', trans('alert.delete_constrained'));

        return back()->with('success', trans('alert.delete_success'));
    }
}
