<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\ScheduleRepository;
use Carbon\Carbon;

class ScheduleService
{
    private ScheduleRepository $repository;
    public function __construct(ScheduleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handleStore(Request $request): mixed
    {
        $event = $request['event'];
        return $this->repository->store($event);
    }
    public function handleGetAll(Request $request): mixed
    {
        return $this->repository->all();
    }
    public function handleDelete(int $id): mixed
    {
        return $this->repository->delete($id);
    }
}
