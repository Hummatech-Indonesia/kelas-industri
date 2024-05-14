<?php

namespace App\Http\Controllers;

use App\Http\Requests\DependentRequest;
use App\Models\Dependent;
use App\Models\Payment;
use App\Models\User;
use App\Services\ClassroomService;
use App\Services\DependentService;
use Illuminate\Http\Request;

class DependentController extends Controller
{
    //
    private DependentService $service;
    private ClassroomService $classroomService;

    public function __construct(DependentService $service, ClassroomService $classroomService)
    {
        $this->service = $service;
        $this->classroomService = $classroomService;
    }

    public function index(User $school, Request $request)
    {
        $data['classrooms'] = $this->classroomService->handleGetBySchool($school->id);
        $data['dependents'] = $this->service->handleGeByClassroom($request, $school->id);
        $data['school'] = $school;
        return view('dashboard.finance.pages.dependent.index', $data);
    }

    public function store(DependentRequest $request)
    {
        $this->service->handleCreate($request);
        return redirect()->back()->with('success', trans('alert.add_success'));
    }

    public function update(DependentRequest $request, Dependent $dependent)
    {
        $this->service->handleUpdate($dependent, $request);
        return redirect()->back()->with('success', trans('alert.update_success'));
    }

    public function semester($semester,User $user)
    {
        $data['totalBayar'] = Payment::where('semester', $semester)->where('user_id', $user->id)->where('invoice_status','paid')->sum('total_pay');
        $data['nominal'] = Dependent::where('semester', $semester)->where('classroom_id', $user->studentSchool->studentClassroom->classroom->id)->select('nominal')->first();
        return response()->json($data);
    }
}
