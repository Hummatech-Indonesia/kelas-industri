<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\View\View;
use App\Models\SubMaterial;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\SubMaterialService;
use Illuminate\Http\RedirectResponse;
use App\Services\SubMaterialExamService;
use App\Http\Requests\SubMaterialRequest;
use App\Repositories\SubMaterialRepository;

class SubMaterialController extends Controller
{
    private SubMaterialService $service;
    private SubMaterialRepository $repository;
    private SubMaterialExamService $examService;

    public function __construct(SubMaterialService $service, SubMaterialRepository $repository, SubMaterialExamService $examService)
    {
        $this->examService = $examService;
        $this->service = $service;
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Material $material
     * @return View
     */
    public function create(Material $material): View
    {
        return view('dashboard.admin.pages.submaterial.create', compact('material'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SubMaterialRequest $request
     * @return RedirectResponse
     */
    public function store(SubMaterialRequest $request): RedirectResponse
    {
        $subMaterial = $this->service->handleCreate($request);
        $this->examService->handleCreate($request, $subMaterial);
        return to_route('admin.materials.show', $request->material_id)->with('success', trans('alert.add_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param SubMaterial $submaterial
     * @return View
     */
    public function show(SubMaterial $submaterial): View
    {
        $data = [
            'subMaterial' => $submaterial
        ];
        return view('dashboard.admin.pages.submaterial.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Material $material
     * @param SubMaterial $subMaterial
     * @return View
     */
    public function edit(Material $material, SubMaterial $subMaterial): View
    {
        return view('dashboard.admin.pages.submaterial.edit', compact('subMaterial', 'material'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SubMaterialRequest $request
     * @param SubMaterial $submaterial
     * @return RedirectResponse
     */
    public function update(SubMaterialRequest $request, SubMaterial $submaterial): RedirectResponse
    {
        $this->service->handleUpdate($request, $submaterial->id);
        return to_route('admin.materials.show', $request->material_id)->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param SubMaterial $submaterial
     * @return RedirectResponse
     */
    public function destroy(SubMaterial $submaterial): RedirectResponse
    {
        $data = $this->service->handleDelete($submaterial->id);

        if (!$data) return back()->with('error', trans('alert.delete_constrained'));

        return back()->with('success', trans('alert.delete_success'));
    }

    /**
     * view submaterial pdf
     *
     * @param SubMaterial $submaterial
     * @param string $role
     * @return View
     */
    public function viewMaterial(SubMaterial $submaterial, string $role): View
    {
        return view('dashboard.admin.pages.submaterial.view', compact('submaterial', 'role'));
    }

    public function showSubMaterial(Request $request)
    {
        if (request()->ajax()) {
            return $this->repository->getByMaterial($request->materialId);
        }
    }
}
