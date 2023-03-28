<?php

namespace App\Repositories;

use App\Models\TeacherClassroom;

class TeacherClassroomRepository extends BaseRepository
{
    public function __construct(TeacherClassroom $teacherClassroom)
    {
        $this->model = $teacherClassroom;
    }

    /**
     * get by teacher school
     *
     * @param int $teacherSchoolId
     * @return mixed
     */
    public function get_by_teacher_school(int $teacherSchoolId): mixed
    {
        return $this->model->query()
            ->with(['classroom.school', 'classroom.generation.schoolYear'])
            ->where('teacher_school_id', $teacherSchoolId)
            ->get();
    }

    /**
     * override store
     *
     * @param array $data
     * @return mixed
     */
    public function store(array $data): mixed
    {
        return $this->model->updateOrCreate($data, $data);
    }
}
