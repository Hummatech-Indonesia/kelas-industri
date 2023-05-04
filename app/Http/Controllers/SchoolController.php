<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolRequest;
use App\Models\User;
use App\Services\SchoolService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SchoolController extends Controller
{
    private SchoolService $service;

    public function __construct(SchoolService $service)
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
        $schools = $this->service->handleGetPaginate();
        $parameters = null;

        if (request()->has('search')) {
            $schools = $this->service->handleSearch(request()->search);
            $parameters = request()->query();
        }
        $data = [
            'schools' => $schools,
            'parameters' => $parameters
        ];
        return view('dashboard.admin.pages.school.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('dashboard.admin.pages.school.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SchoolRequest $request
     * @return RedirectResponse
     */
    public function store(SchoolRequest $request): RedirectResponse
    {
        $this->service->handleCreate($request);

        return to_route('admin.schools.index')->with('success', trans('alert.add_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param User $school
     * @return View
     */
    public function show(User $school): View
    {
        // dd($school);
        return view('dashboard.admin.pages.school.detail', compact('school'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $school
     * @return View
     */
    public function edit(User $school): View
    {
        return view('dashboard.admin.pages.school.edit', compact('school'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SchoolRequest $request
     * @param User $school
     * @return RedirectResponse
     */
    public function update(SchoolRequest $request, User $school): RedirectResponse
    {
        $this->service->handleUpdate($request, $school);

        return to_route('admin.schools.index')->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $school
     * @return RedirectResponse
     */
    public function destroy(User $school): RedirectResponse
    {
        $data = $this->service->handleDelete($school);

        if (!$data) {
            return back()->with('error', trans('alert.delete_constrained'));
        }

        return back()->with('success', trans('alert.delete_success'));
    }
}
