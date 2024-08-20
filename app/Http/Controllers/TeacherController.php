<?php

namespace App\Http\Controllers;

use App\Exports\TeacherExport;
use App\Helpers\SchoolYearHelper;
use App\Http\Requests\TeacherRequest;
use App\Http\Requests\UserPasswordRequest;
use App\Models\MentorClassroom;
use App\Models\TeacherClassroom;
use App\Models\TeacherSchool;
use App\Models\User;
use App\Services\ClassroomService;
use App\Services\TeacherService;
use App\Services\UserServices;
use App\Traits\YajraTable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class TeacherController extends Controller
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
        if (request()->ajax()) {
            return $this->TeacherMockup($this->service->handleGetBySchool(auth()->id()));
        }

        return view('dashboard.admin.pages.teacher.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     * @throws Exception
     */
    public function rollingTeacher(User $school): mixed
    {
        if (request()->ajax()) {
            return $this->RollingTeacherMockup($this->service->handleGetBySchool($school->id));
        }

        return view('dashboard.admin.pages.teacher.rolling', compact('school'));
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
            'classrooms' => $this->classroomService->handleGetByTeacherClassroom($teacher->teacherSchool->school_id, $currentSchoolYear->id),
            'teacher' => $teacher,
            'school' => $teacher->teacherSchool->school_id,
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
    public function create(User $school): View
    {
        return view('dashboard.admin.pages.teacher.create', compact('school'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TeacherRequest $request
     * @return RedirectResponse
     */
    public function store(TeacherRequest $request, User $school): RedirectResponse
    {
        $this->service->handleCreate($request, $school->id);

        return to_route('admin.schools.show', $school->id)->with('success', trans('alert.add_success'));
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
    public function edit(User $teacher, User $school): View
    {
        return view('dashboard.admin.pages.teacher.edit', compact('teacher','school'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TeacherRequest $request
     * @param User $teacher
     * @return RedirectResponse
     */
    public function update(TeacherRequest $request, User $teacher, User $school): RedirectResponse
    {
        $this->service->handleUpdate($request, $teacher);

        return to_route('admin.schools.show', $school->id)->with('success', trans('alert.update_success'));
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

        if (!$data) {
            return back()->with('error', trans('alert.delete_constrained'));
        }

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


    public function exportTeacherSchool(User $school) {
        return Excel::download(new TeacherExport($school->id), 'Akun Guru '.$school->name.'.xlsx');
    }
}
