<?php

namespace App\Http\Controllers;

use App\Helpers\SchoolYearHelper;
use App\Http\Requests\MentorRequest;
use App\Models\MentorClassroom;
use App\Models\User;
use App\Services\ClassroomService;
use App\Services\MentorService;
use App\Services\UserServices;
use App\Traits\YajraTable;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use function request;

class MentorController extends Controller
{
    use YajraTable;

    private UserServices $userService;
    private ClassroomService $classroomService;
    private MentorService $mentorService;

    public function __construct(UserServices $userService, ClassroomService $classroomService, MentorService $mentorService)
    {
        $this->userService = $userService;
        $this->classroomService = $classroomService;
        $this->mentorService = $mentorService;
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
            return $this->MentorMockup($this->userService->handleGetMentor());
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
            return $this->RollingMentorMockup($this->userService->handleGetMentor());
        }

        return view('dashboard.admin.pages.mentor.rolling');
    }

    /**
     * handle get classrooms by school
     *
     * @return mixed
     */
    public function getClassroomBySchool(): mixed
    {
        $currentSchoolYear = SchoolYearHelper::get_current_school_year();

        return $this->classroomService->handleGetBySchool(request()->schoolId, $currentSchoolYear->id);
    }

    /**
     * Display a listing of the resource.
     *
     * @param User $mentor
     * @return mixed
     * @throws Exception
     */
    public function addRollingMentor(User $mentor): mixed
    {
        if (request()->ajax()) {
            return $this->mentorService->handleGetMentorClassrooms($mentor->id);
        }

        $data = [
            'schools' => $this->userService->handleGetAllSchool(),
            'mentor' => $mentor
        ];
        return view('dashboard.admin.pages.mentor.add-rolling', $data);
    }

    /**
     * action rolling mentor
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function actionRollingMentor(Request $request): RedirectResponse
    {
        $this->mentorService->handleStore($request);

        return back()->with('success', trans('alert.add_success'));
    }

    /**
     * delete mentor classroom
     *
     * @param MentorClassroom $mentorClassroom
     * @return RedirectResponse
     */
    public function deleteMentorClassroom(MentorClassroom $mentorClassroom): RedirectResponse
    {
        $this->mentorService->handleDelete($mentorClassroom->id);

        return back()->with('success', trans('alert.delete_success'));
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
