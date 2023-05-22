<?php

namespace App\Services;

use App\Http\Requests\ChallengeRequest;
use App\Repositories\ChallengeRepository;
use App\Http\Requests\SubmitChallengeRequest;

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

    public function handleGetByStudent(String $classroomId, int $schoolYearId): mixed
    {
        return $this->repository->get_challenge_by_student($classroomId, $schoolYearId);
    }

    public function handleGetByMentor(String $mentorId, int $schoolYearId): mixed
    {
        return $this->repository->get_challenge_by_mentor($mentorId, $schoolYearId);
    }

    public function handleCreate(ChallengeRequest $request): void
    {
        $data = $request->validated();
        $data['created_by'] = auth()->id();
        if (auth()->user()->roles->pluck('name')[0] == 'mentor') {
            $data['point'] = 2;
        } elseif (auth()->user()->roles->pluck('name')[0] == 'teacher') {
            $data['point'] = 1;
        }

        $this->repository->store($data);
    }

    public function submitChallenge(SubmitChallengeRequest $request): void
    {
        $data = $request->validated();
        $data['student_school_id'] = auth()->id();

        $this->repository->create_submit_challenge($data);
    }

    public function handleUpdate(ChallengeRequest $request, string $id): void
    {
        $this->repository->update($id, $request->validated());
    }

    public function handleDelete(string $id): bool
    {
        return $this->repository->destroy($id);
    }
}
