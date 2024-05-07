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
        $service = $this->service->requestTranscaction($request->all());
        $response = json_decode($service)->data;
        return $response;
    }
}
