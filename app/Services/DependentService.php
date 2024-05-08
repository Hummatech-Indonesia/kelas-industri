<?php

namespace App\Services;

use App\Models\Dependent;
use Illuminate\Http\Request;
use App\Http\Requests\DependentRequest;
use App\Repositories\DependentRepository;

class DependentService
{
    private DependentRepository $repository;

    public function __construct(DependentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handleGetLatest(): mixed {
        return $this->repository->getLatest();
    }

    public function handleGeByClassroom(Request $request, $schoolId): mixed
    {
        return $this->repository->getByClassroom($request, $schoolId);
    }

    public function handleCreate(DependentRequest $request)
    {
        return $this->repository->create($request->validated());
    }

    public function handleUpdate(Dependent $dependent, DependentRequest $request): mixed
    {
        return $this->repository->update($dependent->id, $request->validated());
    }

    public function handleGetAllByClassroom(string $classroom)
    {
        return $this->repository->getAllByClassroom($classroom);
    }
}
