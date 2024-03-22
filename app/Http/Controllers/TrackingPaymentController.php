<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Models\User;
use App\Services\DependentService;
use App\Services\PaymentService;
use App\Services\SchoolService;
use App\Services\StudentService;
use App\Services\UserServices;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TrackingPaymentController extends Controller
{
    private SchoolService $service;
    private UserServices $userService;
    private PaymentService $servicePayment;
    private StudentService $studentService;
    private DependentService $serviceDependent;

    public function __construct(SchoolService $service, UserServices $userService, PaymentService $servicePayment, StudentService $studentService, DependentService $serviceDependent)
    {
        $this->service = $service;
        $this->userService = $userService;
        $this->servicePayment = $servicePayment;
        $this->studentService = $studentService;
        $this->serviceDependent = $serviceDependent;
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

        if (request()->has('search')) {
            $schools = $this->service->handleSearch(request()->search);
            $parameters = request()->query();
        }
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
        //
        $request->validated();
        $this->servicePayment->handleStore($request);
        return redirect()->back();
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
        return redirect()->back();
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

    public function allStudent(string $schoolId)
    {
        $data['students'] = $this->studentService->handleGetBySchoolPayment($schoolId);
        return view('dashboard.finance.pages.trackingPayment.student', $data);
    }

    public function detailStudent(string $classroom, string $user)
    {
        $data['student'] = $this->userService->handleGetById($user);
        $data['dependents'] = $this->serviceDependent->handleGetAllByClassroom($classroom);
        $data['trackings'] = $this->servicePayment->handleGetByStudent($user);
        $data['user'] = $user;
        return view('dashboard.finance.pages.trackingPayment.detailStudent', $data);
    }
}
