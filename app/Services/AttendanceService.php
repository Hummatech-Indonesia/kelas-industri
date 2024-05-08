<?php

namespace App\Services;

use App\Http\Requests\AttendanceRequest;
use App\Http\Requests\SubmitAttendanceRequest;
use App\Models\Attendance;
use App\Repositories\AttendanceRepository;
use App\Repositories\MentorRepository;
use App\Repositories\PointRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceService
{
    private AttendanceRepository $repository;
    private MentorRepository $mentorRepository;
    private PointRepository $pointRepository;

    public function __construct(AttendanceRepository $repository, MentorRepository $mentorRepository, PointRepository $pointRepository)
    {
        $this->pointRepository = $pointRepository;
        $this->repository = $repository;
        $this->mentorRepository = $mentorRepository;
    }

    /**
     * handle get by teacher
     *
     * @param string $teacherId
     * @return mixed
     */

    public function handleGetByMentor(): mixed
    {
        return $this->repository->get_attendance_by_mentor(auth()->user()->id);
    }

    public function handleGetByAdmin(): mixed
    {
        return $this->repository->get_all();
    }

    public function countMentorAttendance(Request $request): mixed
    {
        return $this->repository->count_mentor_attendance($request, 6);
    }

    public function countMentorAttendanceMonth(): mixed
    {
        return $this->repository->count_mentor_attendance_month();
    }

    public function handleCountMentorAttendanceMonthYear($request): mixed
    {
        $now = now();
        return $this->repository->countMentorAttendanceMonthYear(
            $request->year ? $request->year : $now->year,
            $request->month ? $request->month : $now->month
        );
    }

    public function handleGetAttendanceMentor(string $id): mixed
    {
        return $this->repository->get_attendance_mentor($id);
    }

    public function attendancesCountMonth(Request $request, string $id): mixed
    {
        return $this->repository->attendances_count_month($request, $id);
    }

    public function handleCreate(AttendanceRequest $request): void
    {
        $data = $request->validated();
        $data['created_by'] = auth()->user()->id;
        $this->repository->store($data);
    }

    public function getMonthAttendance(Request $request, string $id): mixed
    {
        return $this->repository->get_month_attendance($request, $id);
    }

    public function getMonthAttendanceCount(Request $request, string $id): mixed
    {
        return $this->repository->get_month_attendance_count($request, $id);
    }

    public function handleShow(Attendance $attandance): mixed
    {
        return $this->repository->show($attandance->id);
    }

    public function validate_student_mentor($mentorId): bool
    {
        return $this->mentorRepository->student_have_mentor($mentorId);
    }
    public function validate_attendance_status(Attendance $attendance): bool
    {
        $check = $this->repository->show($attendance->id);
        if ($check->status == 'close') {
            return true;
        }
        return false;
    }

    public function validate_student_submit_status(Attendance $attendance): bool
    {
        if ($this->repository->get_student_attendance_status($attendance->id)->count() > 0) {
            return true;
        }
        return false;
    }

    public function submitAttendance(Attendance $attendance): void
    {
        $oldPoint = $this->pointRepository->get_by_student(auth()->user()->id);
        $dataPoint['point'] = ($oldPoint) ? (int) $oldPoint->point + 1 : 1;
        $dataPoint['student_id'] = auth()->user()->id;
        $this->pointRepository->update_or_create_point($dataPoint);
        $data['student_id'] = auth()->id();
        $data['attendance_id'] = $attendance->id;
        $this->repository->create_submit_attendance($data);
    }

    public function getStudentBySubmitAttendanceMentor(Attendance $attendance, string $mentorId): mixed
    {
        return $this->repository->get_student_by_submit_attendance_mentor($attendance->id, $mentorId);
    }

    public function getStudentBySubmitAttendance(Attendance $attendanceId): mixed
    {
        return $this->repository->get_student_by_submit_attendance($attendanceId->id);
    }

    public function handleUpdate(AttendanceRequest $request, Attendance $attandance): void
    {
        $this->repository->update($attandance->id, $request->validated());
    }

    public function changeStatus(Attendance $attendance): void
    {
        $this->repository->update_status($attendance->id);
    }


    public function handleDelete(Attendance $attendance): bool
    {
        return $this->repository->destroy($attendance->id);
    }
}
