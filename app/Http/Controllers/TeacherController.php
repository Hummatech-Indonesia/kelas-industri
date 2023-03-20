<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Models\User;
use App\Services\TeacherService;
use App\Services\UserServices;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class TeacherController extends Controller
{
    private TeacherService $service;
    private UserServices $userServices;

    public function __construct(TeacherService $service, UserServices $userServices)
    {
        $this->service = $service;
        $this->userServices = $userServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): mixed
    {
        if (request()->ajax()) {
            return
        }

        return view('dashboard.admin.pages.teacher.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TeacherRequest $request
     * @return RedirectResponse
     */
    public function store(TeacherRequest $request): RedirectResponse
    {
        $this->service->handleCreate($request);

        return back()->with('success', trans('alert.add_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TeacherRequest $request
     * @param User $teacher
     * @return RedirectResponse
     */
    public function update(TeacherRequest $request, User $teacher): RedirectResponse
    {
        $this->service->handleUpdate($request, $teacher);

        return back()->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $teacher
     * @return RedirectResponse
     */
    public function destroy(User $teacher): RedirectResponse
    {
        $data = $this->service->handleDelete($teacher);

        if (!$data) return back()->with('error', trans('alert.delete_constrained'));

        return back()->with('success', trans('alert.delete_success'));
    }
}
