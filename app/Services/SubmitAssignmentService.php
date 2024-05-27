<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\SubmitAssignmentRepository;

class SubmitAssignmentService
{
    private SubmitAssignmentRepository $repository;

    public function __construct(SubmitAssignmentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handleGetCountStudentByAssignment(string $studentId, int $generationId) :mixed
    {
        return $this->repository->get_count_student_assignment($studentId, $generationId);
    }

    public function handleGetReportStudent(string $classroomId) :mixed
    {
        return $this->repository->getTotalPoint($classroomId);
    }

    public function handleGetTotalAssignment()
    {
        return $this->repository->getTotalAssignment();
    }

    public function handleGetTotalAcceptAssignment()
    {
        return $this->repository->getCountAcceptAssignments();
    }
}


?>
