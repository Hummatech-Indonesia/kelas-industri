<?php

namespace App\Http\Controllers;

use App\Services\FinanceService;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    private FinanceService $financeService;

    public function __construct(FinanceService $financeService) {
        $this->financeService = $financeService;
    }
    public function get(Request $request): mixed {
        $data = $this->financeService->get($request);
        return response()->json($data);
    }
}
