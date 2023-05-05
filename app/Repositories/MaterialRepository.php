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
    public function get_paginate_by_school_year(int $schoolYear, int $limit): mixed
    {
        return $this->model->query()
                ->with(['generation', 'subMaterials'])
                ->whereRelation('generation', function($q) use ($schoolYear) {
                    return $q->where('school_year_id', $schoolYear);
                })
                ->paginate($limit);
    }

    public function get_by_classroom(string $classroomId, int $limit){
        return $this->model->query()
        ->whereRelation('generation.classrooms', function($q) use ($classroomId){
            return $q->where('id', $classroomId);
        })
        ->paginate($limit);
    }
}
