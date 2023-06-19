<?php

namespace App\Services;

use App\Models\Journal;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Helpers\SchoolYearHelper;
use App\Http\Requests\JournalRequest;
use App\Repositories\JournalRepository;
use App\Repositories\GenerationRepository;

class JournalService
{
    private JournalRepository $repository;

    public function __construct(JournalRepository $journalRepository)
    {
        $this->repository = $journalRepository;
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

    public function handleGetJurnalByAdmin(string $classroomId): mixed
    {
        return $this->repository->get_journal_by_admin($classroomId);
    }

    public function handleGetJournalByUser(): mixed
    {
        return $this->repository->get_journal_by_user();
    }

    public function handleGetBySchool(): mixed
    {
        return $this->repository->get_journal_by_school();
    }

    /**
     * handle get paginated
     *
     * @param int $schoolYearId
     * @return mixed
     */
    public function handleGetPaginate(int $schoolYearId): mixed
    {
        return $this->repository->get_paginate_by_school_year($schoolYearId, 8);
    }

    /**
     * store generation year
     *
     * @param JournalRequest $request
     * @return void
     */
    public function handleCreate(JournalRequest $request): void
    {
        $data = $request->validated();
        $data['date'] = Carbon::now();
        $this->repository->store($data);
    }

    /**
     * update generation year
     *
     * @param JournalRequest $request
     * @param int $id
     * @return void
     */
    public function handleUpdate(JournalRequest $request, string $id): void
    {
        $this->repository->update($id, $request->validated());
    }

    /**
     * handle delete generation year
     *
     * @param int $id
     * @return bool
     */
    public function handleDelete(Journal $journal): bool
    {
        return $this->repository->destroy($journal->id);
    }

    public function handleCountJournalTeacher(string $teacherId) :mixed
    {
        return $this->repository->get_count_journal_teacher($teacherId);
    }

    public function handleCountJournalMentor(string $mentorId) :mixed
    {
        return $this->repository->get_count_journal_mentor($mentorId);
    }
}
