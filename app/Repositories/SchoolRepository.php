<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;

class SchoolRepository extends  BaseRepository
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * override get paginate
     *
     * @param int $limit
     * @param array|null $order
     * @return mixed
     */
    public function get_paginate(int $limit, array $order = null): mixed
    {
        return $this->model->query()->role('school')->paginate($limit);
    }

    /**
     * search paginate
     *
     * @param string|null $search
     * @param int $limit
     * @return mixed
     */
    public function search_paginate(string|null $search, int $limit): mixed
    {
        return $this->model->query()
            ->role('school')
            ->where('name', 'like', '%' . $search . '%')
            ->paginate($limit);
    }

    /**
     * search paginate
     *
     * @param string|null $search
     * @param int $limit
     * @return mixed
     */
    public function status_paginate(string|null $status, string|null $search, int $limit): mixed
    {
        return $this->model->query()
            ->role('school')
            ->where('name', 'like', '%' . $search . '%')
            ->when($status == 'school_package', function ($query) {
                $query->whereHas('schoolPackages');
            })
            ->when($status == 'student_package', function ($query) {
                $query->whereDoesntHave('schoolPackages');
            })
            ->paginate($limit);
    }

    public function getCount()
    {
        return $this->model->query()
            ->role('school')
            ->count();
    }

    public function getCountStudent(string $id)
    {
        return $this->model->query()
            ->where('status', 'active')
            ->whereHas('studentSchool', function ($query) use ($id) {
                $query->where('school_id', $id);
            })
            ->get();
    }

    public function getCountStudentClassroom(string $classroom)
    {
        return $this->model->query()
            ->where('status', 'active')
            ->whereHas('studentSchool.classrooms', function ($query) use ($classroom) {
                $query->where('classroom_id', $classroom);
            })
            ->get();
    }

    public function countAllStudentActive(string $school)
    {
        return $this->model->query()
            ->where('status', 'active')
            ->whereHas('studentSchool', function ($query) use ($school) {
                $query->where('school_id', $school);
            })
            ->count();
    }

    public function getAllClassroom(User $school, Request $request)
    {
        return $this->model->query()
            ->where('id', $school->id)
            ->with('classrooms.generation')
            ->where(function ($query) use ($request) {
                $search = $request->get('search', '');
                $query->where('name', 'like', "%$search%")
                    ->orWhereHas('classrooms', function ($query) use ($search) {
                        $query->where('name', 'like', "%$search%");
                    })
                    ->orWhereHas('classrooms.generation', function ($query) use ($search) {
                        $query->where('name', 'like', "%$search%");
                    })
                    ->orWhereHas('classrooms.generation.schoolYear', function ($query) use ($search) {
                        $query->where('name', 'like', "%$search%");
                    });
                $schoolYearId = (int) $request->get('school_year_id', 0);
                if ($schoolYearId) {
                    $query->whereHas('classrooms.generation.schoolYear', function ($query) use ($schoolYearId) {
                        $query->where('id', $schoolYearId);
                    });
                }
                $generationId = (int) $request->get('generation_id', 0);
                if ($generationId) {
                    $query->whereHas('classrooms.generation', function ($query) use ($generationId) {
                        $query->where('id', $generationId);
                    });
                }
            })
            ->get();
    }
}
