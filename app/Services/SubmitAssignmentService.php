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

    public function handleGetCountStudentByAssignment(string $studentId) :mixed
    {
        return $this->repository->get_count_student_assignment($studentId);
    }

    public function handleGetReportStudent(Request $search) :mixed
    {
        return $this->repository->getTotalPoint($search);
    }

    public function handleGetTotalAssignment()
    {
        return $this->repository->getTotalAssignment();
    }
}


?>
