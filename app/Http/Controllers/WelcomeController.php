<?php

namespace App\Http\Controllers;

use HTMLPurifier;
use HTMLPurifier_Config;
use App\Services\NewsService;
use App\Services\EventService;
use App\Services\UserServices;
use App\Services\MentorService;
use App\Services\GalleryService;
use App\Services\MaterialService;
use App\Services\ClassroomService;

class WelcomeController extends Controller
{

    public function __construct(UserServices $userService, ClassroomService $classroomService, MaterialService $materialService, MentorService $mentorService, GalleryService $galleryService, NewsService $newsService, EventService $eventService)
    {
        $this->userService = $userService;
        $this->classroomService = $classroomService;
        $this->materialService = $materialService;
        $this->mentorService = $mentorService;
        $this->galleryService = $galleryService;
        $this->newsService = $newsService;
        $this->eventService = $eventService;
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
    public function event()
    {
        $data = [
            'events' => $this->eventService->handleGetAll()
        ];
        $config = HTMLPurifier_Config::createDefault();
        $config->set('HTML.Allowed', '');
        $purifier = new HTMLPurifier($config);

        foreach ($data['events'] as $event) {
            $event->description = $purifier->purify($event->description);
        }
        return view('event', $data);
    }
    public function eventDetail($event)
    {
        $data = [
            'events' => $this->eventService->handleGetNewer(),
            'event' => $this->eventService->handleShow($event)
        ];
        return view('detail-event', $data);
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
            'new_news' => $this->newsService->handleGetNewNews(5),
            'primary_news' => $this->newsService->handleGetPrimaryNews(),
        ];
        return view('news', $data);
    }

    public function detail($slug)
    {
        $data = [
            'newss' => $this->newsService->handleGetPaginate(),
            'news_random' => $this->newsService->handleGetRandom($slug),
            'slug' => $this->newsService->handleGetBySlug($slug),
        ];
        return view('detail-news', $data);
    }
}
