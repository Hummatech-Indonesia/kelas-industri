<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Attendance;
use App\Models\SubmitAttendance;

class AttendanceRepository extends BaseRepository
{
    private User $user;
    private SubmitAttendance $submitAttendance;

    public function __construct(Attendance $model, SubmitAttendance $submitAttendance)
    {
        $this->model = $model;
        $this->submitAttendance = $submitAttendance;
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
            ->orderBy('created_at','desc')
            ->get();
    }
    public function get_student_attendance_status(string $attendanceId): mixed
    {
        return $this->submitAttendance->query()
            ->where('attendance_id',$attendanceId)
            ->where('student_id',auth()->user()->id)
            ->get();
    }
    public function create_submit_attendance(array $data) : void
    {
        $this->submitAttendance->create($data);
    }

    public function get_student_by_submit_attendance(string $attendanceId): mixed
    {
        return $this->submitAttendance->query()
        ->where('attendance_id',$attendanceId)
        ->get();
    }

    public function get_student_by_submit_attendance_mentor(string $attendanceId, string $mentorId) :mixed
    {
        return $this->submitAttendance->query()
        ->where('attendance_id', $attendanceId)
        ->whereRelation('attendance', function ($q) use ($mentorId){
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

}

