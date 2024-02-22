<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AssignmentRequest;
use App\Repositories\AssignmentRepository;
use App\Http\Requests\SubmitAssignmentRequest;
use App\Models\Assignment;
use App\Models\SubmitAssignment;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

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
    public function handleGetAssignmentStudent(string $classroomId, string $assignmentId, Request $request): mixed
    {
        // dd($request->filterShowing);
        if ($request->filterShowing == null) {
            # code...
            return $this->repository->get_assignment_student($classroomId, $assignmentId, $request, 10);
        }
        return $this->repository->get_assignment_student($classroomId, $assignmentId, $request, $request->filterShowing);
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

    public function submitAssignment(SubmitAssignmentRequest $request): mixed
    {
        $data = $request->validated();
        $studentId = auth()->id();

        // Deleting old file if it exists
        $oldAssignment = $this->repository->getSubmitAssignmentByStudentId($studentId);
        if ($oldAssignment && Storage::disk('public')->exists($oldAssignment->file)) {
            Storage::disk('public')->delete($oldAssignment->file);
        }

        // Save new file
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $data['file'] = $request->file('file')->store('assignment_file', 'public');
            if (!Storage::disk('public')->exists($data['file'])) {
                return redirect()->back()->with('error', 'gambar gagal tersimpan, silahkan masukan kembali');
            }
        } else {
            return redirect()->back()->with('error', 'gambar gagal tersimpan, silahkan masukan kembali');
        }

        $data['student_id'] = $studentId;
        return $this->repository->create_submit_assignment($data, $studentId);
    }


    public function storePoint($id, $point): void
    {
        $this->repository->storePoint($id, $point);
    }

    public function handleShowSubmitAssignment($id)
    {
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

    /**
     * countAssignments
     *
     * @param  mixed $previousOrder
     * @return int
     */
    public function countAssignments(string $previousSubmaterialId, int $previousOrder): int
    {
        return $this->repository->count_assignments($previousSubmaterialId, $previousOrder);
    }

    /**
     * countStudentAssignments
     *
     * @param  mixed $previousOrder
     * @return int
     */
    public function countStudentAssignments(string $previousSubmaterialId, int $previousOrder): int
    {
        return $this->repository->count_student_assignments($previousSubmaterialId, $previousOrder);
    }

    /**
     * countAssignmentByMaterial
     *
     * @param  mixed $subMaterial
     * @return int
     */
    public function countAssignmentByMaterial(string $subMaterial): int
    {
        return $this->repository->count_assignment_materials($subMaterial);
    }

    public function handleAssignmentByMaterialCertify(string $material): int
    {
        return $this->repository->countAssignmentByMaterialCertify($material);
    }

    public function countAssignmentsByMaterial(string $material): int
    {
        return $this->repository->countAssignmentsMaterial($material);
    }
}
