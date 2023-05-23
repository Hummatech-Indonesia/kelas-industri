<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\SubmitChallenge;
use App\Helpers\SchoolYearHelper;
use App\Services\ChallengeService;
use App\Services\ClassroomService;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ChallengeRequest;
use App\Http\Requests\SubmitChallengeRequest;

class ChallengeController extends Controller
{
    private ChallengeService $service;

    public function __construct(ChallengeService $service, ClassroomService $classroomService, SubmitChallenge $submitChallengeService)
    {
        $this->service = $service;
        $this->classroomService = $classroomService;
        $this->submitChallengeService = $submitChallengeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $currentSchoolYear = SchoolYearHelper::get_current_school_year();
        if (auth()->user()->roles->pluck('name')[0] == 'teacher') {
            $data = [
                'challenges' => $this->service->handleGetByTeacher(auth()->id()),
            ];
        } elseif (auth()->user()->roles->pluck('name')[0] == 'mentor') {
            $data = [
                'challenges' => $this->service->handleGetByMentor(auth()->id(), $currentSchoolYear->id),
            ];
        } elseif (auth()->user()->roles->pluck('name')[0] == 'student') {
            $data = [
                'challenges' => $this->service->handleGetByStudent(auth()->user()->studentSchool->studentClassroom->classroom_id, $currentSchoolYear->id),
            ];
        }
        return view('dashboard.user.pages.challenge.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): View
    {
        if (auth()->user()->roles->pluck('name')[0] == 'teacher') {
            $data = [
                'classrooms' => $this->classroomService->handleGetByTeacher(auth()->id()),
            ];
        } elseif (auth()->user()->roles->pluck('name')[0] == 'mentor') {
            $data = [
                'classrooms' => $this->classroomService->handleGetByMentor(auth()->id()),
            ];
        }
        // dd($data);
        return view('dashboard.user.pages.challenge.create', $data);
    }

    public function submitChallenge(Challenge $challenge): View
    {
        $data = [
            'challenge' => $challenge
        ];
        return \view ('dashboard.user.pages.challenge.store', $data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(ChallengeRequest $request): RedirectResponse
    {
        if (auth()->user()->roles->pluck('name')[0] == 'teacher') {
            $this->service->handleCreate($request);

            return to_route('teacher.challenges.index')->with('success', trans('alert.add_success'));
        } elseif (auth()->user()->roles->pluck('name')[0] == 'mentor') {
            $this->service->handleCreate($request);

            return to_route('mentor.challenges.index')->with('success', trans('alert.add_success'));
        }

    }

    public function storeChallenge(SubmitChallengeRequest $request): RedirectRespone
    {
        $this->service->submitChallenge($request);
            return to_route('mentor.challenges.index')->with('success', trans('alert.add_success'));
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(Challenge $challenge): View
    {
        if (auth()->user()->roles->pluck('name')[0] == 'teacher') {
            $data = [
                'challenge' => $challenge,
                'classrooms' => $this->classroomService->handleGetByTeacher(auth()->id()),
            ];

        } elseif (auth()->user()->roles->pluck('name')[0] == 'mentor') {

            $data = [
                'challenge' => $challenge,
                'classrooms' => $this->classroomService->handleGetByMentor(auth()->id()),
            ];
        } elseif (auth()->user()->roles->pluck('name')[0] == 'student') {
            $data = [
                'challenge' => $challenge,
                'classrooms' => $this->classroomService->handleGetByStudent(auth()->id()),
            ];
        }
        return \view ('dashboard.user.pages.challenge.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(Challenge $challenge): View
    {
        if (auth()->user()->roles->pluck('name')[0] == 'teacher') {
            $data = [
                'challenge' => $challenge,
                'classrooms' => $this->classroomService->handleGetByTeacher(auth()->id()),
            ];
        } elseif (auth()->user()->roles->pluck('name')[0] == 'mentor') {
            $data = [
                'challenge' => $challenge,
                'classrooms' => $this->classroomService->handleGetByMentor(auth()->id()),
            ];
        }
//        dd($data);
        return \view ('dashboard.user.pages.challenge.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */

    public function update(ChallengeRequest $request, Challenge $challenge): RedirectResponse
    {
        $this->service->handleUpdate($request, $challenge->id);
        if (auth()->user()->roles->pluck('name')[0] == 'teacher') {
            return to_route('teacher.challenges.index')->with('success', trans('alert.update_success'));
        } elseif (auth()->user()->roles->pluck('name')[0] == 'mentor') {
            return to_route('mentor.challenges.index')->with('success', trans('alert.update_success'));
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(Challenge $challenge): RedirectResponse
    {
        // dd('title');
        $data = $this->service->handleDelete($challenge->id);

        if (!$data) {
            return back()->with('error', trans('alert.delete_constrained'));
        }

        if (auth()->user()->roles->pluck('name')[0] == 'teacher') {

            return to_route('teacher.challenges.index')->with('success', trans('alert.delete_success'));

        } elseif (auth()->user()->roles->pluck('name')[0] == 'mentor') {

            return to_route('mentor.challenges.index')->with('success', trans('alert.delete_success'));

        }
    }
}