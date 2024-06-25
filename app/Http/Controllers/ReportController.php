<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Classroom;
use App\Models\SchoolYear;
use App\Traits\DataSidebar;
use Illuminate\Http\Request;
use App\Services\UserServices;
use App\Helpers\SchoolYearHelper;
use App\Services\ClassroomService;
use App\Services\SchoolYearService;
use App\Services\SubmitAssignmentService;

class ReportController extends Controller
{
    //
    use DataSidebar;
    private SubmitAssignmentService $submitAssignmentService;
    private UserServices $userService;
    private ClassroomService $classroomService;
    private SchoolYearService $schoolYearService;

    public function __construct(SubmitAssignmentService $submitAssignmentService, UserServices $userService, ClassroomService $classroomService, SchoolYearService $schoolYearService)
    {
        $this->submitAssignmentService = $submitAssignmentService;
        $this->userService = $userService;
        $this->classroomService = $classroomService;
        $this->schoolYearService = $schoolYearService;
    }

    public function index(Request $request)
    {
            $schoolYear = SchoolYearHelper::get_current_school_year();
            $schoolFilter = $request->school_id;
            $schools = $this->userService->handleGetAllSchool();
            return view('dashboard.admin.pages.report.index', compact('schools', 'schoolFilter'));
    }

    public function showStudent(Classroom $classroom)
    {
        $data = $this->GetDataSidebar();
        $data['reports'] = $this->submitAssignmentService->handleGetReportStudent($classroom->id);
        $data['totalAssignment'] = $this->submitAssignmentService->handleGetTotalAssignment();
        return view('dashboard.user.pages.raport.index', $data);
    }

    public function show(User $school, Request $request)
    {
        $schoolYear = SchoolYearHelper::get_current_school_year();
        $selectedSchoolYear = 0;
        if($schoolYear){
            $selectedSchoolYear = $schoolYear->id;
        }
        if($request->school_year){
            $selectedSchoolYear = $request->school_year;
        }
        $schoolYear = $this->schoolYearService->handleGetAll();
        $schoolYearFilter = $selectedSchoolYear;
        $schools = $school->id;
        $classrooms = $this->classroomService->handleGetSchoolClassrooomReport($schools, $selectedSchoolYear);
        return view('dashboard.admin.pages.report.show', compact('schoolYear','classrooms', 'schoolYearFilter', 'schools'));

    }

    public function detail(Classroom $classroom){
        $reports = $this->submitAssignmentService->handleGetReportStudent($classroom->id);
        $totalAssignment = $this->submitAssignmentService->handleGetTotalAssignment();
        // $totalAcceptAssignment = $this->submitAssignmentService->handleGetTotalAcceptAssignment();
        // dd($totalAcceptAssignment);
        return view('dashboard.admin.pages.report.detail', compact('reports','totalAssignment'));
    }

    public function showClassroom(Request $request){
        $schoolYear = SchoolYearHelper::get_current_school_year();
        $data = $this->GetDataSidebar();
        $selectedSchoolYear = 0;
        if ($schoolYear) {
            $selectedSchoolYear = $schoolYear->id;
        }
        if ($request->school_year) {
            $selectedSchoolYear = $request->school_year;
        }
        $schools = (auth()->user()->teacherSchool->school_id);
        $data['schoolYear'] = SchoolYear::all();
        $data['schoolYearFilter'] = $selectedSchoolYear;
        $data['classrooms'] = $this->classroomService->handleGetSchoolClassrooomTeacher(auth()->id(),$schools, $selectedSchoolYear);
        return view('dashboard.user.pages.raport.showClassroom', $data);
    }

    // public function printReport
}
