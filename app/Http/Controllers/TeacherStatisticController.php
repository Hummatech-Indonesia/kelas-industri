<?php

namespace App\Http\Controllers;

use App\Services\SchoolService;
use App\Services\TeacherService;
use App\Services\UserServices;
use Illuminate\Http\Request;

class TeacherStatisticController extends Controller
{
    private TeacherService $teacherService;
    private UserServices $userServices;
    private SchoolService $schoolService;

    public function __construct(TeacherService $teacherService, UserServices $userServices, SchoolService $schoolService)
    {
        $this->teacherService = $teacherService;
        $this->userServices = $userServices;
        $this->schoolService = $schoolService;
    }
    public function index(Request $request)
    {
        $data['schools'] = $schools = $this->userServices->handleGetAllSchool();
        return view('dashboard.admin.pages.teacher-statistic.index', $data);
    }

    public function show($school)
    {
        $data['teacherSchools'] = $this->teacherService->handleGetStatistic($school);
        return view('dashboard.admin.pages.teacher-statistic.show', $data);
    }
}
