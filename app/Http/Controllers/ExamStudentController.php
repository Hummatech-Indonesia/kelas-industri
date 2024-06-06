<?php

namespace App\Http\Controllers;

use App\Traits\DataSidebar;
use Illuminate\Http\Request;
use App\Helpers\SchoolYearHelper;
use App\Services\MaterialService;
use App\Services\GenerationService;
use App\Services\SchoolYearService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Services\SubMaterialService;

class ExamStudentController extends Controller
{
    use DataSidebar;
    private GenerationService $generationService;
    private SchoolYearService $schoolYearService;
    private MaterialService $service;
    private SubMaterialService $subMaterialService;
    public function __construct(GenerationService $generationService, SchoolYearService $schoolYearService, MaterialService $service, SubMaterialService $subMaterialService)
    {
        $this->generationService = $generationService;
        $this->schoolYearService = $schoolYearService;
        $this->subMaterialService = $subMaterialService;
        $this->service = $service;
    }
    public function show(): View
    {
        return view('dashboard.user.pages.studentExam.exam');
    }

    public function index(Request $request)
    {

    }
    public function showMaterials(Request $request): View
    {
        $data = $this->GetDataSidebar();
        $schoolYear = SchoolYearHelper::get_current_school_year();
        $selectedSchoolYear = 0;
        if ($schoolYear) {
            $selectedSchoolYear = $schoolYear->id;
        }
        if ($request->filter) {
            $filter = $request->filter;
        } else {
            $filter = $selectedSchoolYear;
        }
        if (request()->ajax()) return $this->generationService->handleGetBySchoolYear($request->school_year_id, $selectedSchoolYear);
        $data['school_years'] = $this->schoolYearService->handleGetAll();
        $data['generations'] = $this->generationService->handleGetAll();
        $data['filter'] = $filter;
        $data['search'] = $request->search;
        $data['materials'] =  $this->service->handleSearch($request, $selectedSchoolYear);
        return view("dashboard.user.pages.studentExam.index", $data);
    }

    public function showSubmaterial(Material $material, Request $request): View
    {
        $data = $this->GetDataSidebar();
        $data['material']  = $material;
        $data['subMaterials'] = $this->subMaterialService->handleGetPaginate($material->id, $request);
        $data['parameters'] = [
            'material'  => $material->id
        ];
        return view('dashboard.user.pages.studentExam.submaterial', $data);
    }
}
