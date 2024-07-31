<?php

namespace App\Repositories;

use App\Models\StandartOperationProcedure;

class StandartOperationProcuderRepository extends BaseRepository
{
    public function __construct(StandartOperationProcedure $model)
    {
        $this->model = $model;
    }

    /**
     * get
     *
     * @return mixed
     */
    public function get(): mixed
    {
        return $this->model->query()
            ->get();
    }

    /**
     * store
     *
     * @param  mixed $data
     * @return mixed
     */
    public function store(array $data): mixed
    {
        return $this->model->query()
            ->create($data);
    }

    /**
     * delete
     *
     * @param  mixed $id
     * @return mixed
     */
    public function delete(mixed $id): mixed
    {
        return $this->model->query()
            ->delete($id);
    }

    /**
     * getByRole
     *
     * @return mixed
     */
    public function getByRole(): mixed
    {
        return $this->model->query()
            ->where('for_user', auth()->user()->roles->pluck('name')[0])
            ->first();
    }

    /**
     * update
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return mixed
     */
    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()
            ->findOrFail($id)
            ->update($data);
    }
}
