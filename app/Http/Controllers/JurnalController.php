<?php

namespace App\Http\Controllers;


use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\JournalService;
use App\Services\ClassroomService;
use App\Http\Requests\JournalRequest;
use Illuminate\Http\RedirectResponse;

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
        $data = [
            'journals' => $this->journalService->handleGetAll(),
        ];
        return view('dashboard.user.pages.jurnal.index', $data);
    }

    public function create() :View
    {
        $data = [
            'classrooms' => $this->classroomService->handleGetClassroomByUser(auth()->id()),
        ];
        return view('dashboard.user.pages.jurnal.create', $data);
    }

    public function store(JournalRequest $request) :RedirectResponse
    {
        $this->journalService->handleCreate($request);

        return to_route('mentor.jurnal.index')->with('success', trans('alert.add_success'));
    }

    public function show()
    {

    }
}
