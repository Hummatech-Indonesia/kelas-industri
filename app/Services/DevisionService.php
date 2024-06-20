<?php

namespace App\Services;

use App\Http\Requests\DevisionRequest;
use App\Models\Devision;
use App\Repositories\DevisionRepository;

class DevisionService
{
    public  DevisionRepository $repository;

    public function __construct(DevisionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handleGetAllDevision()
    {
        return $this->repository->getAllDevision();
    }

    public function handleGetAll()
    {
        return $this->repository->getAll();
    }

    public function handleStoreDevision(DevisionRequest $request)
    {
        $devision = $this->repository->store($request->validated());

        $devision->criterias()->insert([
                [
                    'devision_id' => $devision->id,
                    'name' => 'Absensi',
                    'type' => 'BENEFIT',
                    'weight' => 10,
                    'is_default' => 1
                ],
                [
                    'devision_id' => $devision->id,
                    'name' => 'Tantangan',
                    'type' => 'BENEFIT',
                    'weight' => 10,
                    'is_default' => 1
                ],
                [
                    'devision_id' => $devision->id,
                    'name' => 'Tugas',
                    'type' => 'BENEFIT',
                    'weight' => 10,
                    'is_default' => 1
                ],
            ]);
    }

    public function handleUpdateDevision(DevisionRequest $request, Devision $devision)
    {
        $this->repository->update($devision->id, $request->validated());
    }

    public function handleDestroyDevision(Devision $devision)
    {
        $this->repository->destroy($devision->id);
    }
}
