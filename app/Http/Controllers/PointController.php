<?php

namespace App\Http\Controllers;

use App\Helpers\SchoolYearHelper;
use App\Http\Controllers\PointController;
use App\Http\Requests\SubmitAssignmentRequest;
use App\Models\SubmitAssignment;
use App\Services\PointService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PointController extends Controller
{

    private PointService $services;

    public function __construct(PointService $services)
    {
        $this->services = $services;
    }
    //
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $currentSchoolYear = SchoolYearHelper::get_current_school_year();
        if (auth()->user()->roles->pluck('name')[0] == 'admin') {
            $data = [
                'rankings' => $this->services->handleGetPointStudent($currentSchoolYear),
            ];
            return view('dashboard.admin.pages.leaderboard.index', $data);
        }elseif(auth()->user()->roles->pluck('name')[0] == 'school'){
            $data = [
                'rankings' => $this->services->handleGetPointStudent($currentSchoolYear),
            ];
            return view('dashboard.admin.pages.leaderboard.index', $data);
        }else
            $data = [
                'rankings' => $this->services->handleGetPointStudent($currentSchoolYear),
            ];
        return view('dashboard.user.pages.leaderboard.index', $data);
    }
}
