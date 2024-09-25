<?php

namespace App\Services;

use App\Http\Requests\JournalRequest;
use App\Http\Requests\UpdateJournalRequest;
use App\Models\Journal;
use App\Repositories\JournalRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

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

    public function handleGetJurnalByAdminAndSchool(string $classroomId): mixed
    {
        return $this->repository->get_journal_by_admin_and_school($classroomId);
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
    public function handleCreate(JournalRequest $request): mixed
    {
        $data = $request->validated();
        if (auth()->user()->roles->pluck('name')[0] == 'mentor') {
            $data['date'] = Carbon::now();
            $data['photo'] = $request->file('photo')->store('journal_file', 'public');
            return $this->repository->store($data);
        } else if (auth()->user()->roles->pluck('name')[0] == 'teacher') {
            $data['date'] = Carbon::now();
            $data['photo'] = $request->file('photo')->store('journal_file', 'public');
            return $this->repository->store($data);
        }
    }

    /**
     * update generation year
     *
     * @param UpdateJournalRequest $request
     * @param int $id
     * @return void
     */
    public function handleUpdate(UpdateJournalRequest $request, Journal $journal): void
    {
        $data = $request->validated();
        if ($request->hasFile('photo')) {
            Storage::delete('public/' . $journal->photo);
            $data['photo'] = $request->file('photo')->store('journal_file', 'public');
        }
        $this->repository->update($journal->id, $data);
    }

    /**
     * handle delete generation year
     *
     * @param int $id
     * @return bool
     */
    public function handleDelete(Journal $journal): bool
    {
        Storage::delete('public/' . $journal->photo);
        return $this->repository->destroy($journal->id);
    }

    public function handleCountJournalTeacher(string $teacherId): mixed
    {
        return $this->repository->get_count_journal_teacher($teacherId);
    }

    public function handleCountJournalMentor(string $mentorId): mixed
    {
        return $this->repository->get_count_journal_mentor($mentorId);
    }

    public function handleGetByTeacher(string $teacherId): mixed
    {
        return $this->repository->get_journal_by_teacher($teacherId);
    }

    public function getMonth(Request $request, string $TeacherId): mixed
    {
        return $this->repository->get_month($request, $TeacherId);
    }

    public function getMonthCount(Request $request, string $TeacherId): mixed
    {
        return $this->repository->get_month_count($request, $TeacherId);
    }

    public function handleCountJournalByFilter(Request $request, string $schoolId, $role): mixed
    {
        $now = Carbon::now();
        $filteredData = $this->repository->getByFilter(
            $role,
            $request->school ? $request->school : $schoolId,
            $request->year ? $request->year : $now->year,
            $request->month ? $request->month : $now->month
        );

        $transformedData = [];

        foreach ($filteredData as $key => $group) {
            $userName = "";
            $count = 0;
            foreach ($group as $single) {
                $userName = $single->user->name;
                $count++;
            }
            $transformedData[$userName] = $count;
        }

        return $transformedData;
    }

    public function handleGetWithAttendance($journal): mixed
    {
        return $this->repository->get_with_attendance($journal);
    }

    public function handleShowJournal($journalId): mixed
    {
        return $this->repository->show_journal($journalId);
    }
}
