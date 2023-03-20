<?php

namespace App\Http\Controllers;

use App\Http\Requests\MentorRequest;
use App\Models\User;
use App\Services\UserServices;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use function request;

class MentorController extends Controller
{
    private UserServices $userService;

    public function __construct(UserServices $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     * @throws Exception
     */
    public function index(): mixed
    {
        if (request()->ajax()) {
            return $this->userService->handleGetMentor();
        }

        return view('dashboard.admin.pages.mentor.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     * @throws Exception
     */
    public function rollingMentor(): mixed
    {
        if (request()->ajax()) {
            return $this->userService->handleGetMentor();
        }

        return view('dashboard.admin.pages.mentor.rolling');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('dashboard.admin.pages.mentor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MentorRequest $request
     * @return RedirectResponse
     */
    public function store(MentorRequest $request): RedirectResponse
    {
        $this->userService->handleCreateMentor($request);

        return to_route('admin.mentors.index')->with('success', trans('alert.add_success'));
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
     * @param User $mentor
     * @return View
     */
    public function edit(User $mentor): View
    {
        return view('dashboard.admin.pages.mentor.edit', compact('mentor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MentorRequest $request
     * @param User $mentor
     * @return RedirectResponse
     */
    public function update(MentorRequest $request, User $mentor): RedirectResponse
    {
        $this->userService->handleUpdateMentor($request, $mentor);

        return to_route('admin.mentors.index')->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $mentor
     * @return RedirectResponse
     */
    public function destroy(User $mentor): RedirectResponse
    {
        $data = $this->userService->handleDeleteMentor($mentor);

        if (!$data) return back()->with('error', trans('alert.delete_constrained'));

        return back()->with('success', trans('alert.delete_success'));
    }
}
