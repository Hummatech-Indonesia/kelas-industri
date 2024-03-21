<?php

namespace App\Http\Controllers;

use App\Http\Requests\DependentRequest;
use App\Models\Dependent;
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

    public function index()
    {
        $data['classrooms'] = $this->classroomService->handleGetAll();
        $data['dependents'] = $this->service->handleGetAll();
        return view('dashboard.finance.pages.dependent.index', $data);
    }

    public function store(DependentRequest $request)
    {
        $request->validated();
        $this->service->handleStore($request);
        return redirect()->back();
    }

    public function update(DependentRequest $request, Dependent $dependent)
    {
        $request->validated();
        $this->service->handleUpdate($dependent, $request);
        return redirect()->back();
    }
}
