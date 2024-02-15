<?php

namespace App\Http\Controllers;

use App\Services\ClassroomService;
use App\Services\GalleryService;
use App\Services\MaterialService;
use App\Services\MentorService;
use App\Services\NewsService;
use App\Services\UserServices;

class WelcomeController extends Controller
{

    public function __construct(UserServices $userService, ClassroomService $classroomService, MaterialService $materialService, MentorService $mentorService, GalleryService $galleryService, NewsService $newsService)
    {
        $this->userService = $userService;
        $this->classroomService = $classroomService;
        $this->materialService = $materialService;
        $this->mentorService = $mentorService;
        $this->galleryService = $galleryService;
        $this->newsService = $newsService;
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

    public function news()
    {
        $data = [
            'newss' => $this->newsService->handleGetPaginate(),
            'news_random_old' => $this->newsService->handleGetRandomOld(3),
        ];
        return view('news', $data);
    }

    public function detail($slug)
    {
        $data = [
            'newss' => $this->newsService->handleGetPaginate(),
            'news_random' => $this->newsService->handleGetRandom(10),
            'slug' => $this->newsService->handleGetBySlug($slug),
        ];
        return view('detail-news', $data);
    }
}
