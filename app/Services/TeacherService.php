<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Http\Requests\TeacherRequest;
use App\Repositories\TeacherRepository;
use App\Http\Requests\UserPasswordRequest;
use App\Repositories\TeacherClassroomRepository;
use SebastianBergmann\Type\NullType;

class TeacherService
{
    private TeacherRepository $repository;
    private UserRepository $userRepository;
    private TeacherClassroomRepository $teacherClassroomRepository;

    public function __construct(TeacherRepository $repository, UserRepository $userRepository, TeacherClassroomRepository $teacherClassroomRepository)
    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
        $this->teacherClassroomRepository = $teacherClassroomRepository;
    }

    /**
     * handle get by school
     *
     * @param string $schoolId
     * @return mixed
     */
    public function handleGetBySchool(string $schoolId): mixed
    {
        return $this->repository->get_teacher_by_school($schoolId);
    }

    public function handleGetAngkatan(string | null $schoolId)
    {
        return $this->repository->get_angkatan($schoolId, 6);
    }

    /**
     * store teacher
     *
     * @param TeacherRequest $request
     * @return void
     */
    public function handleCreate(TeacherRequest $request, string $schoolId): void
    {
        $data = $request->validated();
        $data['password'] = bcrypt('password');

        $user = $this->userRepository->store($data);
        $user->assignRole('teacher');

        $data = [
            'teacher_id' => $user->id,
            'school_id' => $schoolId
        ];

        $this->repository->store($data);
    }

    /**
     * update teacher
     *
     * @param TeacherRequest $request
     * @param User $teacher
     * @return void
     */
    public function handleUpdate(TeacherRequest $request, User $teacher): void
    {
        $data = $request->validated();

        $this->userRepository->update($teacher->id, $data);
    }

    /**
     * handle delete teacher
     *
     * @param User $teacher
     * @return bool
     */
    public function handleDelete(User $teacher): bool
    {
        return $this->userRepository->destroy($teacher->id);
    }

    /**
     * handle store teacher classroom
     *
     * @param Request $request
     * @return void
     */
    public function handleStoreTeacherClassroom(Request $request): void
    {
        $data = $request->validate([
            'classroom_id' => 'required'
        ], [
            'required' => 'Kelas tidak boleh kosong'
        ]);
        $data['teacher_school_id'] = $request->teacher_school_id;
        $data['classroom_id'] = $request->classroom_id;

        $this->teacherClassroomRepository->store($data, $data);
    }

    /**
     * handle teacher classrooms
     *
     * @param int $teacherSchoolId
     * @return mixed
     */
    public function handleGetTeacherClassrooms(int $teacherSchoolId): mixed
    {
        return $this->teacherClassroomRepository->get_by_teacher_school($teacherSchoolId);
    }

    /**
     * handle delete teacher classroom
     *
     * @param int $teacherClassroomId
     * @return void
     */
    public function handleDeleteTeacherClassroom(int $teacherClassroomId): void
    {
        $this->teacherClassroomRepository->destroy($teacherClassroomId);
    }
    public function handleGetStatistic(string | null $schoolId): mixed
    {
        $teachers = $this->repository->get_statistic($schoolId);
        $data = [];
        $challenge_salary = 5000;
        $assignment_salary = 10000;
        $journal_salary = 1000;

        foreach ($teachers as $teacher) {
            $total = 0;
            foreach ($teacher->teacherClassrooms as $teacherClassroom) {
                foreach ($teacherClassroom->classroom->challenges as $challenge) {
                    $teacher->teacher->challenge_graded = $challenge->StudentChallenge->where('is_valid', 'valid')->count();
                }
                foreach ($teacherClassroom->classroom->students as $student) {
                    if ($student->studentSchool->student->submitAssignment) {
                        $teacher->teacher->assignment_graded = $student->studentSchool->student->submitAssignment->whereNotNull('point')->count();
                    } else {
                        $teacher->teacher->assignment_graded = 0;
                    }
                }
            }
            $total += $teacher->teacher->challenge_graded * $challenge_salary;
            $total += $teacher->teacher->journals_count * $journal_salary;
            $total += $teacher->teacher->assignment_graded * $assignment_salary;
            $teacher->teacher->salary = $total;
            array_push($data, $teacher);
        }

        return $data;
    }
}
