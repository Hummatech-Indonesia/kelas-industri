<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Challenge;
use App\Models\SubmitChallenge;

class ChallengeRepository extends BaseRepository
{
    private User $user;

    public function __construct(Challenge $model, SubmitChallenge $submitChallenge)
    {
        $this->model = $model;
        $this->submitChallenge = $submitChallenge;
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

    public function get_challenge_by_student(String $classroomId, int $schoolYearId): mixed
    {
        return $this->model->query()
            ->where('classroom_id', $classroomId)
            ->whereRelation('classroom.generation', function ($q) use ($schoolYearId) {
                return $q->where('school_year_id', $schoolYearId);
            })
            ->get();
    }

    public function get_challenge_by_mentor(String $mentorId, int $schoolYearId): mixed
    {
        // return $this->model->query()
        // ->where('classroom_id', $classroomId)
        // ->get();
        return $this->model->query()
            ->whereRelation('classroom.generation', function ($q) use ($schoolYearId) {
                $q->where('school_year_id', $schoolYearId);
            })
            ->whereRelation('classroom.mentorClassrooms', function ($q) use ($mentorId) {
                $q->where('mentor_id', $mentorId);
            })
            ->get();
    }

    public function create_submit_challenge(array $data) : void
    {
        $this->submitChallenge->create($data);
    }
}
