<?php

namespace App\Http\Controllers;

use App\Helpers\SchoolYearHelper;
use App\Http\Controllers\PointController;
use App\Services\PointService;
use App\Traits\DataSidebar;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PointController extends Controller
{

    use DataSidebar;
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
    public function index(Request $request): View
    {
        $data = $this->GetDataSidebar();
        $currentSchoolYear = SchoolYearHelper::get_current_school_year();
        if (auth()->user()->roles->pluck('name')[0] == 'admin') {
            $data['schools'] = $this->services->handleGetSchool();
            $data['filter'] = $request->filter;
            $data['rankings'] = $this->services->handleGetPointStudent($request, $currentSchoolYear->id);
            return view('dashboard.admin.pages.leaderboard.index', $data);
        } elseif (auth()->user()->roles->pluck('name')[0] == 'school') {
            $data['schools'] = $this->services->handleGetSchool();
            $data['filter'] = $request->filter;
            $data['rankings'] = $this->services->handleGetPointStudent($request, $currentSchoolYear->id);
            return view('dashboard.admin.pages.leaderboard.index', $data);
        } else {
            $data['schools'] = $this->services->handleGetSchool();
            $data['filter'] = $request->filter;
            $data['rankings'] = $this->services->handleGetPointStudent($request, $currentSchoolYear->id);
            return view('dashboard.user.pages.leaderboard.index', $data);
        }
    }
}
