<?php

namespace App\Repositories;

use App\Models\Payment;
use App\Models\StudentSchool;
use Illuminate\Http\Request;

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
            ->get();
    }

    public function getBySchool(string $school)
    {
        return $this->model->query()
            ->whereHas('user.studentSchool', function ($q) use ($school) {
                $q->where('school_id', $school);
            })
            ->get();
    }
}
