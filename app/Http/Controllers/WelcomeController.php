<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserServices;
use App\Services\MentorService;
use App\Services\GalleryService;
use App\Services\MaterialService;
use App\Services\ClassroomService;

class WelcomeController extends Controller
{

    public function __construct(UserServices $userService, ClassroomService $classroomService, MaterialService $materialService, MentorService $mentorService,  GalleryService $galleryService){
        $this->userService = $userService;
        $this->classroomService = $classroomService;
        $this->materialService = $materialService;
        $this->mentorService = $mentorService;
        $this->galleryService = $galleryService;
    }

    public function index()
    {
        $data = [
            'school' => count($this->userService->handleGetAllSchool()),
            'MOUS' => $this->userService->handleGetAllSchool(),
            'classroom' => count($this->classroomService->handleGetAll()),
            'material' => count($this->materialService->handleGetAll()),
            'student' => count($this->userService->handleGetAllStudent()),
        ];
        return view('welcome', $data);
    }
    
    public function gallery()
    {
        $data = [
            'gallerys' => $this->galleryService->handleGetPaginate(),
        ];
        return view('gallery', $data);
    }
}
