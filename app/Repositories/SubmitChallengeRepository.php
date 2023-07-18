<?php

namespace App\Repositories;

use App\Models\SubmitChallenge;

class SubmitChallengeRepository extends BaseRepository
{
    public function __construct(SubmitChallenge $model)
    {
        $this->model = $model;
    }

    public function get_count_student_challenge (string $studentId, int $generationId) :mixed
    {
        return $this->model->query()
        ->whereRelation('studentSchool', function ($q) use ($studentId){
            $q->where('student_id', $studentId);
        })
        ->whereRelation('challenge.classroom', function ($q) use ($generationId){
            $q->where('generation_id', $generationId);
        })
        ->where('is_valid', 'valid')
        ->get();
    }

}
