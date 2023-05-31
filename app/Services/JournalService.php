<?php

namespace App\Services;

use App\Models\Journal;
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

    public function handleGetJournalByUser(): mixed
    {
        return $this->repository->get_journal_by_user();
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
        $this->repository->store($request->validated());
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
    }}
