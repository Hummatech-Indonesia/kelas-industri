<?php

namespace App\Http\Controllers;

use App\Exports\StudentExport;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\UserServices;
use App\Services\SchoolService;
use App\Services\PaymentService;
use App\Services\StudentService;
use App\Services\ClassroomService;
use App\Services\DependentService;
use App\Http\Requests\PaymentRequest;
use App\Services\SchoolPackageService;
use Maatwebsite\Excel\Facades\Excel;

class TrackingPaymentController extends Controller
{
    private SchoolService $service;
    private UserServices $userService;
    private PaymentService $servicePayment;
    private StudentService $studentService;
    private DependentService $serviceDependent;
    private ClassroomService $classroomService;
    private SchoolPackageService $schooolPackageService;

    public function __construct(SchoolService $service, UserServices $userService, PaymentService $servicePayment, StudentService $studentService, DependentService $serviceDependent, ClassroomService $classroomService)
    {
        $this->service = $service;
        $this->userService = $userService;
        $this->servicePayment = $servicePayment;
        $this->studentService = $studentService;
        $this->serviceDependent = $serviceDependent;
        $this->classroomService = $classroomService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $schools = $this->service->handleGetPaginate();
        $parameters = null;

        if (request()->has('status') || request()->has('search')) {
            $schools = $this->service->handleFilter(request()->status, request()->search);
            $parameters = request()->query();
        }
        $countStudents = null;

        foreach ($schools as $school) {
            $schoolId = $school->id;
            $countStudent = $this->service->handleCountStudent($schoolId);
            $countStudents[$schoolId] = $countStudent->count();
        }
        $data = [
            'countStudents' => $countStudents,
            'schools' => $schools,
            'parameters' => $parameters,
        ];
        return view('dashboard.finance.pages.trackingPayment.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentRequest $request)
    {
        $this->servicePayment->handleStore($request);
        return redirect()->back()->with('success', trans('alert.add_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $userId
     * @return View
     */
    public function show($userId)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PaymentRequest $request, string $payment)
    {
        //
        $request->validated();
        $this->servicePayment->handleUpdate($payment, $request);
        return redirect()->back()->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function allStudent(User $school, Request $request)
    {
        $data = [
            'classrooms' => $this->classroomService->handleGetBySchool($school->id),
            'students' => $this->studentService->handleGetBySchoolPayment($school->id, $request),
            'school' => $school,
        ];
        return view('dashboard.finance.pages.trackingPayment.student', $data);
    }

    /**
     * exportStudent
     *
     * @return void
     */
    public function exportStudent(User $school, Request $request)
    {
        return Excel::download(new StudentExport($this->studentService, $school, $request), 'student.xlsx');
    }

    public function detailStudent(string $classroom, string $user)
    {
        $data['student'] = $this->userService->handleGetById($user);
        $data['dependents'] = $this->serviceDependent->handleGetAllByClassroom($classroom);
        $data['trackings'] = $this->servicePayment->handleGetByStudent($user);
        $data['user'] = $user;
        return view('dashboard.finance.pages.trackingPayment.detailStudent', $data);
    }
    public function schoolDetailStudent(string $classroom, string $user)
    {
        $data['student'] = $this->userService->handleGetById($user);
        $data['dependents'] = $this->serviceDependent->handleGetAllByClassroom($classroom);
        $data['trackings'] = $this->servicePayment->handleGetByStudent($user);
        $data['user'] = $user;
        return view('dashboard.admin.pages.trackingPayment.detailStudent', $data);
    }
    public function schoolAllStudent(Request $request)
    {
        $data = [
            'classrooms' => $this->classroomService->handleGetBySchool(auth()->user()->id),
            'students' => $this->studentService->handleGetBySchoolPayment(auth()->user()->id, $request),
            'school' => auth()->user(),
        ];
        return view('dashboard.admin.pages.trackingPayment.student', $data);
    }

    public function paymentMonitoring()
    {
        $schools = $this->service->handleGetPaginate();
        $parameters = null;

        if (request()->has('status') || request()->has('search')) {
            $schools = $this->service->handleFilter(request()->status, request()->search);
            $parameters = request()->query();
        }
        $countStudents = null;

        foreach ($schools as $school) {
            $schoolId = $school->id;
            $countStudent = $this->service->handleCountStudent($schoolId);
            $countStudents[$schoolId] = $countStudent->count();
        }
        $data = [
            'countStudents' => $countStudents,
            'schools' => $schools,
            'parameters' => $parameters,
        ];
        return view('dashboard.finance.pages.monitoringDependents.index', $data);
    }

    public function paymentAllStudent(Request $request, string $schoolId)
    {
        $data = [
            'classrooms' => $this->classroomService->handleGetBySchool($schoolId),
            'students' => $this->studentService->handleGetBySchoolPaymentWithDependent($schoolId, $request),
            'school' => auth()->user(),
        ];
        return view('dashboard.finance.pages.monitoringDependents.student', $data);
    }

    public function monitoringDetailStudent(string $classroom, string $user)
    {
        $data['student'] = $this->userService->handleGetById($user);
        $data['dependents'] = $this->serviceDependent->handleGetAllByClassroom($classroom);
        $data['trackings'] = $this->servicePayment->handleGetByStudent($user);
        $data['user'] = $user;
        return view('dashboard.finance.pages.monitoringDependents.detailStudent', $data);
    }
}
