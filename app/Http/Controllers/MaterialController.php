<?php

namespace App\Http\Controllers;

use App\Helpers\SchoolYearHelper;
use App\Http\Requests\MaterialRequest;
use App\Models\Materials;
use App\Services\GenerationService;
use App\Services\MaterialService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MaterialController extends Controller
{
    private MaterialService $service;
    private GenerationService $generationService;

    public function __construct(MaterialService $service, GenerationService $generationService)
    {
        $this->service = $service;
        $this->generationService = $generationService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $schoolYear = SchoolYearHelper::get_current_school_year();
        $selectedSchoolYear = $schoolYear->id;
        $data = [
            'generations' => $this->generationService->handleGetAll(),
            'materials'     =>  $this->service->handleGetPaginate($selectedSchoolYear)
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
            'generations' => $this->generationService->handleGetAll()
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
        $this->service->handleCreate($request);

        return to_route('admin.materials.index')->with('success', trans('alert.add_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Materials $material
     * @return View
     */
    public function edit(Materials $material): View
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
     * @param Materials $material
     * @return RedirectResponse
     */
    public function update(MaterialRequest $request, Materials $material): RedirectResponse
    {
        $this->service->handleUpdate($request, $material->id);

        return to_route('admin.materials.index')->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Materials $material
     * @return RedirectResponse
     */
    public function destroy(Materials $material): RedirectResponse
    {
        $data = $this->service->handleDelete($material->id);

        if(!$data) return to_route('admin.materials.index')->with('error', trans('alert.delete_constrained'));

        return to_route('admin.materials.index')->with('success', trans('alert.delete_success'));
    }
}
