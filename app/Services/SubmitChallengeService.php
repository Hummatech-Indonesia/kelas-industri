<?php

namespace App\Services;

use App\Repositories\SubmitChallengeRepository;

class SubmitChallengeService
{
    private SubmitChallengeRepository $repository;

    public function __construct(SubmitChallengeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handleGetCountStudentByChallenge(string $studentId, int $schoolYear) :mixed
    {
        return $this->repository->get_count_student_challenge($studentId, $schoolYear);
    }
}


?>
