<?php

namespace App\Repositories;

use App\Models\Point;
use App\Models\User;
use Illuminate\Http\Request;

class PointRepository extends BaseRepository
{
    private Point $point;
    private User $school;
    public function __construct(Point $point,User $school)
    {
        $this->model = $point;
        $this->school = $school;
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
        return $this->model->query()
        ->groupBy('student_id')
        ->when($request->filter,function($query) use ($request){
            return $query
            ->whereHas('student',function($query) use ($request){
                $query->whereHas('studentSchool',function($query) use ($request){
                    $query->whereHas('school',function($query) use ($request){
                        $query->where('id',$request->filter);
                    });
                });
            });
        })
        ->selectRaw('student_id, sum(point) as point')
        ->orderBy('point', 'desc')
        ->get();
    }

    public function get_student_by_point(string $studentId) : mixed
    {
        return $this->model->query()
        ->where('student_id', $studentId)
        ->groupBy('student_id')
        ->selectRaw('student_id, sum(point) as point')
        ->get();
    }

    public function get_school() :mixed
    {
    return $this->school->query()
        ->role('school')
        ->get();
    }

    public function create_point($point, string $studentId): void
    {
        $this->model->create([
            'student_id' => $studentId,
            'point' => $point,
        ]);
    }

}
