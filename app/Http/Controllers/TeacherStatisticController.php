<?php

namespace App\Http\Controllers;

use App\Services\TeacherService;
use App\Services\UserServices;
use Illuminate\Http\Request;

class TeacherStatisticController extends Controller
{
    private TeacherService $teacherService;
    private UserServices $userServices;

    public function __construct(TeacherService $teacherService, UserServices $userServices) {
        $this->teacherService = $teacherService;
        $this->userServices = $userServices;
    }
    public function index()
    {
        $data['teacherSchools'] = $this->teacherService->handleGetStatistic('acc3d7a7-fd17-345c-93b2-b6d5c195fbf0');
        return view('dashboard.admin.pages.teacher-statistic.index', $data);
    }
}
