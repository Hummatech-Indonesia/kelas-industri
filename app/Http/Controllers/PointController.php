<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\SchoolYear;
use App\Traits\DataSidebar;
use Illuminate\Http\Request;
use App\Services\PointService;
use App\Helpers\SchoolYearHelper;
use App\Services\SchoolYearService;
use App\Http\Controllers\PointController;

class PointController extends Controller
{

    use DataSidebar;
    private PointService $services;
    private SchoolYearService $schoolYearService;

    public function __construct(PointService $services, SchoolYearService $schoolYearService)
    {
        $this->services = $services;
        $this->schoolYearService = $schoolYearService;
    }
    //
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Request $request): View
    {
        $currentSchoolYear = SchoolYearHelper::get_current_school_year();
        if (auth()->user()->roles->pluck('name')[0] == 'admin') {
            $selectedSchoolYear = 0;
            if ($currentSchoolYear) {
                $selectedSchoolYear = $currentSchoolYear->id;
            }
            if ($request->school_year) {
                $selectedSchoolYear = $request->school_year;
            }
            $data = [
                'schoolYear' => $this->schoolYearService->handleGetAll(),
                'schoolYearFilter' => $selectedSchoolYear,
                'schools' => $this->services->handleGetSchool(),
                'filter' => $request->filter,
                'rankings' => $this->services->handleGetPointStudent($request, $selectedSchoolYear),
            ];
            return view('dashboard.admin.pages.leaderboard.index', $data, );
        } elseif (auth()->user()->roles->pluck('name')[0] == 'school') {
            if ($currentSchoolYear) {
                $selectedSchoolYear = $currentSchoolYear->id;
            }
            if ($request->school_year) {
                $selectedSchoolYear = $request->school_year;
            }
            $data = [
                'schoolYear' => $this->schoolYearService->handleGetAll(),
                'schoolYearFilter' => $selectedSchoolYear,
                'schools' => $this->services->handleGetSchool(),
                'filter' => $request->filter,
                'rankings' => $this->services->handleGetPointStudent($request, $selectedSchoolYear),
            ];
            return view('dashboard.admin.pages.leaderboard.index', $data);
        } else {
            if ($currentSchoolYear) {
                $selectedSchoolYear = $currentSchoolYear->id;
            }
            if ($request->school_year) {
                $selectedSchoolYear = $request->school_year;
            }
            $data = $this->GetDataSidebar();
            $data['schoolYear'] = $this->schoolYearService->handleGetAll();
            $data['schoolYearFilter'] = $selectedSchoolYear;
            $data['schools'] = $this->services->handleGetSchool();
            $data['filter'] = $request->filter;
            $data['rankings'] = $this->services->handleGetPointStudent($request, $selectedSchoolYear);
            return view('dashboard.user.pages.leaderboard.index', $data);
        }
    }
}
