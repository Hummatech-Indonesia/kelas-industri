<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\View\View;
use App\Services\PointService;
use App\Services\JournalService;
use App\Services\ClassroomService;
use App\Http\Requests\JournalRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class JurnalController extends Controller
{
    //
    private ClassroomService $classroomService;
    private JournalService $journalService;
    private PointService $pointService;

    public function __construct(ClassroomService $classroomService, JournalService $journalService, PointService $pointService)
    {
        $this->classroomService = $classroomService;
        $this->journalService = $journalService;
        $this->pointService = $pointService;

    }

    public function index(Request $request)
    {
        if (auth()->user()->roles->pluck('name')[0] == 'admin') {
            $data = [
                'schools' => $this->pointService->handleGetSchool(),
                'filter' => $request->filter,
                'journals' => $this->journalService->handleGetJurnalByAdmin($request),
            ];
            return view('dashboard.admin.pages.jurnal.index', $data);

        } elseif (auth()->user()->roles->pluck('name')[0] == 'school') {
            $data = [
                'journals' => $this->journalService->handleGetBySchool()
            ];
            return view('dashboard.admin.pages.jurnal.index', $data);
        } else {
            $data = [
                'journals' => $this->journalService->handleGetJournalByUser(),
            ];
            return view('dashboard.user.pages.jurnal.index', $data);
        }

    }

    public function create(): View
    {
        $data = [
            'classrooms' => $this->classroomService->handleGetClassroomByUser(auth()->id()),
        ];
        return view('dashboard.user.pages.jurnal.create', $data);
    }

    public function store(JournalRequest $request): RedirectResponse
    {
        $this->journalService->handleCreate($request);
        if(auth()->user()->roles->pluck('name')[0] == 'mentor'){
            return to_route('mentor.journal.index')->with('success', trans('alert.update_success'));
        }elseif(auth()->user()->roles->pluck('name')[0] == 'teacher')
        return to_route('teacher.journal.index')->with('success', trans('alert.update_success'));
    }

    public function show()
    {

    }

    public function edit(Journal $journal): View
    {
        $data = [
            'journal' => $journal,
            'classrooms' => $this->classroomService->handleGetClassroomByUser(auth()->id()),
        ];
        return view('dashboard.user.pages.jurnal.edit', $data);
    }

    public function update(JournalRequest $request, Journal $journal)
    {
        $this->journalService->handleUpdate($request, $journal->id);
        if(auth()->user()->roles->pluck('name')[0] == 'mentor'){
            return to_route('mentor.journal.index')->with('success', trans('alert.update_success'));
        }elseif(auth()->user()->roles->pluck('name')[0] == 'teacher')
        return to_route('teacher.journal.index')->with('success', trans('alert.update_success'));
    }

    public function destroy(Journal $journal): RedirectResponse
    {
        $this->journalService->handleDelete($journal);
        return back()->with('success', trans('alert.delete_success'));
    }
}
