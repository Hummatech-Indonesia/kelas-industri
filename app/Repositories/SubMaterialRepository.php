<?php

namespace App\Repositories;

use App\Models\SubMaterial;
use App\Repositories\BaseRepository;

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
    public function get_paginate_by_material(string $materialId, string | null $search, int $limit, array $order = null): mixed
    {
        if ($order) {
            return $this->model->query()
                ->with('assignments')
                ->where('material_id', $materialId)
                ->orderBy($order['key'], $order['value'])
                ->where('title', 'LIKE', '%' . $search . '%')
                ->orderBy('created_at', 'ASC')
                ->paginate($limit);
        }
        return $this->model->query()
            ->with('assignments')
            ->where('material_id', $materialId)
            ->where('title', 'LIKE', '%' . $search . '%')
            ->orderBy('created_at', 'ASC')
            ->paginate($limit);
    }

    /**
     * getListSubMaterials
     *
     * @param  mixed $createdBy
     * @return mixed
     */
    public function getListSubMaterials(string $order, string $materialId): mixed
    {
        return $this->model->query()
            ->where('order', '>', $order)
            ->where('material_id', $materialId)
            ->oldest()
            ->limit(1)
            ->get();
    }

    public function getPrevSubMaterials(string $order, string $materialId): mixed
    {
        return $this->model->query()
            ->where('order', '<', $order)
            ->where('material_id', $materialId)
            ->latest()
            ->limit(1)
            ->get();
    }

    public function getPreviousSubMaterial(string $materialId, int $previousOrder): mixed
    {
        return $this->model->query()
            ->where('material_id', $materialId)
            ->where('order', $previousOrder)
            ->first();
    }

    public function getByMaterial(String $materialId): mixed
    {
        return $this->model->query()
            ->where('material_id' , $materialId)
            ->get();
    }

}
