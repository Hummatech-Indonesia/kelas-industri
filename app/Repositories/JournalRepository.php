<?php

namespace App\Repositories;

use App\Models\Journal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function get_journal_by_user(): mixed
    {
        return $this->model->query()
            ->with('classroom', function ($query) {
                return $query->withCount([
                    'students as students'
                ]);
            })
            ->withCount([
                'attendances as permits' => function ($query) {
                    return $query->where('attendance', 'ijin');
                },
                'attendances as sicks' => function ($query) {
                    return $query->where('attendance', 'sakit');
                },
                'attendances as absents' => function ($query) {
                    return $query->where('attendance', 'alfa');
                }
            ])
            ->where('created_by', auth()->id())
            ->get();
    }

    public function show_journal($journalId): mixed
    {
        return $this->model->query()
            ->with('classroom', function ($query) {
                return $query->withCount([
                    'students as students'
                ]);
            })
            ->withCount([
                'attendances as permits' => function ($query) {
                    return $query->where('attendance', 'ijin');
                },
                'attendances as sicks' => function ($query) {
                    return $query->where('attendance', 'sakit');
                },
                'attendances as absents' => function ($query) {
                    return $query->where('attendance', 'alfa');
                }
            ])
            ->findOrFail($journalId);
    }

    public function get_journal_by_school(): mixed
    {
        return $this->model->query()
            ->whereIn('classroom_id', auth()->user()->classrooms->pluck('id')->toArray())
            ->get();
    }

    public function get_count_journal_teacher(string $teacherId): mixed
    {
        return $this->model->query()
            ->where('created_by', $teacherId)
            ->count();
    }

    public function get_count_journal_mentor(string $mentorId): mixed
    {
        return $this->model->query()
            ->where('created_by', $mentorId)
            ->count();
    }

    public function get_journal_by_teacher(string $teacherId): mixed
    {
        return $this->model->query()
            ->where('created_by', $teacherId)
            ->get();
    }

    public function get_month(Request $request, string $TeacherId): mixed
    {
        return $this->model->query()
            ->where('created_by', $TeacherId)
            ->whereYear('date', $request->tahun)
            ->whereMonth('date', '>=', 1)
            ->whereMonth('date', '<=', 12)
            ->selectRaw('distinct month(date) as month')
            ->orderBy('month', 'asc')
            ->get([
                DB::raw('month(date) as month')
            ]);
    }

    public function get_with_attendance($journal): mixed
    {
        return $this->model->query()->with('attendances')->findOrFail($journal);
    }

    public function get_month_count(Request $request, string $TeacherId): mixed
    {
        return $this->model->query()
            ->where('created_by', $TeacherId)
            ->when($request->tahun && $request->bulan, function ($query) use ($request) {
                return $query->whereYear('date', $request->tahun)->whereMonth('date', $request->bulan);
            }, function ($query) {
                return $query->whereYear('date', Carbon::now()->year)->whereMonth('date', Carbon::now()->month);
            })
            ->count();
    }

    public function getByFilter($role, $school, $year, $month): mixed
    {
        return $this->model->query()
            ->whereRelation('user.teacherSchool', 'school_id', $school)
            ->whereYear('date', $year)
            ->whereMonth('date', $month)
            ->with('user')->whereRelation('user.roles', 'name', $role)->get()->groupBy('created_by');
    }
}
