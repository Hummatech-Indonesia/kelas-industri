<?php

namespace App\Repositories;

use App\Models\Salary;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class   SalaryRepository extends BaseRepository
{
    private User $user;
    public function __construct(Salary $model, User $user)
    {
        $this->model = $model;
        $this->user = $user;
    }

    public function getMentor(): mixed
    {
        return $this->model->query()
            ->whereHas('user.mentorClassrooms')
            ->get();
    }

    public function getTeacher(): mixed
    {
        return $this->model->query()
            ->whereHas('user.teacherSchool')
            ->get();
    }

    public function getTeacherAdministration(Request $request, int $limit): mixed
    {
        return $this->user->query()
            ->whereHas('teacherSchool')
            ->where('name', 'like', '%' . $request->search . '%')
            ->when($request->school_id, function ($q) use ($request) {
                $q->whereRelation('teacherSchool', 'school_id', $request->school_id);
            })
            ->paginate($limit);
    }

    public function get_salary_by_user(string $userId): mixed
    {
        return $this->model->query()
            ->where('user_id', $userId)
            ->get();
    }

    public function getSalaryTeacher(Request $request): mixed
    {
        return $this->model->query()
            ->whereHas('user.roles', function ($q) {
                return $q->where("name", "teacher");
            })
            ->whereRelation('user', 'name', 'like', '%' . $request->search . '%')
            ->when($request->school_id, function ($q) use ($request) {
                $q->whereRelation('user.teacherSchool', 'school_id', $request->school_id);
            })
            ->get();
    }

    public function getSalaryMentor(Request $request): mixed
    {
        return $this->model->query()
            ->whereHas('user.roles', function ($q) {
                return $q->where("name", "mentor");
            })
            ->whereRelation('user', 'name', 'like', '%' . $request->search . '%')
            ->whereMonth('created_at', Carbon::parse($request->month)->month)
            ->whereYear('created_at', Carbon::parse($request->month)->year)
            ->get();
    }

    public function school(): mixed
    {
        return $this->user->query()
            ->whereHas('roles', function ($q) {
                return $q->where("name", "school");
            })
            ->get();
    }

    public function getGroupByMonth(): mixed
    {
        return $this->model->get(['payday', 'salary_amount'])->groupBy(function ($val) {
            return Carbon::parse($val->payday)->translatedFormat('M');
        });
    }

    public function getMonth(): mixed {
        return $this->model->query()->select('payday')->get();
    }
}
