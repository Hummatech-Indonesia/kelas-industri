<?php

namespace App\Traits;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Payment;
use App\Models\Challenge;
use App\Models\Dependent;
use App\Models\Assignment;
use App\Models\ZoomSchedule;
use App\Models\SchoolPackage;

trait DataSidebar
{

    function AssignmentMockup()
    {
        if (auth()->check()) {
            $currentDate = date('Y-m-d');
            if (auth()->user()->roles->pluck('name')[0] == 'student') {
                $generationId = Auth()->user()->studentSchool->studentClassroom->classroom->generation_id;
                return Assignment::whereIn('sub_material_id', function ($query) use ($generationId) {
                    $query->select('id')
                        ->from('sub_materials')
                        ->whereIn('material_id', function ($query) use ($generationId) {
                            $query->select('id')
                                ->from('materials')
                                ->whereIn('generation_id', function ($query) use ($generationId) {
                                    $query->select('id')
                                        ->from('generations')
                                        ->where('id', $generationId);
                                });
                        });
                })
                    ->where('end_date', '>', $currentDate)
                    ->orderBy('title', 'ASC')
                    ->orderBy('end_date', 'desc')
                    ->take(5)
                    ->get();
            }
            return [];
        } else {
            auth()->logout();
            return view('auth.login');
        }
    }

    function RankMockup()
    {
        if (auth()->check()) {
            if (auth()->user()->roles->pluck('name')[0] == 'student') {
                return User::role('student')
                    ->where('status', 'active')
                    ->whereHas('studentSchool.school')
                    ->whereRelation('studentSchool', function ($q) {
                        $q->where('school_id', auth()->user()->studentSchool->school_id);
                    })
                    ->orderBy('point', 'desc')
                    ->take(10)
                    ->get();
            } elseif (auth()->user()->roles->pluck('name')[0] == 'teacher') {
                return User::role('student')
                    ->where('status', 'active')
                    ->whereHas('studentSchool.school')
                    ->whereRelation('studentSchool', function ($q) {
                        $q->where('school_id', auth()->user()->teacherSchool->school_id);
                    })
                    ->orderBy('point', 'desc')
                    ->take(10)
                    ->get();
            } else {
                return User::role('student')
                    ->where('status', 'active')
                    ->whereHas('studentSchool.school')
                    ->orderBy('point', 'desc')
                    ->take(10)
                    ->get();
            }
        } else {
            return view('auth.login');
        }
    }

    function ChallengeMockup()
    {
        if (auth()->check()) {
            $currentDate = date('Y-m-d');
            if (auth()->user()->roles->pluck('name')[0] == 'student') {
                $classroomId = Auth()->user()->studentSchool->studentClassroom->classroom->id;
                return Challenge::where('classroom_id', $classroomId)
                    ->where('end_date', '>', $currentDate)
                    ->orderBy('title', 'ASC')
                    ->orderBy('end_date', 'desc')
                    ->take(5)
                    ->get();
            }

            return [];
        } else {
            return view('auth.login');
        }
    }

    function ScheduleMockup()
    {
        if (auth()->check()) {
            $role = auth()->user()->roles->pluck('name')[0];
            if ($role == 'mentor') {
                return ZoomSchedule::where('mentor_id', Auth()->id())->where('date', '>', Carbon::now())->orderBy('date', 'desc')->take(5)->get();
            } else if ($role == 'student') {
                $classroomId = Auth()->user()->studentSchool->studentClassroom->classroom->id;
                return ZoomSchedule::where('classroom_id', $classroomId)->where('date', '>', Carbon::now())->orderBy('date', 'desc')->take(5)->get();
            } else if ($role == 'teacher') {
                $classroomId = Auth()->user()->teacherSchool->teacherClassrooms->pluck('classroom_id')->toArray();
                return ZoomSchedule::whereIn('classroom_id', $classroomId)->where('date', '>', Carbon::now())->orderBy('date', 'desc')->take(5)->get();
            }
        } else {
            return view('auth.login');
        }
    }

    function MenuMockup()
    {
        if (auth()->user()->roles->pluck('name')[0] == 'student') {
            $dependent = Dependent::query()
                ->where('classroom_id', auth()->user()->studentSchool->studentClassroom->classroom_id)
                ->orderBy('semester', 'desc')
                ->first();

            $isPaymentComplete = true;

            if ($dependent && $dependent->semester > 1) {
                $previousSemester = $dependent->semester - 1;

                $studentPayment = Payment::query()
                    ->where('user_id', auth()->user()->id)
                    ->where('invoice_status', 'PAID')
                    ->where('semester', $previousSemester)
                    ->sum('total_pay');

                $previousDependent = Dependent::where(
                    'classroom_id',
                    auth()->user()->studentSchool->studentClassroom->classroom_id,
                )
                    ->where('semester', $previousSemester)
                    ->orderBy('semester', 'desc')
                    ->first();
                $nominalRequired = $previousDependent == null ? 0 : $previousDependent->nominal;
                $isPaymentComplete = $nominalRequired == $studentPayment;
            }
            return $isPaymentComplete;
        }
    }

    function SchoolPackageMockup()
    {
        if (auth()->user()->roles->pluck('name')[0] == 'student') {
            $schoolPayment = SchoolPackage::query()
                ->where('school_id', auth()->user()->studentSchool->school->id)
                ->latest()
                ->first();
            return $schoolPayment;
        }
    }

    function GetDataSidebar()
    {
        $data = [
            'schoolPayment' => $this->SchoolPackageMockup(),
            'isPaymentComplete' => $this->MenuMockup(),
            'SidebarRank' => $this->RankMockup(),
            'SidebarSchedule' => $this->ScheduleMockup(),
            'SidebarAssignment' => $this->AssignmentMockup(),
            'SidebarChallenge' => $this->ChallengeMockup(),
        ];
        return $data;
    }
}
