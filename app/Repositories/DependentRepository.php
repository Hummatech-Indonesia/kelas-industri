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

    public function getLatest(): mixed
    {
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
        $data['nominal'] = (int) str_replace('.', '', $data['nominal']);

        $classroomIds = $data['classroom_id'];

        $results = [];

        foreach ($classroomIds as $classroomId) {
            $entryData = [
                'semester' => $data['semester'],
                'classroom_id' => $classroomId,
                'nominal' => $data['nominal'],
                'deadline' => $data['deadline'],
            ];

            $result = $this->model->query()->create($entryData);
            $results[] = $result;
        }

        return $results;
    }

    public function update(mixed $id, array $data): mixed
    {
        $data['nominal'] = (int) str_replace('.', '', $data['nominal']);
        return $this->show($id)->update($data);
    }

    public function getTotalDependent(String $semester, String $classroomId)
    {
        return $this->model->query()
            ->where('classroom_id', $classroomId)
            ->where('semester', $semester)
            ->select('nominal')
            ->first();
    }

    public function getByClassroomSemester(String $classroomId, String $semester): mixed
    {
        return $this->model->query()
            ->where('classroom_id', $classroomId)
            ->where('semester', $semester)
            ->first();
    }

    public function delete(mixed $id)
    {
        return $this->model->query()
            ->findOrFail($id)
            ->delete();
    }
}
