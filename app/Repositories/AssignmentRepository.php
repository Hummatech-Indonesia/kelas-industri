<?php

namespace App\Repositories;

use App\Models\Assignment;
use App\Models\StudentClassroom;
use App\Models\User;

class AssignmentRepository extends BaseRepository
{
    private StudentClassroom $studentClassroom;
    private User $student;

    public function __construct(Assignment $assignment, StudentClassroom $studentClassroom, User $student)
    {
        $this->model = $assignment;
        $this->studentClassroom = $studentClassroom;
        $this->student = $student;
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
}
