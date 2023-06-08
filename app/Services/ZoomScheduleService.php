<?php

namespace App\Services;

use App\Http\Requests\ZoomScheduleRequest;
use App\Repositories\ZoomScheduleRepository;
use App\Traits\YajraTable;

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
