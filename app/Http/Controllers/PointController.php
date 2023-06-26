<?php

namespace App\Http\Controllers;

use App\Helpers\SchoolYearHelper;
use App\Http\Controllers\PointController;
use App\Models\SchoolYear;
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
                'schoolYear' => SchoolYear::all(),
                'schoolYearFilter' => $request->school_year,
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
                'schoolYear' => SchoolYear::all(),
                'schoolYearFilter' => $request->school_year,
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
            $data['schoolYear'] = SchoolYear::all();
            $data['schoolYearFilter'] = $request->school_year;
            $data['schools'] = $this->services->handleGetSchool();
            $data['filter'] = $request->filter;
            $data['rankings'] = $this->services->handleGetPointStudent($request, $selectedSchoolYear);
            return view('dashboard.user.pages.leaderboard.index', $data);
        }
    }
}
