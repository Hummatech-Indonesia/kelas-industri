<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitAssignmentRequest;
use App\Models\Assignment;
use App\Models\Classroom;
use App\Models\SubMaterial;
use App\Services\AssignmentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

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
            'students' => $this->assignmentService->handleGetAssignmentStudent($classroom->id, $assignment->id),
        ];
//        dd($data);
        return \view ('dashboard.user.pages.assignment.index', $data);
    }

    public function create(Classroom $classroom, SubMaterial $submaterial, Assignment $assignment): View
    {
        $data = [
            'assignment' => $assignment,
            'classroom' => $classroom,
            'subMaterial' => $submaterial,
            'submitAssignment' => $this->assignmentService->handleGetStudentSubmitAssignment(auth()->id(), $assignment->id),
        ];
        return \view ('dashboard.user.pages.assignment.detail', $data);

    }

    public function store(SubmitAssignmentRequest $request, Classroom $classroom, SubMaterial $submaterial): RedirectResponse
    {
        $this->assignmentService->submitAssignment($request);

        return to_route('common.showSubMaterial', ['classroom' => $classroom, 'submaterial' => $submaterial])->with('success', trans('alert.add_success'));
    }

}
