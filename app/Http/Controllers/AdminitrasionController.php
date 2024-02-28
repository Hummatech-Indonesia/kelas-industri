<?php

namespace App\Http\Controllers;


use App\Models\User;
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

    public function destroy(string $id){
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











    public function salaryTeacher(Request $request)
    {
        // dd($request->all());
        $data = [
            'schools' => $this->userServices->handleGetAllSchool(),
            'generations' => $this->generationServices->handleGetGeneration(),
            'teachers' => $this->teacherServices->handleGetAngkatan($request->school_id)
        ];
        return view('dashboard.finance.pages.salaryTeacher.index', $data);
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
            'mentors' => $this->userServices->handleGetAllMentorAdminis($request),
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
    public function createsalaryMentorTeacher(SalaryRequest $request)
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
