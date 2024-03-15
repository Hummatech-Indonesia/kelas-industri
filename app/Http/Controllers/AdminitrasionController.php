<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdministrationRequest;
use App\Http\Requests\SalaryRequest;
use App\Services\AttendanceService;
use App\Services\GenerationService;
use App\Services\JournalService;
use App\Services\SalaryService;
use App\Services\SchoolYearService;
use App\Services\TeacherService;
use App\Services\UserServices;
use App\Traits\DataSidebar;
use Illuminate\Http\Request;

class AdminitrasionController extends Controller
{
    use DataSidebar;
    private UserServices $userServices;
    private SalaryService $salaryServices;
    private TeacherService $teacherServices;
    private AttendanceService $attendanceServices;
    private SchoolYearService $schoolYearServices;
    private GenerationService $generationServices;
    private JournalService $journalServices;

    public function __construct(UserServices $userServices, SalaryService $salaryServices, TeacherService $teacherServices, AttendanceService $attendanceServices, SchoolYearService $schoolYearServices, GenerationService $generationServices, JournalService $journalServices)
    {
        $this->userServices = $userServices;
        $this->salaryServices = $salaryServices;
        $this->teacherServices = $teacherServices;
        $this->schoolYearServices = $schoolYearServices;
        $this->generationServices = $generationServices;
        $this->attendanceServices = $attendanceServices;
        $this->journalServices = $journalServices;
    }

    public function index()
    {
        $akun = $this->userServices->handleGetKeuangan(6);
        $data = $this->GetDataSidebar();
        $data['akun'] = $akun;
        return view('dashboard.admin.pages.administration.index', $data);
    }

    public function dashFinance()
    {
        return view('dashboard.finance.pages.home');
    }

    public function create()
    {
        //
        return view('dashboard.admin.pages.administration.create');
    }

    public function store(AdministrationRequest $request)
    {
        //
        $this->userServices->storeAdministration($request);

        return to_route('admin.administrations.index')->with('success', trans('alert.add_success'));
    }

    public function edit($id)
    {
        $data = [
            'akun' => $this->userServices->handleEditKeuangan($id),
        ];

        return view('dashboard.admin.pages.administration.edit', $data);
    }

    public function update(AdministrationRequest $request, string $id)
    {
        // dd($request->all());
        // dd($id);
        $this->userServices->handleUpdateKeuangan($request, $id);

        return to_route('admin.administrations.index')->with('success', trans('alert.update_success'));
    }

    public function destroy(string $id)
    {
        $this->userServices->handleDeleteKeuangan($id);
        return back()->with('success', trans('alert.delete_success'));
    }

    public function teacher(Request $request)
    {
        $data = [
            'teachers' => $this->salaryServices->HandleGetTeacherAdministration($request),
            'schools' => $this->salaryServices->handleGetSchool(),

        ];
        return view('dashboard.finance.pages.teacher.index', $data);
    }

    public function filterTeacher(Request $request)
    {
        $data = [
            'teachers' => $this->salaryServices->handleGetAllTeacherSchool($request->school_id, 6),
            'schools' => $this->salaryServices->handleGetSchool(),
        ];  
        return view('dashboard.finance.pages.teacher.index', $data);
    }

    public function showTeacher(Request $request, $id)
    {
        $data = [
            'guru' => $this->userServices->handleShowTeacher($id),
            'jurnals' => $this->journalServices->handleGetByTeacher($id),
            'getMonth' => $this->journalServices->getMonth($request, $id),
            'getMonthCount' => $this->journalServices->getMonthCount($request, $id),
        ];
        return view('dashboard.finance.pages.teacher.show', $data);
    }

    public function getMonth(Request $request, string $TeacherId): mixed
    {
        $data = $this->journalServices->getMonth($request, $TeacherId);
        return $data;
    }

    public function getMonthAttendance(Request $request, string $id): mixed
    {
        $data = $this->attendanceServices->getMonthAttendance($request, $id);
        return $data;
    }

    public function salaryTeacher(Request $request)
    {
        // dd($request->all());
        $data = [
            'schools' => $this->userServices->handleGetAllSchool(),
            'generations' => $this->generationServices->handleGetGeneration(),
            'teachers' => $this->teacherServices->handleGetAngkatan($request->school_id),
        ];
        return view('dashboard.finance.pages.salaryTeacher.index', $data);
    }

    public function showSalaryTeacher(Request $request)
    {
        $schools = $this->userServices->handleGetAllSchool();
        $teachers = $this->salaryServices->handleGetSalaryTeacher($request);

        return view('dashboard.finance.pages.salaryTeacher.history', compact('teachers', 'schools'));
    }

    public function showMentor(Request $request, string $id): mixed
    {
        $data = [
            'mentors' => $this->userServices->handleShowMentor($id),
            'attendances' => $this->attendanceServices->handleGetAttendanceMentor($id),
            'attendancesCountMonth' => $this->attendanceServices->attendancesCountMonth($request, $id),
        ];
        return view('dashboard.finance.pages.mentor.show', $data);
    }

    public function mentor(Request $request)
    {
        $data = [
            'mentors' => $this->userServices->handleGetAllMentorAdminis($request),
        ];
        return view('dashboard.finance.pages.mentor.index', $data);
    }

    public function salaryMentor(Request $request)
    {
        $data['attendances'] = $this->attendanceServices->countMentorAttendance($request);
        $data['attendancesMonth'] = $this->attendanceServices->countMentorAttendanceMonth();
        return view('dashboard.finance.pages.salaryMentor.index', $data);
    }
    public function createsalaryMentorTeacher(SalaryRequest $request)
    {
        $allFilesValid = true;
        $invalidFiles = [];
        foreach ($_FILES['photo']['tmp_name'] as $key => $file) {
            if (!$file) {
                $allFilesValid = false;
                $invalidFiles[] = $key + 1;
            }
        }
        if (!$allFilesValid) {
            $errorMessage = 'Photo tidak boleh kosong pada data ke ' . implode(', ', $invalidFiles);
            return redirect()->back()->with('error', $errorMessage);
        }

        if ($allFilesValid) {
            foreach ($_FILES['photo']['tmp_name'] as $key => $file) {
                $this->salaryServices->handleCreate($request);
            }

            if ($request->generation_id) {
                return to_route('administration.salaryTeacher.index')->with('success', trans('alert.add_success'));
            }

            return to_route('administration.salary-mentor.index')->with('success', trans('alert.add_success'));
        }
    }

    public function createsalaryMentorTeacherOne(Request $request)
    {
        $this->salaryServices->handleCreateOne($request);
        if ($request->generation_id) {
            return to_route('administration.salaryTeacher.index')->with('success', trans('alert.add_success'));
        }
        return to_route('administration.salary-mentor.index')->with('success', trans('alert.add_success'));
    }

    public function showSalaryMentor(Request $request)
    {
        $mentors = $this->salaryServices->handleGetSalaryMentor($request);

        return view('dashboard.finance.pages.salaryMentor.history', compact('mentors'));
    }
}
