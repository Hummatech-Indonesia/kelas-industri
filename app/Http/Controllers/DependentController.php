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
        $data['dependents'] = $this->service->handleGeByClassroom($request);
        $data['school'] = $school;
        return view('dashboard.finance.pages.dependent.index', $data);
    }

    public function store(DependentRequest $request)
    {
        $this->service->handleStore($request);
        return redirect()->back()->with('success', trans('alert.add_success'));
    }

    public function update(DependentRequest $request, Dependent $dependent)
    {
        $this->service->handleUpdate($dependent, $request);
        return redirect()->back()->with('success', trans('alert.update_success'));
    }

    public function semester()
    {

        $totalTanggungan = Payment::where('semester', 1)->sum('total_pay');
        return response()->json($totalTanggungan);
    }
}
