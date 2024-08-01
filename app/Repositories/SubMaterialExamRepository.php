<?php

namespace App\Repositories;

use App\Enums\SubMaterialExamTypeEnum;
use App\Models\SubMaterialExam;

class SubMaterialExamRepository extends BaseRepository
{
    public function __construct(SubMaterialExam $model)
    {
        $this->model = $model;
    }

    public function storeRegristationExam(array $data): mixed
    {
        return $this->model->create($data);
    }

    public function getBeforeFinished(): mixed
    {
        return $this->model->query()
            ->where('type', SubMaterialExamTypeEnum::QUIZ->value)
            ->latest()
            ->get();
    }

    public function countAllSubMaterialQuiz(string $materialId): mixed
    {
        return $this->model->query()
            ->whereRelation('subMaterial.material', 'id', $materialId)
            ->where('type', SubMaterialExamTypeEnum::QUIZ->value)
            ->count();
    }

    public function getRegisterExam(): mixed
    {
        return $this->model->query()
            ->where('type', SubMaterialExamTypeEnum::REGISTER->value)
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
            ->where('type', SubMaterialExamTypeEnum::QUIZ->value)
            ->latest()
            ->paginate($limit);
    }

    public function getExamTakingPlace(int $limit): mixed
    {
        return $this->model->query()
            ->where('type', SubMaterialExamTypeEnum::QUIZ->value)
            ->where('end_at', '>=', now())
            ->where('start_at', '<=', now())
            ->latest()
            ->paginate($limit);
    }

    public function getBySlug(string $slug): mixed
    {
        return $this->model->query()
            ->with('studentSubmaterialExams.student.studentSchool.studentClassroom')
            ->where('type', SubMaterialExamTypeEnum::QUIZ->value)
            ->where('slug', $slug)
            ->first();
    }
}
