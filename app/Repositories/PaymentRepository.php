<?php

namespace App\Repositories;

use App\Models\Payment;
use Illuminate\Support\Carbon;

class PaymentRepository extends BaseRepository
{

    public function __construct(Payment $payment)
    {
        $this->model = $payment;
    }

    public function getAllStudent(string $user)
    {
        return $this->model->query()
            ->where('user_id', $user)
            ->whereRelation('user.studentSchool.student', 'status', 'active')
            ->where('invoice_status', 'PAID')
            ->get();
    }

    public function getBySchool(string $school)
    {
        return $this->model->query()
            ->whereHas('user.studentSchool', function ($q) use ($school) {
                $q->where('school_id', $school);
            })
            ->whereRelation('user.studentSchool.student', 'status', 'active')
            ->get();
    }

    public function getGroupByMonth(): mixed
    {
        return $this->model->get(['payment_date', 'total_pay'])->groupBy(function ($val) {
            return Carbon::parse($val->payday)->translatedFormat('M');
        });
    }

    public function getGroupUser($semester): mixed
    {
        return $this->model->query()->where('semester', $semester)->get()->groupBy('user_id');
    }

    public function getBySchoolGroupUser($semester, $school): mixed
    {
        return $this->model->query()->whereHas('user.studentSchool', function ($q) use ($school) {
            $q->where('school_id', $school);
        })->where('semester', $semester)->get()->groupBy('user_id');
    }

    public function getTotalPayment(String $semester, String $userId): mixed
    {
        return $this->model->query()
            ->where('semester', $semester)
            ->where('user_id', $userId)
            ->where('invoice_status', 'paid')
            ->sum('total_pay');
    }

    public function getPaymentByStundet(String $userId): mixed
    {
        return $this->model->query()
            ->where('invoice_status', 'paid')
            ->where('user_id', $userId)
            ->get();
    }
}
