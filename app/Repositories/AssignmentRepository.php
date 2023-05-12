<?php

namespace App\Repositories;

use App\Models\Assignment;
use App\Models\StudentClassroom;
use App\Models\SubmitAssignment;
use App\Models\User;

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

    public function get_submit_assignment_student(string $studentId, string $assignmentId): mixed
    {
        return $this->submitAssignment->query()
            ->where(['assignment_id' => $assignmentId, 'student_id' => $studentId])
            ->first();
    }

    public function create_submit_assignment(array $data): void
    {
        $this->submitAssignment->create($data);
    }
}
