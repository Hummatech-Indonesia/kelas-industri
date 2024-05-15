<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Attendance;
use App\Models\SubmitAttendance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceRepository extends BaseRepository
{
    private User $user;
    private SubmitAttendance $submitAttendance;

    public function __construct(Attendance $model, SubmitAttendance $submitAttendance)
    {
        $this->model = $model;
        $this->submitAttendance = $submitAttendance;
    }

    public function get_all()
    {
        return $this->model->query()
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function count_mentor_attendance(Request $request, int $limit): mixed
    {
        return $this->model->query()
            ->selectRaw('count(*) as count, created_by')
            ->groupBy('created_by')
            ->when($request->lastMonth, function ($query) use ($request) {
                return $query->whereMonth('created_at', $request->lastMonth);
            }, function ($query) {
                return $query->whereMonth('created_at', Carbon::now()->month);
            })
            ->paginate($limit);
    }


    public function count_mentor_attendance_month(): mixed
    {
        return $this->model->query()
            ->get();
    }

    public function countSubmitAttendance() : mixed {
        return $this->model->query()->withCount('submitAttendances')->first();
    }

    /**
     * get challenge by teacher
     *
     * @param string $mentorId
     * @return mixed
     */
    public function get_attendance_by_mentor(string $mentorId): mixed
    {
        return $this->model->query()
            ->where('created_by', $mentorId)
            ->orderBy('created_at', 'desc')
            ->get();
    }
    public function get_student_attendance_status(string $attendanceId): mixed
    {
        return $this->submitAttendance->query()
            ->where('attendance_id', $attendanceId)
            ->where('student_id', auth()->user()->id)
            ->get();
    }
    public function create_submit_attendance(array $data): void
    {
        $this->submitAttendance->create($data);
    }

    public function get_student_by_submit_attendance(string $attendanceId): mixed
    {
        return $this->submitAttendance->query()
            ->where('attendance_id', $attendanceId)
            ->get();
    }

    public function get_student_by_submit_attendance_mentor(string $attendanceId, string $mentorId): mixed
    {
        return $this->submitAttendance->query()
            ->where('attendance_id', $attendanceId)
            ->whereRelation('attendance', function ($q) use ($mentorId) {
                $q->where('created_by', $mentorId);
            })
            ->get();
    }

    public function update_status(string $id): void
    {
        $data = $this->model->query()->findorfail($id);
        $data->status = 'close';
        $data->save();
    }

    public function get_attendance_mentor(string $id): mixed
    {
        return $this->model->query()
            ->where('created_by', $id)
            ->get();
    }

    public function get_month_attendance(Request $request, string $id): mixed
    {
        return $this->model->query()
            ->where('created_by', $id)
            ->whereYear('created_at', $request->tahun)
            ->whereMonth('created_at', '>=', 1)
            ->whereMonth('created_at', '<=', 12)
            ->selectRaw('distinct month(created_at) as month')
            ->orderBy('month', 'asc')
            ->get([
                DB::raw('month(created_at) as month')
            ]);
    }

    public function attendances_count_month(Request $request, string $id): mixed
    {
        return $this->model->query()
        ->where('created_by', $id)
        ->when($request->tahun && $request->bulan, function ($query) use ($request) {
            return $query->whereYear('created_at', $request->tahun)->whereMonth('created_at', $request->bulan);
        }, function ($query) {
            return $query->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month);
        })
        ->count();
    }

    public function countMentorAttendanceMonthYear($year, $month): mixed {
        return $this->model->query()->whereYear('created_at', $year)->whereMonth('created_at', $month)->count();
    }
}
