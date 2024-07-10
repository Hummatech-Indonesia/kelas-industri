<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Helpers\SchoolYearHelper;
use App\Services\DevisionService;
use App\Services\MaterialService;
use App\Services\GenerationService;
use App\Services\SchoolYearService;
use App\Services\SubMaterialService;
use App\Services\MaterialExamService;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\MaterialRequest;

class MaterialController extends Controller
{
    private MaterialService $service;
    private MaterialExamService $materialExamService;
    private GenerationService $generationService;
    private SubMaterialService $subMaterialService;
    private SchoolYearService $schoolYearService;
    private DevisionService $devisionService;

    public function __construct(MaterialService $service, GenerationService $generationService, SubMaterialService $subMaterialService, SchoolYearService $schoolYearService, DevisionService $devisionService, MaterialExamService $materialExamService)
    {
        $this->service = $service;
        $this->generationService = $generationService;
        $this->subMaterialService = $subMaterialService;
        $this->schoolYearService = $schoolYearService;
        $this->devisionService = $devisionService;
        $this->materialExamService = $materialExamService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(Request $request): mixed
    {
        $schoolYear = SchoolYearHelper::get_current_school_year();
        $selectedSchoolYear = 0;
        if($schoolYear){
            $selectedSchoolYear = $schoolYear->id;
        }
        if($request->filter){
            $filter = $request->filter;
        }else{
            $filter = $selectedSchoolYear;
        }
        if (request()->ajax()) return $this->generationService->handleGetBySchoolYear($request->school_year_id,$selectedSchoolYear);
        $data = [
            'school_years' => $this->schoolYearService->handleGetAll(),
            'generations' => $this->generationService->handleGetAll(),
            'filter' => $filter,
            'search' => $request->search,
            'materials' =>  $this->service->handleSearch($request, $selectedSchoolYear)
        ];
        return view('dashboard.admin.pages.material.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $data = [
            'generations' => $this->generationService->handleGetAll(),
            'devisions' => $this->devisionService->handleGetAll()
        ];
        return view('dashboard.admin.pages.material.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MaterialRequest $request
     * @return RedirectResponse
     */
    public function store(MaterialRequest $request): RedirectResponse
    {
        $material = $this->service->handleCreate($request);
        $this->materialExamService->handleCreate($request, $material);

        return to_route('admin.materials.index')->with('success', trans('alert.add_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param Material $material
     * @return View
     */
    public function show(Material $material, Request $request): View
    {
        $data = [
            'material'  => $material,
            'subMaterials' => $this->subMaterialService->handleGetPaginate($material->id, $request),
            'parameters' => [
            'material'  => $material->id
            ]
        ];
        return view('dashboard.admin.pages.submaterial.index', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Material $material
     * @return View
     */
    public function edit(Material $material): View
    {
        $data = [
            'generations' => $this->generationService->handleGetAll(),
            'material'      => $material
        ];
        return view('dashboard.admin.pages.material.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MaterialRequest $request
     * @param Material $material
     * @return RedirectResponse
     */
    public function update(MaterialRequest $request, Material $material): RedirectResponse
    {
        $this->service->handleUpdate($request, $material->id);

        return to_route('admin.materials.index')->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Material $material
     * @return RedirectResponse
     */
    public function destroy(Material $material): RedirectResponse
    {
        $data = $this->service->handleDelete($material->id);

        if(!$data) return to_route('admin.materials.index')->with('error', trans('alert.delete_constrained'));

        return to_route('admin.materials.index')->with('success', trans('alert.delete_success'));
    }
    /**
     * Display the specified resource.
     *
     * @param Material $material
     * @return View
     */
    public function questionBank(Material $material, Request $request): View
    {
        $data = [
            'material'  => $material,
            'subMaterials' => $this->subMaterialService->handleGetPaginate($material->id, $request),
            'parameters' => [
            'material'  => $material->id
            ]
        ];
        return view('dashboard.admin.pages.questionBank.index', $data);
    }
}
