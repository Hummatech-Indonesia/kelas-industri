<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Traits\DataSidebar;
use Illuminate\Http\Request;
use App\Services\TripayService;
use App\Services\PaymentService;
use App\Services\DependentService;
use App\Http\Controllers\TripayController;

class StudentPaymentController extends Controller
{
    use DataSidebar;

    private DependentService $dependentService;
    private TripayService $tripayService;
    private PaymentService $paymentService;

    public function __construct(DependentService $dependentService, TripayService $tripayService, PaymentService $paymentService)
    {
        $this->dependentService = $dependentService;
        $this->tripayService = $tripayService;
        $this->paymentService = $paymentService;
    }

    public function index()
    {
        $classId = Auth()->user()->studentSchool->studentClassroom->classroom_id;
        $tripay = new TripayController($this->tripayService);
        $data = $this->GetDataSidebar();
        $data['payment'] = $this->paymentService->handleGetPaymentByStudet(auth()->user()->id);
        $data['dependents'] = $this->dependentService->handleGetAllByClassroom($classId);
        $data['channels'] = $tripay->index();
        $data['trackings'] = $this->paymentService->handleGetPaymentByStudet(auth()->user()->id);
        // dd($data['channels']);
        return view('dashboard.user.pages.payment.index', $data);
    }

    public function show($reference)
    {
        $data = $this->GetDataSidebar();
        $tripay = new TripayController($this->tripayService);
        $data['detailPayment'] = $tripay->show($reference);
        // dd($data['detailPayment']);
        return view('dashboard.user.pages.payment.show', $data);
    }

    public function detail(Payment $payment)
    {
        $data = $this->GetDataSidebar();
        $data['payment'] = $payment;
        return view('dashboard.user.pages.payment.detail', $data);
    }
}
