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
        $data = $this->GetDataSidebar();
        return view('dashboard.finance.pages.home', $data);
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

        return redirect()->back();
    }




    public function teacher(Request $request)
    {
        $data = [
            'salarys' => $this->salaryServices->handleGetTeacher($request),
        ];
        return view('dashboard.finance.pages.teacher.index', $data);
    }

    public function createTeacher()
    {
        return view('dashboard.finance.pages.teacher.create');
    }

    public function editTeacher()
    {
        return view('dashboard.finance.pages.teacher.edit');
    }

    public function editPassTeacher()
    {
        return view('dashboard.finance.pages.teacher.changePassword');
    }











    public function salaryTeacher()
    {
        $data = [
            'schools' => $this->userServices->handleGetAllSchool(),
            'generations' => $this->generationServices->handleGetGeneration(),
        ];
        return view('dashboard.finance.pages.salaryTeacher.index', $data);
    }

    public function getTeacherBySchool(): mixed
    {
        return $this->teacherServices->handleGetAngkatan(request()->schoolId);
    }

    public function createsalaryTeacher()
    {
        return view('dashboard.finance.pages.salaryTeacher.create');
    }
    public function editsalaryTeacher()
    {
        return view('dashboard.finance.pages.salaryTeacher.show');
    }






    public function mentor(Request $request)
    {
        $data = [
            'mentors' => $this->userServices->handleGetAllMentor($request),
        ];
        return view('dashboard.finance.pages.mentor.index', $data);
    }

    public function createMentor()
    {
        return view('dashboard.finance.pages.mentor.create');
    }

    public function editMentor()
    {
        return view('dashboard.finance.pages.mentor.edit');
    }

    public function editPassMentor()
    {
        return view('dashboard.finance.pages.mentor.changePassword');
    }






    public function salaryMentor()
    {
        $data['attendances'] = $this->attendanceServices->countMentorAttendance();
        return view('dashboard.finance.pages.salaryMentor.index', $data);
    }
    public function createsalaryMentor(SalaryRequest $request)
    {
        // dd($request->all());
        $this->salaryServices->handleCreate($request);
        if ($request->generation_id) {
            return to_route('administration.salaryTeacher.index')->with('success', trans('alert.add_success'));
        }
        return to_route('administration.salary-mentor.create')->with('success', trans('alert.add_success'));
    }
    public function editsalaryMentor()
    {
        return view('dashboard.finance.pages.salaryMentor.show');
    }
}
