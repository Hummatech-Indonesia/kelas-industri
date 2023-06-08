<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AssignmentRequest;
use App\Repositories\AssignmentRepository;
use App\Http\Requests\SubmitAssignmentRequest;
use App\Models\Assignment;
use App\Models\SubmitAssignment;

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
        $data = $request->validated();
    $studentId = auth()->id();

    // Menghapus file lama jika ada
    $oldAssignment = $this->repository->getSubmitAssignmentByStudentId($studentId);
    if ($oldAssignment) {
        Storage::disk('public')->delete($oldAssignment->file);
    }

    // Simpan file baru
    $data['file'] = $request->file('file')->store('assignment_file', 'public');
    $data['student_id'] = $studentId;
    $this->repository->create_submit_assignment($data, $studentId);
}

    public function storePoint($id, $point): void
    {
        $this->repository->storePoint($id,$point);
    }

    public function handleShowSubmitAssignment($id){
        return $this->repository->ShowSubmitAssignment($id);
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

    public function handleGetStudentDoneSubmit(Assignment $assignment)
    {
        return $this->repository->get_student_done_submit($assignmentId);
    }

    public function handleCountAssignmentStudent()
    {
        return $this->repository->get_count_assignment_student();
    }

    public function handleCountAssignmentTeacher(string $teacherId)
    {
        return $this->repository->get_count_assignment_teacher($teacherId);
    }

}
