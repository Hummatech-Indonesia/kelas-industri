<?php

namespace App\Repositories;

use App\Models\Attendance;
use App\Models\User;
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

    public function update_status(string $id): void
    {
        $this->model->findorfail($id)
            ->update([
                'status' => 'close',
            ]);
    }
}

