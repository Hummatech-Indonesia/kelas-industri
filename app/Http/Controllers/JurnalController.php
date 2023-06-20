<?php

namespace App\Http\Controllers;

use App\Helpers\SchoolYearHelper;
use App\Http\Requests\JournalRequest;
use App\Models\Classroom;
use App\Models\Journal;
use App\Models\SchoolYear;
use App\Models\User;
use App\Services\ClassroomService;
use App\Services\JournalService;
use App\Services\PointService;
use App\Traits\DataSidebar;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JurnalController extends Controller
{
    //
    use DataSidebar;
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
        $data = $this->GetDataSidebar();
        if (auth()->user()->roles->pluck('name')[0] == 'admin') {
            $data['schools'] = $this->pointService->handleGetSchool();
            $data['filter'] = $request->filter;
            return view('dashboard.admin.pages.jurnal.index', $data);
        } elseif (auth()->user()->roles->pluck('name')[0] == 'school') {
            $schoolYear = SchoolYearHelper::get_current_school_year();
            $selectedSchoolYear = 0;
            if ($schoolYear) {
                $selectedSchoolYear = $schoolYear->id;
            }
            if ($request->school_year) {
                $selectedSchoolYear = $request->school_year;
            }
            $data['schoolYear'] = SchoolYear::all();
            $data['schoolYearFilter'] = $request->school_year;
            $data['classrooms'] = $this->classroomService->handleGetSchoolClassrooomJournal(auth()->id(), $selectedSchoolYear);
            return view('dashboard.admin.pages.jurnal.index', $data);
        } else {
            $data['journals'] = $this->journalService->handleGetJournalByUser();
            return view('dashboard.user.pages.jurnal.index', $data);
        }

    }

    public function create(): View
    {
        $data = $this->GetDataSidebar();
        $data['classrooms'] = $this->classroomService->handleGetClassroomByUserJurnal(auth()->id());
        return view('dashboard.user.pages.jurnal.create', $data);
    }

    public function store(JournalRequest $request): RedirectResponse
    {
        $this->journalService->handleCreate($request);
        if (auth()->user()->roles->pluck('name')[0] == 'mentor') {
            return to_route('mentor.journal.index')->with('success', trans('Berhasil Memperbarui Jurnal'));
        } elseif (auth()->user()->roles->pluck('name')[0] == 'teacher') {
            return to_route('teacher.journal.index')->with('success', trans('alert.update_success'));
        }

    }

    public function show(User $journal, Request $request)
    {
        $schoolYear = SchoolYearHelper::get_current_school_year();
        $selectedSchoolYear = 0;
        if ($schoolYear) {
            $selectedSchoolYear = $schoolYear->id;
        }
        if ($request->school_year) {
            $selectedSchoolYear = $request->school_year;
        }
        $data = [
            'journal' => $journal->id,
            'schoolYear' => SchoolYear::all(),
            'schoolYearFilter' => $request->school_year,
            'classrooms' => $this->classroomService->handleGetSchoolClassrooomJournal($journal->id, $selectedSchoolYear),
        ];
        return view('dashboard.admin.pages.jurnal.detail', $data);
    }

    public function detailJurnal(Classroom $classroom)
    {
        $data = [
            'journals' => $this->journalService->handleGetJurnalByAdminAndSchool($classroom->id),
        ];
        return view('dashboard.admin.pages.jurnal.show', $data);
    }

    public function edit(Journal $journal): View
    {
        $data = $this->GetDataSidebar();
        $data['journal'] = $journal;
        $data['classrooms'] = $this->classroomService->handleGetClassroomByUserJurnal(auth()->id());
        return view('dashboard.user.pages.jurnal.edit', $data);
    }

    public function update(JournalRequest $request, Journal $journal)
    {
        $this->journalService->handleUpdate($request, $journal->id);
        if (auth()->user()->roles->pluck('name')[0] == 'mentor') {
            return to_route('mentor.journal.index')->with('success', trans('Berhasil Memperbarui Jurnal'));
        } elseif (auth()->user()->roles->pluck('name')[0] == 'teacher') {
            return to_route('teacher.journal.index')->with('success', trans('alert.update_success'));
        }

    }

    public function destroy(Journal $journal): RedirectResponse
    {
        $this->journalService->handleDelete($journal);
        return back()->with('success', trans('Berhasil Menghapus Jurnal'));
    }
}
