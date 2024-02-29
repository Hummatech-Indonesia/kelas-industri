<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdministrationRequest;
use App\Http\Requests\SalaryRequest;
use App\Services\AttendanceService;
use App\Services\GenerationService;
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

    public function __construct(UserServices $userServices, SalaryService $salaryServices, TeacherService $teacherServices, AttendanceService $attendanceServices, SchoolYearService $schoolYearServices, GenerationService $generationServices)
    {
        $this->userServices = $userServices;
        $this->salaryServices = $salaryServices;
        $this->teacherServices = $teacherServices;
        $this->schoolYearServices = $schoolYearServices;
        $this->generationServices = $generationServices;
        $this->attendanceServices = $attendanceServices;
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
        ];
        return view('dashboard.finance.pages.teacher.index', $data);
    }

    public function showTeacher($id)
    {
        $data = [
            'guru' => $this->userServices->handleShowTeacher($id),
        ];
        return view('dashboard.finance.pages.teacher.show', $data);
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
    public function showSalaryTeacher()
    {
        $teachers = $this->salaryServices->handleGetSalaryTeacher();

        return view('dashboard.finance.pages.salaryTeacher.history', compact('teachers'));
    }

    public function mentor(Request $request)
    {
        $data = [
            'mentors' => $this->userServices->handleGetAllMentorAdminis($request),
        ];
        return view('dashboard.finance.pages.mentor.index', $data);
    }

    public function salaryMentor()
    {
        $data['attendances'] = $this->attendanceServices->countMentorAttendance();
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

            return to_route('administration.salary-mentor.create')->with('success', trans('alert.add_success'));
        }
    }
    public function showSalaryMentor()
    {
        $mentors = $this->salaryServices->handleGetSalaryMentor();

        return view('dashboard.finance.pages.salaryMentor.history', compact('mentors'));
    }
}
