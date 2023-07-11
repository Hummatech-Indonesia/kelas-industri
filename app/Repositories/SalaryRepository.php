<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Salary;
use App\Repositories\SalaryRepository;

class SalaryRepository extends  BaseRepository
{
    public function __construct(Salary $model, User $user)
    {
        $this->model = $model;
        $this->user = $user;
    }

    public function getMentor() :mixed
    {
        return $this->model->query()
        ->whereHas('user.mentorClassrooms')
        ->get();
    }

    public function getTeacher() :mixed
    {
        return $this->model->query()
        ->whereHas('user.teacherSchool')
        ->get();
    }

    public function get_salary_by_user(string $userId) :mixed
    {
        return $this->model->query()
        ->where('user_id', $userId)
        ->get();
    }
}
