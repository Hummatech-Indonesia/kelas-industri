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

    public function getLatest(): mixed {
        return $this->model->query()->latest()->first();
    }

    public function getAllByClassroom(string $classroom)
    {
        return $this->model->query()
            ->where('classroom_id', $classroom)
            ->orderBy('semester', 'asc')
            ->get();
    }

    public function getByClassroom(Request $request, $schoolId)
    {
        return $this->model->query()
            ->when($request->classroom_id, function ($query) use ($request) {
                $query->where('classroom_id', $request->classroom_id);
            })
            ->whereRelation('classroom', 'school_id', $schoolId)
            ->orderBy('semester', 'asc')
            ->get();
    }

    public function create(array $data): mixed
    {
        $classroomIds = $data['classroom_id'];

        $results = [];

        foreach ($classroomIds as $classroomId) {
            $entryData = [
                'semester' => $data['semester'],
                'classroom_id' => $classroomId,
                'nominal' => $data['nominal']
            ];

            $result = $this->model->query()->create($entryData);
            $results[] = $result;
        }

        return $results;
    }

    public function getTotalDependent(String $semester, String $classroomId)
    {
        return $this->model->query()
        ->where('classroom_id', $classroomId)
        ->where('semester', $semester)
        ->select('nominal')
        ->first();
    }

}
