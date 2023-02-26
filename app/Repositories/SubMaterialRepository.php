<?php

namespace App\Repositories;

use App\Models\SubMaterial;

class SubMaterialRepository extends BaseRepository
{
    public function __construct(SubMaterial $model)
    {
        $this->model = $model;
    }

    /**
     * get paginate by material id
     *
     * @param string $materialId
     * @param int $limit
     * @param array|null $order
     * @return mixed
     */
    public function get_paginate_by_material(string $materialId, int $limit, array $order = null): mixed
    {
        if($order){
            return $this->model->query()
                ->with('assignments')
                ->where('material_id', $materialId)
                ->orderBy($order['key'], $order['value'])
                ->paginate($limit);
        }
        return $this->model->query()
            ->with('assignments')
            ->where('material_id', $materialId)
            ->paginate($limit);
    }
}
