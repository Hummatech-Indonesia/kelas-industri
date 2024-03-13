<?php

namespace App\Repositories;

use App\Models\StudentSchool;
use App\Models\User;
use App\Models\Classroom;
use Illuminate\Http\Request;

class StudentRepository extends BaseRepository
{
    private User $userModel;
    private Classroom $classroomModel;

    public function __construct(StudentSchool $model, User $userModel, Classroom $classroomModel)
    {
        $this->model = $model;
        $this->userModel = $userModel;
        $this->classroomModel = $classroomModel;
    }

    /**
     * get by school
     *
     * @param string $schoolId
     * @return mixed
     */
    public function get_by_school(string $schoolId): mixed
    {
        return $this->model->newQuery()
            ->where('school_id', $schoolId)
            ->whereRelation('student', 'status', 'active')
            ->with('student')
            ->paginate(6);
    }
    public function get_classroom(): mixed
    {
        return $this->classroomModel->newQuery()
            ->get();
    }
    public function filter_student_by_classroom(string $schoolId ,string $classroomId): mixed
    {
        return $this->model->newQuery()
            ->where('school_id', $schoolId)
            ->whereHas('studentClassroom', function ($query) use ($classroomId) {
                $query->where('classroom_id', $classroomId);
            })
            ->whereRelation('student', 'status', 'active')
            ->paginate(6);
    }
    public function get_by_classroom(string $classroomId): mixed
    {
        return $this->model->newQuery()
            ->whereHas('studentClassroom', function ($query) use ($classroomId) {
                $query->where('classroom_id', $classroomId);
            })
            ->whereRelation('student', 'status', 'active')
            ->paginate(6);
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

    public function update_school(Request $request): mixed
    {
        return $this->model->query()
            ->where('id', $request->id)
            ->update([
                'school_id' => $request->school_id
            ]);
    }

    public function get_student_by_classroom(string $schoolId, string $classroomId): mixed
    {
        return $this->model->newQuery()
            ->whereRelation('student', 'status', 'active')
            ->where('school_id', $schoolId)
            ->whereHas('studentClassroom', function ($query) use ($classroomId) {
                $query->where('classroom_id', $classroomId);
            })
            ->paginate(6);
    }
}
