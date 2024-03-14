<?php

namespace App\Repositories;

use App\Models\StudentClassroom;
use Illuminate\Http\Request;

class StudentClassroomRepository extends BaseRepository
{
    public function __construct(StudentClassroom $model)
    {
        $this->model = $model;
    }

    /**
     * delete student by classroom
     *
     * @param string $classroomId
     * @return void
     */
    public function delete_student_by_classroom(string $classroomId): void
    {
        $this->model->query()
            ->where('classroom_id', $classroomId)
            ->delete();
    }

    /**
     * store
     *
     * @param  mixed $data
     * @return mixed
     */
    public function store(array $data): mixed
    {
        return $this->model->query()
            ->create($data);
    }

    public function update_classroom(Request $request): mixed
    {
        return $this->model->query()
            ->where('student_school_id', $request->id)
            ->update([
                'classroom_id' => $request->classroom_id
            ]);
    }
}
