<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Payment;
use Barryvdh\DomPDF\PDF;
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
        $data['dependents'] = $this->dependentService->handleGetAllByClassroom($classId);
        $data['channels'] = $tripay->index();
        $data['trackings'] = $this->paymentService->handleGetPaymentByStudet(auth()->user()->id);
        return view('dashboard.user.pages.payment.index', $data);
    }

    public function show($reference)
    {
        $data = $this->GetDataSidebar();
        $tripay = new TripayController($this->tripayService);
        $data['detailPayment'] = $tripay->show($reference);
        $data['payment'] = $this->paymentService->handleGetByReference($reference);

        return view('dashboard.user.pages.payment.show', $data);
    }

    public function detail(Payment $payment)
    {
        $data = $this->GetDataSidebar();
        $data['payment'] = $payment;
        return view('dashboard.user.pages.payment.detail', $data);
    }

    public function invoice($reference)
    {
        $data = $this->paymentService->handleGetByReference($reference);
        $currentSemester = $data->semester;
        if ($currentSemester == 1 || 3 || 5) {
            $semester = "Ganjil";
        } else {
            $semester = "Genap";
        }
        $dependet = $this->dependentService->handleGetByClassroomSemester(auth()->user()->studentSchool->studentClassroom->classroom_id, $currentSemester);
        $list = [
            'dependet' => number_format($dependet->nominal, 2, '.', ','),
            'reference' => $data->reference,
            'via' => $data->via,
            'semester' => $semester,
            'payment_total' => number_format($data->total_pay, 2, '.', ','),
            'fee_amount' => number_format($data->fee_amount, 2, '.', ','),
            'total' => number_format($data->paid_amount, 2, '.', ','),
            'created_at' => Carbon::parse($data->created_at)->locale('id')->isoFormat('D MMMM YYYY HH:mm'),
            'updated_at' => Carbon::parse($data->updated_at)->locale('id')->isoFormat('D MMMM YYYY HH:mm'),
        ];

        // return view('pdf.invoice', $list);
        $pdf = app('dompdf.wrapper'); // Get an instance of the PDF wrapper
        $pdf->loadView('pdf.invoice', $list);
        return $pdf->download('invoice.pdf'); // or $pdf->download('invoice.pdf') to download
    }
}
