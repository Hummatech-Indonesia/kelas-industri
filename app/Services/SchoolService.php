<?php

namespace App\Services;

use App\Http\Requests\SchoolRequest;
use App\Http\Requests\SchoolYearRequest;
use App\Models\User;
use App\Repositories\SchoolRepository;
use Illuminate\Support\Facades\Storage;

class SchoolService
{
    private SchoolRepository $repository;

    public function __construct(SchoolRepository $repository)
    {
        $this->repository = $repository;
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
     * store school year
     *
     * @param SchoolRequest $request
     * @return void
     */
    public function handleCreate(SchoolRequest $request): void
    {
        $data = $request->validated();
        $data['photo'] = $request->file('photo')->store('school-logo', 'public');

        $school = $this->repository->store($data);
        $school->assignRole('school');
    }

    /**
     * update school year
     *
     * @param SchoolRequest $request
     * @param int $id
     * @return void
     */
    public function handleUpdate(SchoolRequest $request, User $school): void
    {
        $data = $request->validated();
        if($request->hasFile('photo')){
            Storage::delete('public/' . $school->photo);

            $data['photo'] = $request->file('photo')->store('school-logo', 'public');
        }

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
        if($school->photo){
            $delete = Storage::delete('public/' . $school->photo);
        }
        return $this->repository->destroy($school->id);
    }
}
