<?php

namespace App\Http\Controllers;

use App\Helpers\SchoolYearHelper;
use App\Models\SubmitAttendance;
use App\Services\AssignmentService;
use App\Services\ChallengeService;
use App\Services\ClassroomService;
use App\Services\JournalService;
use App\Services\MaterialService;
use App\Services\MentorService;
use App\Services\PointService;
use App\Services\SchoolService;
use App\Services\StudentService;
use App\Services\TeacherService;
use App\Services\UserServices;
use App\Services\ZoomScheduleService;
use App\Traits\DataSidebar;
use Carbon\Carbon;
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
    private SchoolService $schoolService;
    private MentorService $mentorService;
    private UserServices $userService;
    private StudentService $studentService;
    private TeacherService $teacherService;
    private ZoomScheduleService $zoomScheduleService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TeacherService $teacherService, StudentService $studentService, UserServices $userService, AssignmentService $assignmentService, MentorService $mentorService, ChallengeService $challengeService, MaterialService $materialService, PointService $pointService, ZoomScheduleService $zoomScheduleService, ClassroomService $classroomService, JournalService $journalService, SchoolService $schoolService)
    {
        $this->middleware('auth');
        $this->assignmentService = $assignmentService;
        $this->challengeService = $challengeService;
        $this->materialService = $materialService;
        $this->pointService = $pointService;
        $this->zoomScheduleService = $zoomScheduleService;
        $this->classroomService = $classroomService;
        $this->journalService = $journalService;
        $this->schoolService = $schoolService;
        $this->userService = $userService;
        $this->studentService = $studentService;
        $this->teacherService = $teacherService;

    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $role = auth()->user()->roles->pluck('name')[0];
        $userId = auth()->id();
        if ($role == 'admin') {
            $data['school'] = count($this->userService->handleGetAllSchool());
            $data['material'] = $this->materialService->handleCountMaterialAdmin();
            $data['mentor'] = count($this->userService->handleGetAllMentor());
            $data['student'] = count($this->userService->handleGetAllStudent());
            return view('dashboard.admin.pages.home', $data, compact('dataTanggal', 'dataMasuk'));
        }
        $currentSchoolYear = SchoolYearHelper::get_current_school_year();
        if ($role == 'school') {
            $data['teacher'] = count($this->teacherService->handleGetBySchool($userId));
            $data['classroom'] = count($this->classroomService->handleGetBySchool($userId, $currentSchoolYear->id));
            $data['jurnal'] = count($this->journalService->handleGetBySchool());
            $data['student'] = count($this->studentService->handleGetBySchool($userId));
            return view('dashboard.admin.pages.home', $data);
        }
        $data = $this->GetDataSidebar();
        if ($role == 'student') {
            $data['assignment'] = $this->assignmentService->handleCountAssignmentStudent();
            $data['challenge'] = $this->challengeService->handleCountChallengeStudent();
            $data['material'] = $this->materialService->handleCountMaterialUser($currentSchoolYear->id);
            $data['point'] = $this->pointService->hanleCountPointStudent($userId);
            $data['doneAssignment'] = $this->getDoneAssignment($userId, $currentSchoolYear->id);
            $data['doneChallenge'] = $this->getDoneChallenge($currentSchoolYear->id);
            $data['zoom'] = $this->zoomScheduleService->handleGetZoomScheduleStudent();
        } elseif ($role == 'teacher') {
            $data['classroom'] = $this->classroomService->handleCountClassroomTeacher($userId);
            $data['material'] = $this->materialService->handleCountMaterialUser($currentSchoolYear->id);
            $data['jurnal'] = $this->journalService->handleCountJournalTeacher($userId);
            $data['challenge'] = $this->challengeService->handleCountChallengeTeacher($userId, $currentSchoolYear->id);
            $data['zoom'] = $this->zoomScheduleService->handleGetZoomScheduleTeacher();
        } elseif ($role == 'mentor') {
            $data['classroom'] = $this->classroomService->handleCountClassroomMentor($userId);
            $data['material'] = $this->materialService->handleCountMaterialUser($currentSchoolYear->id);
            $data['jurnal'] = $this->journalService->handleCountJournalMentor($userId);
            $data['challenge'] = $this->challengeService->handleCountChallengeMentor($userId, $currentSchoolYear->id);
            $data['zoom'] = $this->zoomScheduleService->handleGetZoomScheduleMentor();
        }
        return view('dashboard.user.pages.home', $data);
    }
}
