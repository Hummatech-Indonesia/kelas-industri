<?php

namespace App\Services;

use App\Repositories\JournalAttendanceRepository;

class JournalAttendanceService
{
    private JournalAttendanceRepository $repository;
    public function __construct(JournalAttendanceRepository $repository = null)
    {
        $this->repository = $repository;
    }

    public function halndeGetByJournal($journalId): mixed
    {
        return $this->repository->getByJournal($journalId);
    }
    public function handleCreate($attendances, $journalId): void
    {
        foreach ($attendances as $key => $value) {
            $data['journal_id'] = $journalId;
            $data['student_classroom_id'] = $key;
            $data['attendance'] = $value;
            $this->repository->store($data);
        }
    }
}
