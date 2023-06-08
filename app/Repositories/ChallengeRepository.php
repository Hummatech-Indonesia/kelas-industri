<?php

namespace App\Repositories;

use App\Models\Challenge;
use App\Models\Point;
use App\Models\SubmitChallenge;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ChallengeRepository extends BaseRepository
{
    private User $user;

    public function __construct(Challenge $model, SubmitChallenge $submitChallenge, Point $point)
    {
        $this->model = $model;
        $this->submitChallenge = $submitChallenge;
        $this->point = $point;
    }

    /**
     * get challenge by teacher
     *
     * @param string $teacherId
     * @return mixed
     */
    public function get_challenge_by_teacher(string $teacherId, int $schoolYearId, string|null $search, int $limit): mixed
    {
        return $this->model->query()
            ->where('created_by', $teacherId)
            ->where('title', 'like', '%'. $search .'%')
            ->paginate($limit);
    }

    public function get_challenge_by_student(String $classroomId, int $schoolYearId, string|null $search, int $limit): mixed
    {
        return $this->model->query()
            ->where('classroom_id', $classroomId)
            ->whereRelation('classroom.generation', function ($q) use ($schoolYearId) {
            return $q->where('school_year_id', $schoolYearId);
            })
            ->where('title', 'like', '%'. $search .'%')
            ->paginate($limit);
    }

    public function get_challenge_by_mentor(String $mentorId, int $schoolYearId, string|null $search, int $limit): mixed
    {
        // return $this->model->query()
        // ->where('classroom_id', $classroomId)
        // ->get();
        return $this->model->query()
        ->where('created_by', $mentorId)
            ->whereRelation('classroom.generation', function ($q) use ($schoolYearId) {
                $q->where('school_year_id', $schoolYearId);
            })
            ->where('title', 'like', '%'. $search .'%')
            ->paginate($limit);
    }

    public function updateSubmitChallengeByStudentId($data, int $studentId): void
    {
        // Menghapus file lama jika ada
        $oldFile = $this->submitChallenge->where('student_school_id', $studentId)->first();
        if ($oldFile) {
            Storage::disk('public')->delete($oldFile->file);
        }
        // Simpan data tantangan yang baru

        $this->submitChallenge->updateOrCreate(
            [
                'challenge_id' => $data['challenge_id'],
                'student_school_id' => $studentId,
            ],
            [
                'file' => $data['file'],
                'is_valid' => $data['is_valid'],
            ]
        );
    }

    public function getSubmitChallengeByStudentId($studentId)
    {
        return $this->submitChallenge->where('student_school_id', $studentId)->first();
    }

    public function update_challenge_valid(int $id): void
    {
        $this->submitChallenge->findorfail($id)->update([
            'is_valid' => 'valid',
        ]);
    }

    public function create_point_challenge(int $point, string $studentId): void
    {
        $this->point->create([
            'student_id' => $studentId,
            'point' => $point,
        ]);
    }

    public function get_submit_challenge_student(string $studentId, string $challengeId): mixed
    {
        return $this->submitChallenge->query()
            ->where(['challenge_id' => $challengeId, 'student_school_id' => $studentId])
            ->first();
    }

    public function get_student_challenge_by_mentor(string $challengeId): mixed
    {
        return $this->submitChallenge->query()
            ->with([
                'studentSchool' => [
                    'student',
                ],
            ])
            ->where(['challenge_id' => $challengeId])
            ->get();
    }

    public function get_student_challenge_by_teacher(string $challengeId): mixed
    {
        return $this->submitChallenge->query()
            ->with([
                'challenge' => [
                    'teacher',
                ],
            ])
            ->where(['challenge_id' => $challengeId])
            ->get();
    }

    public function get_count_challenge_student()
    {
        $classroomId = Auth()->user()->studentSchool->studentClassroom->classroom->id;
        return $this->model->query()
        ->where('classroom_id',$classroomId)
        ->count();
    }

    public function get_count_challenge_teacher(string $teacherId)
    {
        return $this->model->query()
        ->where('created_by', $teacherId)
        ->count();
    }

    public function get_count_challenge_mentor(string $mentorId)
    {
        return $this->model->query()
        ->where('created_by', $mentorId)
        ->count();
    }

}
