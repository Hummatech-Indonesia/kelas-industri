<?php

namespace App\Http\Controllers;

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
        $selectedSchoolYear = 0;
        if($schoolYear){
            $selectedSchoolYear = $schoolYear->id;
        }
        if (request()->ajax()) {
            return $this->classroomService->handleGetBySchoolClassroom($request->schoolId);
        }
        $schoolYear = SchoolYear::all();
        $reports = $this->submitAssignmentService->handleGetReportStudent($request, $selectedSchoolYear);
        $schoolFilter = $request->school_id;
        $schoolYearFilter = $request->school_year;
        $classroomFilter = $request->classroom_id;
        $totalAssignment = $this->submitAssignmentService->handleGetTotalAssignment();
        $schools = $this->userService->handleGetAllSchool();
        return view('dashboard.admin.pages.report.index', compact('reports','totalAssignment','schools', 'schoolYear', 'schoolFilter', 'schoolYearFilter', 'classroomFilter'));
    }
}
