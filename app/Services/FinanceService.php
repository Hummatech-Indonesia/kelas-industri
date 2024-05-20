<?php

namespace App\Services;

use App\Repositories\FinanceRepository;
use Illuminate\Http\Request;

class FinanceService
{
    private FinanceRepository $financeRepository;

    public function __construct(FinanceRepository $financeRepository)
    {
        $this->financeRepository = $financeRepository;
    }

    public function get(Request $request): mixed {
        $data = [
            'payment' => $this->financeRepository->getPayment($request),
            'salaries' => $this->financeRepository->getSalary($request),
            'schoolPackage' => $this->financeRepository->getSchoolPackage($request),
        ];

        $incomes = [
            'Jan' => 0,
            'Feb' => 0,
            'Mar' => 0,
            'Apr' => 0,
            'Mei' => 0,
            'Jun' => 0,
            'Jul' => 0,
            'Agt' => 0,
            'Sep' => 0,
            'Okt' => 0,
            'Nov' => 0,
            'Des' => 0
        ];
        $spents = [
            'Jan' => 0,
            'Feb' => 0,
            'Mar' => 0,
            'Apr' => 0,
            'Mei' => 0,
            'Jun' => 0,
            'Jul' => 0,
            'Agt' => 0,
            'Sep' => 0,
            'Okt' => 0,
            'Nov' => 0,
            'Des' => 0
        ];
        $depts = [
            'Jan' => 0,
            'Feb' => 0,
            'Mar' => 0,
            'Apr' => 0,
            'Mei' => 0,
            'Jun' => 0,
            'Jul' => 0,
            'Agt' => 0,
            'Sep' => 0,
            'Okt' => 0,
            'Nov' => 0,
            'Des' => 0
        ];

        foreach ($incomes as $key => $value) {
            if (isset($data['payment'][$key])) {
                $incomes[$key] += $data['payment'][$key];
            }
            if (isset($data['schoolPackage'][$key])) {
                if ($data['schoolPackage'][$key]['dept']) {
                    $depts[$key] = $data['schoolPackage'][$key]['dept'];
                }
                if ($data['schoolPackage'][$key]['paid']) {
                    $incomes[$key] += $data['schoolPackage'][$key]['paid'];
                }
            }
            if (isset($data['salaries'][$key])) {
                $spents[$key] += $data['salaries'][$key];
            }
        }

        return [
            "incomes" => $incomes,
            "spents" => $spents,
            "depts" => $depts,
        ];
    }
}
