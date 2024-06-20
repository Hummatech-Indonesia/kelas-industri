<?php

namespace App\Helpers;

use App\Models\Exam;
use App\Models\Attendance;
use App\Models\StudentSchool;
use App\Models\SubmitAttendance;
use Illuminate\Database\Eloquent\Model;

/**
 * Import Model for Excel
 */
class DatasetHelper
{
    public static function attendance(StudentSchool $studentSchool) : float
    {
        $totalAttendance = Attendance::query()
                            ->whereHas('mentor.mentorClassrooms.classroom',function($query) use ($studentSchool){
                                $query->whereIn('id',$studentSchool->classrooms->pluck('id')->toArray());
                            })->count();

        
        $submitAttendance = SubmitAttendance::query()
                            ->where('student_id',$studentSchool->student_id)
                            ->count();

        
        if ($submitAttendance == 0) {
            return 0;
        }

        return $totalAttendance * 100 / $submitAttendance;
    }

    public static function exam(StudentSchool $studentSchool) : float
    {
        $examTerakhir = Exam::query()
                            ->whereHas('studentClassroom.studentSchool', function($query) use ($studentSchool) {
                                $query->where('id', $studentSchool->id);
                            })
                            ->latest()
                            ->first();

        if (!$examTerakhir) {
            return 0;
        }

        $rataRata = ($examTerakhir->complexity + $examTerakhir->code_cleanliness + $examTerakhir->design + $examTerakhir->presentation + $examTerakhir->understanding + $examTerakhir->task_level) / 6;

        return $rataRata;
    }
}
