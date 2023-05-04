<?php

namespace App\Services;

use App\Http\Requests\ClassroomRequest;
use App\Repositories\ClassroomRepository;
use App\Repositories\StudentClassroomRepository;
use Illuminate\Http\Request;

class ClassroomService
{
    private ClassroomRepository $repository;
    private StudentClassroomRepository $studentClassroomRepository;

    public function __construct(ClassroomRepository $repository, StudentClassroomRepository $studentClassroomRepository)
    {
        $this->repository = $repository;
        $this->studentClassroomRepository = $studentClassroomRepository;
    }

    /**
     * handle get all
     *
     * @return mixed
     */
    public function handleGetAll(): mixed
    {
        return $this->repository->getAll();
    }

    
    public function handleGetClassroomByStudent(string $studentId)
    {
        return $this->repository->get_by_student($studentId);
    }

    /**
     * handle get by school in the current school year
     *
     * @param string $schoolId
     * @param int $schoolYearId
     * @return mixed
     */
    public function handleGetBySchool(string $schoolId, int $schoolYearId): mixed
    {
        return $this->repository->get_by_school($schoolId, $schoolYearId);
    }

    /**
     * handle get paginated
     *
     * @param string $schoolId
     * @return mixed
     */
    public function handleGetPaginate(string $schoolId): mixed
    {
        return $this->repository->get_paginate_by_school($schoolId, 8);
    }

    /**
     * handle search
     *
     * @param string $search
     * @param string $schoolId
     * @return mixed
     */
    public function handleSearch(string $search, string $schoolId): mixed
    {
        return $this->repository->get_paginate_by_school_search($search, $schoolId, 8);
    }

    /**
     * store generation year
     *
     * @param ClassroomRequest $request
     * @return void
     */
    public function handleCreate(ClassroomRequest $request): void
    {
        $this->repository->store($request->validated());
    }

    /**
     * update generation year
     *
     * @param ClassroomRequest $request
     * @param string $id
     * @return void
     */
    public function handleUpdate(ClassroomRequest $request, string $id): void
    {
        $this->repository->update($id, $request->validated());
    }

    /**
     * handle delete generation year
     *
     * @param string $id
     * @return bool
     */
    public function handleDelete(string $id): bool
    {
        return $this->repository->destroy($id);
    }

    /**
     * handle add student
     *
     * @param Request $request
     * @return void
     */
    public function handleAddStudent(Request $request): void
    {
        $this->studentClassroomRepository->delete_student_by_classroom($request->classroom_id);

        foreach ($request->students as $student) {
            $this->studentClassroomRepository->store([
                'classroom_id' => $request->classroom_id,
                'student_school_id' => $student
            ]);
        }
    }
}
