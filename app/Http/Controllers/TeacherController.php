<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use App\Traits\YajraTable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\UserServices;
use App\Models\MentorClassroom;
use App\Models\TeacherClassroom;
use App\Services\TeacherService;
use App\Helpers\SchoolYearHelper;
use App\Services\ClassroomService;
use App\Http\Requests\TeacherRequest;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UserPasswordRequest;

class   TeacherController extends Controller
{
    use YajraTable;

    private TeacherService $service;
    private UserServices $userServices;
    private ClassroomService $classroomService;

    public function __construct(TeacherService $service, UserServices $userServices, ClassroomService $classroomService)
    {
        $this->service = $service;
        $this->userServices = $userServices;
        $this->classroomService = $classroomService;
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
        if (request()->ajax()) {
            return $this->RollingTeacherMockup($this->service->handleGetBySchool(auth()->id()));
        }

        return view('dashboard.admin.pages.teacher.rolling');
    }

    /**
     * Display a listing of the resource.
     *
     * @param User $teacher
     * @return mixed
     * @throws Exception
     */
    public function addRollingTeacher(User $teacher): mixed
    {
        $currentSchoolYear = SchoolYearHelper::get_current_school_year();
        if (request()->ajax()) {
            return $this->service->handleGetTeacherClassrooms($teacher->teacherSchool->id);
        }

        $data = [
            'classrooms' => $this->classroomService->handleGetByTeacherClassroom(auth()->id(), $currentSchoolYear->id),
            'teacher' => $teacher
        ];
        return view('dashboard.admin.pages.teacher.add-rolling', $data);
    }

    /**
     * action rolling mentor
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function actionRollingTeacher(Request $request): RedirectResponse
    {
        $this->service->handleStoreTeacherClassroom($request);

        return back()->with('success', trans('alert.add_success'));
    }

    /**
     * delete mentor classroom
     *
     * @param MentorClassroom $mentorClassroom
     * @return RedirectResponse
     */
    public function deleteTeacherClassroom(TeacherClassroom $teacherClassroom): RedirectResponse
    {
        $this->service->handleDeleteTeacherClassroom($teacherClassroom->id);

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

    public function ChangePasswordTeacher(User $teacher): view
    {
        $data = [
            'teacher' => $teacher,
        ];
        return view('dashboard.admin.pages.teacher.changePassword', $data);
    }

    public function updatePasswordGuru(UserPasswordRequest $request, User $teacher): RedirectResponse
    {
        $this->userServices->handleChangePassword($request, $teacher->id);

        return to_route('school.teachers.index')->with('success', trans('alert.update_success'));
    }
}
