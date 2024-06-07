<?php

namespace App\Services;

use Carbon\Carbon;
use App\Traits\YajraTable;
use App\Http\Requests\ZoomScheduleRequest;
use App\Repositories\ZoomScheduleRepository;

class ZoomScheduleService
{
    use YajraTable;

    private ZoomScheduleRepository $repository;

    public function __construct(ZoomScheduleRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * handle get all
     *
     * @return mixed
     */
    public function handleGetAll(): mixed
    {
        return $this->ZoomScheduleMockup($this->repository->getAll(['key' => 'date', 'value' => 'desc']));
    }

    /**
     * handle store
     *
     * @param ZoomScheduleRequest $request
     * @return void
     */
    public function handleCreate(ZoomScheduleRequest $request): void
    {
        $this->repository->store($request->validated());
    }

    public function handleCreateMultiple(ZoomScheduleRequest $request): void
    {
        $data = $request->validated();

        // Tanggal mulai (misal 5 Juni 2024)
        $startDate = Carbon::create($data['date']);

        // Ambil tanggal pertama di bulan yang sama
        $firstDayOfMonth = $startDate->copy()->startOfMonth();

        // Ambil tanggal terakhir di bulan yang sama
        $lastDayOfMonth = $startDate->copy()->endOfMonth();

        // Loop dari tanggal mulai hingga akhir bulan
        while ($startDate->lte($lastDayOfMonth)) {
            $this->repository->store($data);
            // dd($startDate->toDateTimeString());
            // Tambah 1 minggu
            $startDate->addWeek();
            $data['date'] = $startDate->toDateTimeString();
        }
    }

    /**
     * handle update
     *
     * @param ZoomScheduleRequest $request
     * @param int $id
     * @return void
     */
    public function handleUpdate(ZoomScheduleRequest $request, int $id): void
    {
        $this->repository->update($id, $request->validated());
    }

    /**
     * handle delete
     *
     * @param int $id
     * @return bool
     */
    public function handleDelete(int $id): bool
    {
        return $this->repository->destroy($id);
    }

    public function handleGetZoomScheduleStudent()
    {
        return $this->repository->get_zoom_schedule_student();
    }

    public function handleGetZoomScheduleTeacher()
    {
        return $this->repository->get_zoom_schedule_teacher();
    }

    public function handleGetZoomScheduleMentor()
    {
        return $this->repository->get_zoom_schedule_mentor();
    }
}
