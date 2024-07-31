<?php

namespace App\Services;

use App\Http\Requests\StudentRequest;
use App\Models\User;
use App\Repositories\StudentClassroomRepository;
use App\Repositories\StudentRepository;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Http\Request;

class StudentService
{

    private StudentRepository $repository;
    private UserRepository $userRepository;
    private StudentClassroomRepository $studentClassroomRepository;

    public function __construct(StudentRepository $repository, UserRepository $userRepository, StudentClassroomRepository $studentClassroomRepository)
    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
        $this->studentClassroomRepository = $studentClassroomRepository;
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

    /**
     * handle get by school
     *
     * @param string $schoolId
     * @return mixed
     * @throws Exception
     */
    public function handleGetBySchoolAjax(string $schoolId, Request $request): mixed
    {
        return $this->repository->get_by_school_ajax($schoolId, $request);
    }

    public function handleGetByClassroom(string $classroomId): mixed
    {
        return $this->repository->get_by_classroom($classroomId, 6);
    }

    public function handleUpdateSchool(Request $request): mixed
    {
        return $this->repository->update_school($request);
    }

    public function handleUpdateClassroom(Request $request): mixed
    {
        return $this->studentClassroomRepository->update_classroom($request);
    }

    public function handleGetStudentByClassroom(string $schoolId, string $classroomId, bool $isPaginate = true): mixed
    {
        return $this->repository->get_student_by_classroom($schoolId, $classroomId, $isPaginate);
    }


    public function handleGetBySchoolPayment(string $school, Request $request)
    {
        return $this->repository->getBySchoolPayment($school, $request);
    }

    public function getBySchoolPaymentNotPaginate(string $school, Request $request)
    {
        return $this->repository->getBySchoolPaymentNotPaginate($school, $request);
    }

    public function handleGetBySchoolPaymentWithDependent(string $school, Request $request)
    {
        return $this->repository->getBySchoolWithDependent($school, $request);
    }

    /**
     * store school year
     *
     * @param StudentRequest $request
     * @return void
     */
    public function handleCreate(StudentRequest $request, string $schoolId): void
    {
        $data = $request->validated();
        $data['status'] = 'active';
        $data['password'] = bcrypt('password');

        $user = $this->userRepository->store($data);
        $user->assignRole('student');

        $data = [
            'student_id' => $user->id,
            'school_id' => $schoolId,
        ];

        $this->repository->store($data);
    }
    /**
     * store school year
     *
     * @param StudentRequest $request
     * @return void
     */
    public function handleCreateRegristationExamStudent(User $school, int $amount): void
    {
        for ($i = 1; $i <= $amount; $i++) {
            $dataUser['name'] = 'akun test';
            $dataUser['email'] = strtolower(str_replace(' ', '', $school->name)) . str_pad($i, 3, '0', STR_PAD_LEFT) . '@hummatech.com';
            $dataUser['password'] = bcrypt('hummatech123@768');
            $user = $this->userRepository->store($dataUser);
            $user->assignRole('tester');
            $data = [
                'student_id' => $user->id,
                'school_id' => $school->id,
            ];


            $this->repository->store($data);
        }
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
