<?php

namespace App\Services;

use App\Http\Requests\StandartOperationProcuderRequest;
use App\Models\StandartOperationProcedure;
use App\Repositories\StandartOperationProcuderRepository;

class StandartOperationProcuderService
{
    private StandartOperationProcuderRepository $repository;

    public function __construct(StandartOperationProcuderRepository $repository)
    {
        $this->repository = $repository;
    }


    public function getByRole()
    {
        return $this->repository->getByRole();
    }

    /**
     * get
     *
     * @return void
     */
    public function get()
    {
        return $this->repository->get();
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(StandartOperationProcuderRequest $request)
    {
        return $this->repository->store($request->validated());
    }

    /**
     * delete
     *
     * @param  mixed $standartOperationProcedure
     * @return void
     */
    public function delete(StandartOperationProcedure $standartOperationProcedure)
    {
        return $this->repository->delete($standartOperationProcedure->id);
    }

    public function update(StandartOperationProcedure $standartOperationProcedure, StandartOperationProcuderRequest $request)
    {
        return $this->repository->update($standartOperationProcedure->id, $request->validated());
    }
}
