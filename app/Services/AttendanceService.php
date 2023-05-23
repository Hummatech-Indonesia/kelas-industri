<?php

namespace App\Services;

use App\Http\Requests\AttendanceRequest;
use App\Http\Requests\SubmitAttendanceRequest;
use App\Repositories\AttendanceRepository;
use App\Repositories\MentorRepository;

class AttendanceService
{
    private AttendanceRepository $repository;
    private MentorRepository $mentorRepository;

    public function __construct(AttendanceRepository $repository,MentorRepository $mentorRepository)
    {
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

    public function handleCreate(AttendanceRequest $request): void
    {
        $data = $request->validated();
        $data['created_by'] = auth()->id();
        if (auth()->user()->roles->pluck('name')[0] == 'mentor') {
            $data['point'] = 2;
        } elseif (auth()->user()->roles->pluck('name')[0] == 'teacher') {
            $data['point'] = 1;
        }

        $this->repository->store($data);
    }

    public function validate_student_mentor($mentorId) : bool 
    {
        return $this->mentorRepository->student_have_mentor($mentorId);
    }
    public function validate_attendance_status($attendanceId) : bool
    {
        $check = $this->repository->show($attendanceId);
        if($check->status == 'close'){
            return false;
        }
        return true;
    }

    public function validate_student_submit_status(string $attendanceId) : bool 
    {
        return $this->repository->get_student_attendance_status($attendanceId);;
    }

    public function submitAttendance(SubmitAttendanceRequest $request): void
    {
        $data = $request->validated();
        $data['student_school_id'] = auth()->id();
        $this->repository->create_submit_attendance($data);
    }

    public function handleUpdate(AttendanceRequest $request, string $id): void
    {
        $this->repository->update($id, $request->validated());
    }

    public function changeStatus(string $id): void
    {
        $this->repository->update_status($id);
    }

    public function handleDelete(string $id): bool
    {
        return $this->repository->destroy($id);
    }
}
