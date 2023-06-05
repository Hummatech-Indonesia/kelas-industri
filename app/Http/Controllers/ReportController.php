<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\SchoolYearHelper;
use App\Services\SubmitAssignmentService;

class ReportController extends Controller
{
    //
    private SubmitAssignmentService $submitAssignmentService;

    public function __construct(SubmitAssignmentService $submitAssignmentService)
    {
        $this->submitAssignmentService = $submitAssignmentService;
    }

    public function index()
    {
        $currentSchoolYear = SchoolYearHelper::get_current_school_year();
        $reports = $this->submitAssignmentService->handleGetReportStudent($currentSchoolYear);
        $totalAssignment = $this->submitAssignmentService->handleGetTotalAssignment();
        return view('dashboard.admin.pages.report.index', compact('reports','totalAssignment'));
    }
}
