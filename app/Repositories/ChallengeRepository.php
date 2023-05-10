<?php

namespace App\Repositories;

use App\Models\Challenge;
use App\Models\User;

class ChallengeRepository extends BaseRepository
{
    private User $user;

    public function __construct(Challenge $model)
    {
        $this->model = $model;
    }

    /**
     * get challenge by teacher
     *
     * @param string $teacherId
     * @return mixed
     */
    public function get_challenge_by_teacher(string $teacherId): mixed
    {
        return $this->model->query()
            ->where('created_by', $teacherId)
            ->get();
    }
    
}
