<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Http\Requests\ChallengeRequest;
use Illuminate\Support\Facades\Storage;
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
    public function handleGetByTeacher(string $teacherId, int $schoolYearId, Request $search): mixed
    {
        return $this->repository->get_challenge_by_teacher($teacherId, $schoolYearId, $search->search, 6);
    }

    public function handleChallengeByTeacher(string $challengeId): mixed
    {
        return $this->repository->get_student_challenge_by_teacher($challengeId);
    }

    public function handleGetByStudent(String $classroomId, int $schoolYearId, Request $search): mixed
    {
        return $this->repository->get_challenge_by_student($classroomId, $schoolYearId, $search->search, 6);
    }

    public function handleGetByMentor(String $mentorId, int $schoolYearId, Request $search): mixed
    {
        return $this->repository->get_challenge_by_mentor($mentorId, $schoolYearId, $search->search, 6);
    }

    public function handleGetChallengeByMentor(String $challengeId): mixed
    {
        return $this->repository->get_student_challenge_by_mentor($challengeId);
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

    public function handleUpadetValid($id): void
    {
        $this->repository->update_challenge_valid($id);
    }

    public function handleCreatePoint($point, $studentId): void
    {
        $this->repository->create_point_challenge($point, $studentId);
    }

    public function submitChallenge(SubmitChallengeRequest $request): void
    {
        $data = $request->validated();
        $data['is_valid'] = 'not_valid';
        $studentId = auth()->user()->students[0]->id;

        $oldFile = $this->repository->getSubmitChallengeByStudentId($studentId);
        if ($oldFile) {
            Storage::disk('public')->delete($oldFile->file);
        }

        $data['file'] = $request->file('file')->store('challenge_file', 'public');
        $data['student_school_id'] = $studentId;
        $this->repository->updateSubmitChallengeByStudentId($data, $studentId);
    }

    public function handleGetStudentSubmitChallenge(string $studentId, string $challengeId): mixed
    {

        return $this->repository->get_submit_challenge_student($studentId, $challengeId);
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
