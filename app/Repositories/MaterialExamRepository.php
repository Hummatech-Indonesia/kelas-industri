<?php

namespace App\Repositories;

use App\Models\MaterialExam;

class MaterialExamRepository extends BaseRepository
{
    public function __construct(MaterialExam $model)
    {
        $this->model = $model;
    }

    public function create($data)
    {
        return $this->model->updateOrCreate(
            [
                'material_id' => $data['material_id'],
                'type' => $data['type']
            ],
            $data
        );
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
}
