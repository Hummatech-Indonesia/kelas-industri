<?php

namespace App\Repositories;

use App\Models\Journal;
use App\Models\JournalAttendance;
use App\Repositories\BaseRepository;

class JournalAttendanceRepository extends BaseRepository
 {
    public function __construct(JournalAttendance $model) {
        $this->model = $model;
    }

    public function getByJournal($journalId): mixed {
        return $this->model->with('studentClassroom.studentSchool.student')->where("journal_id", $journalId)->get();
    }
 }
