<?php

namespace App\Http\Controllers;

use App\Traits\DataSidebar;
use App\Services\PointService;
use App\Services\JournalService;
use App\Helpers\SchoolYearHelper;
use App\Models\TeacherSchool;
use App\Services\MaterialService;
use App\Services\ChallengeService;
use App\Services\ClassroomService;
use App\Services\AssignmentService;
use App\Services\MentorService;
use App\Services\SchoolService;
use App\Services\StudentService;
use App\Services\TeacherService;
use App\Services\UserServices;
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
    private SchoolService $schoolService;
    private MentorService $mentorService;
    private UserServices $userService;
    private StudentService $studentService;
    private TeacherService $teacherService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TeacherService $teacherService,StudentService $studentService,UserServices $userService,AssignmentService $assignmentService,MentorService $mentorService, ChallengeService $challengeService, MaterialService $materialService, PointService $pointService, ZoomScheduleService $zoomScheduleService, ClassroomService $classroomService, JournalService $journalService, SchoolService $schoolService)
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

        $currentSchoolYear = SchoolYearHelper::get_current_school_year();
        if (auth()->user()->roles->pluck('name')[0] == 'admin') {
            $data['school'] = count($this->userService->handleGetAllSchool());
            $data['material'] = $this->materialService->handleCountMaterialUser($currentSchoolYear->id);
            $data['mentor'] = count($this->userService->handleGetAllMentor());
            $data['student'] = count($this->userService->handleGetAllStudent()); 
            return view('dashboard.admin.pages.home',$data);
        }
        $currentSchoolYear = SchoolYearHelper::get_current_school_year();
        if (auth()->user()->roles->pluck('name')[0] == 'school') {
            $data['teacher'] = count($this->teacherService->handleGetBySchool(auth()->id()));
            $data['classroom'] = count($this->classroomService->handleGetBySchool(auth()->id(),$currentSchoolYear));
            $data['jurnal'] = count($this->journalService->handleGetBySchool());
            $data['student'] = count($this->studentService->handleGetBySchool(auth()->id())); 
            return view('dashboard.admin.pages.home',$data);
        }
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
