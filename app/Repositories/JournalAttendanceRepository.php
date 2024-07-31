<?php

namespace App\Repositories;

use App\Models\Journal;
use App\Models\JournalAttendance;
use App\Repositories\BaseRepository;

class JournalAttendanceRepository extends BaseRepository
{
    public function __construct(JournalAttendance $model)
    {
        $this->model = $model;
    }

    public function getByJournal($journalId): mixed
    {
        return $this->model->where("journal_id", $journalId)->get();
    }

    public function deleteByJournal($journalId): void
    {
        $this->model->where("journal_id", $journalId)->delete();
    }
}
