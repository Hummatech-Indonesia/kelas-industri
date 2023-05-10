<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Classroom;
use App\Services\AssignmentService;
use Illuminate\View\View;

class UserAssignmentController extends Controller
{
    private AssignmentService $assignmentService;

    public function __construct(AssignmentService $assignmentService)
    {
        $this->assignmentService = $assignmentService;
    }

    public function index(Classroom $classroom, Assignment $assignment): View
    {
//        dd($this->assignmentService->handleGetAssignmentStudent($classroom->id, $assignment->id));
        $data = [
            'students' => $this->assignmentService->handleGetAssignmentStudent($classroom->id, $assignment->id)
        ];
//        dd($data);
        return \view('dashboard.user.pages.assignment.index', $data);
    }

    public function create(Assignment $assignment) : View
    {
        $data = [
            'submitAssignment' => $this->assignmentService->handleGetStudentSubmitAssignment(auth()->id(), $assignment->id)
        ];
        return \view('dashboard.user.pages.assignment.detail', $data);
    }
}
