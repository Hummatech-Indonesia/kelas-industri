<?php

namespace App\Repositories;

use App\Models\Point;
use App\Models\User;
use Illuminate\Http\Request;

class PointRepository extends BaseRepository
{
    private Point $point;
    private User $school;
    public function __construct(Point $point, User $user)
    {
        $this->model = $point;
        $this->user = $user;
    }

    public function update_or_create_point(array $data)
    {
        return $this->model->query()
            ->updateOrCreate(['student_id' => $data['student_id']], $data);
    }

    public function get_by_student(string $studentId)
    {
        return $this->model->query()
            ->where('student_id', $studentId)
            ->first();
    }

    public function get_point()
    {
        return $this->model->query()
            ->groupBy('student_id')
            ->selectRaw('student_id, sum(point) as point')
            ->orderBy('point', 'desc')
            ->get();
    }

    public function get_point_student(Request $request)
    {
        return $this->user->query()
            ->role('student')
            ->whereHas('studentSchool.school')
            ->orderBy('point', 'desc')
            ->when($request->filter, function ($query) use ($request) {
                return $query
                    ->whereHas('studentSchool', function ($query) use ($request) {
                        $query->whereHas('school', function ($query) use ($request) {
                            $query->where('id', $request->filter);
                        });
                    });
            })
            ->get();
    }

    public function get_point_student_by_school($schoolId)
    {
        return $this->user->query()
            ->role('student')
            ->whereHas('studentSchool.school')
            ->orderBy('point', 'desc')->whereHas('studentSchool', function ($query) use ($schoolId) {
                        $query->whereHas('school', function ($query) use ($schoolId) {
                            $query->where('id', $schoolId);
                        });
                    })
            ->limit(5)
            ->get();
    }

    public function get_student_by_point(string $studentId): mixed
    {
        return $this->user->query()
            ->where('id', $studentId)
            ->select('point')
            ->get();
    }

    public function get_school(): mixed
    {
        return $this->user->query()
            ->role('school')
            ->get();
    }

    public function create_point($point, string $studentId, int $schoolYearId): void
    {
        $this->model->create([
            'student_id' => $studentId,
            'point' => $point,
            'school_year_id' => $schoolYearId,
        ]);
    }

    public function get_count_point_student(string $studentId)
    {
        return $this->user->query()
            ->where('id', $studentId)
            ->select('point')
            ->first();
    }

}
