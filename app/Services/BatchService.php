<?php

namespace App\Services;

use App\Models\Exam;
use App\Models\Batch;
use App\Models\Challenge;
use App\Models\Classroom;
use App\Models\Attendance;
use App\Models\Alternative;
use App\Models\ExamCriteria;
use App\Models\SubmitChallenge;
use App\Models\StudentClassroom;
use App\Models\SubmitAttendance;
use App\Http\Requests\BatchRequest;
use App\Models\AlternativeCriteria;
use App\Models\Assignment;
use App\Models\SubmitAssignment;

class BatchService
{
    public function calculateScore(BatchRequest $request, Batch $batch, Classroom $classroom)
    {
        $criterias = $classroom->devision->criterias;
        $alternatives = Alternative::query()
            ->where('batch_id',$batch->id)
            ->get();

        $totalAttendance = Attendance::query()
            ->whereRelation('mentor.mentorClassrooms', 'classroom_id', $classroom->id)
            ->count();

        $totalChallange = Challenge::query()
            ->where('classroom_id', $classroom->id)
            ->count();

        $totalAssignment = Assignment::query()
                            ->whereRelation('submaterial.material.generation.classrooms','generation_id',$classroom->generation_id)
                            ->count();

        foreach ($alternatives as $alternative) {
            $exams = Exam::query()
                            ->with('examCriterias')
                            ->whereRelation('studentClassroom','student_school_id',$alternative->student_school_id)
                            ->when($request->exam_type != 'all',function($query) use ($request){
                                $query->where('exam_type',$request->exam_type);
                            })
                            ->when($request->semester != 'all',function($query) use ($request){
                                $query->where('semester',$request->semester);
                            })
                            ->get();
                            
            foreach ($criterias as $criteria) {

                if($criteria->name == 'Absensi'){
                    $score = $this->scoreAttendance($alternative->studentSchool->student_id,$classroom,$totalAttendance);
                }else if($criteria->name == 'Tantangan'){
                    $score = $this->scoreChallenge($alternative->student_school_id,$classroom,$totalChallange);
                }else if($criteria->name == 'Tugas'){
                    $score = $this->scoreTask($alternative->studentSchool->student_id,$classroom,$totalAssignment);
                }else{
                    $totalScore = 0;
                    foreach($exams as $exam)
                    {
                        $examCriteria = $exam->examCriterias()->where('criteria_id',$criteria->id)->first();
                        $totalScore += $examCriteria->score;
                    }

                    if($totalScore == 0){
                        $score = 0;
                    }else{
                        $score = $totalScore  / ( count($exams) * 100 );
                    }
                }

                AlternativeCriteria::query()->create([
                    'batch_id' => $batch->id,
                    'alternative_id' => $alternative->id,
                    'criteria_id' => $criteria->id,
                    'score' => $score,
                ]);
            }
        }
    }

    public function scoreAttendance(string $studentId,Classroom $classroom,int $totalAttendance)
    {
        if($totalAttendance == 0) return 1;
        $submitAttendace = SubmitAttendance::query()
                            ->whereRelation('attendance.mentor.mentorClassrooms', 'classroom_id', $classroom->id)
                            ->where('student_id',$studentId)
                            ->count();

        $score = $submitAttendace / $totalAttendance;

        return $score;
    }

    public function scoreChallenge(string $student_school_id,Classroom $classroom,int $totalChallange)
    {
        if($totalChallange == 0) return 1;
        $submitChallenge = SubmitChallenge::query()
                            ->whereRelation('studentSchool.classrooms','classroom_id',$classroom->id)
                            ->where('student_school_id',$student_school_id)
                            ->get();

        $score = $submitChallenge->sum('point') / ($totalChallange * 3);

        return $score;
    }

    public function scoreTask(string $studentId,Classroom $classroom,int $totalAssignment)
    {
        if($totalAssignment == 0) return 1;
        $submitAssignments = SubmitAssignment::query()
        ->whereRelation('assignment.submaterial.material.generation.classrooms','generation_id',$classroom->generation_id)
        ->where('student_id',$studentId)
        ->get();

        $score = ($submitAssignments->sum('point') / 100) / $totalAssignment;
        return $score;
    }

}
