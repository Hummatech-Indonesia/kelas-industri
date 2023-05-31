<?php

namespace App\Http\Controllers;

use App\Http\Requests\JournalRequest;
use App\Models\Journal;
use App\Services\ClassroomService;
use App\Services\JournalService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class JurnalController extends Controller
{
    //
    private ClassroomService $classroomService;
    private JournalService $journalService;

    public function __construct(ClassroomService $classroomService, JournalService $journalService)
    {
        $this->classroomService = $classroomService;
        $this->journalService = $journalService;

    }

    public function index()
    {
        if (auth()->user()->roles->pluck('name')[0] == 'teacher') {
            $data = [
                'journals' => $this->journalService->handleGetJournalByUser(),
            ];
            return view('dashboard.user.pages.jurnal.index', $data);

        } elseif (auth()->user()->roles->pluck('name')[0] == 'mentor') {
            $data = [
                'journals' => $this->journalService->handleGetJournalByUser(),
            ];
            return view('dashboard.user.pages.jurnal.index', $data);

        } else {
            $data = [
                'journals' => $this->journalService->handleGetAll(),
            ];
            return view('dashboard.admin.pages.jurnal.index', $data);
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
