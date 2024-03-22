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

    public function handleGeByClassroom(Request $request): mixed
    {
        return $this->repository->getByClassroom($request);
    }

    public function handleStore(DependentRequest $request)
    {
        return $this->repository->store($request->validated());
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
