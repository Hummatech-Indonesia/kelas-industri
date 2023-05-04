<?php

namespace App\Services;

use App\Repositories\ChallengeRepository;

class ChallengeService
{
    private ChallengeRepository $repository;

    public function __construct(ChallengeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * handle get by teacher
     *
     * @param string $teacherId
     * @return mixed
     */
    public function handleGetByTeacher(string $teacherId): mixed
    {
        return $this->repository->get_challenge_by_teacher($teacherId);
    }
}
