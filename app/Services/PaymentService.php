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

    public function handleStore(PaymentRequest $request): mixed
    {
        $semester_tanggungan = $request->semester_tanggungan;
        $total = $request->total;
        $pengurangan = $semester_tanggungan - $total;

        if ($pengurangan < $request->total_pay) {
            return redirect()->back()->with('error', 'Jumlah pembayaran melebihi kekurangan tanggungan. Masukkan sejumlah Rp. ' . $pengurangan);
        }
        if ($request->total_pay < 0) {
            return redirect()->back()->with('error', 'Jumlah pembayaran minimal Rp. 0');
        }
        if ($pengurangan == 0 && $request->total_pay > 0) {
            return redirect()->back()->with('error', 'Tanggungan anda sudah lunas');
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
}
