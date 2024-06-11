<?php

namespace App\Repositories;
use App\Models\SubMaterialExam;

class SubMaterialExamRepository extends BaseRepository
{
    public function __construct(SubMaterialExam $model)
    {
        $this->model = $model;
    }

    public function getBeforeFinished(): mixed
    {
        return $this->model->query()
        ->where('end_at', '>', now())
        ->latest()
        ->get();
    }

    public function getExamById(string $id): mixed
    {
        return $this->model->query()
        ->where('id', $id)
        ->first();
    }

    public function getExamFinnaly(int $limit): mixed
    {
        return $this->model->query()
        ->where('end_at', '<=', now())
        ->latest()
        ->paginate($limit);
    }

    public function getExamTakingPlace(int $limit): mixed
    {
        return $this->model->query()
        ->where('end_at', '>=', now())
        ->where('start_at', '<=', now())
        ->latest()
        ->paginate($limit);
    }
}
