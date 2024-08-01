<?php

namespace App\Repositories;

use App\Models\MaterialExam;

class MaterialExamRepository extends BaseRepository
{
    public function __construct(MaterialExam $model)
    {
        $this->model = $model;
    }

    public function getPaginate($paginate)
    {
        return $this->model->query()
            ->with('material')
            ->paginate($paginate);
    }

    public function getExamById(string $id): mixed
    {
        return $this->model->query()
            ->where('id', $id)
            ->first();
    }


    public function getBeforeFinishedByGeneration(array $generation): mixed
    {
        return $this->model->query()
            ->whereRelation('material.generation', function ($query) use ($generation) {
                $query->whereIn('generation', $generation);
            })
            ->whereRelation('material', function ($query) {
                $query->orderBy('order', 'asc');
            })
            ->get();
    }
}
