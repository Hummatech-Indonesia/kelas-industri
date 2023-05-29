<?php

namespace App\Repositories;

use App\Models\SubmitChallenge;

class SubmitChallengeRepository extends BaseRepository
{
    public function __construct(SubmitChallenge $model)
    {
        $this->model = $model;
    }

    public function get_count_student_challenge (string $studentId) :mixed
    {
        return $this->model->query()
        ->where('student_school_id', $studentId)
        ->where('is_valid', 'valid')
        ->get();
    }

}
