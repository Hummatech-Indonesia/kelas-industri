<?php

namespace App\Http\Controllers;

use App\Helpers\SchoolYearHelper;
use App\Http\Requests\GenerationRequest;
use App\Models\Generation;
use App\Services\GenerationService;
use App\Services\SchoolYearService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GenerationController extends Controller
{
    private GenerationService $service;
    private SchoolYearService $schoolYearService;

    public function __construct(GenerationService $service, SchoolYearService $schoolYearService)
    {
        $this->service = $service;
        $this->schoolYearService = $schoolYearService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $schoolYear = SchoolYearHelper::get_current_school_year();
        $generations = $this->service->handleGetPaginate($schoolYear->id);
        $selectedSchoolYear = $schoolYear->id;

       if($request->has('search')){
           $generations = $this->service->handleGetPaginate($request->search);
           $selectedSchoolYear = $request->search;
       }

        $data = [
            'generations'   => $generations,
            'schoolYears'   => $this->schoolYearService->handleGetAll(['key' => 'school_year', 'value' => 'desc']),
            'selectedSchoolYear' => $selectedSchoolYear
        ];
//        dd($schoolYear);
        return view('dashboard.admin.pages.generation.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param GenerationRequest $request
     * @return RedirectResponse
     */
    public function store(GenerationRequest $request): RedirectResponse
    {
        $this->service->handleCreate($request);
        return back()->with('success', trans('alert.add_success'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param GenerationRequest $request
     * @param Generation $generation
     * @return RedirectResponse
     */
    public function update(GenerationRequest $request, Generation $generation): RedirectResponse
    {
        $this->service->handleUpdate($request, $generation->id);
        return back()->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Generation $generation
     * @return RedirectResponse
     */
    public function destroy(Generation $generation): RedirectResponse
    {
        $data = $this->service->handleDelete($generation->id);

        if ($data) return back()->with('success', trans('alert.delete_success'));

        return back()->with('error', trans('alert.delete_constrained'));
    }
}
