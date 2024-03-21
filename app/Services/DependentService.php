<?php

namespace App\Services;

use App\Models\Dependent;
use App\Repositories\DependentRepository;
use Illuminate\Http\Request;

class DependentService
{
    private DependentRepository $repository;

    public function __construct(DependentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handleGetAll(): mixed
    {
        return $this->repository->getAll();
    }

    public function handleStore(Request $request)
    {
        return $this->repository->store($request->validated());
    }

    public function handleUpdate(Dependent $dependent, Request $request): mixed
    {
        return $this->repository->update($dependent->id, $request->validated());
    }
}
