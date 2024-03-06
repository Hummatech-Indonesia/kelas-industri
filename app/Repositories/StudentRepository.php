<?php

namespace App\Repositories;

use App\Models\StudentSchool;
use App\Models\User;

class StudentRepository extends BaseRepository
{
    private User $userModel;

    public function __construct(StudentSchool $model, User $userModel)
    {
        $this->model = $model;
        $this->userModel = $userModel;
    }

    /**
     * get by school
     *
     * @param string $schoolId
     * @return mixed
     */
    public function get_by_school(string $schoolId): mixed
    {
        return $this->model->newQuery()
            ->whereRelation('student', 'status', 'active')
            ->where('school_id', $schoolId)
            ->paginate(6);
    }

    public function get_by_classroom(string $classroomId): mixed
{
    return $this->model->newQuery()
        ->whereHas('studentClassroom', function ($query) use ($classroomId) {
            $query->where('classroom_id', $classroomId);
        })
        ->whereRelation('student', 'status', 'active')
        ->paginate(6);
}

    /**
     * store
     *
     * @param  mixed $data
     * @return mixed
     */
    public function store(array $data): mixed
    {
        return $this->model->query()
            ->create($data);
    }
}
