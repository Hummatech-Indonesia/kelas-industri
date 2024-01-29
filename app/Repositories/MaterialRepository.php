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

    public function search_paginate(string | null $search,string|null $generation,string|null $filter,string $year, int $limit): mixed
    {
        return $this->model->query()
        ->when(!$generation,function($q) use ($year){
            $q->whereRelation('generation', function ($q) use ($year) {
                return $q->where('school_year_id', $year);
            });
        })
        ->when($generation,function($q) use ($generation){
            return $q->where('generation_id',$generation);
        })
        ->when($filter,function($q) use ($filter){
            $q->whereRelation('generation', function ($q) use ($filter){
                return $q->where('school_year_id',$filter);
            });
        })
            ->where('title', 'like', '%'. $search .'%')
            ->orderBy('created_at', 'DESC')
            ->paginate($limit);
    }

    public function get_count_material_user()
    {
        if(auth()->user()->roles->pluck('name')[0] == 'student'){
            return $this->model->query()
            ->where('generation_id', Auth()->user()->studentSchool->studentClassroom->classroom->generation_id)
            ->count();
        }elseif(auth()->user()->roles->pluck('name')[0] == 'teacher'){
            return $this->model->query()
            ->where('generation_id', Auth()->user()->teacherSchool->teacherClassroom->classroom->generation_id)
            ->count();
        }else{
            // $data = Auth()->user()->mentorClassrooms[0]->classroom->generation_id;
            return $this->model->query()
            ->whereHas('generation.classrooms.mentorClassrooms', function ($query) {
                $query->whereIn('classroom_id', Auth()->user()->mentorClassrooms->pluck('classroom_id'));
            })
            ->count();
        }
    }

    public function get_count_material_admin(){
        return $this->model->query()
        ->count();
    }
}
