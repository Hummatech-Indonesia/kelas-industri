<?php

namespace App\Http\Middleware;

use App\Helpers\RoleHelper;
use Closure;
use App\Models\Payment;
use App\Models\Dependent;
use Illuminate\Http\Request;
use App\Models\SchoolPackage;

class CheckPayment
{
    public function handle(Request $request, Closure $next)
    {
        $role = RoleHelper::get_role();
        if ($role == 'student') {
            $user = auth()->user();

            $schoolPayment = SchoolPackage::query()
                ->where('school_id', auth()->user()->studentSchool->school->id)
                ->latest()
                ->first();

            if ($schoolPayment) {
                if ($schoolPayment->status == 'not_yet_paid') {
                    return redirect()->route('home');
                }
            }

            $dependent = Dependent::where('classroom_id', $user->studentSchool->studentClassroom->classroom_id)
                ->orderBy('semester', 'desc')
                ->first();

            if ($dependent && $dependent->semester > 1) {
                $previousSemester = $dependent->semester - 1;
                $studentPayment = Payment::where('user_id', $user->id)
                    ->where('semester', $previousSemester)
                    ->sum('total_pay');
                $nominalRequired = $dependent->nominal;

                $previousDependent = Dependent::where(
                    'classroom_id',
                    auth()->user()->studentSchool->studentClassroom->classroom_id,
                )
                    ->where('semester', $previousSemester)
                    ->orderBy('semester', 'desc')
                    ->first();

                $nominalRequired = $previousDependent->nominal;
                $isPaymentComplete = $nominalRequired == $studentPayment;
                
                if (!$isPaymentComplete) {
                    return redirect()->route('home');
                }
            }
            return $next($request);
        }
    }
}
