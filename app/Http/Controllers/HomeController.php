<?php

namespace App\Http\Controllers;

use App\Traits\DataSidebar;
use App\Services\PointService;
use App\Services\JournalService;
use App\Helpers\SchoolYearHelper;
use App\Services\MaterialService;
use App\Services\ChallengeService;
use App\Services\ClassroomService;
use App\Services\AssignmentService;
use App\Services\ZoomScheduleService;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    use DataSidebar;
    private AssignmentService $assignmentService;
    private ChallengeService $challengeService;
    private MaterialService $materialService;
    private PointService $pointService;
    private ClassroomService $classroomService;
    private JournalService $journalService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AssignmentService $assignmentService, ChallengeService $challengeService, MaterialService $materialService, PointService $pointService, ZoomScheduleService $zoomScheduleService, ClassroomService $classroomService, JournalService $journalService)
    {
        $this->middleware('auth');
        $this->assignmentService = $assignmentService;
        $this->challengeService = $challengeService;
        $this->materialService = $materialService;
        $this->pointService = $pointService;
        $this->zoomScheduleService = $zoomScheduleService;
        $this->classroomService = $classroomService;
        $this->journalService = $journalService;
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {

        if (in_array(auth()->user()->roles->pluck('name')[0], ['admin', 'school'])) {
            return view('dashboard.admin.pages.home');
        }
        $currentSchoolYear = SchoolYearHelper::get_current_school_year();
        $data = $this->GetDataSidebar();
        if (auth()->user()->roles->pluck('name')[0] == 'student') {
            $data['assignment'] = $this->assignmentService->handleCountAssignmentStudent();
            $data['challenge'] = $this->challengeService->handleCountChallengeStudent();
            $data['material'] = $this->materialService->handleCountMaterialUser($currentSchoolYear->id);
            $data['point'] = $this->pointService->hanleCountPointStudent(auth()->id());
            $data['zoom'] = $this->zoomScheduleService->handleGetZoomScheduleStudent();
        } elseif(auth()->user()->roles->pluck('name')[0] == 'teacher') {
            $data['classroom'] = $this->classroomService->handleCountClassroomTeacher(auth()->id());
            $data['material'] = $this->materialService->handleCountMaterialUser($currentSchoolYear->id);
            $data['jurnal'] = $this->journalService->handleCountJournalTeacher(auth()->id());
            $data['challenge'] = $this->challengeService->handleCountChallengeTeacher(auth()->id());
        }
        return view('dashboard.user.pages.home', $data);
    }
}
