<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TripayService;

class TripayController extends Controller
{
    private TripayService $service;
    public function __construct(TripayService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $data = $this->service->getPaymentChannels();
        $response = json_decode($data)->data;
        return $response;
    }

    public function store(Request $request)
    {
        if ($request['installment_payment'] <= 10000) {
            return redirect()->back()->with('error', 'Tidak bisa mencicil pembayaran kurang dari Rp. 10.000');
        } else if ($request['installment_payment'] >= $request['nominal']) {
            return redirect()->back()->with('error', 'Nominal yang anda bayarkan melebihi dari tanggungan semester ' . $request['semester']);
        }

        $response = $this->service->requestTranscaction($request->all());

        return redirect()->route(
            'student.detail-transaction',
            ['reference' => $response->reference]
        );
    }

    public function show($reference)
    {
        $response = $this->service->detailTransaction($reference);
        return $response;
    }
}
