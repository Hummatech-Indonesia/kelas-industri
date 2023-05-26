<?php

namespace App\Services;

use App\Http\Requests\AttendanceRequest;
use App\Http\Requests\SubmitAttendanceRequest;
use App\Models\Attendance;
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
        $data['created_by'] = auth()->user()->id;
        $this->repository->store($data);
    }

    public function handleShow(Attendance $attandance) : mixed
    {
        return $this->repository->show($attandance->id);
    }

    public function validate_student_mentor($mentorId) : bool 
    {
        return $this->mentorRepository->student_have_mentor($mentorId);
    }
    public function validate_attendance_status(Attendance $attendance) : bool
    {
        $check = $this->repository->show($attendance->id);
        if($check->status == 'close'){
            return true;
        }
        return false;
    }

    public function validate_student_submit_status(Attendance $attendance) : bool
    {
        if($this->repository->get_student_attendance_status($attendance->id)->count() > 0){
            return true;
        }
        return false;
    }

    public function submitAttendance(Attendance $attendance): void
    {
        $data['student_id'] = auth()->id();
        $data['attendance_id'] = $attendance->id;
        $this->repository->create_submit_attendance($data);
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
