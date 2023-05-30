<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Assignment;
use App\Models\StudentClassroom;
use App\Models\SubmitAssignment;
use Illuminate\Support\Facades\Storage;

class AssignmentRepository extends BaseRepository
{
    private StudentClassroom $studentClassroom;
    private User $student;
    private SubmitAssignment $submitAssignment;

    public function __construct(Assignment $assignment, StudentClassroom $studentClassroom, User $student, SubmitAssignment $submitAssignment)
    {
        $this->model = $assignment;
        $this->studentClassroom = $studentClassroom;
        $this->student = $student;
        $this->submitAssignment = $submitAssignment;
    }

    public function get_by_submaterial(string $submaterialId)
    {
        return $this->model->query()
            ->where('sub_material_id', $submaterialId)
            ->get();
    }

    public function get_assignment_student(string $classroomId, string $assignmentId): mixed
    {
        return $this->student->query()
            ->with('submitAssignment', function ($q) use ($assignmentId) {
                $q->where('assignment_id', $assignmentId);
            })
            ->whereRelation('studentSchool.classrooms', function ($q) use ($classroomId) {
                $q->where('classroom_id', $classroomId);
            })
//            ->withCount(['submitAssignment' => function ($q) use ($assignmentId) {
//                $q->where('assignment_id', $assignmentId);
//            }])
            ->get();
    }

    public function getSubmitAssignmentByStudentId($studentId)
{
    return $this->submitAssignment->where('student_id', $studentId)->first();
}


    public function get_submit_assignment_student(string $studentId, string $assignmentId): mixed
    {
        return $this->submitAssignment->query()
            ->where(['assignment_id' => $assignmentId, 'student_id' => $studentId])
            ->first();
    }

    public function create_submit_assignment(array $data, string $studentId): void
    {

    $oldFile = $this->submitAssignment->where('student_id', $studentId)->first();
    if ($oldFile) {
        Storage::disk('public')->delete($oldFile->file);
    }
    
    $this->submitAssignment->updateOrCreate(
        ['student_id' => $studentId], $data);
    }

    public function get_student_done_submit(string $assignmentId)
    {
        return $this->submitAssignment->query()
            ->where('assignment_id',$assignmentId)
            ->whereNotNull('point')
            ->pluck('student_id')
            ->toArray();
    }

    public function storePoint(int $id , int $point):void
    {
        $data = $this->submitAssignment->query()
            ->findorfail($id);
        $data->point = $point;
        $data->save();
    }

    public function showSubmitAssignment($id){
        return $this->submitAssignment->query()
            ->findOrFail($id);
    }
}
