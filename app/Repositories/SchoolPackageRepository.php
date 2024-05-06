<?php

namespace App\Repositories;

use App\Models\SchoolPackage;
use App\Models\StudentSchool;
use App\Repositories\BaseRepository;

class SchoolPackageRepository extends BaseRepository
{
    private StudentSchool $school;

    public function __construct(SchoolPackage $model, StudentSchool $school)
    {
        $this->model = $model;
        $this->school = $school;
    }

    public function create(array $data): mixed
    {
        $countActiveStudent = $this->school->where('school_id', $data['school_id'])
            ->whereRelation('student','status', 'active')
            ->count();

        $data['price'] = $countActiveStudent * $data['price'];

        return $this->model->create($data);
    }
}
