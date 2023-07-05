<?php

namespace App\Traits;

use App\Helpers\SchoolYearHelper;
use App\Models\Assignment;
use App\Models\Challenge;
use App\Models\Point;
use App\Models\SubmitAssignment;
use App\Models\SubmitChallenge;
use App\Models\ZoomSchedule;
use Carbon\Carbon;

trait DataSidebar
{

    function AssignmentMockup()
    {
        $currentDate = date('Y-m-d');
        if(auth()->user()->roles->pluck('name')[0] == 'student'){
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
            ->orderBy('end_date', 'desc')
            ->take(5)
            ->get();
        }
        return [];
    }


    function getDoneAssignment(string $studentId, string $year){
        return SubmitAssignment::where('student_id',$studentId)->whereRelation('assignment.submaterial.material.generation',function($query) use ($year){
            $query->where('school_year_id',$year);
        })->count();
    }

    function RankMockup()
    {
        $currentSchoolYear = SchoolYearHelper::get_current_school_year();
        return Point::where('school_year_id', $currentSchoolYear->id)
            ->groupBy('student_id')
            ->selectRaw('student_id, sum(point) as point')
            ->orderBy('point', 'desc')
            ->get();
    }

    function ChallengeMockup()
    {
        $currentDate = date('Y-m-d');
        if(auth()->user()->roles->pluck('name')[0] == 'student'){
            $classroomId = Auth()->user()->studentSchool->studentClassroom->classroom->id;
            return Challenge::where('classroom_id', $classroomId)
            ->where('end_date', '>', $currentDate)
            ->orderBy('end_date', 'desc')->take(5)->get();
        }

        return [];

    }


    function getDoneChallenge()
    {
        return SubmitChallenge::where('student_school_id',auth()->user()->studentSchool->id)->count();
    }

    function ScheduleMockup()
    {
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
    }

    function GetDataSidebar()
    {
        $data = [
            'SidebarRank' => $this->RankMockup(),
            'SidebarSchedule' => $this->ScheduleMockup(),
            'SidebarAssignment' => $this->AssignmentMockup(),
            'SidebarChallenge' => $this->ChallengeMockup(),
        ];
        return $data;
    }
}
