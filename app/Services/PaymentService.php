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
}
