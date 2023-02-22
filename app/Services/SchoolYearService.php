<?php

namespace App\Services;

use App\Http\Requests\SchoolYearRequest;
use App\Repositories\SchoolYearRepository;

class SchoolYearService
{
    private SchoolYearRepository $repository;

    public function __construct(SchoolYearRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * handle get all
     *
     * @param array|null $order
     * @return mixed
     */
    public function handleGetAll(array $order = null): mixed
    {
        return $this->repository->getAll($order);
    }

    /**
     * handle get paginated
     *
     * @return mixed
     */
    public function handleGetPaginate(): mixed
    {
        return $this->repository->get_paginate(8);
    }

    /**
     * store school year
     *
     * @param SchoolYearRequest $request
     * @return void
     */
    public function handleCreate(SchoolYearRequest $request): void
    {
        $this->repository->store($request->validated());
    }

    /**
     * update school year
     *
     * @param SchoolYearRequest $request
     * @param int $id
     * @return void
     */
    public function handleUpdate(SchoolYearRequest $request, int $id): void
    {
        $this->repository->update($id, $request->validated());
    }

    /**
     * handle delete school year
     *
     * @param int $id
     * @return bool
     */
    public function handleDelete(int $id): bool
    {
        return $this->repository->destroy($id);
    }
}
