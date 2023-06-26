<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserServices;
use App\Services\MentorService;
use App\Services\MaterialService;
use App\Services\ClassroomService;

class WelcomeController extends Controller
{

    public function __construct(UserServices $userService, ClassroomService $classroomService, MaterialService $materialService, MentorService $mentorService){
        $this->userService = $userService;
        $this->classroomService = $classroomService;
        $this->materialService = $materialService;
        $this->mentorService = $mentorService;
    }

    public function index()
    {
        $data = [
            'school' => count($this->userService->handleGetAllSchool()),
            'MOUS' => $this->userService->handleGetAllSchool(),
            'classroom' => count($this->classroomService->handleGetAll()),
            'material' => count($this->materialService->handleGetAll()),
            'mentor' => count($this->mentorService->handleGetAll()),
        ];
        return view('welcome', $data);
    }
}
