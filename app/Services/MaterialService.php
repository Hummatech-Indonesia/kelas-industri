<?php

namespace App\Services;

use App\Http\Requests\MaterialRequest;
use App\Repositories\MaterialRepository;

class MaterialService
{
    private MaterialRepository $repository;

    public function __construct(MaterialRepository $repository)
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
     * handle store
     *
     * @param MaterialRequest $request
     * @return void
     */
    public function handleCreate(MaterialRequest $request): void
    {
        $this->repository->store($request->validated());
    }

    /**
     * handle update
     *
     * @param MaterialRequest $request
     * @param string $id
     * @return void
     */
    public function handleUpdate(MaterialRequest $request, string $id): void
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
}
