<?php

namespace App\Http\Controllers;

use App\Traits\DataSidebar;
use Illuminate\Http\Request;
use App\Services\TripayService;
use App\Services\DependentService;
use App\Http\Controllers\TripayController;

class StudentPaymentController extends Controller
{
    use DataSidebar;

    private DependentService $dependentService;
    private TripayService $tripayService;

    public function __construct(DependentService $dependentService, TripayService $tripayService)
    {
        $this->dependentService = $dependentService;
        $this->tripayService = $tripayService;
    }

    public function index()
    {
        $classId = Auth()->user()->studentSchool->studentClassroom->classroom_id;
        $tripay = new TripayController($this->tripayService);
        $data = $this->GetDataSidebar();
        $data['dependents'] = $this->dependentService->handleGetAllByClassroom($classId);
        $data['channels'] = $tripay->index();
    // dd($data['channels']);
        return view('dashboard.user.pages.payment.index', $data);
    }
}
