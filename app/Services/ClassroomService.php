<?php

namespace App\Services;

use App\Http\Requests\ClassroomRequest;
use App\Repositories\ClassroomRepository;
use App\Repositories\StudentClassroomRepository;
use App\Repositories\TeacherClassroomRepository;
use Illuminate\Http\Request;

class ClassroomService
{
    private ClassroomRepository $repository;
    private StudentClassroomRepository $studentClassroomRepository;
    private TeacherClassroomRepository $teacherClassroomRepository;

    public function __construct(ClassroomRepository $repository, StudentClassroomRepository $studentClassroomRepository, TeacherClassroomRepository $teacherClassroomRepository)
    {
        $this->repository = $repository;
        $this->studentClassroomRepository = $studentClassroomRepository;
        $this->teacherClassroomRepository = $teacherClassroomRepository;
    }

    /**
     * handle get all
     *
     * @return mixed
     */
    public function handleGetAll(): mixed
    {
        return $this->repository->getAll();
    }

    public function handleGetByTeacherCreateEdit(string $teacherId): mixed
    {
        return $this->repository->get_by_teacher_create_edit($teacherId);
    }

    public function handleGetByMentorCreateEdit(String $mentorId): mixed
    {
        return $this->repository->get_by_mentor_create_edit($mentorId);
    }

    public function handleGetByStudent(String $studentId): mixed
    {
        return $this->repository->get_by_student($studentId);
    }

    public function handleGetClassroomByUser(string $userId, Request $search)
    {
        if (auth()->user()->roles->pluck('name')[0] == 'student') {
            return $this->repository->get_by_student($userId, $search->search, 6);
        } elseif (auth()->user()->roles->pluck('name')[0] == 'mentor') {
            return $this->repository->get_by_mentor($userId, $search->search, 6);
        } elseif (auth()->user()->roles->pluck('name')[0] == 'teacher') {
            return $this->repository->get_by_teacher($userId, $search->search, 6);
        }
    }

    public function handleGetClassroomByUserJurnal(string $userId)
    {
        if (auth()->user()->roles->pluck('name')[0] == 'student') {
            return $this->repository->get_by_student_jurnal($userId);
        } elseif (auth()->user()->roles->pluck('name')[0] == 'mentor') {
            return $this->repository->get_by_mentor_jurnal($userId);
        } elseif (auth()->user()->roles->pluck('name')[0] == 'teacher') {
            return $this->repository->get_by_teacher_jurnal($userId);
        }
    }

    /**
     * handle get by school in the current school year
     *
     * @param string $schoolId
     * @param int $schoolYearId
     * @return mixed
     */
    public function handleGetBySchool(string $schoolId, int $schoolYearId): mixed
    {
        return $this->repository->get_by_school($schoolId, $schoolYearId);
    }

    /**
     * handle get paginated
     *
     * @param string $schoolId
     * @return mixed
     */
    public function handleGetPaginate(string $schoolId, int $schoolYearId): mixed
    {
        return $this->repository->get_paginate_by_school($schoolId,$schoolYearId, 8);
    }

    /**
     * handle search
     *
     * @param string $search
     * @param string $schoolId
     * @return mixed
     */
    public function handleSearch(Request $search, string $schoolId, string $year): mixed
    {
        return $this->repository->get_paginate_by_school_search($search->search, $schoolId, $year, 8);
    }

    /**
     * store generation year
     *
     * @param ClassroomRequest $request
     * @return void
     */
    public function handleCreate(ClassroomRequest $request): void
    {
        $this->repository->store($request->validated());
    }

    /**
     * update generation year
     *
     * @param ClassroomRequest $request
     * @param string $id
     * @return void
     */
    public function handleUpdate(ClassroomRequest $request, string $id): void
    {
        $this->repository->update($id, $request->validated());
    }

    /**
     * handle delete generation year
     *
     * @param string $id
     * @return bool
     */
    public function handleDelete(string $id): bool
    {
        return $this->repository->destroy($id);
    }

    /**
     * handle add student
     *
     * @param Request $request
     * @return void
     */
    public function handleAddStudent(Request $request): void
    {
        $this->studentClassroomRepository->delete_student_by_classroom($request->classroom_id);

        foreach ($request->students as $student) {
            $this->studentClassroomRepository->store([
                'classroom_id' => $request->classroom_id,
                'student_school_id' => $student,
            ]);
        }
    }

    public function handleCountClassroomTeacher(string $teacherId) :mixed
    {
        return $this->repository->get_count_classroom_teacher($teacherId);
    }

    public function handleCountClassroomMentor(string $mentorId) :mixed
    {
        return $this->repository->get_count_classroom_mentor($mentorId);
    }

    public function handleGetByTeacherClassroom(string $schoolId, int $schoolYearId) :mixed
    {
        return $this->repository->get_teacher_classroom($schoolId, $schoolYearId);
    }

    public function handleGetBySchoolClassroom(string $schoolId):mixed
    {
        return $this->repository->get_school_classroom($schoolId);
    }

    public function handleGetSchoolClassrooomReport(string $schoolId, $year) :mixed
    {
        return $this->repository->get_school_classroom_report($schoolId, $year);
    }

    public function handleGetSchoolClassrooomJournal(string $schoolId, $year):mixed
    {
        return $this->repository->get_school_classroom_journal($schoolId, $year);
    }
}
