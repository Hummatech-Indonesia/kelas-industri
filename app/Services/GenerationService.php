<?php

namespace App\Services;

use App\Helpers\SchoolYearHelper;
use App\Http\Requests\GenerationRequest;
use App\Repositories\GenerationRepository;

class GenerationService
{
    private GenerationRepository $repository;

    public function __construct(GenerationRepository $generationRepository)
    {
        $this->repository = $generationRepository;
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
     * @param int $schoolYearId
     * @return mixed
     */
    public function handleGetPaginate(int $schoolYearId): mixed
    {
        return $this->repository->get_paginate_by_school_year($schoolYearId, 8);
    }

    /**
     * store generation year
     *
     * @param GenerationRequest $request
     * @return void
     */
    public function handleCreate(GenerationRequest $request): void
    {
        $this->repository->store($request->validated());
    }

    /**
     * update generation year
     *
     * @param GenerationRequest $request
     * @param int $id
     * @return void
     */
    public function handleUpdate(GenerationRequest $request, int $id): void
    {
        $this->repository->update($id, $request->validated());
    }

    /**
     * handle delete generation year
     *
     * @param int $id
     * @return bool
     */
    public function handleDelete(int $id): bool
    {
        return $this->repository->destroy($id);
    }

    public function handleGetBySchoolYear(string|null $schoolYearId,$selectedYear){
        if($schoolYearId){
            return $this->repository->get_by_school_year($schoolYearId);
        }
        return $this->repository->get_by_school_year($selectedYear);
    }

    public function handleGetGeneration():mixed
    {
        return $this->repository->get_generation();
    }
}
