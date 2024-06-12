<?php

namespace App\Repositories;

use App\Models\SubMaterialExamQuestion;
use App\Repositories\BaseRepository;

class SubMaterialExamQuestionRepository extends BaseRepository
{
    public function __construct(SubMaterialExamQuestion $model)
    {
        $this->model = $model;
    }

    public function getByExam(string $subMaterialExamQuestionId, int $limit): mixed
    {
        return $this->model->query()
        ->where('sub_material_exam_id', $subMaterialExamQuestionId)
        ->latest()
        ->paginate($limit);
    }

    /**
     * getLatestDataByExam
     *
     * @param  mixed $examId
     * @return mixed
     */
    public function getLatestDataByExam(string $examId): mixed
    {
        return $this->model->query()
            ->where('sub_material_exam_id', $examId)
            ->orderBy('question_number', 'desc')
            ->first();
    }

    /**
     * insert
     *
     * @param  mixed $data
     * @return mixed
     */
    public function insert(array $data): mixed
    {
        return $this->model->query()
            ->insert($data);
    }

     /**
     * getDataQuestionNumber
     *
     * @param  mixed $questionNumber
     * @param  mixed $examId
     * @return mixed
     */
    public function getDataQuestionNumber(string $examId, mixed $questionNumber): mixed
    {
        return $this->model->query()
            ->where('sub_material_exam_id', $examId)
            ->where('question_number', '>', $questionNumber)
            ->get();
    }

}
