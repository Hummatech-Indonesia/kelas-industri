<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolPackage;
use App\Services\UserServices;
use App\Services\PackageService;
use App\Services\SchoolPackageService;

class SchoolPackageController extends Controller
{

    private UserServices $userService;
    private PackageService $packageService;
    private SchoolPackageService $schoolPackageService;

    public function __construct(UserServices $userService, PackageService $packageService, SchoolPackageService $schoolPackageService)
    {
        $this->userService = $userService;
        $this->packageService = $packageService;
        $this->schoolPackageService = $schoolPackageService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            return $this->packageService->handleGetByStatus($request->status);
        }
        $data = [
            'schools' => $this->userService->handleGetAllSchool(),
            'schoolPackages' => $this->schoolPackageService->handleGetAll(),
        ];
        return view('dashboard.finance.pages.schoolPackage.index', $data);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->schoolPackageService->handleCreate($request);
        return redirect()->back()->with('success', trans('alert.add_success'));
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->schoolPackageService->handleUpdate($request, $id);
        return redirect()->back()->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolPackage $schoolPackage)
    {
        $data = $this->schoolPackageService->handleDelete($schoolPackage);

        if (!$data) {
            return redirect()->back()->with('error', trans('alert.delete_constrained'));
        }

        return redirect()->back()->with('success', trans('alert.delete_success'));
    }

    public function changeStatus(Request $request, $id)
    {
        $this->schoolPackageService->handleChangeStatus($request, $id);
        return redirect()->back()->with('success', trans('alert.update_success'));
    }
}
