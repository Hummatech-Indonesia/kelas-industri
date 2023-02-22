<?php

namespace App\Repositories;

use App\Interfaces\BaseInterface;
use Illuminate\Database\QueryException;

abstract class BaseRepository implements BaseInterface
{
    public mixed $model;

    /**
     * Handle the Get all data event from models.
     *
     *
     * @param array|null $order
     * @return mixed
     */

    public function getAll(array $order = null): mixed
    {
        if($order){
            return $this->model->query()->orderBy($order['key'], $order['value'])->get();
        }
        return $this->model->all();
    }

    /**
     * Handle store data event to models.
     *
     * @param array $data
     *
     * @return mixed
     */

    public function store(array $data): mixed
    {
        return $this->model->create($data);
    }

    /**
     * Handle get the specified data by id from models.
     *
     * @param mixed $id
     *
     * @return mixed
     */

    public function show(mixed $id): mixed
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Handle show method and update data instantly from models.
     *
     * @param mixed $id
     * @param array $data
     *
     * @return mixed
     */

    public function update(mixed $id, array $data): mixed
    {
        return $this->show($id)->update($data);
    }

    /**
     * Handle show method and delete data instantly from models.
     *
     * @param mixed $id
     *
     * @return mixed
     */

    public function destroy(mixed $id): mixed
    {
        $destroy = $this->show($id);

        try {
            $destroy = $destroy->delete($id);
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1451) return false;
        }

        return $destroy;
    }

    /**
     * Handle count all data event from models.
     *
     *
     * @return mixed
     */

    public function countAll(): mixed
    {
        return $this->model->count();
    }

    /**
     * get paginated data
     *
     * @param int $limit
     * @param array|null $order
     * @return mixed
     */

    public function get_paginate(int $limit, array $order = null): mixed
    {
        if($order){
            return $this->model->query()
                ->orderBy($order['key'], $order['value'])
                ->paginate($limit);
        }
        return $this->model->query()
            ->paginate($limit);
    }
}
