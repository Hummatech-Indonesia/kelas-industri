<?php

namespace App\Repositories;

use App\Models\Challenge;
use App\Models\Point;
use App\Models\SubmitChallenge;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ChallengeRepository extends BaseRepository
{
    private User $user;
    private SubmitChallenge $submitChallenge;
    private Point $point;

    public function __construct(Challenge $model, SubmitChallenge $submitChallenge, Point $point, User $user)
    {
        $this->model = $model;
        $this->submitChallenge = $submitChallenge;
        $this->point = $point;
        $this->user = $user;
    }

    /**
     * get challenge by teacher
     *
     * @param string $teacherId
     * @return mixed
     */
    public function get_challenge_by_teacher(string $teacherId, string | null $search, int $limit): mixed
    {
        return $this->model->query()
            ->where('created_by', $teacherId)
            ->where('title', 'like', '%' . $search . '%')
            ->orderBy('created_at', 'DESC')
            ->paginate($limit);
    }

    public function get_challenge_by_student(String $classroomId, string | null $search, string | null $status, string | null $difficulty, int $limit): mixed
    {
        return $this->model->query()
            ->where('classroom_id', $classroomId)
            ->where('title', 'like', '%' . $search . '%')
            ->when($status != '-1' && $status != null, function ($query) use ($status) {
                $userId = auth()->user()->studentSchool->id;
                $doneChallenge = $this->submitChallenge->query()
                    ->where('student_school_id', $userId)
                    ->pluck('challenge_id')
                    ->toArray();
                if ($status == 'Sudah') {
                    $query->WhereIn('id', $doneChallenge);
                } else if ($status == 'Belum') {
                    $query->WhereNotIn('id', $doneChallenge);
                }
            })
            ->when($difficulty != '-1' && $difficulty != null, function ($query) use ($difficulty) {
                $query->where('difficulty', $difficulty);
            })
            ->orderBy('created_at', 'DESC')
            ->paginate($limit);
    }

    public function get_challenge_by_mentor(String $mentorId, string | null $search, int $limit): mixed
    {
        return $this->model->query()
            ->where('created_by', $mentorId)
            ->where('title', 'like', '%' . $search . '%')
            ->orderBy('created_at', 'DESC')
            ->paginate($limit);
    }
    public function get_challenge_by_mentor_occured(String $mentorId): mixed
    {
        $now = Carbon::now();
        return $this->model->query()
            ->where('created_by', $mentorId)
            ->where('start_date','<', $now)
            ->where('end_date','>', $now)
            ->withCount('StudentChallenge')
            ->limit(4)
            ->get();
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

    public function create_point_challenge(float $point, string $studentId): void
    {
        $data = $this->user->query()->findorfail($studentId);
        $data->point += $point;
        $data->save();
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
            ->where('classroom_id', $classroomId)
            ->count();
    }

    public function get_count_challenge_teacher(string $teacherId, string $schoolYearId)
    {
        return $this->model->query()
            ->where('created_by', $teacherId)
            ->whereRelation('classroom.generation', function ($q) use ($schoolYearId) {
                return $q->where('school_year_id', $schoolYearId);
            })
            ->count();
    }

    public function get_count_challenge_mentor(string $mentorId, string $schoolYearId)
    {
        return $this->model->query()
            ->where('created_by', $mentorId)
            ->whereRelation('classroom.generation', function ($q) use ($schoolYearId) {
                return $q->where('school_year_id', $schoolYearId);
            })
            ->count();
    }

}
