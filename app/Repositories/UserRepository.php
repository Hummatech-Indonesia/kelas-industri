<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;
use Svg\Tag\Rect;

class UserRepository extends BaseRepository
{
    public function __construct(User $model)
    {
        $this->model = $model;
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
            ->where('name', 'like', '%'. $request->search . '%')
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

    public function get_students(): mixed
    {
        return $this->model->query()
            ->whereHas('roles', function ($q) {
                return $q->where("name", "student");
            })
            ->get();
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
        return $this->model->query()
            ->when($request->classroom_id, function ($q) use ($request) {
                return $q->whereRelation('studentSchool.studentClassroom', function ($q) use ($request) {
                    return $q->where('classroom_id', $request->classroom_id);
                });
            })
            ->where('status', 'nonactive')
            ->latest()
            ->where('name', 'like', '%' . $request->search . '%')
            ->orderBy('created_at', 'DESC')
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
}
