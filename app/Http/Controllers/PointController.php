<?php

namespace App\Http\Controllers;


use Illuminate\View\View;
use App\Services\PointService;
use App\Models\SubmitAssignment;
use App\Helpers\SchoolYearHelper;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\PointController;
use App\Http\Requests\SubmitAssignmentRequest;

class PointController extends Controller
{

    private PointService  $services;

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
    public function index(): View
    {
        $currentSchoolYear = SchoolYearHelper::get_current_school_year();
        $data = [
            'rankings' => $this->services->handleGetPointStudent($currentSchoolYear),
        ];
        return view('dashboard.admin.pages.ranking.index', $data);
    }

    public function storePointAssignment(SubmitAssignmentRequest $request) :RedirectResponse
    {
        $data = $request->only('point'); // Ganti 'field1', 'field2', dll. dengan nama field yang ingin Anda tambahkan
        dd($data);
        SubmitAssignment::create($data);

    // Kode lain yang diperlukan setelah penambahan data

    return response()->json(['message' => 'Data added successfully']);
    }
}
