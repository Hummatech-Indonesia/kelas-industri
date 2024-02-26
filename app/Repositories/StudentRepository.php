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
        return $this->model->query()
            ->with('student')
            ->where('school_id', $schoolId)

            ->whereRelation('student', 'status', 'active')
            ->get();
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
