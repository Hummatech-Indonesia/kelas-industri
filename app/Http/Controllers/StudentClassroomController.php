<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Services\ClassroomService;

class StudentClassroomController extends Controller
{
    private ClassroomService $classroomService;

    public function __construct(ClassroomService $classroomService)
    {
        $this->classroomService = $classroomService;
        // $this->generationService = $generationService;
    }

    public function index(): View
    {
        $data = [
            // 'generation' => $this->generationService->handleGetAll(),
            'classrooms' => $this->classroomService->handleGetClassroomByStudent(auth()->id())
        ];
        return view('dashboard.user.pages.material.index', $data);
    }

}
