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

    public function get_journal_by_admin(Request $request): mixed
    {
        return $this->model->query()
        ->when($request->filter,function($query) use ($request){
            return $query
            ->whereHas('classroom',function($query) use ($request){
                $query->whereHas('school',function($query) use ($request){
                    $query->where('id',$request->filter);
                });
            });
        })
        ->get();
    }

    public function get_journal_by_user(): mixed
    {
        return $this->model->query()
        ->where('created_by', auth()->id())
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

}
