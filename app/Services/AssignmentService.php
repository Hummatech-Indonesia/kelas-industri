<?php

namespace App\Services;

use App\Http\Requests\AssignmentRequest;
use App\Http\Requests\SubmitAssignmentRequest;
use App\Repositories\AssignmentRepository;

class AssignmentService
{
    private AssignmentRepository $repository;

    public function __construct(AssignmentRepository $repository)
    {
        $this->repository = $repository;

    }

    /**
     * handle get paginated
     *
     * @param int $schoolYearId
     * @return mixed
     */
    public function handleGetPaginate(int $schoolYearId): mixed
    {
        return $this->repository->get_paginate_by_school_year($schoolYearId, 6);
    }

    /**
     * handle get assignment student
     *
     * @param string $classroomId
     * @param string $assignmentId
     * @return mixed
     */
    public function handleGetAssignmentStudent(string $classroomId, string $assignmentId): mixed
    {
        return $this->repository->get_assignment_student($classroomId, $assignmentId);
    }

    /**
     * handle store
     *
     * @param AssignmentRequest $request
     * @return void
     */
    public function handleCreate(AssignmentRequest $request): void
    {
        $this->repository->store($request->validated());
    }

    public function submitAssignment(SubmitAssignmentRequest $request): void
    {
        // $data['assignment_id'] = $assignmentId;
        $data = $request->validated();
        $data['student_id'] = auth()->id();

        $this->repository->create_submit_assignment($data);
    }

    /**
     * handle update
     *
     * @param AssignmentRequest $request
     * @param string $id
     * @return void
     */
    public function handleUpdate(AssignmentRequest $request, string $id): void
    {
        $this->repository->update($id, $request->validated());
    }

    /**
     * handle delete
     *
     * @param string $id
     * @return bool
     */
    public function handleDelete(string $id): bool
    {
        return $this->repository->destroy($id);
    }

    public function handleGetStudentSubmitAssignment(string $studentId, string $assignmentId): mixed
    {
        return $this->repository->get_submit_assignment_student($studentId, $assignmentId);
    }

}
