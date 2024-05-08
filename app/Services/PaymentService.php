<?php

namespace App\Services;

use App\Http\Requests\PaymentRequest;
use App\Repositories\PaymentRepository;
use Illuminate\Http\Request;

class PaymentService
{
    private PaymentRepository $payment;

    public function __construct(PaymentRepository $payment)
    {
        $this->payment = $payment;
    }

    public function handleGetGroupUser($dependent): mixed
    {
        $data = $this->payment->getGroupUser($dependent->semester);
        $totalPayment = 0;
        $studentPayment =  ['paid_off' => 0, 'not_yet_paid_off' => 0];
        foreach ($data as $user => $payments) {
            foreach ($payments as $payment) {
                $totalPayment += $payment->total_pay;
            }
            if ($totalPayment == $dependent->nominal) {
                $studentPayment['paid_off']++;
            } else {
                $studentPayment['not_yet_paid_off']++;
            }
        }
        return $studentPayment;
    }
    public function handleStore(PaymentRequest $request): mixed
    {
        $semester_tanggungan = $request->semester_tanggungan;
        $total = $request->total;
        $pengurangan = $semester_tanggungan - $total;

        if ($pengurangan == 0) {
            return redirect()->back()->with('error', 'Tanggungan anda sudah lunas');
        }
        if ($pengurangan < $request->total_pay) {
            return redirect()->back()->with('error', 'Jumlah pembayaran melebihi kekurangan tanggungan. Masukkan sejumlah Rp. ' . $pengurangan);
        }
        if ($request->total_pay < 0) {
            return redirect()->back()->with('error', 'Jumlah pembayaran minimal Rp. 0');
        }
        return $this->payment->store($request->validated());
    }

    public function handleGetByStudent(string $user)
    {
        return $this->payment->getAllStudent($user);
    }

    public function handleUpdate(string $payment, PaymentRequest $request)
    {
        return $this->payment->update($payment, $request->validated());
    }

    public function handleGetBySchool(string $school)
    {
        return $this->payment->getBySchool($school);
    }

    public function handleGetGroupByMonth(): mixed
    {
        $raw = $this->payment->getGroupByMonth();

        $data = [];
        $label = [];
        foreach ($raw as $month => $incomes) {
            $amount = 0;
            foreach ($incomes as $payment) {
                $amount += $payment->total_pay;
            }
            $data[$month] = $amount;
            array_push($label, $month);
        }
        return [
            'label' => $label,
            'data' => $data
        ];
    }
}
