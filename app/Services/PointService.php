<?php

namespace App\Services;

use App\Repositories\PointRepository;
use Illuminate\Http\Request;

class PointService
{
    private PointRepository $repository;

    public function __construct(PointRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getWeekPoint($user) {
        return $this->repository->getWeekPoint($user);
    }
    public function store($data) {
        return $this->repository->store($data);
    }

    public function handleGetSchool()
    {
        return $this->repository->get_school();
    }

    public function handleGetPoint()
    {
        return $this->repository->get_point();
    }

    public function handleGetPointStudent(Request $request)
    {
        return $this->repository->get_point_student($request);
    }
    public function handleGetPointStudentBySchool($schoolId)
    {
        return $this->repository->get_point_student_by_school($schoolId);
    }

    public function handleGetPointByStudent(string $studentId): mixed
    {
        return $this->repository->get_student_by_point($studentId);
    }

    public function handleCreatePoint($point, $studentId, $schoolYearId): mixed
    {
        return $this->repository->create_point($point, $studentId, $schoolYearId);
    }

    public function hanleCountPointStudent(string $studentId)
    {
        return $this->repository->get_count_point_student($studentId);
    }
}
