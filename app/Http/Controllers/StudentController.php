<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Http\Requests\UserPasswordRequest;
use App\Imports\StudentImport;
use App\Models\User;
use App\Services\ClassroomService;
use App\Services\StudentService;
use App\Services\UserServices;
use App\Traits\YajraTable;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    use YajraTable;

    private StudentService $studentService;
    private UserServices $userService;
    private ClassroomService $classroomService;

    public function __construct(StudentService $studentService, UserServices $userService, ClassroomService $classroomService)
    {
        $this->studentService = $studentService;
        $this->userService = $userService;
        $this->classroomService = $classroomService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     * @throws Exception
     */
    public function index(Request $request): mixed
    {
        if (request()->ajax()) {
            return $this->StudentMockup($this->studentService->handleGetBySchoolAjax(auth()->id(), $request));
        }

        $data = [
            'classrooms' => $this->classroomService->handleGetBySchoolClassroom(auth()->id()),
        ];

        return view('dashboard.admin.pages.student.index', $data);
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
        ];

        return view('dashboard.admin.pages.student.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StudentRequest $request
     * @return RedirectResponse
     */

    public function store(StudentRequest $request, User $school): RedirectResponse
    {
        $this->studentService->handleCreate($request, $school->id);

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
     * @param User $student
     * @return View
     */
    public function edit(User $student, User $school): View
    {
        return view('dashboard.admin.pages.student.edit', compact('student', 'school'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StudentRequest $request
     * @param User $student
     * @return RedirectResponse
     */
    public function update(StudentRequest $request, User $student, User $school): RedirectResponse
    {
        $this->studentService->handleUpdate($request, $student);

        return to_route('admin.schools.show', $school->id)->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $student
     * @return RedirectResponse
     */
    public function destroy(User $student): RedirectResponse
    {
        $data = $this->studentService->handleDelete($student);

        if (!$data) {
            return back()->with('error', trans('alert.delete_constrained'));
        }

        return back()->with('success', trans('alert.delete_success'));
    }

    /**
     * import students
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function importStudents(Request $request): RedirectResponse
    {
        Excel::import(new StudentImport(auth()->id()), $request->file);

        return back()->with('success', trans('alert.import_success'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     * @throws Exception
     */
    public function rollingStudent(): mixed
    {
        if (request()->ajax()) {
            return $this->RollingStudentMockup($this->studentService->handleGetBySchool(auth()->id()));
        }

        return view('dashboard.admin.pages.student.rolling');
    }

    public function ChangePassword(User $student): view
    {
        $data = [
            'student' => $student,
        ];
        return view('dashboard.admin.pages.student.changePassword', $data);
    }

    public function updatePassword(UserPasswordRequest $request, User $student): RedirectResponse
    {
        $this->userService->handleChangePassword($request, $student->id);

        return to_route('school.students.index')->with('success', trans('alert.update_success'));
    }
}
