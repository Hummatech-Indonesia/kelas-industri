<?php

namespace App\Services;

use App\Http\Requests\StudentRequest;
use App\Models\User;
use App\Repositories\StudentRepository;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Http\Request;

class StudentService
{

    private StudentRepository $repository;
    private UserRepository $userRepository;

    public function __construct(StudentRepository $repository, UserRepository $userRepository)
    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
    }

    /**
     * handle get by school
     *
     * @param string $schoolId
     * @return mixed
     * @throws Exception
     */
    public function handleGetBySchool(string $schoolId): mixed
    {
        return $this->repository->get_by_school($schoolId);
    }
    public function handleGetClassroom(): mixed
    {
        return $this->repository->get_classroom();
    }
    public function handleGetByClassroom(string $schoolId): mixed
    {
        return $this->repository->get_by_classroom($schoolId);
    }
    public function handleFilterStudentByClassroom(string $schoolId, string $classroomId): mixed
    {
        return $this->repository->filter_student_by_classroom($schoolId, $classroomId);
    }

    public function handleUpdateSchool(Request $request): mixed
    {
        return $this->repository->update_school($request);
    }
    public function handleGetStudentByClassroom(string $schoolId, string $classroomId): mixed
    {
        return $this->repository->get_student_by_classroom($schoolId, $classroomId);
    }

    /**
     * store school year
     *
     * @param StudentRequest $request
     * @return void
     */
    public function handleCreate(StudentRequest $request): void
    {
        $data = $request->validated();
        $data['status'] = 'active';
        $data['password'] = bcrypt('password');

        $user = $this->userRepository->store($data);
        $user->assignRole('student');

        $data = [
            'student_id' => $user->id,
            'school_id' => auth()->id(),
        ];

        $this->repository->store($data);
    }

    /**
     * update school year
     *
     * @param StudentRequest $request
     * @param User $student
     * @return void
     */
    public function handleUpdate(StudentRequest $request, User $student): void
    {
        $data = $request->validated();

        $this->userRepository->update($student->id, $data);
    }

    /**
     * handle delete school year
     *
     * @param User $student
     * @return bool
     */
    public function handleDelete(User $student): bool
    {
        return $this->userRepository->destroy($student->id);
    }
}
