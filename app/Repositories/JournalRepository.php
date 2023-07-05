<?php

namespace App\Repositories;

use App\Models\Journal;
use Illuminate\Http\Request;

class JournalRepository extends BaseRepository
{
    public function __construct(Journal $journal)
    {
        $this->model = $journal;
    }

    public function get_journal_by_admin_and_school(string $classroomId): mixed
    {
        return $this->model->query()
        ->where('classroom_id', $classroomId)
        ->orderBy('date', 'desc')
        ->get();
    }

    public function get_journal_by_user(int $schoolYearId): mixed
    {
        return $this->model->query()
        ->where('created_by', auth()->id())
        ->whereRelation('classroom.generation.schoolYear', function ($q) use ($schoolYearId){
            $q->where('id', $schoolYearId);
        })
        ->get();
    }

    public function get_journal_by_school(): mixed
    {
        return $this->model->query()
        ->whereIn('classroom_id',auth()->user()->classrooms->pluck('id')->toArray())
        ->get();
    }

    public function get_count_journal_teacher(string $teacherId) :mixed
    {
        return $this->model->query()
        ->where('created_by', $teacherId)
        ->count();
    }

    public function get_count_journal_mentor(string $mentorId) :mixed
    {
        return $this->model->query()
        ->where('created_by', $mentorId)
        ->count();
    }

}
