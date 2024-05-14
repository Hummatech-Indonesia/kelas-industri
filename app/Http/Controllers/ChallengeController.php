<?php

namespace App\Http\Controllers;

use ZipArchive;
use Carbon\Carbon;
use App\Models\Challenge;
use Illuminate\View\View;
use App\Traits\DataSidebar;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\SubmitChallenge;
use App\Helpers\SchoolYearHelper;
use App\Services\ChallengeService;
use App\Services\ClassroomService;
use App\Services\SchoolYearService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\ChallengeRequest;
use App\Http\Requests\SubmitChallengeRequest;

class ChallengeController extends Controller
{
    use DataSidebar;
    private ChallengeService $service;
    private SchoolYearService $schoolYearService;
    private ClassroomService $classroomService;

    public function __construct(ChallengeService $service, ClassroomService $classroomService, SchoolYearService $schoolYearService)
    {
        $this->service = $service;
        $this->classroomService = $classroomService;
        $this->schoolYearService = $schoolYearService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Request $request): View
    {
        // $currentSchoolYear = SchoolYearHelper::get_current_school_year();
        $data = $this->GetDataSidebar();
        if (auth()->user()->roles->pluck('name')[0] == 'teacher') {
            $data['challenges'] = $this->service->handleGetByTeacher(auth()->id(), $request);
            $data['search'] = $request->search;
        } elseif (auth()->user()->roles->pluck('name')[0] == 'mentor') {
            $data['challenges'] = $this->service->handleGetByMentor(auth()->id(), $request);
            $data['search'] = $request->search;
        } elseif (auth()->user()->roles->pluck('name')[0] == 'student') {
            $data['challenges'] = $this->service->handleGetByStudent(auth()->user()->studentSchool->studentClassroom->classroom_id, $request);
            $data['search'] = $request->search;
            $data['status'] = $request->status;
            $data['difficulty'] = $request->difficulty;
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
        $data = $this->GetDataSidebar();
        if (auth()->user()->roles->pluck('name')[0] == 'teacher') {
            $data['classrooms'] = $this->classroomService->handleGetByTeacherCreateEdit(auth()->id());
        } elseif (auth()->user()->roles->pluck('name')[0] == 'mentor') {
            $data['classrooms'] = $this->classroomService->handleGetByMentorCreateEdit(auth()->id());
        }
        return view('dashboard.user.pages.challenge.create', $data);
    }

    public function submitChallenge(Challenge $challenge): View
    {
        $data = $this->GetDataSidebar();
        $data['challenge'] = $challenge;
        $data['submitChallenge'] = $this->service->handleGetStudentSubmitChallenge(auth()->user()->students[0]->id, $challenge->id);
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

    public function storeChallenge(SubmitChallengeRequest $request): RedirectResponse
    {
        $this->service->submitChallenge($request);
        return to_route('student.challenges.show', ['challenge' => $request->challenge_id])->with('success', trans('alert.add_success'));
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(Challenge $challenge): View
    {
        $data = $this->GetDataSidebar();
        if (auth()->user()->roles->pluck('name')[0] == 'teacher') {
            $data['challenge'] = $challenge;
            $data['student'] =  $this->service->handleChallengeByTeacher($challenge->id);

        } elseif (auth()->user()->roles->pluck('name')[0] == 'mentor') {
            $data['challenge'] = $challenge;
            $data['student'] =  $this->service->handleGetChallengeByMentor($challenge->id);
        } elseif (auth()->user()->roles->pluck('name')[0] == 'student') {
            $data['challenge'] = $challenge;
        }
        $tanggal = Carbon::now()->format('Y-m-d H:i:s');
        return \view('dashboard.user.pages.challenge.detail', $data ,compact('tanggal'));
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function validChallenge(Request $request,$id): JsonResponse
    {

    $currentSchoolYear = SchoolYearHelper::get_current_school_year();
    $submitChallenge = SubmitChallenge::findOrFail($id);
    $persen = floatval($request->persen);

    $poin = floatval($submitChallenge->challenge->point) * ($persen / 100.0);
    // return response()->json($poin, 200);
    $this->service->handleUpadetValid($submitChallenge->id);
    $this->service->handleCreatePoint($poin, $submitChallenge->studentSchool->student->id);
        return response()->json();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */

    public function validChallengeTeacher(Request $request, $id): JsonResponse
    {
        $currentSchoolYear = SchoolYearHelper::get_current_school_year();
        $submitChallenge = SubmitChallenge::findorfail($id);
        $persen = floatval($request->persen);

        $point = floatval($submitChallenge->challenge->point) * ($persen / 100.0);
        $this->service->handleUpadetValid($submitChallenge->id);
        $this->service->handleCreatePoint($point, $submitChallenge->studentSchool->student->id);
        return response()->json();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(Challenge $challenge): View
    {
        $data = $this->GetDataSidebar();
        if (auth()->user()->roles->pluck('name')[0] == 'teacher') {
            $data['challenge'] = $challenge;
            $data['classrooms'] = $this->classroomService->handleGetByTeacherCreateEdit(auth()->id());
        } elseif (auth()->user()->roles->pluck('name')[0] == 'mentor') {
            $data['challenge'] = $challenge;
            $data['classrooms'] = $this->classroomService->handleGetByMentorCreateEdit(auth()->id());
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

    public function downloadAll(Challenge $challenge)
    {
        $file = $this->service->handleGetChallengeByMentor($challenge->id);

        $zipName = 'Challenge.zip';
        $zipPath = storage_path('app/public/' . $zipName);

        $zip = new ZipArchive;
        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {

            $filesToAdd = [];

            foreach ($file as $file) {
                $filePath = storage_path('app/public/' . $file->file);
                $extension = pathinfo($filePath, PATHINFO_EXTENSION);
                if (file_exists($filePath)) {
                    $filesToAdd[] = [
                        'path' => $filePath,
                        'name' => $file->studentSchool->student->name . '.' . $extension,
                    ];
                }
            }

            if (!empty($filesToAdd)) {
                foreach ($filesToAdd as $fileToAdd) {
                    $zip->addFile($fileToAdd['path'], $fileToAdd['name']);
                }
                $zip->close();

                return response()->download($zipPath, $zipName);
            } else {
                $errorMessage = "File Challenge Siswa Tidak Ditemukan Silahkan Untuk Memberitahu Agar Mengisi Ulang Challenge.";
            }

            return redirect()->back()->with('error', $errorMessage);
        }

    }


    public function download(SubmitChallenge $submitChallenge)
    {
        if (file_exists('storage/' . $submitChallenge->file)) {
            $extension = pathinfo(storage_path('storage/' . $submitChallenge->file), PATHINFO_EXTENSION);
            $path = public_path('storage/' . $submitChallenge->file);
            $name = $submitChallenge->studentSchool->student->name . '.' . $extension;
            return response()->download($path, $name);
        } else {
            if (auth()->user()->roles->pluck('name')[0] == 'teacher' || auth()->user()->roles->pluck('name')[0] == 'mentor') {
                return redirect()->back()->with('error', ' Challenge Siswa Tidak Ada, Silahkan Memberitahu Untuk Mengisi Ulang Challenge.');
            } else {
                return redirect()->back()->with('error', 'Challenge Anda Tidak Tersedia, Silahkan Input Kembali Challenge Anda .');
            }
        }
    }
}
