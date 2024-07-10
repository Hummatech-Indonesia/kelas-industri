<?php

namespace App\Services;

use App\Http\Requests\SchoolRequest;
use App\Http\Requests\SchoolYearRequest;
use App\Models\User;
use App\Repositories\SchoolRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SchoolService
{
    private SchoolRepository $repository;

    public function __construct(SchoolRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getById($id) {
        return $this->repository->show($id);
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

    /**
     * handle get paginated
     *
     * @return mixed
     */
    public function handleGetPaginate(): mixed
    {
        return $this->repository->get_paginate(6);
    }

    /**
     * handle search
     *
     * @param string|null $search
     * @return mixed
     */
    public function handleSearch(string|null $search): mixed
    {
        return $this->repository->search_paginate($search, 6);
    }

    public function handleFilter(String|null $status, string|null $search): mixed
    {
        return $this->repository->status_paginate($status, $search, 6);
    }

    public function handleCountStudent(string $id)
    {
        return $this->repository->getCountStudent($id);
    }

    public function handleCountAllStudentActive(string $id)
    {
        return $this->repository->countAllStudentActive($id);
    }

    public function handleCountStudentClassroom(string $classroom)
    {
        return $this->repository->getCountStudentClassroom($classroom);
    }

    public function handleCount()
    {
        return $this->repository->getCount();
    }

    /**
     * store school year
     *
     * @param SchoolRequest $request
     * @return void
     */
    public function handleCreate(SchoolRequest $request): mixed
    {
        $data = $request->validated();
        $data['photo'] = $request->file('photo')->store('school-logo', 'public');
        $data['password'] = bcrypt($data['password']);

        $school = $this->repository->store($data);
        $school->assignRole('school');
        return $school;
    }

    public function handleCreateTester(User $school, $amount): void
    {
        for ($i = 1; $i <= $amount; $i++) {
            $user['name'] = strtolower(str_replace(' ', '', $school->name)) . str_pad($i, 3, '0', STR_PAD_LEFT);
            $user['email'] = strtolower(str_replace(' ', '', $school->name)) . str_pad($i, 3, '0', STR_PAD_LEFT) . '@hummatech.com';
            $user['password'] = bcrypt('password');
            $data = $this->repository->store($user);
            $data->assignRole('tester');
        }
    }

    /**
     * update school year
     *
     * @param SchoolRequest $request
     * @param User $school
     * @return void
     */
    public function handleUpdate(SchoolRequest $request, User $school): void
    {
        $data = $request->validated();
        if ($request->hasFile('photo')) {
            Storage::delete('public/' . $school->photo);
            $data['photo'] = $request->file('photo')->store('school-logo', 'public');
        }
        $data['password'] = bcrypt($data['password']);
        $this->repository->update($school->id, $data);
    }

    /**
     * handle delete school year
     *
     * @param User $school
     * @return bool
     */
    public function handleDelete(User $school): bool
    {
        if ($school->photo) {
            $delete = Storage::delete('public/' . $school->photo);
        }
        return $this->repository->destroy($school->id);
    }

    public function handleGetAllClassroom(User $school, Request $request): mixed
    {
        return $this->repository->getAllClassroom($school, $request);
    }


    public function handleDeleteRegristationExamStudent(User $school): mixed
    {
        return User::whereHas('students', function ($q) use ($school) {
            $q->where('school_id', $school->id);
        })->delete();
    }
}
