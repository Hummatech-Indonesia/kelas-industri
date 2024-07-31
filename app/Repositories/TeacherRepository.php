<?php

namespace App\Repositories;

use App\Models\TeacherSchool;

class TeacherRepository extends BaseRepository
{
    public function __construct(TeacherSchool $model)
    {
        $this->model = $model;
    }

    public function get_by_teacher(String $teacherId): mixed
    {
        return $this->model->query()
            ->with('teacher')
            ->where('teacher_id', $teacherId)
            ->get();
    }

    /**
     * @param string $schoolId
     * @return mixed
     */
    public function get_teacher_by_school(string $schoolId): mixed
    {
        return $this->model->query()
            ->with('teacher')
            ->where('school_id', $schoolId)
            ->get();
    }

    public function get_angkatan(string | null $schoolId, int $limit): mixed
    {
        return $this->model->query()
            ->with('teacher')
            ->where('school_id', 'like', '%' . $schoolId . '%')
            ->paginate($limit);
    }

    public function get_statistic(string|null $schoolId): mixed
    {
        return $this->model->query()
            ->whereHas('teacherClassrooms')
            ->with(['teacher' => function ($query) {
                $query->withCount('journals');
            }])
            ->with(['teacherClassrooms.classroom.students'])
            ->where('school_id', $schoolId)
            ->get();
    }
}
