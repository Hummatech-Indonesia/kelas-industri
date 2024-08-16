<?php

namespace App\Repositories;

use App\Models\StudentSchool;
use App\Models\User;
use App\Models\Classroom;
use Illuminate\Http\Request;
use PhpParser\Builder\Class_;
use PhpParser\Node\Expr\Cast\String_;
use Svg\Tag\Rect;

class UserRepository extends BaseRepository
{
    private StudentSchool $studentSchool;
    private Classroom $classroom;

    public function __construct(User $model, StudentSchool $studentSchool, Classroom $classroom)
    {
        $this->model = $model;
        $this->studentSchool = $studentSchool;
        $this->classroom = $classroom;
    }

    /**
     * get mentors
     *
     * @param int $limit
     * @return mixed
     */
    public function get_mentors(): mixed
    {
        return $this->model->query()
            ->whereHas('roles', function ($q) {
                return $q->where("name", "mentor");
            })
            // ->where('name', 'like', '%' . $request->search . '%')
            ->get();
    }

    public function get_mentors_administration(Request $request, int $limit): mixed
    {
        return $this->model->query()
            ->whereHas('roles', function ($q) {
                return $q->where("name", "mentor");
            })
            ->where('name', 'like', '%' . $request->search . '%')
            ->paginate($limit);
    }

    public function get_administration(int $limit): mixed
    {
        return $this->model->query()
            ->whereHas('roles', function ($q) {
                return $q->where("name", "administration");
            })
            ->paginate($limit);
    }

    public function get_Edit_administration(string $id): mixed
    {
        return $this->model->query()
            ->whereHas('roles', function ($q) {
                return $q->where("name", "administration");
            })
            ->where('id', $id)
            ->first();
    }

    public function getCountTeacher(): mixed
    {
        return $this->model->query()
            ->whereHas('roles', function ($q) {
                return $q->where("name", "teacher");
            })
            ->get();
    }

    public function getCountMentor(): mixed
    {
        return $this->model->query()
            ->whereHas('roles', function ($q) {
                return $q->where("name", "mentor");
            })
            ->get();
    }

    public function get_students(): mixed
    {
        return $this->model->query()
            ->whereHas('roles', function ($q) {
                return $q->where("name", "student");
            })
            ->where('status', 'active')
            ->get();
    }

    public function get_classroom(): mixed
    {
        return $this->classroom->query()
            ->get();
    }

    public function get_students_with_school(Request $request, int $limit): mixed
    {
        return $this->studentSchool->query()
            ->whereHas('student', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            })
            ->paginate($limit);
    }

    /**
     * get teachers by school
     *
     * @param int $limit
     * @return mixed
     */
    public function get_teachers_by_school(string $schoolId): mixed
    {
        return $this->model->query()
            ->whereHas('roles', function ($q) {
                return $q->where("name", "mentor");
            })
            ->get();
    }

    /**
     * get schools
     *
     * @param int $limit
     * @return mixed
     */
    public function get_schools(): mixed
    {
        return $this->model->query()
            ->whereHas('roles', function ($q) {
                return $q->where("name", "school");
            })
            ->get();
    }
    public function get_schools_with_package(): mixed
    {
        return $this->model->query()
            ->whereHas('roles', function ($q) {
                return $q->where("name", "school");
            })->with('schoolPackages')
            ->get();
    }

    public function create_point($point, string $studentId): void
    {
        $data = $this->model->query()->findorfail($studentId);
        $data->point += $point;
        $data->save();
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

    /**
     * get_user_nonactive
     *
     * @return mixed
     */
    public function get_user_nonactive(Request $request, int $limit): mixed
    {
        $query = $this->model->query()
            ->where('status', 'nonactive');

        if ($request->school_id) {
            $query->whereHas('studentSchool', function ($q) use ($request) {
                $q->where('school_id', $request->school_id);
            });

            if ($request->classroom_id !== 'null') {
                $query->whereHas('studentSchool.studentClassroom', function ($q) use ($request) {
                    return $q->where('classroom_id', $request->classroom_id);
                });
            }
        }

        return $query
            ->when($request->search, function ($q) use ($request) {
                return $q->where('name', 'like', '%' . $request->search . '%');
            })
            ->latest()
            ->paginate($limit);
    }



    /**
     * getWhere
     *
     * @param  mixed $data
     * @return mixed
     */
    public function getWhere(array $data): mixed
    {
        return $this->model->query()
            ->where('email', $data['email'])
            ->first();
    }

    public function update_user_active_all(array $userId, array $status): mixed
    {
        return $this->model->query()
            ->whereIn('id', $userId)
            ->update($status);
    }


    public function get_show_teacher(string $id): mixed
    {
        return $this->model->query()
            ->where('id', $id)
            ->whereHas('roles', function ($q) {
                return $q->where("name", "teacher");
            })
            ->first();
    }

    public function get_show_mentor(string $id): mixed
    {
        return $this->model->query()
            ->where('id', $id)
            ->whereHas('roles', function ($q) {
                return $q->where("name", "mentor");
            })
            ->first();
    }

    public function get_by_id($user): mixed
    {
        return $this->model->query()
            ->where('id', $user)
            ->first();
    }

    public function get_dependent_by_id($user): mixed
    {
        return $this->model->query()
            ->where('id', $user)
            ->with('studentSchool.studentClassroom.classroom.dependent')
            ->get();
    }

    public function teacherStatistic(string | null $schoolId): mixed
    {
        return $this->model->query()
            ->whereHas('roles', function ($query) {
                $query->where('name', 'teacher');
            })
            ->withCount(['journals'])
            ->with(['teacherSchool.teacherClassrooms.classroom' => function ($query) {
                $query->withCount([
                    //     'assignments as total_submissions' => function ($query) {
                    //     $query->withCount('StudentSubmitAssignment');
                    // },
                    'challenges as total_challenges' => function ($query) {
                        $query->withCount('StudentChallenge');
                    }
                ]);
            }])
            ->get();
    }
}
