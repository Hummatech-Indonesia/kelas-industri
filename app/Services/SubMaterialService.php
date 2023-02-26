<?php

namespace App\Services;

use App\Http\Requests\SubMaterialRequest;
use App\Repositories\SubMaterialRepository;

class SubMaterialService
{
    private SubMaterialRepository $repository;

    public function __construct(SubMaterialRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * handle get paginated
     *
     * @param string $materialId
     * @return mixed
     */
    public function handleGetPaginate(string $materialId): mixed
    {
        return $this->repository->get_paginate_by_material($materialId, 6);
    }

    /**
     * handle store
     *
     * @param SubMaterialRequest $request
     * @return void
     */
    public function handleCreate(SubMaterialRequest $request): void
    {
        $data = $request->validated();
        $data['teacher_file'] = $request->file('teacher_file')->store('teacher_file', 'public');
        $data['student_file'] = $request->file('student_file')->store('student_file', 'public');

        $this->repository->store($data);
    }

    /**
     * handle update
     *
     * @param SubMaterialRequest $request
     * @param string $id
     * @return void
     */
    public function handleUpdate(SubMaterialRequest $request, string $id): void
    {
        $data = $request->validated();
        if($request->hasFile('teacher_file')){
            $data['teacher_file'] = $request->file('teacher_file')->store('teacher_file', 'public');
        }
        if($request->hasFile('student_file')){
            $data['student_file'] = $request->file('student_file')->store('student_file', 'public');
        }
        $this->repository->update($id, $data);
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
