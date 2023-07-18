<?php

namespace App\Services;

use App\Http\Requests\MaterialRequest;
use App\Repositories\MaterialRepository;
use Illuminate\Http\Request;

class MaterialService
{
    private MaterialRepository $repository;

    public function __construct(MaterialRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handleGetAll()
    {
        return $this->repository->getAll();
    }

    public function handleByClassroom(string $classroomId, $request){
        return $this->repository->get_by_classroom($classroomId, $request->search ,6);
    }

    /**
     * handle get paginated
     *
     * @param int $schoolYearId
     * @return mixed
     */
    public function handleGetPaginate($request, int $schoolYearId): mixed
    {
        return $this->repository->get_paginate_by_school_year($request, $schoolYearId, 6);
    }

    public function handleSearch(Request $search,$year): mixed
    {
        return $this->repository->search_paginate($search->search,$search->generation_id,$search->filter, $year ,6);
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

    public function handleCountMaterialStudent(int $schoolYearId) : mixed
    {
        return $this->repository->get_count_material_student($schoolYearId);
    }

    public function handleCountMaterialUser(int $schoolYearId) :mixed
    {
        return $this->repository->get_count_material_user($schoolYearId);
    }

    public function handleCountMaterialAdmin()
    {
        return $this->repository->get_count_material_admin();
    }
}
