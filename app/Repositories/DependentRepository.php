<?php

namespace App\Repositories;

use App\Models\Dependent;
use Illuminate\Http\Request;

class DependentRepository extends BaseRepository
{

    public function __construct(Dependent $model)
    {
        $this->model = $model;
    }

    public function getAllByClassroom(string $classroom)
    {
        return $this->model->query()
            ->where('classroom_id', $classroom)
            ->orderBy('semester', 'asc')
            ->get();
    }

    public function getByClassroom(Request $request)
    {
        return $this->model->query()
            ->when($request->classroom_id, function ($query) use ($request) {
                $query->where('classroom_id', $request->classroom_id);
            })
            ->orderBy('semester', 'asc')
            ->get();
    }
}
