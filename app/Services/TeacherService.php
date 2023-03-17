<?php

namespace App\Services;

use App\Http\Requests\TeacherRequest;
use App\Models\User;
use App\Repositories\TeacherRepository;
use App\Repositories\UserRepository;

class TeacherService
{
    private TeacherRepository $repository;
    private UserRepository $userRepository;

    public function __construct(TeacherRepository $repository, UserRepository $userRepository)
    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
    }

    /**
     * handle get by classroom
     *
     * @param string $classroomId
     * @return mixed
     */
    public function handleGetByClassroom(string $classroomId): mixed
    {
        return $this->repository->get_teacher_by_classroom($classroomId);
    }

    /**
     * store school year
     *
     * @param TeacherRequest $request
     * @return void
     */
    public function handleCreate(TeacherRequest $request): void
    {
        $data = $request->validated();
        $data['password'] = bcrypt('password');

        $user = $this->userRepository->store($data);
        $user->assignRole('student');

        $data = [
            'teacher_id' => $user->id,
            'classroom_id' => $request->classroom_id
        ];

        $this->repository->store($data);
    }

    /**
     * update school year
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
     * handle delete school year
     *
     * @param User $teacher
     * @return bool
     */
    public function handleDelete(User $teacher): bool
    {
        return $this->userRepository->destroy($teacher->id);
    }
}
