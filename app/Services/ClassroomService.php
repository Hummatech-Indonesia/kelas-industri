<?php

namespace App\Services;

use App\Http\Requests\ClassroomRequest;
use App\Repositories\ClassroomRepository;

class ClassroomService
{
    private ClassroomRepository $repository;

    public function __construct(ClassroomRepository $repository)
    {
        $this->repository = $repository;
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
}
