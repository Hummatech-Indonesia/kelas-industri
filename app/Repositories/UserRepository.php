<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * get mentors
     *
     * @param int $limit
     * @return mixed
     */
    public function get_mentors(): mixed
    {
        return $this->model->query()
            ->whereHas('roles', function ($q) {
                return $q->where("name", "mentor");
            })
            ->get();
    }

    /**
     * get teachers by school
     *
     * @param int $limit
     * @return mixed
     */
    public function get_teachers_by_school(string $schoolId): mixed
    {
        return $this->model->query()
            ->whereHas('roles', function ($q) {
                return $q->where("name", "mentor");
            })
            ->get();
    }

    /**
     * get schools
     *
     * @param int $limit
     * @return mixed
     */
    public function get_schools(): mixed
    {
        return $this->model->query()
            ->whereHas('roles', function ($q) {
                return $q->where("name", "school");
            })
            ->get();
    }
}
