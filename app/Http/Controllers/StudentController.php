<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Point;
use Illuminate\View\View;
use App\Traits\YajraTable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Imports\StudentImport;
use App\Services\PointService;
use App\Services\UserServices;
use App\Services\StudentService;
use App\Services\ClassroomService;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StudentRequest;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AddPointRequest;
use App\Http\Requests\UserPasswordRequest;

class StudentController extends Controller
{
    use YajraTable;

    private StudentService $studentService;
    private UserServices $userService;
    private ClassroomService $classroomService;
    private PointService $pointService;

    public function __construct(StudentService $studentService, UserServices $userService, ClassroomService $classroomService, PointService $pointService)
    {
        $this->studentService = $studentService;
        $this->userService = $userService;
        $this->classroomService = $classroomService;
        $this->pointService = $pointService;
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
     * addPoint
     *
     * @param  mixed $user
     * @return RedirectResponse
     */
    public function addPoint(User $user, AddPointRequest $request)
    {
        $point = $this->pointService->getWeekPoint($user);
        if (count($point) == 0) {
            $storedPoint = $this->pointService->store([
                'student_id' => $user->id,
                'point' => $request->point
            ]);

            $user->update(['point' => $user->point + intval($request->point)]);

            return redirect()->back()->with('success', trans('alert.add_success'));
        } else {
            return redirect()->back()->with('error', 'Siswa sudah mendapat point tambahan minggu ini!');
        }
        // dd($request);
        // $user->update(['point' => $user->point + intval($request->point)]);
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
    public function importStudents(Request $request, $schoolId): RedirectResponse
    {
        Excel::import(new StudentImport($schoolId), $request->file);

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

    public function ChangePassword(User $student, User $school): view
    {
        $data = [
            'student' => $student,
            'school' => $school
        ];
        return view('dashboard.admin.pages.student.changePassword', $data);
    }

    public function updatePassword(UserPasswordRequest $request, User $student, User $school): RedirectResponse
    {
        $this->userService->handleChangePassword($request, $student->id);

        return to_route('admin.schools.show', $school->id)->with('success', trans('alert.update_success'));
    }

    public function showAll(Request $request)
    {
        $students = User::query()
            ->whereHas('roles', function ($q) {
                $q->where('name', 'student');
            })
            ->with('studentSchool.studentClassroom.classroom')
            ->when($request->search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%');
                });
            })
            ->paginate(100);

        // dd($students);
        return view('dashboard.admin.pages.student.index', compact('students'));
    }
}
