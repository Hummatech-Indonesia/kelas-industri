<?php

namespace App\Repositories;

use App\Models\Salary;
use App\Models\Payment;
use App\Models\SchoolPackage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FinanceRepository extends BaseRepository
{
    private Salary $salary;
    private Payment $payment;
    private SchoolPackage $schoolPackage;
    public function __construct(Salary $salary, Payment $payment, SchoolPackage $schoolPackage) {
        $this->payment = $payment;
        $this->salary = $salary;
        $this->schoolPackage = $schoolPackage;
    }


    public function getPayment(Request $request): mixed {
        $payments = $this->payment->query()
        ->whereYear("created_at", now()->year)
        ->get(['payment_date', 'total_pay'])
        ->groupBy(function($d) {
            return Carbon::parse($d->created_at)->locale('id')->translatedFormat("M");
        });

        $data = [];
        foreach ($payments as $month => $incomes) {
            $amount = 0;
            foreach ($incomes as $payment) {
                $amount += $payment->total_pay;
            }
            $data[$month] = $amount;
        }
        return $data;
    }
    public function getSalary(Request $request): mixed {
        $salaries = $this->salary->query()
        ->whereYear("created_at", now()->year)
        ->get(['payDay', 'salary_amount'])
        ->groupBy(function($d) {
            return Carbon::parse($d->payDay)->locale('id')->translatedFormat("M");
        });

        $data = [];
        foreach ($salaries as $month => $incomes) {
            $amount = 0;
            foreach ($incomes as $payment) {
                $amount += $payment->total_pay;
            }
            $data[$month] = $amount;
        }
        return $data;
    }
    public function getSchoolPackage(Request $request): mixed {
        $schoolPackages = $this->schoolPackage->query()
        ->whereYear("updated_at", now()->year)
        ->get(['status', 'price'])
        ->groupBy(function($d) {
            return Carbon::parse($d->updated_at)->locale('id')->translatedFormat("M");
        });

        $data = [];
        foreach ($schoolPackages as $month => $incomes) {
            $paid = 0;
            $dept = 0;
            foreach ($incomes as $payment) {
                if($payment->status == 'already_paid') {
                    $paid += $payment->price;
                }
                if($payment->status == 'debt') {
                    $dept += $payment->price;
                }
            }
            $data[$month] = [
                'dept' => $dept,
                'paid' => $paid
            ];
        }
        return $data;
    }
}
