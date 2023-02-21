<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolYearRequest;
use App\Models\SchoolYear;
use App\Services\SchoolYearService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SchoolYearController extends Controller
{
    private SchoolYearService $service;

    public function __construct(SchoolYearService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $data = [
            'schoolYears'   => $this->service->handleGetPaginate()
        ];
        return view('dashboard.admin.pages.schoolYear.index', $data);
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
     * @param SchoolYearRequest $request
     * @return RedirectResponse
     */
    public function store(SchoolYearRequest $request): RedirectResponse
    {
        $this->service->handleCreate($request);
        return to_route('admin.schoolYears.index')->with('success', trans('alert.add_success'));
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
     * @param SchoolYearRequest $request
     * @param SchoolYear $schoolYear
     * @return RedirectResponse
     */
    public function update(SchoolYearRequest $request, SchoolYear $schoolYear): RedirectResponse
    {
        $this->service->handleUpdate($request, $schoolYear->id);
        return to_route('admin.schoolYears.index')->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param SchoolYear $schoolYear
     * @return RedirectResponse
     */
    public function destroy(SchoolYear $schoolYear): RedirectResponse
    {
        $data = $this->service->handleDelete($schoolYear->id);

        if ($data) return to_route('admin.schoolYears.index')->with('success', trans('alert.delete_success'));

        return to_route('admin.schoolYears.index')->with('error', trans('alert.delete_constrained'));
    }
}
