<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Classroom;
use App\Models\SchoolYear;
use Illuminate\Http\Request;
use App\Services\UserServices;
use App\Helpers\SchoolYearHelper;
use App\Services\ClassroomService;
use App\Services\SubmitAssignmentService;

class ReportController extends Controller
{
    //
    private SubmitAssignmentService $submitAssignmentService;
    private UserServices $userService;
    private ClassroomService $classroomService;

    public function __construct(SubmitAssignmentService $submitAssignmentService, UserServices $userService, ClassroomService $classroomService)
    {
        $this->submitAssignmentService = $submitAssignmentService;
        $this->userService = $userService;
        $this->classroomService = $classroomService;
    }

    public function index(Request $request)
    {
        $schoolYear = SchoolYearHelper::get_current_school_year();
        $schoolFilter = $request->school_id;
        $schools = $this->userService->handleGetAllSchool();
        return view('dashboard.admin.pages.report.index', compact('schools', 'schoolFilter'));
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
        $schoolYear = SchoolYear::all();
        $schoolYearFilter = $request->school_year;
        $schools = $school->id;
        $classrooms = $this->classroomService->handleGetSchoolClassrooomReport($schools, $selectedSchoolYear);
        return view('dashboard.admin.pages.report.show', compact('schoolYear','classrooms', 'schoolYearFilter', 'schools'));

    }

    public function detail(Classroom $classroom){
        $reports = $this->submitAssignmentService->handleGetReportStudent($classroom->id);
        $totalAssignment = $this->submitAssignmentService->handleGetTotalAssignment();
        return view('dashboard.admin.pages.report.detail', compact('reports','totalAssignment'));
    }
}
