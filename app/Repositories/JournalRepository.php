<?php

namespace App\Repositories;

use App\Models\Journal;

class JournalRepository extends BaseRepository
{
    public function __construct(Journal $journal)
    {
        $this->model = $journal;
    }

    public function get_journal_by_user(): mixed
    {
        return $this->model->query()
        ->where('created_by', auth()->id())
        ->get();
    }

}
