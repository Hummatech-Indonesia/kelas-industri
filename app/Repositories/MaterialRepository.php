<?php

namespace App\Repositories;

use App\Models\Material;

class MaterialRepository extends BaseRepository
{
    public function __construct(Material $materials)
    {
        $this->model = $materials;
    }

    /**
     * get_paginate_by_school_year
     *
     * @param int $schoolYear
     * @param int $limit
     * @return mixed
     */
    public function get_paginate_by_school_year($request, int $schoolYear, int $limit): mixed
    {
        return $this->model->query()
            ->when($request->filter, function ($query) use ($request) {
                return $query
                    ->whereHas('generation', function ($query) use ($request) {
                        $query->whereHas('schoolYear', function ($query) use ($request) {
                            $query->where('id', $request->filter);
                        });
                    });
            })
            ->with(['generation', 'subMaterials'])
            ->whereRelation('generation', function ($q) use ($schoolYear) {
                return $q->where('school_year_id', $schoolYear);
            })
            ->paginate($limit);
    }

    public function get_by_classroom(string $classroomId,string|null $search, int $limit)
    {
        return $this->model->query()
            ->where('title', 'LIKE', '%'. $search .'%')
            ->whereRelation('generation.classrooms', function ($q) use ($classroomId) {
                return $q->where('id', $classroomId);
            })
            ->paginate($limit);
    }

    public function search_paginate(string|null $search,string $year, int $limit): mixed
    {
        return $this->model->query()
            ->where('title', 'like', '%'. $search .'%')
            ->where('generation_id','LIKE','%'.$year.'%')
            ->paginate($limit);
    }

    public function get_count_material_user(int $schoolYear) :mixed
    {
        return $this->model->query()
            ->where('generation_id', $schoolYear)
            ->count();
    }

    public function get_count_material_admin(){
        return $this->model->query()
        ->count();
    }
}
