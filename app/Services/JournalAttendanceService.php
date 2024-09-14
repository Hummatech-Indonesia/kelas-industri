<?php

namespace App\Services;

use App\Models\Journal;
use App\Repositories\JournalAttendanceRepository;

class JournalAttendanceService
{
    private JournalAttendanceRepository $repository;
    public function __construct(JournalAttendanceRepository $repository = null)
    {
        $this->repository = $repository;
    }

    public function handleGetByJournal($journalId): mixed
    {
        return $this->repository->getByJournal($journalId);
    }

    public function handleCreate($attendances, $journalId): void
    {
        if ($attendances) {
            foreach ($attendances as $key => $value) {
                $data['journal_id'] = $journalId;
                $data['student_classroom_id'] = $key;
                $data['attendance'] = $value;
                $this->repository->store($data);
            }
        }
    }

    public function handleDeleteByJournal($journalId): void
    {
        $this->repository->deleteByJournal($journalId);
    }

    public function handleUpdate($attendances, $journalId): void
    {
        // dd($attendances);
        // $invalid = [];
        foreach ($attendances as $key => $value) {
            $data['journal_id'] = $journalId;
            $data['attendance'] = $value;
            // try {
                $this->repository->update($key, $data);
            // } catch (\Throwable $th) {
                // $invalid[] = $key;
            // }
        }
        // if(!empty($invalid)) {
        //     echo "gagal:<br>";
        //     foreach ($invalid as $key) {
        //         echo '$key<br>';
        //     }
        // }
    }
}
