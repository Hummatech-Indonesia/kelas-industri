<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Payment;
use App\Models\Challenge;
use App\Models\Dependent;
use App\Models\Assignment;
use App\Traits\DataSidebar;
use Illuminate\Http\Request;
use App\Models\SchoolPackage;
use App\Services\PointService;
use App\Services\UserServices;
use App\Helpers\SemesterHelper;
use App\Services\MentorService;
use App\Services\SalaryService;
use App\Services\SchoolService;
use App\Services\JournalService;
use App\Services\PaymentService;
use App\Services\StudentService;
use App\Services\TeacherService;
use App\Helpers\SchoolYearHelper;
use App\Services\MaterialService;
use App\Services\ChallengeService;
use App\Services\ClassroomService;
use App\Services\DependentService;
use App\Services\AssignmentService;
use App\Services\AttendanceService;
use App\Services\PresentationService;
use App\Services\ZoomScheduleService;
use App\Services\SchoolPackageService;
use Symfony\Component\VarDumper\VarDumper;
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
    private DependentService $dependentService;
    private SalaryService $salaryService;
    private PaymentService $paymentService;
    private SchoolPackageService $schoolPackageService;
    private AttendanceService $attendanceService;
    private PresentationService $presentationService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TeacherService $teacherService, StudentService $studentService, UserServices $userService, AssignmentService $assignmentService, MentorService $mentorService, ChallengeService $challengeService, MaterialService $materialService, PointService $pointService, ZoomScheduleService $zoomScheduleService, ClassroomService $classroomService, JournalService $journalService, SchoolService $schoolService, DependentService $dependentService, SalaryService $salaryService, PaymentService $paymentService, AttendanceService $attendanceService, SchoolPackageService $schoolPackageService, PresentationService $presentationService)
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
        $this->dependentService = $dependentService;
        $this->salaryService = $salaryService;
        $this->paymentService = $paymentService;
        $this->schoolPackageService = $schoolPackageService;
        $this->attendanceService = $attendanceService;
        $this->presentationService = $presentationService;
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(Request $request)
    {
        // // Mendapatkan semua siswa
        // $students = User::whereRelation('roles', 'name', 'student')->get();

        // // Loop melalui setiap siswa
        // foreach ($students as $student) {
        //     // Mendapatkan pembayaran siswa dengan tagihan belum lunas
        //     $unpaidPayments = $student->payment()->whereColumn('paid_amount', '<', 'fee_amount')->get();

        //     dd($unpaidPayments);
        //     // Lakukan sesuatu dengan pembayaran yang belum lunas
        //     // foreach ($unpaidPayments as $payment) {
        //     //     // Lakukan tindakan yang diperlukan
        //     // }
        // }

        $role = auth()->user()->roles->pluck('name')[0];
        $userId = auth()->id();

        $paymentStundent = $this->paymentService->handleGetGroupByMonth();
        $schoolPackage = $this->schoolPackageService->handleGetGroupByMonth();
        $salary = $this->salaryService->handleGetGroupByMonth();
        $incomes = [
            'Jan' => 0,
            'Feb' => 0,
            'Mar' => 0,
            'Apr' => 0,
            'Mei' => 0,
            'Jun' => 0,
            'Jul' => 0,
            'Agt' => 0,
            'Sep' => 0,
            'Okt' => 0,
            'Nov' => 0,
            'Des' => 0
        ];
        $spents = [
            'Jan' => 0,
            'Feb' => 0,
            'Mar' => 0,
            'Apr' => 0,
            'Mei' => 0,
            'Jun' => 0,
            'Jul' => 0,
            'Agt' => 0,
            'Sep' => 0,
            'Okt' => 0,
            'Nov' => 0,
            'Des' => 0
        ];
        $depts = [
            'Jan' => 0,
            'Feb' => 0,
            'Mar' => 0,
            'Apr' => 0,
            'Mei' => 0,
            'Jun' => 0,
            'Jul' => 0,
            'Agt' => 0,
            'Sep' => 0,
            'Okt' => 0,
            'Nov' => 0,
            'Des' => 0
        ];

        foreach ($incomes as $key => $value) {
            if (isset($paymentStundent[$key])) {
                $incomes[$key] += $paymentStundent[$key];
            }
            if (isset($schoolPackage[$key])) {
                if ($schoolPackage[$key]['dept']) {
                    $depts[$key] = $schoolPackage[$key]['dept'];
                }
                if ($schoolPackage[$key]['paid']) {
                    $incomes[$key] += $schoolPackage[$key]['paid'];
                }
            }
            if (isset($salary[$key])) {
                $spents[$key] += $salary[$key];
            }
        }

        if ($role == 'admin') {
            $data['school'] = count($this->userService->handleGetAllSchool());
            $data['material'] = $this->materialService->handleCountMaterialAdmin();
            $data['mentor'] = count($this->userService->handleGetAllMentor());
            $data['student'] = count($this->userService->handleGetAllStudent());
            $data['incomes'] = $incomes;
            $data['spents'] = $spents;
            $data['depts'] = $depts;

            return view('dashboard.admin.pages.home', $data);
        }
        $currentSchoolYear = SchoolYearHelper::get_current_school_year();

        // dashboard school
        if ($role == 'school') {
            $data['teacher'] = count($this->teacherService->handleGetBySchool($userId));
            $data['classroom'] = count($this->classroomService->handleGetBySchool($userId, $currentSchoolYear->id));
            $data['jurnal'] = count($this->journalService->handleGetBySchool());
            $data['student'] = count($this->studentService->handleGetBySchool($userId));
            $data['incomes'] = $incomes;
            $data['spents'] = $spents;
            $data['depts'] = $depts;
            $data['studentPayment'] = $this->paymentService->handleBySchoolGroupUser($this->dependentService->handleGetLatest(), $userId);
            $data['rankings'] = $this->pointService->handleGetPointStudentBySchool($userId);
            return view('dashboard.admin.pages.home', $data);
        }
        if ($role == 'administration') {
            $data = [
                'guru' => count($this->userService->handleCountTeacher()),
                'mentor' => count($this->userService->handleCountMentor()),
                'schools' => $this->userService->handleGetAllSchoolWithPackage(),
                'incomes' => $incomes,
                'depts' => $depts,
                'spents' => $spents,
            ];
            $data['teachersJournal'] = $this->journalService->handleCountJournalByFilter($request, $data['schools'][0]->id, 'teacher');
            $data['mentorsJournal'] = $this->journalService->handleCountJournalByFilter($request, $data['schools'][0]->id, 'mentor');
            $data['schoolPackages'] = $this->userService->handleCountSchoolPackages($data['schools']);
            $data['countAttendance'] = $this->attendanceService->handleCountMentorAttendanceMonthYear($request);

            if($this->dependentService->handleGetLatest()) {
                $data['studentPayment'] = $this->paymentService->handleGetGroupUser($this->dependentService->handleGetLatest());
            }
            return view('dashboard.finance.pages.home', $data);
        }
        $data = $this->GetDataSidebar();
        if ($role == 'student') {
            $currentSemester = SemesterHelper::get_current_semester(auth()->user()->studentSchool->studentClassroom->classroom_id);
            $semester = $currentSemester == null ? 0 : $currentSemester->semester;
            $data['assignment'] = $this->assignmentService->handleCountAssignmentStudent();
            $data['challenge'] = $this->challengeService->handleCountChallengeStudent();
            $data['material'] = $this->materialService->handleCountMaterialUser();
            $data['point'] = $this->pointService->hanleCountPointStudent($userId);
            $data['zoom'] = $this->zoomScheduleService->handleGetZoomScheduleStudent();
            $payment = $this->paymentService->handleGetTotalPayment($semester, auth()->user()->id);
            $dependent = $this->dependentService->handleGetTotalDependent($semester, auth()->user()->studentSchool->studentClassroom->classroom_id);
            $nominalPayment = $payment == null ? 0 : $payment;
            $nominalDependent = $dependent == null ? 0 : $dependent->nominal;
            $data['totalPayment'] = $nominalDependent - $nominalPayment;

            $assignments = Assignment::with('StudentSubmitAssignment')->whereRelation('submaterial.material', function ($query) {
                $query->where('generation_id', Auth()->user()->studentSchool->studentClassroom->classroom->generation_id);
            })->get();

            $belumDikerjakan = [];
            $tidakDikerjakan = [];
            $sudahDikerjakan = [];

            foreach ($assignments as $assignment) {
                $submitAssignments = $assignment->StudentSubmitAssignment->where('student_id', auth()->id());
                if (count($submitAssignments)) {
                    array_push($sudahDikerjakan, $submitAssignments);
                } elseif ($assignment->end_date < now() || $submitAssignments == null) {
                    array_push($tidakDikerjakan, $submitAssignments);
                } elseif ($assignment->end_date > now() || $submitAssignments == null) {
                    array_push($belumDikerjakan, $submitAssignments);
                }
            }

            $data['sudah'] = count($sudahDikerjakan);
            $data['belum'] = count($belumDikerjakan);
            $data['tidak'] = count($tidakDikerjakan);

            $challenges = Challenge::with('StudentChallenge')->where('classroom_id', Auth()->user()->studentSchool->studentClassroom->classroom_id)->whereRelation('classroom', function ($query) {
                $query->where('generation_id', Auth()->user()->studentSchool->studentClassroom->classroom->generation_id);
            })->get();

            $challengeBelumDikerjakan = [];
            $challengeTidakDikerjakan = [];
            $challengeSudahDikerjakan = [];

            foreach ($challenges as $challenge) {
                $submitChallenges = $challenge->StudentChallenge->where('student_school_id', auth()->user()->studentSchool->id);
                if (count($submitChallenges)) {
                    array_push($challengeSudahDikerjakan, $submitChallenges);
                } elseif ($challenge->end_date < now() || $submitChallenges == null) {
                    array_push($challengeTidakDikerjakan, $submitChallenges);
                } elseif ($challenge->end_date > now() || $submitChallenges == null) {
                    array_push($challengeBelumDikerjakan, $submitChallenges);
                }
            }

            $data['sudahChallenge'] = count($challengeSudahDikerjakan);
            $data['belumChallenge'] = count($challengeBelumDikerjakan);
            $data['tidakChallenge'] = count($challengeTidakDikerjakan);
        } elseif ($role == 'teacher') {
            $data['classroom'] = $this->classroomService->handleCountClassroomTeacher($userId);
            $data['material'] = $this->materialService->handleCountMaterialUser($currentSchoolYear->id);
            $data['jurnal'] = $this->journalService->handleCountJournalTeacher($userId);
            $data['challenge'] = $this->challengeService->handleCountChallengeTeacher($userId, $currentSchoolYear->id);
            $data['zoom'] = $this->zoomScheduleService->handleGetZoomScheduleTeacher();
            $data['lastestChallenge'] = $this->challengeService->handleGetLatestByMentor($userId);
            $data['salary'] = $this->salaryService->handleByUserThisMonth($userId);
        } elseif ($role == 'mentor') {
            $data['classroom'] = $this->classroomService->handleCountClassroomMentor($userId);
            $data['material'] = $this->materialService->handleCountMaterialUser($currentSchoolYear->id);
            $data['jurnal'] = $this->journalService->handleCountJournalMentor($userId);
            $data['challenge'] = $this->challengeService->handleCountChallengeMentor($userId, $currentSchoolYear->id);
            $data['attendance'] = $this->attendanceService->handleCountSubmitAttendance();
            $data['zoom'] = $this->zoomScheduleService->handleGetZoomScheduleMentor();
            $data['presentationZoom'] = $this->presentationService->getNearestPresentation(auth()->user());
            $data['lastestChallenge'] = $this->challengeService->handleGetLatestByMentor($userId);
            $data['salary'] = $this->salaryService->handleByUserThisMonth($userId);
            // dd($data['salary']);
        }
        return view('dashboard.user.pages.home', $data);
    }

    public function semester($semester)
    {
        $data['totalBayar'] = Payment::where('semester', $semester)->where('invoice_status', 'paid')->where('user_id', auth()->user()->id)->sum('total_pay');
        $data['nominal'] = Dependent::where('semester', $semester)->where('classroom_id', auth()->user()->studentSchool->studentClassroom->classroom->id)->select('nominal')->first();
        return response()->json($data);
    }
    public function schoolTrackingSemester($semester, $userId)
    {
        $user = User::find($userId);
        $data['totalBayar'] = Payment::where('semester', $semester)->where('user_id', $userId)->sum('total_pay');
        $data['nominal'] = Dependent::where('semester', $semester)->where('classroom_id', $user->studentSchool->studentClassroom->classroom->id)->select('nominal')->first();
        return response()->json($data);
    }

    public function showExam(): mixed {
        $data = $this->GetDataSidebar();
        return view('dashboard.user.pages.studentExam.index', $data);
    }
}
