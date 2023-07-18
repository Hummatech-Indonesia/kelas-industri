<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Salary;
use App\Traits\DataSidebar;
use App\Services\UserServices;
use App\Services\SalaryService;
use App\Services\TeacherService;
use App\Http\Requests\SalaryRequest;

class SalaryController extends Controller
{
    use DataSidebar;
    private SalaryService $salaryService;
    private UserServices $userService;
    private TeacherService $teacherService;

    public function __construct(SalaryService $salaryService, UserServices $userService, TeacherService $teacherService)
    {
        $this->salaryService = $salaryService;
        $this->userService = $userService;
        $this->teacherService = $teacherService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->roles->pluck('name')[0] == 'admin') {
            $data = [
                'salarys' => $this->salaryService->handleGetMentor(),
            ];
            return view('dashboard.admin.pages.salarie.index', $data);
        } else {
            $data = $this->GetDataSidebar();
            $data['salarys'] = $this->salaryService->handleGetSalaryByUser(auth()->id());
            return view('dashboard.user.pages.salaries.index', $data);
        }
    }

    public function indexTeacher()
    {

        $data = [
            'salarys' => $this->salaryService->handleGetTeacher(),
        ];
        return view('dashboard.admin.pages.salarieTeacher.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'mentors' => User::role('mentor')->get(),
        ];
        return view('dashboard.admin.pages.salarie.create', $data);
    }

    public function createTeacher()
    {

        $data = [
            'schools' => $this->userService->handleGetAllSchool(),
        ];

        return view('dashboard.admin.pages.salarieTeacher.create', $data);
    }

    public function getTeacherBySchool(): mixed
    {
        return $this->teacherService->handleGetBySchool(request()->schoolId);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SalaryRequest $request): mixed
    {
        $this->salaryService->handleCreate($request);
        return to_route('admin.saleries.index')->with('success', trans('alert.add_success'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTeacher(SalaryRequest $request): mixed
    {
        $this->salaryService->handleCreate($request);
        return to_route('admin.saleriesTeacher')->with('success', trans('alert.add_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function show(Salary $salery)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function editTeacher(Salary $salery)
    {
        $data = [
            'salery' => $salery,
            'schools' => $this->userService->handleGetAllSchool(),
        ];
        return view('dashboard.admin.pages.salarieTeacher.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function edit(Salary $salery)
    {
        $data = [
            'salery' => $salery,
            'mentors' => User::role('mentor')->get(),
        ];
        return view('dashboard.admin.pages.salarie.show', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function update(SalaryRequest $request, Salary $salery)
    {
        $this->salaryService->handleUpdate($request, $salery);
        return to_route('admin.saleries.index')->with('success', trans('alert.update_success'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function updateTeacher(SalaryRequest $request, Salary $salery)
    {
        
        $this->salaryService->handleUpdate($request, $salery);
        return to_route('admin.saleriesTeacher')->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salary $salery)
    {
        $data = $this->salaryService->handleDelete($salery);

        if (!$data) {
            return back()->with('error', trans('alert.delete_constrained'));
        }

        return back()->with('success', trans('alert.delete_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function destroyTeacher(Salary $salery)
    {
        $data = $this->salaryService->handleDelete($salery);

        if (!$data) {
            return back()->with('error', trans('alert.delete_constrained'));
        }

        return back()->with('success', trans('alert.delete_success'));
    }
}
