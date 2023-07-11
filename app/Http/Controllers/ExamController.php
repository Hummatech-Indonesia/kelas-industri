<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\User;
use App\Models\Classroom;
use Illuminate\View\View;
use App\Models\SchoolYear;
use App\Traits\DataSidebar;
use Illuminate\Http\Request;
use App\Services\ExamService;
use App\Services\UserServices;
use App\Models\StudentClassroom;
use App\Helpers\SchoolYearHelper;
use App\Http\Requests\ExamRequest;
use App\Services\ClassroomService;
use App\Services\SchoolYearService;

class ExamController extends Controller
{
    use DataSidebar;
    private ClassroomService $classroomService;
    private ExamService $examService;
    private UserServices $userService;
    private SchoolYearService $schoolYearService;

    public function __construct(ClassroomService $classroomService, ExamService $examService, UserServices $userService, SchoolYearService $schoolYearService)
    {
        $this->classroomService = $classroomService;
        $this->examService = $examService;
        $this->userService = $userService;
        $this->schoolYearService = $schoolYearService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): view
    {
        if (auth()->user()->roles->pluck('name')[0] == 'admin') {
            $schools = $this->userService->handleGetAllSchool();
            return view('dashboard.admin.pages.exam.index', compact('schools'));
        } elseif (auth()->user()->roles->pluck('name')[0] == 'school') {
            $schoolYear = SchoolYearHelper::get_current_school_year();
            $selectedSchoolYear = 0;
            if ($schoolYear) {
                $selectedSchoolYear = $schoolYear->id;
            }
            if ($request->school_year) {
                $selectedSchoolYear = $request->school_year;
            }
            $data = [
                'schoolYear' => $this->schoolYearService->handleGetAll(),
                'schoolYearFilter' => $selectedSchoolYear,
                'classrooms' => $this->classroomService->handleGetSchoolClassrooomJournal(auth()->id(), $selectedSchoolYear),
            ];
            return view('dashboard.admin.pages.exam.index', $data);
        } else {
            $data = $this->GetDataSidebar();
            $schoolYear = SchoolYearHelper::get_current_school_year();
            $selectedSchoolYear = 0;
            if ($schoolYear) {
                $selectedSchoolYear = $schoolYear->id;
            }
            if ($request->school_year) {
                $selectedSchoolYear = $request->school_year;
            }
            if (auth()->user()->roles->pluck('name')[0] == 'teacher') {
                $schools = (auth()->user()->teacherSchool->school_id);
                $data['schoolYear'] = $this->schoolYearService->handleGetAll();
                $data['schoolYearFilter'] = $selectedSchoolYear;
                $data['classrooms'] = $this->classroomService->handleGetSchoolClassrooomTeacher(auth()->id(),$schools, $selectedSchoolYear);
                return view('dashboard.user.pages.exam.index', $data, );
            } elseif (auth()->user()->roles->pluck('name')[0] == 'mentor') {
                $schools = (auth()->user()->mentorClassrooms[0]->classroom->school_id);
                $data['schoolYear'] = $this->schoolYearService->handleGetAll();
                $data['schoolYearFilter'] = $selectedSchoolYear;
                $data['classrooms'] = $this->classroomService->handleGetSchoolClassrooomMentor(auth()->id(), $selectedSchoolYear);
                return view('dashboard.user.pages.exam.index', $data, );
            }

        }
    }

    public function showClassroom(Request $request, User $school): view
    {
        $schoolYear = SchoolYearHelper::get_current_school_year();
        $selectedSchoolYear = 0;
        if ($schoolYear) {
            $selectedSchoolYear = $schoolYear->id;
        }
        if ($request->school_year) {
            $selectedSchoolYear = $request->school_year;
        }
        $schoolYear = $this->schoolYearService->handleGetAll();
        $schoolYearFilter = $selectedSchoolYear;
        $schools = $school->id;
        $classrooms = $this->classroomService->handleGetSchoolClassrooomReport($schools, $selectedSchoolYear);
        return view('dashboard.admin.pages.exam.showClassroom', compact('schoolYear', 'classrooms', 'schoolYearFilter', 'schools'));
    }

    public function showStudent(Classroom $classroom): view
    {
        if (auth()->user()->roles->pluck('name')[0] == 'admin') {
            $classroom = StudentClassroom::where('classroom_id', $classroom->id)->get();
            $data = [
                'students' => $classroom,
            ];
            return view('dashboard.admin.pages.exam.showStudent', $data);
        } elseif (auth()->user()->roles->pluck('name')[0] == 'school') {
            $classroom = StudentClassroom::where('classroom_id', $classroom->id)->get();
            $data = [
                'students' => $classroom,
            ];
            return view('dashboard.admin.pages.exam.showStudent', $data);
        } else {
            $data = $this->GetDataSidebar();
            $classroom = StudentClassroom::where('classroom_id', $classroom->id)->get();
            $data['students'] = $classroom;
            return view('dashboard.user.pages.exam.showStudent', $data);
        }

    }

    public function showEvaluation(User $student): view
    {
        $data = [
            'student' => $student,
        ];
        return view('dashboard.admin.pages.exam.showEvaluation', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.pages.exam.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ExamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExamRequest $request)
    {
        $this->examService->handleCreate($request);
        $classroomId = $request->classroom_id;
        return to_route('admin.showStudent', $classroomId)->with('success', trans('Berhasil Menilai Ujain'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        $data = [
            'exam' => $exam,
        ];
        return view('dashboard.admin.pages.exam.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(ExamRequest $request, Exam $exam)
    {
        $this->examService->handleUpdate($request, $exam->id);
        $classroomId = $request->classroom_id;
        return to_route('admin.showStudent', $classroomId)->with('success', trans('Berhasil Mengedit Ujain'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        //
    }
}
