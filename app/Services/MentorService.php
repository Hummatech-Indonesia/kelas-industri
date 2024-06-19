<?php

namespace App\Services;

use App\Repositories\MentorRepository;
use Illuminate\Http\Request;

class MentorService
{
    private MentorRepository $repository;

    public function __construct(MentorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handleGetAll()
    {
        return $this->repository->getAll();
    }

    /**
     * handle get mentor classrooms
     *
     * @param string $mentorId
     * @return mixed
     */
    public function handleGetMentorClassrooms(string $mentorId): mixed
    {
        return $this->repository->get_by_mentor($mentorId);
    }

    /**
     * handle store
     *
     * @param Request $request
     * @return void
     */
    public function handleStore(Request $request): void
    {
        $request->validate([
            'classroom_id' => 'required',
            // 'school_id' => 'required'
        ],[
            'classroom_id.required' => 'Kelas tidak boleh kosong',
            // 'school_id.required' => 'Sekolah tidak boleh kosong'
        ]);
        $this->repository->store($request->all());
    }

    /**
     * handle delete
     *
     * @param int $id
     * @return void
     */
    public function handleDelete(int $id): void
    {
        $this->repository->destroy($id);
    }

    public function handleArrClassroom(mixed $classrooms): mixed
    {
        $classroomArryId = [];
        foreach ($classrooms as $classroom) {
            $classroomId = $classroom->classroom_id;
            array_push($classroomArryId, $classroomId);
        }

        return $classroomArryId;
    }
}
