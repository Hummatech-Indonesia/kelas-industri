<?php

namespace App\Repositories;

use App\Models\Payment;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use App\Models\StudentSchool;
use Illuminate\Support\Carbon;

class PaymentRepository extends BaseRepository
{
    private StudentSchool $studentSchool;

    public function __construct(Payment $payment)
    {
        $this->model = $payment;
    }

    public function getAllStudent(string $user)
    {
        return $this->model->query()
            ->where('user_id', $user)
            ->whereRelation('user.studentSchool.student', 'status', 'active')
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
            return Carbon::parse($val->payday)->format('M');
        });
    }

    public function getGroupUser($semester): mixed
    {
        return $this->model->query()->where('semester', $semester)->get()->groupBy('user_id');
    }
}
